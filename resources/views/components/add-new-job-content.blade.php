@if (session("addedNewJobMsg"))
    <x-successfully-alert :msg="session('addedNewJobMsg')" />

@endif
<h1 class="text-center mb-3 text-3xl">Add new job applied</h1>
<x-danger-alert/>
<x-add-job-applied/>
