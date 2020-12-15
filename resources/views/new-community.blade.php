<x-app-layout>
    <div class="flex mb-10">
        <div class="w-2/3">
            <div class="rounded overflow-hidden shadow py-4 px-8">
                <h1 class="text-3xl mb-4">
                    Создать новое сообщество
                </h1>
                <form class="" action="{{ url('communities') }}" method="post">
                    @csrf
                    <label class="flex flex-col mb-4">
                        Название сообщества:
                        <input name="name" class="border rounded p-1 mt-1" type="text"/>
                        @error('name')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>
                    

                    <label class="flex flex-col mb-4">
                        Alias:
                        <input class="border rounded p-1 mt-1" name="alias" type="text"/>
                        @error('alias')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>

                    <label class="flex flex-col mb-4">
                        Краткое описание:
                        <textarea name="description" class="border rounded p-1 mt-1"></textarea>
                        @error('description')
                            <p class="text-red-600 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </label>

                    <button type="submit" class="rounded px-4 py-2 text-white bg-green-400">
                        🐣 Создать 
                    </button>
                </form>
                <p class="mt-3 text-xs text-gray-400">
                    Создавая сообщество вы принимаете правила ресурса
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