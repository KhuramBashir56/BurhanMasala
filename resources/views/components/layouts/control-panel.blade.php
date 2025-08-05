<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark select-none">

<head>
    <x-layouts.meta-information />
    <meta name="robots" content="noindex, follow">
    <title>{{ config('app.name') }}</title>
    <style type="text/css">
        @media screen {
            #page-content {
                height: calc(100vh - 80px);
            }

            aside::-webkit-scrollbar {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>

<body x-data="{ menu: false }" class="w-full min-h-screen max-h-screen text-justify text-secondary-950 dark:text-secondary-100 bg-secondary-200 dark:bg-secondary-950 transition-colors duration-500">
    <nav class="w-full h-[80px] flex items-center px-4 bg-primary-500 dark:bg-secondary-900 print:hidden text-white dark:text-white">
        akjs;dlfkj a
        <button type="button" x-on:click="menu = !menu" x-on:click.away="menu = false" class="ms-auto me-4 xl:hidden flex items-center justify-center px-2 py-1.5 text-white transition-colors duration-500 bg-transparent hover:bg-primary-600 hover:dark:bg-secondary-600 active:bg-primary-300 active:dark:bg-secondary-700 rounded-md cursor-hover:transition-colors transition-duration-500" :title="menu ? 'Close Menu' : 'Open Menu'">
            <svg x-show="!menu" xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 -960 960 960" fill="currentColor">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
            <svg x-show="menu" xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 -960 960 960" fill="currentColor" style="display: none;">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </button>
    </nav>
    <section id="page-content" class="w-full h-full flex xl:static relative overflow-hidden">
        <aside :class="menu ? 'translate-x-0' : '-translate-x-full'" class="w-full xs:w-3xs h-full overflow-y-auto xl:static absolute top-0 left-0 z-50 xl:z-auto xl:translate-x-0 -translate-x-full transition-transform duration-300 bg-primary-500 dark:bg-secondary-900 print:hidden text-white dark:text-white">
            <p class="text-primary-200 dark:text-secondary-400 border-y border-primary-300 dark:border-secondary-500 px-2">Main Menu</p>
            <x-control-panel.main-menu.index />
        </aside>
        <div x-on:click="menu = false" class="h-full w-full grid grid-cols-1 gap-4 overflow-y-auto">
            <x-layouts.color-mode />
            {{ $slot }}

        </div>
    </section>
    <script type="text/javascript">
        const userTheme = localStorage.getItem('theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        document.documentElement.classList.toggle('dark', userTheme === 'dark' || (!userTheme && systemPrefersDark));
    </script>
    @stack('scripts')
</body>

</html>
