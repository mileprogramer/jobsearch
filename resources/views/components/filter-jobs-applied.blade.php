<form
    x-data="{ navigateToFilter() {
        const selectedValue = document.getElementById('status').value;
        if(selectedValue === 'Select status') {
            window.location.href = `/`;
            return;
        }
        if (selectedValue) {
            window.location.href = `/filter?job_status=${selectedValue}`;
        }
    }}"
>
    <div class="flex max-w-md gap-3">
        <select
            id="status"
            @change="navigateToFilter()"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
            <option selected>Select status</option>
            @foreach ($jobsAppliedEnumsStatus as $enum)
                <option
                    value="{{$enum->value}}"
                    {{ isset($selectedFilter) && $selectedFilter === $enum->value ? 'selected' : '' }}
                >
                    {{ $enum->value }}
                </option>
            @endforeach
        </select>
        @if (isset($selectedFilter))
            <a
                href="/"
                class="text-white bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                Reset
            </a>
        @endif
    </div>
</form>
