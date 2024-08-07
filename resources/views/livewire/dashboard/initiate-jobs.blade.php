<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg py-20 px-10">
                        <form wire:submit.prevent="submit" class="w-full flex justify-center items-center gap-2">
                            <div>
                                <x-input-label for="filter_nic" :value="__('NIC')" />
                                <x-text-input wire:model="filter_nic" id="filter_nic" class="block" type="text"
                                    name="filter_nic" autofocus autocomplete="filter_nic" />
                                <x-input-error :messages="$errors->get('filter_nic')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="filter_email" :value="__('Email')" />
                                <x-text-input wire:model="filter_email" id="filter_email" class="block" type="text"
                                    name="filter_email" autocomplete="filter_email" />
                                <x-input-error :messages="$errors->get('filter_email')" class="mt-2" />
                            </div>

                            <div class="relative">
                                <x-input-label for="searchInput" :value="__('Customer')" />
                                <input type="text" id="searchInput" placeholder="Search..." autocomplete="off"
                                    wire:model="customer"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block">
                                <div id="dropdownMenu"
                                    class="absolute mt-2 w-full bg-white border border-gray-300 rounded-md shadow-lg z-10 hidden">
                                    <ul id="dropdownList" class="max-h-60 overflow-auto">
                                        @foreach ($users as $user)
                                            <li class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                                data-user-id="{{ $user->id }}">{{ $user->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button type="submit" class="ms-4">
                                    {{ __('Search') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800  shadow-sm sm:rounded-lg py-20 px-10">
                        <div class="flex flex-col gap-5">
                            @foreach ($users as $user)
                                <div class="flex flex-col gap-5 border rounded-lg border-dashed p-5">
                                    <div>
                                        <h3 class="text-2xl text-indigo-100 capitalize">{{ $user->name }}</h3>
                                        <p class="mx-1 font-normal text-gray-500 dark:text-gray-400">
                                            NIC Number : {{ $user->nic }}
                                        </p>
                                        <p class="mb-1 font-normal text-gray-500 dark:text-gray-400">
                                            Email : {{ $user->email }}
                                        </p>
                                    </div>
                                    <div class="flex gap-2 flex-1 flex-wrap">
                                        @if (count($user->vehicles) > 0)
                                            @foreach ($user->vehicles as $vehicle)
                                                <div
                                                    class="w-1/3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                                                    </svg>
                                                    <a href="#">
                                                        <h5
                                                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white capitalize">
                                                            {{ $vehicle->model }}</h5>
                                                    </a>
                                                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                                        Registration Number : {{ $vehicle->registration_number }}
                                                    </p>
                                                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                                        Fuel Type : {{ $vehicle->fuel_type }}
                                                    </p>
                                                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                                                        Transmission: {{ $vehicle->transmission }}
                                                    </p>

                                                    <form wire:submit.prevent="saveJobs" x-data="{
                                                        selectedJobs: [],
                                                        vehicleId: '{{ $vehicle->id }}',
                                                        addJob(jobId) {
                                                            if (this.selectedJobs.includes(jobId)) {
                                                                this.selectedJobs = this.selectedJobs.filter(id => id !== jobId);
                                                            } else {
                                                                this.selectedJobs.push(jobId);
                                                            }
                                                        },
                                                        submitForm() {
                                                            @this.set('selectedJobs', this.selectedJobs);
                                                            @this.set('vehicleId', this.vehicleId);
                                                            @this.call('saveJobs'); 
                                                        }
                                                    }" @submit.prevent="submitForm">
                                                        <input type="hidden" name="jobs" x-ref="hiddenJobs">
                                                        <input type="hidden" name="vehicle_id" x-ref="hiddenVehicle" value="{{ $vehicle->id }}">
                                                    
                                                        @foreach ($jobs as $job)
                                                        <div>
                                                            <label for="{{ $job->id }}" class="text-white">{{ $job->name }}</label>
                                                            <input type="checkbox" id="{{ $job->id }}" value="{{ $job->id }}" 
                                                                @change="addJob($event.target.value)"
                                                                :checked="selectedJobs.includes('{{ $job->id }}')">
                                                        </div>
                                                        @endforeach
                                                    
                                                        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                                                    </form>
                                                    
                                                    
                                                </div>
                                            @endforeach
                                        @else
                                            No vehicles for this user
                                        @endif
                                    </div>

                                </div>
                            @endforeach
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
