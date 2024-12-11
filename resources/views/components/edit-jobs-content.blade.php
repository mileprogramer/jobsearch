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
            </tr>
        </thead>
        <tbody>
            @foreach ($jobsApplied as $jobApplied)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $jobApplied->company_name }}</td>
                <td class="px-6 py-4">{{ $jobApplied->link }}</td>
                <td class="px-6 py-4">
                    <form x-data="{ status: '{{ $jobApplied->job_applied_status }}' }" method="POST" action="/edit-job-applied-status/{{ $jobApplied->id }}">
                        @csrf
                        <select
                            name="job_applied_status"
                            onchange="this.form.submit()"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            @foreach ($jobsAppliedEnumsStatus as $enum)
                                <option
                                    value="{{$enum->value}}"
                                    @if ($jobApplied->status === $enum->value)
                                        selected
                                    @endif
                                >
                                    {{$enum->value}}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </td>
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
