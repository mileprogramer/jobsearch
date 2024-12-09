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
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Company name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Link to the job
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Summary
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobsApplied as $jobApplied)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $jobApplied->company_name }}</td>
                            <td class="px-6 py-4">{{ $jobApplied->link }}</td>
                            <td class="px-6 py-4">{!! \App\Enums\JobAppliedStatusEnums::generateBadge($jobApplied->status) !!}</td>
                            <td class="px-6 py-4">{{ $jobApplied->summary }}</td>
                            <td class="px-6 py-4">{{ $jobApplied->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-3 bg-white">
                    {{ $jobsApplied->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
