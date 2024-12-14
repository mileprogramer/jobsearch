<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 container sm:w-4/5 lg:w-4/5 mx-auto" x-data="{ currentTab: '{{ session('activeCurrentTab') ?? 'addNewJob' }}' }">
        <a href="/dashboard">Go back</a>
        <x-edit-job-applied-form :jobApplied="$jobApplied" :jobsAppliedEnumsStatus="$jobsAppliedEnumsStatus"/>
    </div>
</x-app-layout>
