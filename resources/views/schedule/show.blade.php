<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Schedule No: {{ $schedule->id }}</h1>
                    <div class="d-flex flex-column justify-content-center flex-wrap">
                        <div class="d-flex flex-row mr-2">
                            <span class="mr-2">Teacher: </span>
                            <span style="font-weight: bold">{{ $schedule->teacher->name }}</span>
                        </div>
                        <div class="d-flex flex-row mr-2">
                            <span class="mr-2">School Class: </span>
                            <span style="font-weight: bold">{{ $schedule->schoolClass->name }}</span>
                        </div>
                        <div class="d-flex flex-row mr-2">
                            <span class="mr-2">Day: </span>
                            <span style="font-weight: bold">{{ $schedule->day }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
