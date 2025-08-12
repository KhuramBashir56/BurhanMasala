<div class="2xs:max-w-20 w-full">
    <x-ui.form.select :for="__('range')" wire:model.live="range" class="w-full">
        <x-ui.form.option :content="25" value="5" />
        <x-ui.form.option :content="50" value="50" />
        <x-ui.form.option :content="100" value="100" />
        <x-ui.form.option :content="250" value="250" />
        <x-ui.form.option :content="500" value="500" />
    </x-ui.form.select>
    @error('range')
        <x-ui.form.error-message :message="$message" class="absolute left-0 top-full" />
    @enderror
</div>
