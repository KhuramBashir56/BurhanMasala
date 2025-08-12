<div {{ $attributes->merge(['class' => 'w-full flex xs:flex-row flex-col gap-3']) }}>
    <div class="relative w-full">
        <x-ui.form.input type="date" :for="__('from')" wire:model.live.debounce.1000ms="from" max="{{ date('Y-m-d') }}" class="w-full" onclick="this.showPicker()" onfocus="this.showPicker()" />
        @error('from')
            <x-ui.form.error-message :message="$message" class="absolute left-0 top-full" />
        @enderror
    </div>
    <span class="self-center">to</span>
    <div class="relative w-full">
        <x-ui.form.input type="date" :for="__('to')" wire:model.live.debounce.1000ms="to" max="{{ date('Y-m-d') }}" class="w-full" onclick="this.showPicker()" onfocus="this.showPicker()" />
        @error('to')
            <x-ui.form.error-message :message="$message" class="absolute let-0 top-full" />
        @enderror
    </div>
</div>
