<x-layouts::app :title="__('Tulis Ulasan')">
    <div class="w-full">
        <livewire:reviews.create-review :armada="request()->query('armada') ?? request()->query('review_armada')" />
    </div>
</x-layouts::app>
