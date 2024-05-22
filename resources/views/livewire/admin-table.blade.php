<div>
    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
        <form>
            <div class="row g-3">
                <div class="col-xxl-5 col-sm-12">
                    <div class="search-box">
                        <input type="text" name="search" id="search" wire:model.live="search"
                            class="form-control search bg-light border-light" placeholder="Cari nama..">
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
                                        <th scope="col">#</th>
                                        <th class="text-uppercase" data-sort="name">Nama
                                        </th>
                                        <th class="text-uppercase" data-sort="name">email
                                        </th>
                                        <th class="text-uppercase" data-sort="name">No
                                            Telp
                                        </th>
                                        <th class="text-uppercase" data-sort="username">
                                            Username</th>
                                        <th class="text-uppercase" data-sort="action">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all" id="invoice-list-data">
                                    @foreach ($admin as $admins)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $admins->name }}</td>
                                            <td>{{ $admins->email }}</td>
                                            <td>{{ $admins->phone }}</td>
                                            <td>{{ $admins->username }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm mx-2 edit-item-btn"
                                                    data-bs-toggle="modal" onclick="editData({{ $admins->id }})"
                                                    data-bs-target="#editModals-{{ $admins->id }}"
                                                    wire:click="editAdmin( {{ $admins->id }})">Edit</button>
                                                <button class="btn btn-danger btn-sm remove-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteRecordModal-{{ $admins->id }}">Hapus</button>

                                            </td>
                                            <div wire:ignore.self id="editModals-{{ $admins->id }}" class="modal fade"
                                                tabindex="-1" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 overflow-hidden">
                                                        <div class="modal-header p-3">

                                                            @if (session('status'))
                                                                <div class="alert alert-succes">
                                                                    {{ session('status') }}
                                                                </div>
                                                            @endif
                                                            <h4 class="card-title mb-0">Edit
                                                                Admin</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form wire:submit.prevent="updateAdmin">
                                                                @csrf

                                                                <input type="hidden" wire:model="adminID">
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Nama
                                                                    </label>
                                                                    <input type="name" name="name"
                                                                        class="form-control" wire:model="name"
                                                                        id="name" placeholder="Masukkan nama admin">
                                                                    @error('name')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="email"
                                                                        class="form-label">Email</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="email"
                                                                            wire:model="email"
                                                                            class="form-control"
                                                                            placeholder="Masukkan email admin"
                                                                            aria-describedby="basic-addon2">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon2">@gmail.com</span>
                                                                    </div>
                                                                    @error('email')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="phone" class="form-label">Phone
                                                                    </label>
                                                                    <input type="number" name="phone"
                                                                        class="form-control" wire:model="phone"
                                                                        id="phone" placeholder="Masukkan nohp admin">
                                                                    @error('phone')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="username"
                                                                        class="form-label">Username</label>
                                                                    <input type="text" name="username"
                                                                        class="form-control" wire:model="username"
                                                                        id="username"
                                                                        placeholder="Masukkan username admin">
                                                                    @error('username')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="password"
                                                                        class="form-label">Password</label>
                                                                    <input type="password"
                                                                        id="password-input-{{ $admins->id }}"
                                                                        name="password" wire:model="password"
                                                                        class="form-control pe-5 password-input"
                                                                        onpaste="return false"
                                                                        placeholder="Masukkan password admin"
                                                                        aria-describedby="passwordInput"
                                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                                                    @error('password')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>

                                                                <div wire:ignore.self
                                                                    id="password-contain-{{ $admins->id }}"
                                                                    class="p-3 bg-light mb-2 rounded">
                                                                    <h5 class="fs-13">Sandi harus memiliki:</h5>
                                                                    <p id="pass-length-{{ $admins->id }}"
                                                                        class="invalid fs-12 mb-2">Minimal <b>8
                                                                            Karakter</b></p>
                                                                    <p id="pass-lower-{{ $admins->id }}"
                                                                        class="invalid fs-12 mb-2">Terdapat <b>Huruf
                                                                            Kecil</b> (a-z)</p>
                                                                    <p id="pass-upper-{{ $admins->id }}"
                                                                        class="invalid fs-12 mb-2 ">Terdapat <b>Huruf
                                                                            Besar</b> (A-Z)</p>
                                                                    <p id="pass-number-{{ $admins->id }}"
                                                                        class="invalid fs-12 mb-0 ">Terdapat
                                                                        <b>Angka</b> (0-9)</p>
                                                                </div>
                                                                <div class="text-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Edit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <!-- Modal -->
                                            <div class="modal fade zoomIn" id="deleteRecordModal-{{ $admins->id }}"
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
                                                                    <h4>Yakin ?</h4>
                                                                    <p class="text-muted mx-4 mb-0">
                                                                        Kamu yakin ingin menghapus data ini ?</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                <button type="button" class="btn w-sm btn-light"
                                                                    data-bs-dismiss="modal">Tutup</button>

                                                                <button type="submit"
                                                                    wire:click="deleteAdmin({{ $admins->id }})"
                                                                    class="btn w-sm btn-danger ">Ya,
                                                                    Hapus!</button>
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
                                        invoices We did not find
                                        any invoices for you search.</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <div class="pagination-wrap hstack gap-2">
                                    {{ $admin->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
