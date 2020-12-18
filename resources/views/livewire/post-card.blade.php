<div>
    <div class="rounded overflow-hidden shadow">
        @if ($post->image_url)
            <img class="w-full" src="{{ $post->image_url }}" alt="Image">    
        @endif
        <div class="px-6">
            <div class="py-4">
                <a class="text-green-500 text-sm mb-2 font-bold" href="/communities/{{ $post->community['alias'] }}">
                    {{ $post->community['name'] }}
                </a>
                <div class="font-bold text-xl mb-2">
                    @if ( auth()->user() && auth()->user()->id === $post->user_id)
                    <span class="text-green-400">
                        [Мой]
                    </span>
                    @if ( !$post->is_published )
                    <span class="text-red-400">
                        [Черновик]
                    </span>
                    @endif
                    @endif
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </div>
                @if ($post->text)
                    <p class="text-gray-700 py-2">
                        @if ($short)
                            {{ Str::limit($post->text, 512) }}
                        @else
                            {{ $post->text }}
                        @endif
                    </p>    
                @endif
            </div>
            @if ($post->tags)
                <div class="pt-4 pb-2">
                    @foreach ($post->tags as $tag)
                        <a href="/tags/{{ $tag->id }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="px-6 py-3 bg-green-200 flex text-lg items-center">
            <div class="flex items-center">
                <img class="w-9 h-9 rounded-full mr-2" src="{{ $post->user->profile_photo_url ?? '/images/avatar.png' }}" alt="Avatar">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">
                        {{ $post->user->name }}
                    </p>
                    <p class="text-gray-600">
                        {{ $post->created_at->format('d.m.Y') }}
                    </p>
                </div>
            </div>

            <div class="ml-auto mr-8">
                <a href="/posts/{{ $post->id }}#comments">
                    💬 {{ $post->comments->count() }} 
                </a>
            </div>

            <div class="flex">
                @auth
                <form method="POST" action="{{ url('posts/'. $post->id .'/like') }}">
                    @csrf
                    <input type="hidden" name="is_like" value="1"/>
                    <button class="text-2xl  {{ $post->likes->where('user_id', auth()->user()->id)->first() ? 'text-red-400' : '' }}">
                        ❤
                    </button>
                    <span class="">
                        {{ $post->likes()->count() }}
                    </span>
                </form>
                @endauth

                @guest
                <div>
                    <button class="text-2xl text-red-400">
                        ❤
                    </button>
                    <span class="">
                        {{ $post->likes()->count() }}
                    </span>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>