<x-app-layout>
    <div class="flex">
        <div class="w-2/3">
            <livewire:posts-sorting>

            {{-- <livewire:load-more-container :page="1" :perPage="2" /> --}}

            @foreach ($posts as $post)
                <div class="mb-12">
                    <livewire:post-card short :post="$post">
                </div>
            @endforeach
        </div>
        <div class="w-1/3 pl-8">
            <a href="/new-post" class="block text-center rounded w-full p-3 mb-6 font-bold bg-green-100 text-xl text-green-400 hover:bg-green-400 hover:text-white border border-green-100 hover:border-green-400">
                Создать пост
            </a>
            <div class="rounded overflow-hidden shadow py-8 px-10">
                <h4 class="font-extrabold text-2xl">
                    {{ $community->name }}
                </h4>
                <p>
                    Количество постов: {{ $community->posts->count() }}
                </p>
                {{-- <ul class="list-disc list-inside">
                    @foreach ($communities as $community)
                        <li class="mt-2">
                            <a href="/communities/{{ $community->alias }}"> 
                                {{ $community->name }}
                            </a>
                        </li>
                    @endforeach
                </ul> --}}
            </div>
        </div>
    </div>
</x-app-layout>