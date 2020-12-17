<div id="comment-{{ $comment->id }}" class="pt-2 px-4 mb-3 {{ $subcomment ? 'ml-4 border-l-2 border-dashed' : null }}">
    <p class="mb-1">
        {{ $comment->text }}
    </p>
    <div>
        <div class="flex items-center">
            <img class="w-6 h-6 rounded-full mr-1" src="{{ $comment->user->profile_photo_url ?? '/images/avatar.png' }}" alt="{{ $comment->user->name }}">
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
    @auth
        @if (!$comment->parent_id)
            <button class="mt-2 text-xs text-green-400" onclick="getElementById('comment-{{ $comment->id }}-answer').classList.toggle('hidden')">
                Ответить
            </button>
            <div id="comment-{{ $comment->id }}-answer" class="mt-2 hidden">
                <form action="{{ url('comments') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <textarea name="text" class="w-full rounded border"></textarea>
                    <button type="submit" class="rounded bg-green-400 text-white px-4 py-1 mt-2">
                        Отправить
                    </button>
                </form>
            </div>
        @endif
    @endauth
</div>
