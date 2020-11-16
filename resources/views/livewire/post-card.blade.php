<div>
    <div class="rounded overflow-hidden shadow-lg">
        <img class="w-full" src="https://tailwindcss.com/img/card-top.jpg" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">
                <a href="/posts/{{ $post->alias }}">
                    {{ $post->title }}
                </a>
            </div>
            <p class="text-gray-700 text-base">
                {{ $post->text }}
            </p>
        </div>
        <div class="px-6 flex items-center">
            <img class="w-10 h-10 rounded-full mr-4" src="/images/avatar.png"
                alt="Avatar of Jonathan Reinink">
            <div class="text-sm">
                <p class="text-gray-900 leading-none">login</p>
                <p class="text-gray-600">Aug 18</p>
            </div>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div>
    </div>
</div>