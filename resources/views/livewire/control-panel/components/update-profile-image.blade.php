<div class="w-full space-y-4">
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="updateProfileImage">
            <x-control-panel.card.body class="w-full gap-4 p-4">
                <x-control-panel.form.label label="Profile Image" for="avatar" x-data="{ change: false }" class="sm:max-w-5xs w-full relative">
                    <x-control-panel.buttons.icon-button x-on:click="change = !change" x-show="!change" title="Change Old Logo" class="border-none rounded-lg cursor-pointer absolute top-10 left-4 z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                            <path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z" />
                        </svg>
                    </x-control-panel.buttons.icon-button>
                    <div x-show="change">
                        <x-control-panel.form.image-upload-input wire:model="avatar" for="avatar" accept="image/*" required description="jpeg, png, jpg, webp or svg files allowed, (max with. 400x400px). File size must be less than 512KB." size="xs:max-w-5xs w-full aspect-square">
                            @if ($avatar)
                                <x-control-panel.thumbnail :path="$avatar->temporaryUrl()" />
                            @endif
                        </x-control-panel.form.image-upload-input>
                    </div>
                    @if (!$avatar)
                        <div class="sm:max-w-5xs w-full aspect-square rounded-md overflow-hidden" x-show="!change">
                            <x-control-panel.thumbnail path="{{ asset($user->avatar ? 'storage/' . $user->avatar : 'images/user.png') }}" alt="{{ $user->name }}" />
                        </div>
                    @endif
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                <x-control-panel.buttons.button type="submit" color="success" target="updateProfileImage" title="Update" />
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
