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
                    <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal"
                        onclick="editData({{ $admins->id }})"
                        data-bs-target="#editModals-{{ $admins->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm remove-item-btn" data-bs-toggle="modal"
                        data-bs-target="#deleteRecordModal-{{ $admins->id }}">Delete</button>

                </td>
                <div id="editModals-{{ $admins->id }}" class="modal fade" tabindex="-1" aria-hidden="true"
                    style="display: none;">
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <form action="{{ url('admin/' . $admins->id . '/edit') }} "method="POST">
                                    @csrf
                                    @method('GET')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name
                                        </label>
                                        <input type="name" name="name" class="form-control"
                                            value="{{ $admins->name }}" id="name" placeholder="Enter your name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $admins->email }}" id="email"
                                            placeholder="Enter your email">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone
                                        </label>
                                        <input type="number" name="phone" class="form-control"
                                            value="{{ $admins->phone }}" id="phone" placeholder="Enter your phone">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="{{ $admins->username }}" id="username"
                                            placeholder="Enter your username">
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password-input-{{ $admins->id }}" name="password"
                                            class="form-control pe-5 password-input" onpaste="return false"
                                            placeholder="Enter password" aria-describedby="passwordInput"
                                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div id="password-contain-{{ $admins->id }}" class="p-3 bg-light mb-2 rounded">
                                        <h5 class="fs-13">Password
                                            must contain:</h5>
                                        <p id="pass-length-{{ $admins->id }}" class="invalid fs-12 mb-2">
                                            Minimum <b>
                                                characters</b></p>
                                        <p id="pass-lower-{{ $admins->id }}" class="invalid fs-12 mb-2">
                                            At
                                            <b>lowercase</b> letter
                                            (a-z)
                                        </p>
                                        <p id="pass-upper-{{ $admins->id }}" class="invalid fs-12 mb-2 ">
                                            At
                                            least <b>uppercase</b>
                                            letter (A-Z)</p>
                                        <p id="pass-number-{{ $admins->id }}" class="invalid fs-12 mb-0 ">
                                            A
                                            least <b>number</b>
                                            (0-9)</p>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- Modal -->
                <div class="modal fade zoomIn" id="deleteRecordModal-{{ $admins->id }}" tabindex="-1"
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
                                            Remove this Record ?</p>
                                    </div>
                                </div>
                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light"
                                        data-bs-dismiss="modal">Close</button>

                                    <form method="POST" action="{{ route('admin.hapus', $admins->id) }}"
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
                </div>
                <!--end modal -->

            </tr>
        @endforeach
    </tbody>
</table>
<div class="noresult" style="display: none">
    <div class="text-center">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
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
