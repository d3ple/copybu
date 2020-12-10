<x-app-layout>
    <div class="flex">
        <div class="w-2/3">
            <livewire:posts-sorting>

            @foreach ($posts as $post)
                <div class="mb-12">
                    <livewire:post-card short :post="$post">
                </div>
            @endforeach
        </div>
        <div class="w-1/3 pl-8">
            <div class="rounded overflow-hidden shadow-lg py-8 px-10">
                <h4 class="font-extrabold text-2xl">
                    Сообщества
                </h4>
                <ul class="list-disc list-inside">
                    @foreach ($communities as $community)
                        <li class="">
                            <a href="#"> 
                                {{ $community->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>