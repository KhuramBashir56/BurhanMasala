<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark select-none">

<head>
    <x-layouts.meta-information />
    <meta name="robots" content="noindex, follow">
    <title>{{ $title . ' | ' . config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? config('app.description') }}">
    <style type="text/css">
        @media screen {
            #page-content {
                height: calc(100vh - 80px);
            }

            aside menu::-webkit-scrollbar {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>

<body x-data="{ menu: false, userMenu: false }" class="w-full min-h-screen max-h-screen text-justify text-secondary-950 dark:text-secondary-100 bg-secondary-200 dark:bg-secondary-950 transition-colors duration-500">
    <nav class="w-full h-[80px] flex items-center px-4 bg-primary-500 dark:bg-secondary-900 print:hidden text-white dark:text-white">
        <div x-on:click="menu = false" class="w-full flex items-center relative">
            <x-logo class="w-24" wire:navigate href="{{ route('control-panel.dashboard') }}" />
        </div>
        <button type="button" x-on:click="menu = !menu" class="ms-4 xl:hidden flex items-center justify-center px-2 py-1.5 text-white transition-colors duration-500 bg-transparent hover:bg-primary-600 hover:dark:bg-secondary-600 active:bg-primary-300 active:dark:bg-secondary-700 rounded-md cursor-hover:transition-colors transition-duration-500" :title="menu ? 'Close Menu' : 'Open Menu'">
            <svg x-show="!menu" xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 -960 960 960" fill="currentColor">
                <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
            </svg>
            <svg x-show="menu" xmlns="http://www.w3.org/2000/svg" class="size-7" viewBox="0 -960 960 960" fill="currentColor" style="display: none;">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
        </button>
    </nav>
    <section id="page-content" class="w-full h-full flex xl:static relative overflow-hidden">
        <aside :class="menu ? 'translate-x-0' : '-translate-x-full'" class="w-full flex flex-col xs:w-xs h-full overflow-y-auto xl:static absolute top-0 left-0 z-50 xl:z-auto xl:translate-x-0 -translate-x-full transition-transform duration-300 bg-primary-500 dark:bg-secondary-900 print:hidden text-white dark:text-white">
            <div class="w-full flex items-center p-4 bg-gray-900 dark:bg-primary-500 relative bg-cover bg-center" style="background-image: url('{{ asset('images/backgrounds/profile-card.avif') }}')">
                <div x-data="{ userMenu: false }" class="absolute bottom-3 right-3 w-full flex flex-col">
                    <button x-on:click="userMenu = !userMenu" class="self-end p-1 -mb-1 w-fit rounded-full hover:bg-gray-600 dark:hover:bg-primary-600 text-gray-100 hover:text-gray-200 active:bg-gray-500 dark:active:bg-primary-400 hover:transition-colors transition-duration-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                            <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z" />
                        </svg>
                    </button>
                    <div x-on:click.away="userMenu = false" x-show="userMenu" x-collapse class="absolute top-full right-0 mt-1 bg-white text-black dark:text-white dark:bg-gray-700 overflow-hidden rounded-lg shadow-lg w-5xs z-10 self-end divide-y divide-gray-400 py-2" style="display: none;">
                        <a wire:navigate href="{{ route('control-panel.user-profile') }}" class="flex items-center gap-2 px-3 py-1.5 hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-200 hover:transition-colors hover:duration-500 cursor-pointer border-t border-gray-400" title="My Profile">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                                <path xmlns="http://www.w3.org/2000/svg" d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
                            </svg>
                            <span class="font-semibold">My Profile</span>
                        </a>
                        <a wire:navigate href="{{ route('control-panel.settings') }}" class="flex items-center gap-2 px-3 py-1.5 hover:bg-gray-300 dark:hover:bg-gray-500 active:bg-gray-400 dark:active:bg-gray-200 hover:transition-colors hover:duration-500 cursor-pointer" title="Settings">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                                <path xmlns="http://www.w3.org/2000/svg" d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                            </svg>
                            <span class="font-semibold">Settings</span>
                        </a>
                        <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w-full flex items-center gap-1 px-3 py-1.5 text-red-600 dark:text-red-500 hover:bg-red-200 active:bg-red-400 dark:active:bg-red-600 hover:transition-colors hover:duration-500 cursor-pointer" title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="size-6" fill="currentColor">
                                <path xmlns="http://www.w3.org/2000/svg" d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                            </svg>
                            <span class="font-semibold">Logout</span>
                        </button>
                        <form action="{{ route('logout') }}" method="POST" class="hidden" id="logout-form">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="relative shrink-0 size-14">
                    <div class="w-full h-full overflow-hidden rounded-full outline-2 outline-white outline-offset-4">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar" class="w-full h-full overflow-hidden rounded-full object-cover object-center">
                        @else
                            <span class="flex justify-center items-center w-full h-full font-bold text-3xl text-white">{{ Auth::user()->initials() }}</span>
                        @endif
                    </div>
                    <span class="absolute -bottom-1 -right-1 w-4 h-4 rounded-full border-2 border-white {{ Auth::user()->online ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-300 dark:text-primary-50">Welcome Back:</p>
                    <h3 class="text-lg leading-5 font-semibold text-gray-100">{{ Str::limit(Auth::user()->name, 15, '...') }}</h3>
                    <p class="text-sm text-gray-300 dark:text-primary-50">{{ Str::limit(Auth::user()->email, 28, '...') }}</p>
                </div>
            </div>
            <p class="text-primary-200 dark:text-secondary-400 border-y border-primary-300 dark:border-secondary-700 px-2">Main Menu</p>
            <x-control-panel.menubar.index />
            <p class="py-1 px-2 w-full mt-auto text-xs text-center border-t border-primary-300 dark:border-gray-700 text-primary-200 dark:text-secondary-400 "> &copy;All rights 2023-{{ date('y') }} reserved by {{ config('app.name') }}. V:{{ config('app.version') }}</p>
        </aside>
        <div x-on:click="menu = false" class="h-full p-4 w-full grid grid-cols-1 gap-4 place-content-start overflow-y-auto">
            <x-control-panel.page-heading title="{{ $title }}" class="print:hidden" />
            {{ $slot }}
        </div>
    </section>
    <x-alert-message />
    <script type="text/javascript">
        if (
            localStorage.getItem('theme') === 'dark' ||
            (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    @stack('scripts')
</body>

</html>
