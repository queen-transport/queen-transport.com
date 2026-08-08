@php($src = $attachment->isImage() ? $attachment->url : null)
<div class="flex items-center gap-2">
    @if ($src)
        <img src="{{ $src }}" alt="" class="h-8 w-8 rounded object-cover shrink-0" />
    @else
        <div class="h-8 w-8 rounded bg-gray-200 dark:bg-gray-700 shrink-0 flex items-center justify-center text-xs">
            🎬
        </div>
    @endif
    <span>{{ $attachment->title ?: $attachment->file_name }}</span>
</div>
