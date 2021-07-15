<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Edit School Class No: {{ $schedule->id }}</h1>
                    <div class="d-flex justify-content-start">
                        <form method="POST" action="{{ route("admin-schedules.update", $schedule->id) }}">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter class name" value="{{ old("name") ?? $schoolClass->name }}">
                                @error("name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
