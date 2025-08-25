<div class="2xs:max-w-20 w-full">
    <x-control-panel.form.select :for="__('range')" wire:model.live="range" class="w-full">
        <x-control-panel.form.option :content="25" value="5" />
        <x-control-panel.form.option :content="50" value="50" />
        <x-control-panel.form.option :content="100" value="100" />
        <x-control-panel.form.option :content="250" value="250" />
        <x-control-panel.form.option :content="500" value="500" />
    </x-control-panel.form.select>
    @error('range')
        <x-control-panel.form.error-message :message="$message" class="absolute left-0 top-full" />
    @enderror
</div>
