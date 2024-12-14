<div class="relative overflow-x-auto  sm:rounded-lg">
    <h1 class="text-center mb-3 text-3xl">Edit jobs</h1>
    <x-danger-alert/>
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
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobsApplied as $jobApplied)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $jobApplied->company_name }}</td>
                <td class="px-6 py-4 break-all">
                    <a
                        class="text-blue-700"
                        href={{ $jobApplied->link }}
                        target="blank"
                    >
                        {{ $jobApplied->link }}
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form x-data="{ status: '{{ $jobApplied->job_applied_status }}' }" method="POST" action="/edit-job-applied-status/{{ $jobApplied->id }}">
                        @csrf
                        <x-edit-job-applied-status
                            :jobApplied="$jobApplied"
                            onChange=true
                            :jobsAppliedEnumsStatus="$jobsAppliedEnumsStatus"
                        />
                    </form>
                </td>
                <td class="px-6 py-4 break-all">{{ $jobApplied->summary }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $jobApplied->created_at }}</td>
                <td class="px-6 py-4">
                    <a
                        href={{"/dashboard/edit-job-applied/".$jobApplied->id}}
                        class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-6 py-3 bg-white">
        {{ $jobsApplied->links() }}
    </div>
</div>
