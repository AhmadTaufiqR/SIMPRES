<table class="table align-middle table-nowrap">
    <thead class="text-muted">
        <tr>
            <th scope="col">#</th>
            <th class=" text-uppercase" data-sort="angkatan">
                Angkatan
            </th>
            <th class=" text-uppercase" data-sort="semester">
                Semester
            </th>
            <th class=" text-uppercase" data-sort="action">Action
            </th>
        </tr>
    </thead>
    <tbody class="list form-check-all" id="invoice-list-data">
        @foreach ($generations as $generation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $generation->academic_years }}</td>
                <td>{{ $generation->semester }}</td>
                <td>
                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                        data-bs-target="#editModals-{{ $generation->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm remove-item-btn" data-bs-toggle="modal"
                        data-bs-target="#deleteRecordModal-{{ $generation->id }}">Delete</button>
                </td>
            </tr>

            <div id="editModals-{{ $generation->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 overflow-hidden">
                        <div class="modal-header">
                            <h2 class="modal-title">Edit Angkatan</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('generation/' . $generation->id . '/edit') }}" method="POST">
                                @csrf
                                @method('GET')
                                <div class="mb-3">
                                    <label for="tahun_awal" class="form-label">Tahun
                                        Akademik</label>
                                    <div class="d-flex align-items-center">
                                        <input type="number" name="tahun_awal" class="form-control me-1"
                                            id="tahun_awal" value="{{ explode('/', $generation->academic_years)[0] }}"
                                            placeholder="Tahun Awal">
                                        @error('tahun_awal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <span>/</span>
                                        <input type="number" name="tahun_akhir" class="form-control me-1"
                                            id="tahun_akhir" value="{{ explode('/', $generation->academic_years)[1] }}"
                                            placeholder="Tahun Akhir">
                                        @error('tahun_akhir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" id="semester" name="semester">
                                        <option value="Ganjil"
                                            {{ $generation->semester == 'Ganjil' ? 'selected' : '' }}>
                                            Ganjil</option>
                                        <option value="Genap"
                                            {{ $generation->semester == 'Genap' ? 'selected' : '' }}>
                                            Genap</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoomIn" id="deleteRecordModal-{{ $generation->id }}" tabindex="-1"
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
                                    <h4>Are you Sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">
                                        Are you Sure You want to
                                        Remove this Record ?
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                            <form method="POST" action="{{ route('generation.hapus', $generation->id) }}"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn w-sm btn-danger ">Yes,
                                    Delete
                                    It!</button>
                            </form>
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
            invoices
            We did not find
            any invoices for you search.</p>
    </div>
</div>
<div class="d-flex justify-content-end mt-3">
    <div class="pagination-wrap hstack gap-2">
        {{ $generations->links() }}
    </div>
</div>
