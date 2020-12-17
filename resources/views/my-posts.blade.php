<x-app-layout>
    <div class="flex mb-8">
        <div class="w-2/3">
            <livewire:posts-sorting route="posts.index">

            {{-- <livewire:load-more-container :page="1" :perPage="2" /> --}}

            @foreach ($posts as $post)
                <div class="mb-12">
                    <livewire:post-card short :post="$post">
                </div>
            @endforeach

            {{ $posts->links() }}
        </div>
        <div class="w-1/3 pl-8">
            <a href="{{ route('posts.create') }}" class="block text-center rounded w-full p-3 mb-6 font-bold bg-green-100 text-xl text-green-400 hover:bg-green-400 hover:text-white border border-green-100 hover:border-green-400">
                Создать пост
            </a>
            <div class="rounded overflow-hidden shadow py-8 px-10">
                <h4 class="font-extrabold text-2xl flex items-center">
                    <span>
                        Сообщества
                    </span>
                <a class="ml-2 rounded-full px-2 text-base bg-green-100 text-green-400 hover:bg-green-400 hover:text-white" href="{{ route('communities.create') }}">
                        +
                    </a>
                </h4>
                <ul class="list-disc list-inside">
                    @foreach ($communities as $community)
                        <li class="mt-2">
                            <a href="/communities/{{ $community->alias }}"> 
                                {{ $community->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @auth
            <div class="rounded shadow py-4 px-10 mt-6">
                <div class="flex justify-center">
                    <div class="flex items-center text-xl">
                        <img class="w-10 h-10 rounded-full mr-2" src="{{ Auth::user()->profile_photo_url ?? '/images/avatar.png' }}" alt="Avatar">
                        <div>
                            <p class="text-gray-900 leading-none">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <a href="/posts/my" class="w-32 text-center px-4 py-1 rounded text-gray-500 border border-gray-500 hover:text-white hover:bg-gray-500">
                        Мои посты
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-32 px-4 py-1 rounded text-red-500 border border-red-500 hover:text-white hover:bg-red-500">
                            Выйти
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</x-app-layout>