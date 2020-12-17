<x-app-layout>
    <div class="flex">
        <div class="w-2/3">
            <livewire:posts-sorting route="posts.index">

            <div class="bg-green-100 mb-5 p-4 rounded">
                <h2 class="text-2xl mb-2">
                    Поиск по тегам
                </h2>
                <form class="flex flex-col" action="{{ url('tags/search') }}" method="post">
                    @csrf
                    <select class="border rounded p-1 mt-1" name="tags[]" id="tags" multiple>
                        @foreach ($tags as $tag)
                            <option {{ in_array($tag->id, $ids) ? 'selected' : null  }} value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-gray-500 text-xs mt-1">
                        Зажми ctrl, чтобы выбрать несколько тегов
                    </p>
                    @error('tags')
                        <p class="text-red-600 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                    <button type="submit" name="is_published" value="1" class="rounded px-4 py-2 mt-4 text-white bg-green-400">
                        Найти
                    </button>
                </form>
            </div>


            @foreach ($posts as $post)
                <div class="mb-12">
                    <livewire:post-card short :post="$post">
                </div>
            @endforeach
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
            <div class="rounded shadow py-4 px-10 mt-6 flex items-center justify-between">
                <div class="flex items-center">
                <img class="w-10 h-10 rounded-full mr-2" src="{{ Auth::user()->profile_photo_url ?? '/images/avatar.png' }}" alt="Avatar">
                    <div>
                        <p class="text-gray-900 leading-none">
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-1 rounded text-red-500 hover:text-white hover:bg-red-500">
                        Выйти
                    </button>
                </form>
            </div>
            @endauth
        </div>
    </div>
</x-app-layout>