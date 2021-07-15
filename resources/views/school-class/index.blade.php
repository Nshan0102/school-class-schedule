<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="" href="{{ route("admin-school-classes.create") }}">Create new school class</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">School Classes</h1>
                    <div class="d-flex justify-content-center">
                        <table class="table w-100">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 70%">Name</th>
                                <th style="width: 15%">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schoolClasses as $schoolClass)
                                <tr>
                                    <td>{{ $schoolClass->id }}</td>
                                    <td>{{ $schoolClass->name }}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{ route("admin-school-classes.show", $schoolClass->id) }}"
                                           class="btn btn-success">View</a>
                                        @if(auth()->check() && auth()->user()->isAdmin())
                                            <a href="{{ route("admin-school-classes.edit", $schoolClass->id) }}"
                                               class="btn btn-info">Edit</a>
                                            <form method="POST"
                                                  action="{{ route("admin-school-classes.destroy", $schoolClass->id) }}">
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
                        {{ $schoolClasses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
