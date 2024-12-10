<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job search</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 bg-red-200">
        <div class="max-w-7xl mx-auto py-2.5">
            <div class="px-6 py-3">
                <div class="ml-auto">
                    <x-filter-jobs-applied :jobsAppliedEnumsStatus='$jobsAppliedEnumsStatus' />
                </div>
                <div class="mt-2">
                    @if (isset($searchTerm))
                        <x-search-form :searchTerm=$searchTerm/>
                    @else
                        <x-search-form/>
                    @endif
                </div>
            </div>
            <x-table-jobs-applied :jobsApplied="$jobsApplied"/>
        </div>
    </body>
</html>
