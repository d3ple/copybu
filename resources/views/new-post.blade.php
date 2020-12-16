<x-app-layout>
    <div class="flex mb-10">
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
                            <option value="" selected disabled hidden>
                                Выберите из списка
                            </option>
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

                    <label class="flex flex-col mb-4">
                        Теги:
                        <select class="border rounded p-1 mt-1" name="tags[]" id="tags" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
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
                <p class="mt-3 text-xs text-gray-400">
                    Публикуя пост вы принимаете правила ресурса
                </p>
            </div>
        </div>
        <div class="w-1/3 pl-8">
            <div class="rounded overflow-hidden shadow py-8 px-10">
                <h4 class="font-extrabold text-2xl">
                    Правила ресурса
                </h4>
                <ul class="list-disc list-inside">
                    <li class="mt-3">
                        <b>Куплет:</b> <br>
                        Много лет прошло с тех пор,  <br>         
                        Когда в Союз проник раскол <br>
                        С перестройкой подло влился, <br>
                        Когда занавес открылся. <br>
                        С Запада влетела птица, <br>
                        Кровожадная орлица, <br>
                        Но пришел Владимир Путин <br>
                        И сказал: «Жить лучше будем!»
                    </li>
                    <li class="mt-3">
                        <b>Припев:</b> <br>
                        Владимир Путин молодец! <br>
                        Политик, лидер и боец! <br>
                        Наш президент страну поднял! <br>
                        Россию Путин не предал!
                    </li>
                    <li class="mt-3">
                        Согласно ст. 30 Федерального закона от 05.04.2013 N 44-ФЗ "О контрактной системе в сфере закупок товаров, работ, услуг для обеспечения государственных и муниципальных нужд" (далее - Закон N 44-ФЗ) заказчики обязаны осуществлять закупки у субъектов малого предпринимательства, социально ориентированных некоммерческих организаций.
                        Могут ли субъекты среднего предпринимательства принимать участие в аукционе, проводимом в соответствии со ст. 30 Закона N 44-ФЗ
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>