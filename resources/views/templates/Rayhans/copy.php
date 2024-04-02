<div class="card">
    <div class="card-body">
        @isset($currentData)
        <form action="{{ url("schedules-edit-data", $currentData->id) }}" method="post">
            @method("PATCH")
            @else
            <form action="{{ url("schedules-create-data")}}" method="post">
                @endisset
                @csrf
                <div class="form-group mb-3">
                    <label for="teacher">Guru</label>
                    <select name="teacher" class="form-control" id="teacher">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ isset($currentData) && $teacher->id == $currentData->teachers_id ? "selected" : "" }}>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                    @error("teacher")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="course">Mata Pelajaran</label>
                    <select name="course" class="form-control" id="course">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ isset($currentData) && $course->id == $currentData->courses_id ? "selected" : "" }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error("course")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="room">Kelas</label>
                    <select name="room" class="form-control" id="room">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ isset($currentData) && $room->id == $currentData->rooms_id ? "selected" : "" }}>{{ $room->name_class }}</option>
                        @endforeach
                    </select>
                    @error("room")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="generation">Tahun Ajar</label>
                    <select name="generation" class="form-control" id="generation">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($generations as $generation)
                        <option value="{{ $generation->id }}" {{ isset($currentData) && $generation->id == $currentData->generations_id ? "selected" : "" }}>{{ $generation->academic_years }} | {{ $generation->semester }}</option>
                        @endforeach
                    </select>
                    @error("generation")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="generation">Hari</label>
                    <input type="text" class="form-control" name="day" id="day" value="{{ isset($currentData) ? $currentData->day : "" }}">
                    @error("generation")
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary"><i class="fas fa-paper-plane"></i>SIMPAN</button>
                <a href="{{ url('/schedules') }}" class="btn btn-success">KEMBALI</a>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
    </div>
</div>