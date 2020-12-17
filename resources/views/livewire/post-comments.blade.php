<div class="shadow rounded p-6">
    <h1 class="text-xl mb-4">
        Комментарии:
    </h1>

    <div class="mb-4">
        @auth
        <form action="{{ url('comments') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post }}">
            <input type="hidden" name="parent_id" value="">
            <textarea name="text" class="w-full rounded border"></textarea>
            <button type="submit" class="rounded bg-green-400 text-white px-4 py-1 mt-2">
                Отправить
            </button>
        </form>
        @endauth
    </div>

    @if (!$comments->isEmpty() && $comments->whereNull('parent_id')->count() > 1)
    <div class="py-1 mb-3 rounded bg-green-100">
        <h3 class="px-4 py-2 text-lg text-green-500"> 
            Топ комментарий: 
        </h3>
        <livewire:post-comment :post="$post" top :comment="$comments->whereNull('parent_id')->sortByDesc('rating')->first()">
        
        @foreach ($comments->where('parent_id', $comments->whereNull('parent_id')->sortByDesc('rating')->first()->id) as $subcomment)
            <livewire:post-comment subcomment :post="$post" :comment="$subcomment">
        @endforeach
    </div>    
    @endif

    @foreach ($comments->whereNull('parent_id')->sortBy('created_at') as $comment)
        <div class="py-1 mb-3 rounded bg-gray-100">
            <livewire:post-comment :post="$post" :comment="$comment">
        
            @foreach ($comments->where('parent_id', $comment->id) as $subcomment)
                <livewire:post-comment subcomment :post="$post" :comment="$subcomment">
            @endforeach
        </div>
    @endforeach
</div>
