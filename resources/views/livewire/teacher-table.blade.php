<div>
    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
        <form>
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-12">
                    <div class="search-box">
                        <input type="text" class="form-control search bg-light border-light" wire:model.live="search"
                            placeholder="Cari nama..">
                        <i class="ri-search-line search-icon"></i>


                    </div>
                </div>
                <!--end col-->

                <!--end col-->
            </div>
            <!--end row-->
        </form>
    </div>
    <div class="card-body">
        <div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <div class="table-data">
                            <table class="table align-middle table-nowrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th class="text-uppercase">#</th>
                                        <th class=" text-uppercase" data-sort="NIP">NIP
                                        </th>
                                        <th class=" text-uppercase" data-sort="name">NAMA
                                        </th>
                                        <th class="text-uppercase" data-sort="email">
                                            email
                                        </th>
                                        <th class=" text-uppercase" data-sort="address">
                                            address
                                        </th>
                                        <th class="text-uppercase">Gender</th>
                                        <th class=" text-uppercase" data-sort="phone">
                                            phone
                                        </th>
                                        <th class="text-uppercase">action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @foreach ($teacher as $teachers)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teachers->nip }}</td>
                                            <td>{{ $teachers->name }}</td>
                                            <td>{{ $teachers->email }}</td>
                                            <td style="text-indent: 20px">
                                                {{ $teachers->address }}</td>
                                            <td>{{ $teachers->gender }}</td>
                                            <td>{{ $teachers->phone }}</td>
                                            <td>
                                                {{-- <input type="text" class="form-control" wire:model="nip"> --}}
                                                <button class="btn btn-success btn-sm mx-2 edit-item-btn"
                                                    data-bs-toggle="modal" onclick="editData({{ $teachers->id }})"
                                                    data-bs-target="#editModals-{{ $teachers->id }}"
                                                    wire:click="editTeacher( {{ $teachers->id }})">Edit</button>
                                                <button class="btn btn-danger btn-sm remove-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteRecordModal-{{ $teachers->id }}">Hapus</button>
                                            </td>

                                            <div wire:ignore.self id="editModals-{{ $teachers->id }}"
                                                class="modal fade" tabindex="-1" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 overflow-hidden">
                                                        <div class="modal-header p-3">
                                                            <h4 class="card-title mb-0">EDIT
                                                                DATA
                                                                GURU</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="updateTeacher">
                                                                @csrf
                                                                <input type="hidden" wire:model="teacherID">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="nip"
                                                                                class="form-label">NIP</label>
                                                                            <input type="text" name="nip" id="nip-input-{{ $teachers->id }}"
                                                                                onclick="nipValidation({{ $teachers->id }})"
                                                                                class="form-control" autocomplete="off"
                                                                                wire:model="nip"
                                                                                placeholder="Masukkan NIP guru">
                                                                            @error('nip')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">Nama</label>
                                                                            <input type="text" name="name"
                                                                                class="form-control" wire:model="name"
                                                                                placeholder="Masukkan nama guru">
                                                                            @error('name')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="email"
                                                                                class="form-label">Email</label>
                                                                            <div class="input-group">
                                                                                <input type="text" name="email"
                                                                                    wire:model="email"
                                                                                    class="form-control"
                                                                                    placeholder="Masukkan email guru"
                                                                                    aria-describedby="basic-addon2">
                                                                                <span class="input-group-text"
                                                                                    id="basic-addon2">@sepatumas.sch.id</span>
                                                                            </div>
                                                                            @error('email')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div><!--end col-->

                                                                    {{-- </div><!--end col--> --}}

                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">Jenis
                                                                                kelamin</label>
                                                                            <select class="form-control" name="gender"
                                                                                wire:model="gender" data-choices
                                                                                data-choices-search
                                                                                data-choices-removeItem>
                                                                                <option
                                                                                    {{ $gender == '' ? 'selected' : '' }}>
                                                                                    Silahkan
                                                                                    pilih jenis
                                                                                    kelamin
                                                                                </option>
                                                                                <option value="Laki-Laki"
                                                                                    {{ $gender == 'Laki-Laki' ? 'selected' : '' }}>
                                                                                    Laki-Laki
                                                                                </option>
                                                                                <option value="Perempuan"
                                                                                    {{ $gender == 'Perempuan' ? 'selected' : '' }}>
                                                                                    Perempuan
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">No
                                                                                Handphone</label>
                                                                            <input type="text" name="phone"
                                                                                id="phone-input-{{ $teachers->id }}"
                                                                                onclick="phoneValidation({{ $teachers->id }})"
                                                                                class="form-control"
                                                                                wire:model="phone"
                                                                                placeholder="Masukkan no hp guru">
                                                                            @error('phone')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="address"
                                                                                class="form-label">Alamat</label>
                                                                            <input type="text" name="address"
                                                                                class="form-control"
                                                                                wire:model="address"
                                                                                placeholder="Masukkan alamat guru">
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="password"
                                                                                class="form-label">Password</label>
                                                                            <input type="password"
                                                                                id="password-input-{{ $teachers->id }}"
                                                                                name="password" wire:model="password"
                                                                                class="form-control pe-5 password-input"
                                                                                onpaste="return false"
                                                                                placeholder="Enter password"
                                                                                aria-describedby="passwordInput">
                                                                            @error('password')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>


                                                                        <div wire:ignore.self
                                                                            id="password-contain-{{ $teachers->id }}"
                                                                            class="p-3 bg-light mb-2 rounded">
                                                                            <h5 class="fs-13">Password must contain:
                                                                            </h5>
                                                                            <p id="pass-length-{{ $teachers->id }}"
                                                                                class="invalid fs-12 mb-2">Minimum
                                                                                <b>characters</b></p>
                                                                            <p id="pass-lower-{{ $teachers->id }}"
                                                                                class="invalid fs-12 mb-2">At least
                                                                                <b>lowercase</b> letter (a-z)</p>
                                                                            <p id="pass-upper-{{ $teachers->id }}"
                                                                                class="invalid fs-12 mb-2 ">At least
                                                                                <b>uppercase</b> letter (A-Z)</p>
                                                                            <p id="pass-number-{{ $teachers->id }}"
                                                                                class="invalid fs-12 mb-0 ">At least
                                                                                <b>number</b> (0-9)</p>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-12">
                                                                        <div class="text-end">
                                                                            <button
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                </div><!--end row-->
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <!-- Modal -->
                                            <div class="modal fade zoomIn" id="deleteRecordModal-{{ $teachers->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                id="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mt-2 text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                    trigger="loop"
                                                                    colors="primary:#f7b84b,secondary:#f06548"
                                                                    style="width:100px;height:100px"></lord-icon>
                                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                    <h4>Apakah Anda Yakin Ingin
                                                                        Menghapus?</h4>

                                                                </div>
                                                            </div>
                                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                <button type="button" class="btn w-sm btn-light"
                                                                    data-bs-dismiss="modal">TUTUP</button>
                                                                <button
                                                                    wire:click="deleteTeacher({{ $teachers->id }})"
                                                                    class="btn w-sm btn-danger">YA, HAPUS!</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end modal -->
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+
                                        invoices We did not
                                        find
                                        any invoices for you search.</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 me-3">
                                <div class="pagination-wrap hstack gap-2">
                                    {{ $teacher->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
