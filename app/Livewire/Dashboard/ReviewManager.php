<?php

namespace App\Livewire\Dashboard;

use App\Contracts\ReviewServiceInterface;
use App\Models\Armada;
use App\Models\Review;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReviewManager extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public bool $showEditModal = false;

    // Form fields for Create / Edit
    public ?string $editingReviewId = null;

    public int $rating = 5;

    public ?string $title = '';

    public string $comment = '';

    public ?string $carReview = '';

    public ?string $driverReview = '';

    public ?string $facilitiesReview = '';

    /** @var array<int> */
    public array $selectedArmadas = [];

    /** @var array<UploadedFile> */
    public array $photos = [];

    /** @var array<UploadedFile> */
    public array $videos = [];

    /** @var array<int> Existing media IDs marked for removal during edit */
    public array $removeMediaIds = [];

    public ?string $feedbackMessage = null;

    public ?string $feedbackType = 'success';

    public ?int $review_armada = null;

    public function mount(): mixed
    {
        $armadaId = $this->review_armada ?: (int) (request()->query('armada') ?: request()->query('review_armada'));
        if ($armadaId && Armada::where('id', $armadaId)->exists()) {
            return redirect()->route('reviews.create', ['armada' => $armadaId]);
        }

        return null;
    }

    protected function rules(): array
    {
        return [
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:150',
            'comment' => 'required|string|min:5|max:2000',
            'carReview' => 'nullable|string|max:500',
            'driverReview' => 'nullable|string|max:500',
            'facilitiesReview' => 'nullable|string|max:500',
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
            'carReview.max' => 'Ulasan tentang mobil maksimal 500 karakter.',
            'driverReview.max' => 'Ulasan tentang driver maksimal 500 karakter.',
            'facilitiesReview.max' => 'Ulasan tentang fasilitas maksimal 500 karakter.',
            'photos.*.image' => 'File foto harus berupa gambar valid (JPG, PNG, WebP).',
            'photos.*.max' => 'Ukuran foto maksimal 10MB per berkas.',
            'videos.*.mimes' => 'Video harus berformat MP4, MOV, WebM, atau AVI.',
            'videos.*.max' => 'Ukuran video maksimal 50MB per berkas.',
        ];
    }

    public function openCreateModal(): void
    {
        $this->resetValidation();
        $this->editingReviewId = null;
        $this->rating = 5;
        $this->title = '';
        $this->comment = '';
        $this->carReview = '';
        $this->driverReview = '';
        $this->facilitiesReview = '';
        $this->selectedArmadas = [];
        $this->photos = [];
        $this->videos = [];
        $this->removeMediaIds = [];
        $this->showCreateModal = true;
    }

    public function submitCreate(ReviewServiceInterface $reviewService): void
    {
        $this->validate();

        $user = auth()->user();
        if (! $user) {
            return;
        }

        try {
            $this->authorize('create', Review::class);

            $reviewService->createReview(
                $user,
                [
                    'rating' => $this->rating,
                    'title' => $this->title,
                    'comment' => $this->comment,
                    'car_review' => $this->carReview ?: null,
                    'driver_review' => $this->driverReview ?: null,
                    'facilities_review' => $this->facilitiesReview ?: null,
                    'armada_ids' => $this->selectedArmadas,
                ],
                $this->photos,
                $this->videos,
            );

            $this->showCreateModal = false;
            $this->feedbackType = 'success';
            $this->feedbackMessage = 'Ulasan berhasil dikirim! Menunggu persetujuan admin untuk ditayangkan.';
        } catch (AuthorizationException $e) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = $e->getMessage();
        } catch (\Throwable $e) {
            logger()->error('Failed to create review in Livewire', ['error' => $e->getMessage()]);
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Terjadi kesalahan saat menyimpan ulasan: '.$e->getMessage();
        }
    }

    public function openEditModal(string $reviewId): void
    {
        $this->resetValidation();
        $review = Review::with(['armadas', 'media'])->find($reviewId);

        if (! $review || ! Gate::allows('update', $review)) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Ulasan tidak dapat diedit karena telah melewati 24 jam atau Anda bukan pemilik ulasan.';

            return;
        }

        $this->editingReviewId = $review->id;
        $this->rating = $review->rating;
        $this->title = $review->title;
        $this->comment = $review->comment;
        $this->carReview = $review->car_review ?? '';
        $this->driverReview = $review->driver_review ?? '';
        $this->facilitiesReview = $review->facilities_review ?? '';
        $this->selectedArmadas = $review->armadas->pluck('id')->all();
        $this->photos = [];
        $this->videos = [];
        $this->removeMediaIds = [];
        $this->showEditModal = true;
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

    public function submitEdit(ReviewServiceInterface $reviewService): void
    {
        $this->validate();

        $review = Review::find($this->editingReviewId);
        $user = auth()->user();

        if (! $review || ! $user) {
            return;
        }

        try {
            $this->authorize('update', $review);

            $reviewService->updateReview(
                $review,
                $user,
                [
                    'rating' => $this->rating,
                    'title' => $this->title,
                    'comment' => $this->comment,
                    'car_review' => $this->carReview ?: null,
                    'driver_review' => $this->driverReview ?: null,
                    'facilities_review' => $this->facilitiesReview ?: null,
                    'armada_ids' => $this->selectedArmadas,
                ],
                $this->photos,
                $this->videos,
                $this->removeMediaIds,
            );

            $this->showEditModal = false;
            $this->editingReviewId = null;
            $this->feedbackType = 'success';
            $this->feedbackMessage = 'Ulasan Anda berhasil diperbarui.';
        } catch (AuthorizationException $e) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = $e->getMessage();
        } catch (\Throwable $e) {
            logger()->error('Failed to update review in Livewire', ['error' => $e->getMessage()]);
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Gagal memperbarui ulasan: '.$e->getMessage();
        }
    }

    public function deleteReview(string $reviewId, ReviewServiceInterface $reviewService): void
    {
        $review = Review::find($reviewId);
        $user = auth()->user();

        if (! $review || ! $user) {
            return;
        }

        try {
            $this->authorize('delete', $review);

            $reviewService->deleteReview($review, $user);
            $this->feedbackType = 'success';
            $this->feedbackMessage = 'Ulasan berhasil dihapus.';
        } catch (AuthorizationException $e) {
            $this->feedbackType = 'error';
            $this->feedbackMessage = $e->getMessage();
        } catch (\Throwable $e) {
            logger()->error('Failed to delete review in Livewire', ['error' => $e->getMessage()]);
            $this->feedbackType = 'error';
            $this->feedbackMessage = 'Gagal menghapus ulasan: '.$e->getMessage();
        }
    }

    public function render()
    {
        $user = auth()->user();

        /** @var Collection<int, Review> $reviews */
        $reviews = $user
            ? Review::with(['armadas', 'media'])
                ->where('user_id', $user->id)
                ->latest()
                ->get()
            : collect();

        $availableArmadas = Armada::where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get(['id', 'title', 'slug', 'car_type', 'car_badge', 'car_icon', 'price', 'featured_image', 'gallery']);

        $editingReview = $this->editingReviewId
            ? Review::with('media')->find($this->editingReviewId)
            : null;

        return view('livewire.dashboard.review-manager', [
            'reviews' => $reviews,
            'availableArmadas' => $availableArmadas,
            'editingReview' => $editingReview,
        ]);
    }
}
