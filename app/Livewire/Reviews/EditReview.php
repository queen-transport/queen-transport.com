<?php

namespace App\Livewire\Reviews;

use App\Contracts\ReviewServiceInterface;
use App\Models\Armada;
use App\Models\Review;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditReview extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public Review $review;

    public int $rating = 5;

    public string $carReview = '';

    public string $driverReview = '';

    public string $facilitiesReview = '';

    /** @var array<int> */
    public array $selectedArmadas = [];

    /** @var array<UploadedFile> */
    public array $photos = [];

    /** @var array<UploadedFile> */
    public array $videos = [];

    /** @var array<int> Existing media IDs marked for removal */
    public array $removeMediaIds = [];

    public ?string $feedbackMessage = null;

    public ?string $feedbackType = 'error';

    public function mount(Review $review): mixed
    {
        $user = auth()->user();
        if (! $user || Gate::denies('update', $review)) {
            session()->flash('feedbackType', 'error');
            session()->flash('feedbackMessage', 'Ulasan tidak dapat diedit karena telah melewati batas waktu 24 jam atau Anda bukan pemilik ulasan.');

            return redirect()->route('dashboard');
        }

        $this->review = $review->load(['armadas', 'media']);
        $this->rating = (int) $review->rating;
        $this->carReview = (string) ($review->car_review ?? '');
        $this->driverReview = (string) ($review->driver_review ?? '');
        $this->facilitiesReview = (string) ($review->facilities_review ?? '');
        $this->selectedArmadas = $review->armadas->pluck('id')->all();

        return null;
    }

    /**
     * @return array<string, string|array<mixed>>
     */
    protected function rules(): array
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'carReview' => 'required|string|min:5|max:500',
            'driverReview' => 'required|string|min:5|max:500',
            'facilitiesReview' => 'required|string|min:5|max:500',
            'selectedArmadas' => 'array',
            'selectedArmadas.*' => 'integer|exists:armadas,id',
            'photos.*' => 'nullable|image|max:10240',
            'videos.*' => 'nullable|mimes:mp4,mov,webm,avi|max:51200',
        ];
    }

    /**
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'rating.required' => 'Rating bintang wajib dipilih (1-5).',
            'carReview.required' => 'Ulasan tentang mobil wajib diisi.',
            'carReview.min' => 'Ulasan tentang mobil minimal 5 karakter.',
            'carReview.max' => 'Ulasan tentang mobil maksimal 500 karakter.',
            'driverReview.required' => 'Ulasan tentang driver wajib diisi.',
            'driverReview.min' => 'Ulasan tentang driver minimal 5 karakter.',
            'driverReview.max' => 'Ulasan tentang driver maksimal 500 karakter.',
            'facilitiesReview.required' => 'Ulasan tentang kualitas & fasilitas wajib diisi.',
            'facilitiesReview.min' => 'Ulasan tentang kualitas & fasilitas minimal 5 karakter.',
            'facilitiesReview.max' => 'Ulasan tentang fasilitas maksimal 500 karakter.',
            'photos.*.image' => 'File foto harus berupa gambar valid (JPG, PNG, WebP).',
            'photos.*.max' => 'Ukuran foto maksimal 10MB per berkas.',
            'videos.*.mimes' => 'Video harus berformat MP4, MOV, WebM, atau AVI.',
            'videos.*.max' => 'Ukuran video maksimal 50MB per berkas.',
        ];
    }

    public function toggleArmada(int $armadaId): void
    {
        if (in_array($armadaId, $this->selectedArmadas)) {
            $this->selectedArmadas = array_values(array_filter($this->selectedArmadas, fn ($id) => (int) $id !== $armadaId));
        } else {
            $this->selectedArmadas[] = $armadaId;
        }
    }

    public function removePhoto(int $index): void
    {
        if (isset($this->photos[$index])) {
            unset($this->photos[$index]);
            $this->photos = array_values($this->photos);
        }
    }

    public function removeVideo(int $index): void
    {
        if (isset($this->videos[$index])) {
            unset($this->videos[$index]);
            $this->videos = array_values($this->videos);
        }
    }

    public function markMediaForRemoval(int $mediaId): void
    {
        if (! in_array($mediaId, $this->removeMediaIds)) {
            $this->removeMediaIds[] = $mediaId;
        }
    }

    public function unmarkMediaForRemoval(int $mediaId): void
    {
        $this->removeMediaIds = array_values(array_filter($this->removeMediaIds, fn ($id) => $id !== $mediaId));
    }

    public function submit(ReviewServiceInterface $reviewService): mixed
    {
        try {
            $this->validate();
        } catch (ValidationException $e) {
            $this->dispatch('scroll-to-status');
            throw $e;
        }

        $user = auth()->user();
        if (! $user) {
            return redirect()->route('login');
        }

        try {
            $this->authorize('update', $this->review);

            $reviewService->updateReview(
                $this->review,
                $user,
                [
                    'rating' => $this->rating,
                    'car_review' => $this->carReview,
                    'driver_review' => $this->driverReview,
                    'facilities_review' => $this->facilitiesReview,
                    'armada_ids' => $this->selectedArmadas,
                ],
                $this->photos,
                $this->videos,
                $this->removeMediaIds,
            );

            session()->flash('feedbackMessage', 'Ulasan Anda berhasil diperbarui.');
            session()->flash('feedbackType', 'success');

            return redirect()->route('dashboard');
        } catch (AuthorizationException $e) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = $e->getMessage();
            $this->dispatch('scroll-to-status');
        } catch (\Throwable $e) {
            logger()->error('Failed to update review in EditReview component', ['error' => $e->getMessage()]);
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Terjadi kesalahan saat memperbarui ulasan: '.$e->getMessage();
            $this->dispatch('scroll-to-status');
        }

        return null;
    }

    public function render(): View
    {
        /** @var Collection<int, Armada> $availableArmadas */
        $availableArmadas = Armada::where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get(['id', 'title', 'slug', 'car_type', 'car_badge', 'car_icon', 'price', 'featured_image', 'gallery']);

        return view('livewire.reviews.edit-review', [
            'availableArmadas' => $availableArmadas,
            'existingPhotos' => $this->review->getMedia('photos'),
            'existingVideos' => $this->review->getMedia('videos'),
        ]);
    }
}
