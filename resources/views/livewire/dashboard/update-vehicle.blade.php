<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg py-20 px-20">
                <form wire:submit.prevent="updateVehicle" class="max-w-lg mx-auto">
                    <!-- Registration Number -->
                    <div>
                        <x-input-label for="registration_number" :value="__('Registration Number')" />
                        <x-text-input wire:model="registration_number" id="registration_number" class="block mt-1 w-full"
                            type="text" name="registration_number" autofocus autocomplete="registration_number" />
                        <x-input-error :messages="$errors->get('registration_number')" class="mt-2" />
                    </div>

                    <!-- Model -->
                    <div class="mt-4">
                        <x-input-label for="model" :value="__('Model')" />
                        <x-text-input wire:model="model" id="model" class="block mt-1 w-full" type="text"
                            name="model" autocomplete="model" />
                        <x-input-error :messages="$errors->get('model')" class="mt-2" />
                    </div>

                    <!-- Fuel Type -->
                    <div class="mt-4">
                        <x-input-label for="fuel_type" :value="__('Fuel Type')" />
                        <select wire:model="fuel_type" id="fuel_type"
                            class="block mt-1 w-full text-white bg-gray-900 rounded-md">
                            <option value="">Select Fuel Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                        <x-input-error :messages="$errors->get('fuel_type')" class="mt-2" />
                    </div>

                    <!-- Transmission -->
                    <div class="mt-4">
                        <x-input-label for="transmission" :value="__('Transmission')" />
                        <select wire:model="transmission" id="transmission"
                            class="block mt-1 w-full text-white bg-gray-900 rounded-md">
                            <option value="">Select Transmission</option>
                            <option value="Manual">Manual</option>
                            <option value="Auto">Auto</option>
                            <option value="Other">Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('transmission')" class="mt-2" />
                    </div>

                    <!-- User Selection -->
                    <div class="relative mt-4">
                        <x-input-label for="transmission" :value="__('Customer')" />
                        <input type="text" id="searchInput" placeholder="Search..." autocomplete="off" value="{{$selectedUser}}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        <div id="dropdownMenu"
                            class="absolute mt-2 w-full bg-white border border-gray-300 rounded-md shadow-lg z-10 hidden">
                            <ul id="dropdownList" class="max-h-60 overflow-auto">
                                @foreach ($users as $user)
                                    <li class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                        data-user-id="{{ $user->id }}">{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="hidden" id="selectedUserId" name="selectedUserId" wire:model="selectedUserId">
                    </div>

                    <script>
                        // Function to filter dropdown items based on input
                        document.getElementById('searchInput').addEventListener('input', function() {
                            const filter = this.value.toLowerCase();
                            const dropdownMenu = document.getElementById('dropdownMenu');
                            const items = document.querySelectorAll('#dropdownList li');

                            dropdownMenu.classList.remove('hidden');

                            if (filter) {
                                items.forEach(item => {
                                    const text = item.textContent || item.innerText;
                                    if (text.toLowerCase().indexOf(filter) > -1) {
                                        item.style.display = '';
                                    } else {
                                        item.style.display = 'none';
                                    }
                                });
                            } else {
                                items.forEach(item => item.style.display = '');
                            }
                        });

                        // Function to set selected user ID and hide dropdown
                        document.querySelectorAll('#dropdownList li').forEach(item => {
                            item.addEventListener('click', function() {
                                const userId = this.getAttribute('data-user-id');
                                document.getElementById('selectedUserId').value = userId;
                                document.getElementById('searchInput').value = this.textContent;
                                document.getElementById('dropdownMenu').classList.add('hidden');

                                // Trigger Livewire to update property
                                @this.set('selectedUserId', userId);
                            });
                        });

                        // Close dropdown if click outside of it
                        window.addEventListener('click', function(event) {
                            if (!event.target.matches('#searchInput')) {
                                const dropdown = document.getElementById('dropdownMenu');
                                if (!dropdown.classList.contains('hidden')) {
                                    dropdown.classList.add('hidden');
                                }
                            }
                        });
                    </script>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
