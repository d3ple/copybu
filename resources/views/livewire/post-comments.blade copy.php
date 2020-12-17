<div class="shadow rounded p-6">
    <h1 class="text-xl mb-4">
        Комментарии:
    </h1>

    <div class="mb-4">
        <form action="{{ url('comments') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post }}">
            <input type="hidden" name="parent_id" value="">
            <textarea name="text" class="w-full rounded border"></textarea>
            <button type="submit" class="rounded bg-green-400 text-white px-4 py-1 mt-2">
                Отправить
            </button>
        </form>
    </div>

    @foreach ($comments->whereNull('parent_id') as $comment)
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
            <button class="mt-2 text-xs text-green-400 mb-2" onclick="getElementById('comment-{{ $comment->id }}').classList.toggle('hidden')">
                Ответить
            </button>
            <div id="comment-{{ $comment->id }}" class="hidden">
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

            <div class="">
                @foreach ($comments->where('parent_id', $comment->id) as $subcomment)
                    <div class="border-l-2 pl-6 mt-4">
                        <p class="mb-2">
                            {{ $subcomment->text }}
                        </p>
                        <div>
                            <div class="flex items-center">
                                <img class="w-6 h-6 rounded-full mr-1" src="{{ $subcomment->user->profile_photo_url ?? '/images/avatar.png' }}" alt="Avatar">
                                <div class="text-sm text-gray-500 flex items-center">
                                    <span class="leading-none">
                                        {{ $subcomment->user->name }}
                                    </span>
                                    <span class="text-xs mx-2">
                                        ◦ {{ $subcomment->created_at->format('d.m.Y H:i') }}
                                    </span>
                                    <span class="text-xs flex">
                                        <span class="mr-1">◦</span> 
                                        <livewire:post-rating :rating="$subcomment->rating">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
