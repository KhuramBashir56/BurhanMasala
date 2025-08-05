@if ($paginator->hasPages())
    <div class="flex justify-between items-center uppercase sm:grid-cols-9">
        <div class="flex justify-between w-full md:hidden">
            @if ($paginator->onFirstPage())
                <button type="button" disabled class="flex justify-center items-center ps-1.5 pe-3 py-1 gap-1 hover:transition-colors hover:duration-500 text-gray-500 cursor-not-allowed" title="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                        <path xmlns="http://www.w3.org/2000/svg" d="M240-240v-480h80v480h-80Zm440 0L440-480l240-240 56 56-184 184 184 184-56 56Z" />
                    </svg>
                    <span>First Page</span>
                </button>
            @else
                <button type="button" wire:click="previousPage" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:loading.class="cursor-wait" class="flex justify-center items-center ps-1.5 pe-3 py-1 gap-1 rounded-md text-white hover:transition-colors hover:duration-500 bg-primary-500" title="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                        <path xmlns="http://www.w3.org/2000/svg" d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                    </svg>
                    <span>Previous</span>
                </button>
            @endif
            @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:loading.class="cursor-wait" class="flex justify-center items-center ps-3 pe-1.5 py-1 gap-1 rounded-md text-white hover:transition-colors hover:duration-500 bg-primary-500" title="Next">
                    <span>Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                        <path xmlns="http://www.w3.org/2000/svg" d="M383-480 200-664l56-56 240 240-240 240-56-56 183-184Zm264 0L464-664l56-56 240 240-240 240-56-56 183-184Z" />
                    </svg>
                </button>
            @else
                <button type="button" disabled class="flex justify-center items-center ps-3 pe-1.5 py-1 gap-1 hover:transition-colors hover:duration-500 text-gray-500 cursor-not-allowed" title="Next">
                    <span>Last Page</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                        <path d="m280-240-56-56 184-184-184-184 56-56 240 240-240 240Zm360 0v-480h80v480h-80Z" />
                    </svg>
                </button>
            @endif
        </div>

        <div class="lg:block hidden capitalize text-gray-900 dark:text-gray-400">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                {{ $paginator->firstItem() }}
                {!! __('to') !!}
                {{ $paginator->lastItem() }}
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            {{ $paginator->total() }}
        </div>

        <ul class="md:flex hidden justify-center items-center gap-1 lg:w-fit md:w-full w-fit">
            <li>
                @if ($paginator->onFirstPage())
                    <button type="button" disabled class="flex justify-center items-center p-1 text-gray-500 hover:transition-colors hover:duration-500 cursor-not-allowed" title="Previous">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                            <path xmlns="http://www.w3.org/2000/svg" d="M240-240v-480h80v480h-80Zm440 0L440-480l240-240 56 56-184 184 184 184-56 56Z" />
                        </svg>
                    </button>
                @else
                    <button type="button" wire:click="previousPage" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:loading.class="cursor-wait" class="flex justify-center items-center p-1 hover:transition-colors hover:duration-500 bg-transparent text-primary-500 dark:text-white hover:text-white hover:bg-primary-600 dark:hover:bg-secondary-600 rounded-md" title="Previous">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                            <path xmlns="http://www.w3.org/2000/svg" d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z" />
                        </svg>
                    </button>
                @endif
            </li>
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="flex items-center">
                        <span class="px-2 mb-2 text-gray-500 font-extrabold leading-none">{{ $element }}</span>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <button type="button" disabled class="flex justify-center items-center px-2.5 py-1 hover:transition-colors hover:duration-500 bg-primary-500 text-white rounded-md cursor-not-allowed">
                                    {{ $page }}
                                </button>
                            </li>
                        @else
                            <li>
                                <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:loading.class="cursor-wait" class="flex justify-center items-center px-2.5 py-1 hover:transition-colors hover:duration-500 bg-transparent text-primary-500 dark:text-white hover:text-white  hover:bg-primary-600 dark:hover:bg-secondary-600 rounded-md">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <li>
                @if ($paginator->hasMorePages())
                    <button type="button" wire:click="nextPage" wire:loading.attr="disabled" wire:offline.attr="disabled" wire:loading.class="cursor-wait" class="flex justify-center items-center p-1 hover:transition-colors hover:duration-500 bg-transparent text-primary-500 dark:text-white hover:text-white  hover:bg-primary-600 dark:hover:bg-secondary-600 rounded-md" title="Next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                            <path xmlns="http://www.w3.org/2000/svg" d="M383-480 200-664l56-56 240 240-240 240-56-56 183-184Zm264 0L464-664l56-56 240 240-240 240-56-56 183-184Z" />
                        </svg>
                    </button>
                @else
                    <button type="button" disabled class="flex justify-center items-center p-1 text-gray-500 hover:transition-colors hover:duration-500 cursor-not-allowed" title="Next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                            <path d="m280-240-56-56 184-184-184-184 56-56 240 240-240 240Zm360 0v-480h80v480h-80Z" />
                        </svg>
                    </button>
                @endif
            </li>
        </ul>
    </div>
@endif
