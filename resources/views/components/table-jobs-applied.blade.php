<div class="relative overflow-x-auto  sm:rounded-lg">
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
                <td class="px-6 py-4 whitespace-nowrap">{{ $jobApplied->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-6 py-3 bg-white">
        {{ $jobsApplied->links() }}
    </div>
</div>
