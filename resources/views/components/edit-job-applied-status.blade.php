<select
    name="job_applied_status"
    @if (isset($onChange))
        onchange="this.form.submit()"
    @endif
    class="whitespace-normal bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
