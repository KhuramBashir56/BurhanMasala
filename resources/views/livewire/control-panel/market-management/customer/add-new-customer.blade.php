<div class="w-full space-y-4">
    @can('view-customers-list')
            <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customers-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="addNewCustomer">
            <x-control-panel.card.body class="w-full sm:grid-cols-2 gap-4 p-4">
                <x-control-panel.card.header :title="__('Personal Information')" description="Please enter the customer information like customer name, customer owner name, carefully." class="sm:col-span-2" />
                <x-control-panel.form.label label="Customer Name" for="name" class="sm:col-span-2">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="Customer Name" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Customer CBIC Number" for="nic">
                    <x-control-panel.form.input type="text" wire:model="nic" for="nic" maxlength="15" pattern="[0-9]{5}-[0-9]{7}-[0-9]{1}" placeholder="00000-0000000-0" title="Please inter with '00000-0000000-0' format." />
                </x-control-panel.form.label>
                <x-control-panel.card.header :title="__('Contact Information')" description="Please enter the customer contact information and customer address with details." class="sm:col-span-2" />
                <x-control-panel.form.label label="Customer Location Title" for="title" description="Please enter the customer location title like Shop Name, Office Name, House Name / Number etc." class="sm:col-span-2">
                    <x-control-panel.form.input type="text" wire:model="title" for="title" maxlength="48" required placeholder="Customer Location Title" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Market Name" for="market">
                    <x-control-panel.form.select wire:model="market" title="Select Market Name" for="market" required>
                        @foreach ($markets as $market)
                            <x-control-panel.form.option wire:key="market-{{ $market->id }}" content="{{ $market->name }}" value="{{ $market->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Customer Category Name" for="customer_category">
                    <x-control-panel.form.select wire:model="customer_category" title="Select Customer Category" for="customer_category" required>
                        @foreach ($categories as $category)
                            <x-control-panel.form.option wire:key="category-{{ $category->id }}" content="{{ $category->name }}" value="{{ $category->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Customer Phone" for="phone">
                    <x-control-panel.form.input type="text" wire:model="phone" for="phone" maxlength="11" required pattern="03[0-9]{9}" title="Please enter a valid phone number starting with '03'" placeholder="Customer Phone Number" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Customer Whatsapp Number" for="whatsapp">
                    <x-control-panel.form.input type="text" wire:model="whatsapp" for="whatsapp" maxlength="11" required pattern="03[0-9]{9}" title="Please enter a valid whatsapp number starting with '03'" placeholder="Customer Whatsapp Number" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Near By / Opposite" for="near_by">
                    <x-control-panel.form.input type="text" wire:model="near_by" for="near_by" maxlength="96" required placeholder="Near By / Opposite" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Road / Street" for="street">
                    <x-control-panel.form.input type="text" wire:model="street" for="street" maxlength="96" required placeholder="Road / Street" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Address Line" for="address" class="sm:col-span-2">
                    <x-control-panel.form.input type="text" wire:model="address" for="address" maxlength="160" required placeholder="Address Line" />
                </x-control-panel.form.label>
                <x-control-panel.card.header :title="__('Login Information')" description="this information is confidential, please enter the login information carefully. Customer can login using email and password." class="sm:col-span-2" />
                <x-control-panel.form.label label="Customer Email" for="email" class="sm:col-span-2">
                    <x-control-panel.form.input type="email" wire:model="email" for="email" maxlength="64" placeholder="Customer Email Address" />
                </x-control-panel.form.label>
                <x-control-panel.form.label :for="__('password')" :label="__('Password')">
                    <x-control-panel.form.input-password :label="__('Password')" :for="__('password')" wire:model="password" placeholder="Your Password" autocomplete="new-password" minlength="8" maxlength="64" />
                </x-control-panel.form.label>
                <x-control-panel.form.label :for="__('password_confirmation')" :label="__('Confirm Password')">
                    <x-control-panel.form.input-password :label="__('Confirm Password')" :for="__('password_confirmation')" placeholder="Confirm Your Password" wire:model="password_confirmation" autocomplete="new-password" minlength="8" maxlength="64" />
                </x-control-panel.form.label>
                <x-control-panel.card.header :title="__('Media Files')" description="Your can upload media files like customers profile image and customer front view image." class="sm:col-span-2" />
                <div class="sm:col-span-2 flex xs:flex-row flex-col gap-4">
                    <x-control-panel.form.label label="Profile Image" for="avatar" class="xs:max-w-6xs w-full">
                        <x-control-panel.form.image-upload-input wire:model="avatar" for="avatar" accept="image/*" description="jpeg, png, jpg, webp or svg files allowed, (max with. 400x400px). File size must be less than 512KB." size="2xs:max-w-6xs w-full aspect-square">
                            @if ($avatar)
                                <x-control-panel.thumbnail :path="$avatar->temporaryUrl()" />
                            @endif
                        </x-control-panel.form.image-upload-input>
                    </x-control-panel.form.label>
                    <x-control-panel.form.label label="Location View" for="location_view" class="xs:max-w-6xs w-full">
                        <x-control-panel.form.image-upload-input wire:model="location_view" for="location_view" accept="image/*" description="jpeg, png, jpg, webp or svg files allowed, (max with. 400x400px). File size must be less than 512KB." size="2xs:max-w-6xs w-full aspect-square">
                            @if ($location_view)
                                <x-control-panel.thumbnail :path="$location_view->temporaryUrl()" />
                            @endif
                        </x-control-panel.form.image-upload-input>
                    </x-control-panel.form.label>
                </div>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-customers-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customers-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('add-new-customer')
                    <x-control-panel.buttons.button type="submit" color="success" target="addNewCustomer" title="Save" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
