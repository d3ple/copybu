<div>
    <div class="rounded overflow-hidden shadow-lg">
        <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Image">
        <div class="px-6 py-4">
            <a class="text-gray-700 text-sm" href="/communities/{{ $post->community['alias'] }}">
                {{ $post->community['name'] }}
            </a>
            <div class="font-bold text-xl mb-2">
                <a href="/posts/{{ $post->alias }}">
                    {{ $post->title }}
                </a>
            </div>
            <p class="text-gray-700 py-2">
                @if ($short)
                    {{ Str::limit($post->text, 512) }}
                @else
                    {{ $post->text }}
                @endif
            </p>
        </div>
        <div class="px-6 flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="/images/avatar.png" alt="Avatar">
            <div class="text-sm">
                <p class="text-gray-900 leading-none">
                    {{ $post->user->name }}
                </p>
                <p class="text-gray-600">
                    {{ $post->created_at->format('d.m.Y') }}
                </p>
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            @foreach ($post->tags as $tag)
                <a href="{{ request()->fullUrlWithQuery(['tag' => $tag->id]) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>