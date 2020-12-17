@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="cursor-not-allowed font-semibold relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 cursor-default leading-5 rounded-md">
                Назад
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="font-semibold relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-400 bg-white border border-green-300 leading-5 rounded-md hover:bg-green-400 hover:border-green-400 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                « Назад
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="font-semibold relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-400 bg-white border border-green-300 leading-5 rounded-md hover:bg-green-400 hover:border-green-400 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Вперед »
            </a>
        @else
            <span class="cursor-not-allowed font-semibold relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 cursor-default leading-5 rounded-md">
                Вперед
            </span>
        @endif
    </nav>
@endif
