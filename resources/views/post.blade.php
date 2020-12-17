<x-app-layout>
    <div class="flex">
        <div class="w-2/3">
            <div class="mb-4">
                <livewire:post-card :post="$post">
            </div>

            @if( !$post->is_published )
            <div class="mb-4">
                <div class="rounded overflow-hidden shadow py-4 px-8">
                    <h1 class="text-3xl mb-4">
                        Редактировать
                    </h1>
                    <form class="" action="{{ url('posts/'.$post->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <label class="flex flex-col mb-4">
                            Название поста:
                            <input name="title" class="border rounded p-1 mt-1" type="text" value="{{ $post->title }}"/>
                            @error('title')
                                <p class="text-red-600 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </label>
                        
    
                        <label class="flex flex-col mb-4">
                            Ссылка на изображение:
                            <input class="border rounded p-1 mt-1" name="image_url" type="url" value="{{ $post->image_url }}" />
                            @error('image_url')
                                <p class="text-red-600 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </label>
    
                        <label class="flex flex-col mb-4">
                            Текст поста:
                            <textarea name="text" class="border rounded p-1 mt-1">{{ $post->text }}</textarea>
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
                                    <option {{ $post->community_id === $community->id ? 'selected' : null  }} value="{{ $community->id }}">
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
                                    <option {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : null  }} value="{{ $tag->id }}">
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
            @endif

            @if( $post->is_published )
            <div id="comments" class="mb-4">
                <livewire:post-comments :post="$post->id" :comments="$post->comments">
            </div>
            @endif
        </div>
        <div class="w-1/3 pl-8">
            <a href="{{ route('posts.create') }}" class="block text-center rounded w-full p-3 mb-6 font-bold bg-green-100 text-xl text-green-400 hover:bg-green-400 hover:text-white border border-green-100 hover:border-green-400">
                Создать пост
            </a>
            <div class="rounded overflow-hidden shadow py-8 px-10">
                <h4 class="font-extrabold text-2xl">
                    {{ $post->community->name }}
                </h4>
                <p>
                    {{ $post->community->description }}
                </p>
                <p>
                    Количество постов: {{ $post->community->posts->count() }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>