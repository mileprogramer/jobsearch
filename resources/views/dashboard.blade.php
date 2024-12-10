<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session("addedNewJobMsg"))
            <x-successfully-alert :msg="session('addedNewJobMsg')" />

        @endif
        <h1 class="text-center mb-3 text-3xl">Add new job applied</h1>
        <x-danger-alert/>
        <x-add-job-applied/>
    </div>
</x-app-layout>
