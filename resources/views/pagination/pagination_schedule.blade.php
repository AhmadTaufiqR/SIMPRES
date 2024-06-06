<table class="table align-middle table-nowrap" id="invoiceTable">
    <thead class="text-muted">
        <tr>
            <th class="text-uppercase" data-sort="no">#</th>
            <th class="text-uppercase" data-sort="NIP">NAMA</th>
            <th class="text-uppercase" data-sort="name">MATA
                PELAJARAN</th>
            <th class="text-uppercase" data-sort="email">KELAS
            </th>
            <th class="text-uppercase" data-sort="address">HARI
            </th>
            <th class="text-uppercase" data-sort="tahun">TAHUN
                AKADEMIK</th>
            <th class="text-uppercase" data-sort="phone">SEMESTER
            </th>
            <th class="text-uppercase" data-sort="phone">Start
                Time
            </th>
            <th class="text-uppercase" data-sort="phone">End Time
            </th>
            <th class="text-uppercase">action</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
        @foreach ($Schedules as $schedule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schedule->teacher->name }}</td>
                <td>{{ $schedule->course->name }}</td>
                <td>{{ $schedule->room->name_class }}</td>
                @switch($schedule->day)
                    @case('Monday')
                        <td>Senin</td>
                    @break

                    @case('Tuesday')
                        <td>Selasa</td>
                    @break

                    @case('Wednesday')
                        <td>Rabu</td>
                    @break

                    @case('Thursday')
                        <td>Kamis</td>
                    @break

                    @case('Friday')
                        <td>Jumat</td>
                    @break

                    @case('Saturday')
                        <td>Sabtu</td>
                    @break

                    @default
                @endswitch
                <td>{{ $schedule->generation->academic_years }}</td>
                <td>{{ $schedule->generation->semester }}</td>
                <td>{{ $schedule->start_attendance }}</td>
                <td>{{ $schedule->end_attendance }}</td>
                <td>
                    <a class="btn btn-success btn-sm mx-2 edit-item-btn"
                        href="{{ url('schedules-edit-data', $schedule->id) }}">EDIT</a>
                    <button class="btn btn-danger btn-sm remove-item-btn" data-bs-toggle="modal"
                        data-bs-target="#deleteRecordModal-{{ $schedule->id }}">HAPUS</button>
                </td>
                <div id="editModals-{{ $schedule->id }}" class="modal fade" tabindex="-1" aria-hidden="true"
                    style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 overflow-hidden">
                            <div class="modal-header p-3">
                                <h4 class="card-title mb-0">EDIT
                                    DATA
                                    JADWAL</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action='{{ url('schedules/' . $schedule->id . '/edit') }}' method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">Nama
                                            Guru</label>
                                        <input type="text" name="guru" class="form-control"
                                            value="{{ $schedule->teachers_id }}" id="guru"
                                            placeholder="Masukkan Nama">
                                        @error('teachers_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Mata
                                            Pelajaran</label>
                                        <input type="text" name="matapelajaran" class="form-control"
                                            value="{{ $schedule->courses_id }}" id="nama"
                                            placeholder="Masukkan Mata Pelajaran">
                                        @error('courses_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Kelas</label>
                                        <input type="room" name="room" class="form-control"
                                            value="{{ $schedule->rooms_id }}" id="room"
                                            placeholder="Masukkan Kelas">
                                        @error('rooms_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="day" class="form-label">Hari</label>
                                        <input type="text" name="day" class="form-control"
                                            value="{{ $schedule->day }}" id="day" placeholder="Masukkan Hari">
                                        @error('day')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Tahun
                                            Akademik</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $schedule->generations_id }}" id="generations_id"
                                            placeholder="Masukkan Semester">
                                        @error('generations_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <button type="submit"class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Modal -->
                <div class="modal fade zoomIn" id="deleteRecordModal-{{ $schedule->id }}" tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#f7b84b,secondary:#f06548"
                                        style="width:100px;height:100px"></lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Apakah Anda Yakin Ingin
                                            Menghapus ?</h4>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light"
                                        data-bs-dismiss="modal">TUTUP</button>
                                    <form method="POST" action="{{ route('schedules.hapus', $schedule->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn w-sm btn-danger ">YA,
                                            HAPUS
                                            !</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal -->
        @endforeach

    </tbody>
</table>
<div class="noresult" style="display: none">
    <div class="text-center">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
        <h5 class="mt-2">Sorry! No Result Found</h5>
        <p class="text-muted mb-0">We've searched more than 150+
            invoices We did not
            find
            any invoices for you search.</p>
    </div>
</div>
<div class="d-flex justify-content-end mt-3">
    <div class="pagination-wrap hstack gap-2">
        {{ $Schedules->links() }}
    </div>
</div