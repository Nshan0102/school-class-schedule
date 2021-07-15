<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Create Schedule</h1>
                    <div class="d-flex justify-content-start">
                        <form method="POST" action="{{ route("admin-schedules.store") }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teacher</label>
                                <select name="user_id">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                                @error("user_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">School class</label>
                                <select name="school_class_id">
                                    @foreach($schoolClasses as $schoolClass)
                                        <option value="{{$schoolClass->id}}">{{$schoolClass->name}}</option>
                                    @endforeach
                                </select>
                                @error("school_class_id")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="day" type="date">
                                @error("day")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Start Time</label>
                                <input type="time" name="start_time">
                                @error("start_time")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>End Time</label>
                                <input type="time" name="end_time">
                                @error("end_time")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    Store
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
