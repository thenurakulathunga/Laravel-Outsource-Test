<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-20 px-20">
                {{-- modal start --}}
                <div x-data="{ modelOpen: false }">
                    <button @click="modelOpen = !modelOpen"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>

                        <span>Add Vehicle</span>
                    </button>

                    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true">
                            </div>

                            <div x-cloak x-show="modelOpen"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="transition ease-in duration-200 transform"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="inline-block w-full max-w-xl p-8 py-20 text-left transition-all transform bg-gray-800 rounded-lg shadow-xl 2xl:max-w-2xl">
                                <div class="flex items-center justify-between space-x-4">
                                    <h1 class="text-xl font-medium text-slate-300 ">Add Vehicle</h1>

                                    <button @click="modelOpen = false"
                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>

                                <form wire:submit.prevent="registerVehicle" class="max-w-lg mx-auto">
                                    <!-- Registration Number -->
                                    <div>
                                        <x-input-label for="registration_number" :value="__('Registration Number')" />
                                        <x-text-input wire:model="registration_number" id="registration_number"
                                            class="block mt-1 w-full" type="text" name="registration_number"
                                            autofocus autocomplete="registration_number" />
                                        <x-input-error :messages="$errors->get('registration_number')" class="mt-2" />
                                    </div>

                                    <!-- Model -->
                                    <div class="mt-4">
                                        <x-input-label for="model" :value="__('Model')" />
                                        <x-text-input wire:model="model" id="model" class="block mt-1 w-full"
                                            type="text" name="model" autocomplete="model" />
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
                                        <input type="text" id="searchInput" placeholder="Search..."
                                            autocomplete="off"
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
                                        <input type="hidden" id="selectedUserId" name="selectedUserId"
                                            wire:model="selectedUserId">
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
                {{-- modal end --}}
                {{-- table start --}}
                <div class="flex flex-col mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <form wire:submit.prevent="filter" class="my-5">
                            <div class="mt-4 flex justify-between items-end">
                                <div class="flex gap-5">
                                    <div>
                                        <x-input-label for="filter_registration_number" :value="__('Registration Number')" />
                                        <x-text-input wire:model="filter_registration_number"
                                            id="filter_registration_number" class="w-[200px] mt-1" type="text"
                                            name="filter_registration_number" />
                                        <x-input-error :messages="$errors->get('filter_registration_number')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="filter_model" :value="__('Model')" />
                                        <x-text-input wire:model="filter_model" id="filter_model"
                                            class="w-[200px] mt-1" type="text" name="filter_model" />
                                        <x-input-error :messages="$errors->get('filter_model')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="filter_customer" :value="__('Customer')" />
                                        <x-text-input wire:model="filter_customer" id="filter_customer"
                                            class="w-[200px] mt-1" type="text" name="filter_customer" />
                                        <x-input-error :messages="$errors->get('filter_customer')" class="mt-2" />
                                    </div>
                                </div>
                                <x-primary-button class="ms-4 h-[40px]">
                                    {{ __('Filter') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Registration Number
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Model
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Fuel Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Transmission
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Customer
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $vehicle->id }}</td>
                                        <td class="px-6 py-4">{{ $vehicle->registration_number }}</td>
                                        <td class="px-6 py-4">{{ $vehicle->model }}</td>
                                        <td class="px-6 py-4">{{ $vehicle->fuel_type }}</td>
                                        <td class="px-6 py-4">{{ $vehicle->transmission }}</td>
                                        <td class="px-6 py-4">{{ $vehicle->user ? $vehicle->user->name : 'No user' }}
                                        </td>
                                        <td class="p-3 pl-0">
                                            <a href="{{ route('dashboard.vehicle.update', ['vehicleId' => $vehicle->id]) }}"
                                                class="mb-2 group transition-all h-[40px] w-full duration-300 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-[#39BCB6] hover:text-white focus:outline-none focus:bg-[#39BCB6] focus:text-[#39BCB6] disabled:opacity-50 disabled:pointer-events-none dark:border-[#39BCB6] dark:text-[#39BCB6] dark:hover:text-white dark:hover:bg-[#39BCB6] dark:focus:text-[#39BCB6#39BCB6] dark:focus:bg-#39BCB6  px-3 py-2  text-white">
                                                <svg width="20px" height="20px"
                                                    class=" transition-all duration-300 ease-in group-hover:stroke-[#fff] stroke-[#39bcb6]"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0">
                                                    </g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                            stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                update
                                            </a>
                                            <style>
                                                [x-cloak] {
                                                    display: none
                                                }
                                            </style>
                                            <div x-data="{ modelOpen: false }" class="flex justify-center">
                                                <button @click="modelOpen =!modelOpen"
                                                    class=" h-[40px] w-full duration-300 inline-flex justify-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg gap-2 text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <svg width="20px" height="20px"
                                                        class=" transition-all duration-300 ease-in stroke-[#fff]"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0">
                                                        </g>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                            stroke-linejoin="round"></g>
                                                        <g id="SVGRepo_iconCarrier">
                                                            <path d="M10 12V17" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M14 12V17" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M4 7H20" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </g>
                                                    </svg> Delete
                                                </button>

                                                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto"
                                                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    <div
                                                        class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                            x-transition:enter="transition ease-out duration-300 transform"
                                                            x-transition:enter-start="opacity-0"
                                                            x-transition:enter-end="opacity-100"
                                                            x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100"
                                                            x-transition:leave-end="opacity-0"
                                                            class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60"
                                                            aria-hidden="true"></div>

                                                        <div x-cloak x-show="modelOpen"
                                                            x-transition:enter="transition ease-out duration-300 transform"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            class="inline-block w-full max-w-md p-6 my-10 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl xl:max-w-xl">
                                                            <div class="flex items-center justify-between space-x-4">
                                                                <h1 class="text-xl font-bold text-gray-800 ">
                                                                    Are you sure delete?</h1>


                                                            </div>

                                                            <p class="mt-2 text-md text-gray-800 ">
                                                                If you continue, you will
                                                                permanently delete this record. Are
                                                                you sure you want to continue?
                                                            </p>



                                                            <div class="flex justify-end mt-6">
                                                                <button for="show" @click="modelOpen = false"
                                                                    type="button"
                                                                    class="mr-2 px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-500 hover:bg-gray-600 rounded-md shadow-md">
                                                                    Back
                                                                </button>
                                                                <button for="show"
                                                                    wire:click="deleteVehicle({{ $vehicle->id }})"
                                                                    @click="modelOpen = false" type="button"
                                                                    class="mr-2 px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 hover:bg-red-600 rounded-md shadow-md">
                                                                    Delete
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- table end --}}
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>
</div>
