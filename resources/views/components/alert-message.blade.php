<div x-data="{ showAlert: false, type: '', message: '' }" x-init="window.addEventListener('alert', e => {
    type = e.detail.type;
    message = e.detail.message;
    showAlert = true;
    setTimeout(() => showAlert = false, 10000);
})" x-show="showAlert" class="absolute bottom-0 right-0 px-4 pb-4 h-fit w-full sm:max-w-md z-50" role="alert">
    <div class="flex gap-x-2 items-center border-s-[16px]  p-4 relative rounded-lg shadow-lg" x-cloak :class="{
        'text-green-700 border-green-700 bg-green-200': type === 'success',
        'text-red-700 border-red-700 bg-red-200': type === 'error',
        'text-yellow-700 border-yellow-700 bg-yellow-200': type === 'warning',
        'text-blue-700 border-blue-700 bg-blue-200': type === 'info'
    }">
        <button type="button" x-on:click="showAlert = false"title="close" class="absolute right-4 top-4 opacity-50 hover:opacity-100 hover:transition-colors hover:duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 10.586l-4.293-4.293-1.414 1.414 4.293 4.293-4.293 4.293 1.414 1.414 4.293-4.293 4.293 4.293 1.414-1.414-4.293-4.293 4.293-4.293-1.414-1.414-4.293 4.293z" />
            </svg>
        </button>
        <div class="flex w-fit aspect-square items-center justify-center rounded-full">
            <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" class="size-12" viewBox="0 -960 960 960" fill="currentColor">
                <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
            <svg x-show="type === 'error'" xmlns="http://www.w3.org/2000/svg" class="size-12" viewBox="0 -960 960 960" fill="currentColor">
                <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
            <svg x-show="type === 'warning'" xmlns="http://www.w3.org/2000/svg" class="size-12" viewBox="0 -960 960 960" fill="currentColor">
                <path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
            <svg x-show="type === 'info'" xmlns="http://www.w3.org/2000/svg" class="size-12" viewBox="0 -960 960 960" fill="currentColor">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>
        </div>
        <div class="flex w-full flex-col">
            <h3 class="font-bold text-lg capitalize pe-10" x-text="{
                success: 'Operation Successful.',
                error: 'Error Operation Failed.',
                warning: 'Warning Operation Denied.',
                info: 'Note Important Information.'
            }[type] || ''">
            </h3>
            <p x-text="message"></p>
        </div>
    </div>
</div>
