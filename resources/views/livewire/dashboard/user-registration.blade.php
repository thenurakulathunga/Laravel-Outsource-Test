<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-20 px-20">
                {{-- modal start  --}}
                <div x-data="{ modelOpen: false }">
                    <button @click="modelOpen =!modelOpen"
                        class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>

                        <span>Add User</span>
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
                                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-gray-800 rounded-lg shadow-xl 2xl:max-w-2xl">
                                <div class="flex items-center justify-between space-x-4">
                                    <h1 class="text-xl font-medium text-slate-300 ">Add User</h1>

                                    <button @click="modelOpen = false"
                                        class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>

                                <form wire:submit.prevent="register" class="max-w-lg mx-auto">
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input wire:model="name" id="name" class="block mt-1 w-full"
                                            type="text" name="name" autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input wire:model="email" id="email" class="block mt-1 w-full"
                                            type="email" name="email" autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Phone -->
                                    <div class="mt-4">
                                        <x-input-label for="phone" :value="__('Phone')" />
                                        <x-text-input wire:model="phone" id="phone" class="block mt-1 w-full"
                                            type="text" name="phone" autocomplete="phone" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>

                                    <!-- Address -->
                                    <div class="mt-4">
                                        <x-input-label for="address" :value="__('Address')" />
                                        <x-text-input wire:model="address" id="address" class="block mt-1 w-full"
                                            type="text" name="address" autocomplete="address" />
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>

                                    <!-- NIC -->
                                    <div class="mt-4">
                                        <x-input-label for="nic" :value="__('NIC')" />
                                        <x-text-input wire:model="nic" id="nic" class="block mt-1 w-full"
                                            type="text" name="nic" autocomplete="nic" />
                                        <x-input-error :messages="$errors->get('nic')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ms-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal end  --}}
                {{-- table start  --}}

                <div class="flex flex-col mt-5">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <form wire:submit.prevent="filter" class="my-5">
                            <div class="mt-4 flex justify-between items-end">
                                <div>
                                    <x-input-label for="filter_email" :value="__('Email')" />
                                    <x-text-input wire:model="filter_email" id="filter_email" class="w-[200px] mt-1"
                                        type="email" name="filter_email" />
                                    <x-input-error :messages="$errors->get('filter_email')" class="mt-2" />
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
                                        name
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        nic
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        email
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        address
                                    </th>
                                    <th scope="col" class="px-6 py-3 capitalize'">
                                        phone
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $user->id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->nic }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $user->phone }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                {{-- table end  --}}
                {{$users->links()}}
            </div>
        </div>
    </div>
</div>
