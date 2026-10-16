<?php

namespace App\Livewire\Reviews;

use App\Contracts\ReviewServiceInterface;
use App\Models\Armada;
use App\Models\Review;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReview extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public int $rating = 5;

    public ?string $title = '';

    public string $comment = '';

    /** @var array<int> */
    public array $selectedArmadas = [];

    /** @var array<UploadedFile> */
    public array $photos = [];

    /** @var array<UploadedFile> */
    public array $videos = [];

    public ?string $feedbackMessage = null;

    public ?string $feedbackType = 'error';

    public ?Armada $preselectedArmada = null;

    public ?string $armada = null;

    public function mount(?string $armada = null): void
    {
        $this->armada = $armada;
        $param = $this->armada ?: (request()->query('armada') ?: request()->query('review_armada'));

        if ($param) {
            $foundArmada = Armada::where('id', $param)
                ->orWhere('slug', $param)
                ->first();

            if ($foundArmada) {
                $this->selectedArmadas = [$foundArmada->id];
                $this->preselectedArmada = $foundArmada;
            }
        }
    }

    protected function rules(): array
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:150',
            'comment' => 'required|string|min:5|max:2000',
            'selectedArmadas' => 'array',
            'selectedArmadas.*' => 'integer|exists:armadas,id',
            'photos.*' => 'nullable|image|max:10240',
            'videos.*' => 'nullable|mimes:mp4,mov,webm,avi|max:51200',
        ];
    }

    protected function messages(): array
    {
        return [
            'comment.required' => 'Ulasan atau komentar wajib diisi.',
            'comment.min' => 'Ulasan minimal 5 karakter.',
            'rating.required' => 'Rating bintang wajib dipilih (1-5).',
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

    public function submit(ReviewServiceInterface $reviewService): mixed
    {
        $this->validate();

        $user = auth()->user();
        if (! $user) {
            return redirect()->route('login');
        }

        try {
            $this->authorize('create', Review::class);

            $reviewService->createReview(
                $user,
                [
                    'rating' => $this->rating,
                    'title' => $this->title,
                    'comment' => $this->comment,
                    'armada_ids' => $this->selectedArmadas,
                ],
                $this->photos,
                $this->videos,
            );

            session()->flash('feedbackMessage', 'Ulasan berhasil dikirim! Menunggu persetujuan admin untuk ditayangkan.');
            session()->flash('feedbackType', 'success');

            return redirect()->route('dashboard');
        } catch (AuthorizationException $e) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = $e->getMessage();
        } catch (\Throwable $e) {
            logger()->error('Failed to create review in CreateReview component', ['error' => $e->getMessage()]);
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Terjadi kesalahan saat menyimpan ulasan: '.$e->getMessage();
        }

        return null;
    }

    public function render()
    {
        /** @var Collection<int, Armada> $availableArmadas */
        $availableArmadas = Armada::where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get(['id', 'title', 'slug', 'car_type', 'car_badge', 'car_icon', 'price', 'featured_image', 'gallery']);

        return view('livewire.reviews.create-review', [
            'availableArmadas' => $availableArmadas,
        ]);
    }
}
