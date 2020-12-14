<x-app-layout>
    <div class="flex">
        <div class="w-2/3">
            <div class="rounded overflow-hidden shadow py-4 px-8">
                <h1 class="text-3xl mb-4">
                    Создать новый пост
                </h1>
                <form class="" action="{{ url('posts') }}" method="post">
                    @csrf
                    <label class="flex flex-col mb-4">
                        Название поста:
                        <input name="title" class="border rounded p-1 mt-1" type="text"/>
                        @error('title')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>
                    

                    <label class="flex flex-col mb-4">
                        Ссылка на изображение:
                        <input class="border rounded p-1 mt-1" name="image_url" type="url"/>
                        @error('image_url')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>

                    <label class="flex flex-col mb-4">
                        Текст поста:
                        <textarea name="text" class="border rounded p-1 mt-1"></textarea>
                        @error('text')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>

                    <label class="flex flex-col mb-4">
                        Сообщество:
                        <select class="border rounded p-1 mt-1" name="community_id" id="community">
                            @foreach ($communities as $community)
                                <option value="{{ $community->id }}">
                                    {{ $community->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('community_id')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>

                    <button type="submit" name="is_published" value="0" class="rounded px-4 py-2 bg-green-200">
                        💾 Сохранить черновик 
                    </button>

                    <button type="submit" name="is_published" value="1" class="rounded px-4 py-2 text-white bg-green-400">
                        💣 Опубликовать 
                    </button>
                </form>
            </div>
        </div>
        <div class="w-1/3 pl-8">
            <div class="rounded overflow-hidden shadow py-8 px-10">
                <h4 class="font-extrabold text-2xl">
                    Правила:
                </h4>
                <ul class="list-disc list-inside">
                  <li>Не сорить</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>