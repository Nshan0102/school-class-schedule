<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="" href="{{ route("admin-schedules.create") }}">Create new schedule</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Schedules</h1>
                    <div class="d-flex justify-content-center">
                        <table class="table w-100">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 70%">Teacher</th>
                                <th style="width: 15%">School Class</th>
                                <th style="width: 15%">Day</th>
                                <th style="width: 15%">Start</th>
                                <th style="width: 15%">End</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->teacher->name }}</td>
                                    <td>{{ $schedule->schoolClass->name }}</td>
                                    <td>{{ $schedule->day }}</td>
                                    <td>{{ $schedule->start }}</td>
                                    <td>{{ $schedule->end }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route("admin-schedules.show", $schedule->id) }}"
                                           class="btn btn-success">View</a>
                                        @if(auth()->check() && auth()->user()->isAdmin())
                                            <a href="{{ route("admin-schedules.edit", $schedule->id) }}"
                                               class="btn btn-info">Edit</a>
                                            <form method="POST"
                                                  action="{{ route("admin-schedules.destroy", $schedule->id) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $schedules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
