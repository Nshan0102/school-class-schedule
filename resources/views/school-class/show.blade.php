<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">School Class No: {{ $schoolClass->id }}</h1>
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <span class="mr-2">Name: </span>
                            <span>{{ $schoolClass->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Schedules</h1>
                    <div class="d-flex justify-content-center">
                        <table class="table w-100">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 70%">Teacher</th>
                                <th style="width: 70%">Day</th>
                                <th style="width: 20%">Start</th>
                                <th style="width: 20%">End</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->teacher->name }}</td>
                                    <td>{{ $schedule->day }}</td>
                                    <td>{{ $schedule->start_time }}</td>
                                    <td>{{ $schedule->end_time }}</td>
                                    <td>
                                        <a href="{{ route("school-classes.show", $schoolClass->id) }}" class="btn btn-success">View</a>
                                        <a href="{{ route("school-classes.edit", $schoolClass->id) }}" class="btn btn-info">Edit</a>
                                        <form method="POST" action="{{ route("school-classes.destroy", $schoolClass->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
