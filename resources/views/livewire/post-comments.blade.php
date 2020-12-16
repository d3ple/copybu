<div class="shadow rounded p-6">
    <h1 class="text-xl mb-3">
        Комментарии:
    </h1>
    @foreach ($comments as $comment)
        <div class="rounded mb-3 bg-gray-100 py-3 px-4">
            <p class="mb-2">
                {{ $comment->text }}
            </p>
            <div>
                <div class="flex items-center">
                    <img class="w-6 h-6 rounded-full mr-1" src="{{ $comment->user->profile_photo_url ?? '/images/avatar.png' }}" alt="Avatar">
                    <div class="text-sm text-gray-500 flex items-center">
                        <span class="leading-none">
                            {{ $comment->user->name }}
                        </span>
                        <span class="text-xs mx-2">
                            ◦ {{ $comment->created_at->format('d.m.Y H:i') }}
                        </span>
                        <span class="text-xs flex">
                            <span class="mr-1">◦</span> 
                            <livewire:post-rating :rating="$comment->rating">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
