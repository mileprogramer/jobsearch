<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 container sm:w-4/5 lg:w-4/5 mx-auto" x-data="{ currentTab: '{{ session('activeCurrentTab') ?? 'addNewJob' }}' }">
        <div class="md:flex">
            <!-- Sidebar Navigation -->
            <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                <li>
                    <!-- Add New Job Button -->
                    <a
                        href="#"
                        @click.prevent="currentTab = 'addNewJob'"
                        class="inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600"
                        :class="{ 'bg-blue-700 dark:bg-blue-600 text-white': currentTab === 'addNewJob', 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700': currentTab !== 'addNewJob' }"
                    >
                        <svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        Add New Job
                    </a>
                </li>
                <li>
                    <!-- Edit Jobs Button -->
                    <a
                        href="#"
                        @click.prevent="currentTab = 'editJobs'"
                        class="inline-flex items-center px-4 py-3 rounded-lg w-full"
                        :class="{ 'bg-blue-700 dark:bg-blue-600 text-white': currentTab === 'editJobs', 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700': currentTab !== 'editJobs' }"
                    >
                        <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        Edit Jobs
                    </a>
                </li>
            </ul>

            <!-- Content Area -->
            <div class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                <!-- Add New Job Content -->
                <div x-show="currentTab === 'addNewJob'" x-cloak>
                    <x-add-new-job-content />
                </div>

                <!-- Edit Jobs Content -->
                <div x-show="currentTab === 'editJobs'" x-cloak>
                    <x-edit-jobs-content
                        :jobsApplied="$jobsApplied"
                        :jobsAppliedEnumsStatus="$jobsAppliedEnumsStatus"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
