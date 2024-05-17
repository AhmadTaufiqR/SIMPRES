<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="active">

<head>

    <meta charset="utf-8" />
    <title>Data Guru | SCode</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    <style>
        [id^="password-contain-"] {
            display: none;
        }

        [id^="password-contain-"] p {
            padding-right: 13px;
        }

        [id^="password-contain-"] p.valid {
            color: #0ab39c;
        }

        [id^="password-contain-"] p.valid::before {
            position: relative;
            right: 3px;
            content: "✔";
        }

        [id^="password-contain-"] p.invalid {
            color: #f06548;
        }

        [id^="password-contain-"] p.invalid::before {
            position: relative;
            right: 3px;
            content: "✖";
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">fsdfssf</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome tyjty</h6>
                                <a class="dropdown-item" href="/headmaster"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profil Kepala Sekolah</span></a>
                                <a class="dropdown-item" href="/"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548"
                                style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Apakah Anda Yakin ?</h4>
                                <p class="text-muted mx-4 mb-0">Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">TUTUP</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">YA, HAPUS
                                It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="17">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                        <ul class="navbar-nav" id="navbar-nav">
                            <!-- end Dashboard Menu -->

                            <li class="menu-title"><i class="ri-more-fill"></i> <span
                                    data-key="t-pages">Profile</span>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/headmaster">
                                    <i class="las la-user" wi></i> <span data-key="t-headmasters">Kepala
                                        Sekolah</span>
                                </a>
                            </li>
                            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Data
                                    Tabel</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/admin">
                                    <i class="ri-account-circle-line"></i> <span data-key="t-headmasters">Admin</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link active" href="/teacher">
                                    <i class="las la-graduation-cap"></i>
                                    <span data-key="t-headmasters">Tenaga Pengajar</span>
                                </a>
                            </li>
                            <li class="menu-title"><i class="ri-more-fill"></i> <span
                                    data-key="t-pages">Akademik</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/room">
                                    <i class="las la-school"></i> <span data-key="t-headmasters">Kelas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/courses">
                                    <i class="las la-book"></i> <span data-key="t-headmasters">Mata Pelajaran</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/generation">
                                    <i class="las la-calendar-alt"></i> <span data-key="t-headmasters">Tahun
                                        Akademik</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/schedules">
                                    <i class="las la-clipboard"></i> <span data-key="t-headmasters">Jadwal
                                        Pelajaran</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="/presences">
                                    <i class="mdi mdi-format-list-checks"></i> <span
                                        data-key="presences">Presensi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end Dashboard Menu -->
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-3 col-md-6">

                    </div><!-- end col -->

                </div> <!-- end row-->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="invoiceList">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">DAFTAR GURU</h5>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button class="btn btn-primary" id="remove-actions"
                                                onClick="deleteMultiple()"><i
                                                    class="ri-delete-bin-2-line"></i></button>
                                            <button href="" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#signupModals"><i
                                                    class="ri-add-line align-bottom me-1"></i>Tambah Data Guru</button>
                                            <div id="signupModals" class="modal fade" tabindex="-1"
                                                aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 overflow-hidden">
                                                        <div class="modal-header p-3">
                                                            <h4 class="card-title mb-0">TAMBAH DATA GURU</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action='/teacher-create-data' method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="username"
                                                                                class="form-label">NIP</label>
                                                                            <input type="number" name="nip"
                                                                                class="form-control"
                                                                                value="{{ old('nip') }}" required
                                                                                id="nip"
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
                                                                                class="form-control"
                                                                                value="{{ old('name') }}" required
                                                                                id="nama"
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
                                                                                    class="form-control" required
                                                                                    placeholder="Masukkan email guru"
                                                                                    aria-label="Enter your email"
                                                                                    aria-describedby="basic-addon2">
                                                                                <span class="input-group-text"
                                                                                    id="basic-addon2">@gmail.com</span>
                                                                            </div>
                                                                            @error('email')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div><!--end col-->

                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">Jenis
                                                                                Kelamin</label>
                                                                            <select class="form-control"
                                                                                name="gender"
                                                                                id="choices-single-no-search"
                                                                                data-choices data-choices-search-false
                                                                                required data-choices-removeItem>
                                                                                <option value="">Pilih Jenis
                                                                                    Kelamin
                                                                                </option>
                                                                                <option value="Laki-Laki">Laki-Laki
                                                                                </option>
                                                                                <option value="Perempuan">Perempuan
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">No Handphone</label>
                                                                            <input type="number" name="phone"
                                                                                class="form-control"
                                                                                value="{{ old('phone') }}"
                                                                                id="phone" required
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
                                                                                class="form-control" required
                                                                                value="{{ old('address') }}"
                                                                                id="address"
                                                                                placeholder="Masukkan alamat guru">
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-12">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputPassword1"
                                                                                class="form-label">Sandi</label>
                                                                            <input type="password" id="password-input"
                                                                                name="password"
                                                                                class="form-control @error('password') is-invalid @enderror pe-5 password-input"
                                                                                onpaste="return false"
                                                                                placeholder="Masukkan sandi guru"
                                                                                required
                                                                                aria-describedby="passwordInput"
                                                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                                                            @error('password')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                        <div id="password-contain"
                                                                            class="p-3 bg-light mb-2 rounded">
                                                                            <h5 class="fs-13">Sandi harus memiliki:
                                                                            </h5>
                                                                            <p id="pass-length"
                                                                                class="invalid fs-12 mb-2">
                                                                                Minimal <b>8 Karakter</b>
                                                                            </p>
                                                                            <p id="pass-lower"
                                                                                class="invalid fs-12 mb-2">
                                                                                Terdapat <b>huruf kecil</b> (a-z)
                                                                            </p>
                                                                            <p id="pass-upper"
                                                                                class="invalid fs-12 mb-2">
                                                                                Terdapat
                                                                                Huruf <b>Besar</b>
                                                                                (A-Z)</p>
                                                                            <p id="pass-number"
                                                                                class="invalid fs-12 mb-0">
                                                                                Terdapat <b>angka</b> (0-9)
                                                                            </p>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-12">
                                                                        <div class="text-end">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                </div><!--end row-->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-12">
                                            <div class="search-box">
                                                <input type="text" name="search" id="search"
                                                    class="form-control search bg-light border-light"
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
                                                                        <button
                                                                            class="btn btn-success btn-sm mx-2 edit-item-btn"
                                                                            data-bs-toggle="modal"
                                                                            onclick="editData({{ $teachers->id }})"
                                                                            data-bs-target="#editModals-{{ $teachers->id }}">Edit</button>
                                                                        <button
                                                                            class="btn btn-danger btn-sm remove-item-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteRecordModal-{{ $teachers->id }}">Hapus</button>

                                                                    </td>

                                                                    <div id="editModals-{{ $teachers->id }}"
                                                                        class="modal fade" tabindex="-1"
                                                                        aria-hidden="true" style="display: none;">
                                                                        <div
                                                                            class="modal-dialog modal-dialog-centered">
                                                                            <div
                                                                                class="modal-content border-0 overflow-hidden">
                                                                                <div class="modal-header p-3">
                                                                                    <h4 class="card-title mb-0">EDIT
                                                                                        DATA
                                                                                        GURU</h4>
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action='{{ url('teacher/' . $teachers->id . '/edit') }}'
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="nip"
                                                                                                        class="form-label">NIP</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="nip"
                                                                                                        class="form-control"
                                                                                                        autocomplete="off"
                                                                                                        value="{{ $teachers->nip }}"
                                                                                                        placeholder="Masukkan NIP guru">
                                                                                                    @error('nip')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="name"
                                                                                                        class="form-label">Nama</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="name"
                                                                                                        class="form-control"
                                                                                                        value="{{ $teachers->name }}"
                                                                                                        placeholder="Masukkan nama guru">
                                                                                                    @error('name')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="email"
                                                                                                        class="form-label">Email</label>
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            name="email"
                                                                                                            value="{{ strtok($teachers->email, '@') }}"
                                                                                                            class="form-control"
                                                                                                            placeholder="Masukkan email guru"
                                                                                                            aria-describedby="basic-addon2">
                                                                                                        <span
                                                                                                            class="input-group-text"
                                                                                                            id="basic-addon2">@gmail.com</span>
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
                                                                                                    <label
                                                                                                        for="name"
                                                                                                        class="form-label">Jenis
                                                                                                        kelamin</label>
                                                                                                    <select
                                                                                                        class="form-control"
                                                                                                        name="gender"
                                                                                                        data-choices
                                                                                                        data-choices-search
                                                                                                        data-choices-removeItem>
                                                                                                        <option
                                                                                                            {{ $teachers->gender == '' ? 'selected' : '' }}>
                                                                                                            Silahkan
                                                                                                            pilih jenis
                                                                                                            kelamin
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="Laki-Laki"
                                                                                                            {{ $teachers->gender == 'Laki-Laki' ? 'selected' : '' }}>
                                                                                                            Laki-Laki
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="Perempuan"
                                                                                                            {{ $teachers->gender == 'Perempuan' ? 'selected' : '' }}>
                                                                                                            Perempuan
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-6">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="name"
                                                                                                        class="form-label">No
                                                                                                        Handphone</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="phone"
                                                                                                        class="form-control"
                                                                                                        value="{{ $teachers->phone }}"
                                                                                                        placeholder="Masukkan no hp guru">
                                                                                                    @error('phone')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="address"
                                                                                                        class="form-label">Alamat</label>
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="address"
                                                                                                        class="form-control"
                                                                                                        value="{{ $teachers->address }}"
                                                                                                        placeholder="Masukkan alamat guru">
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="password"
                                                                                                        class="form-label">Sandi</label>
                                                                                                    <input
                                                                                                        type="password"
                                                                                                        id="password-input-{{ $teachers->id }}"
                                                                                                        name="password"
                                                                                                        class="form-control pe-5 password-input"
                                                                                                        onpaste="return false"
                                                                                                        placeholder="Masukkan password guru"
                                                                                                        aria-describedby="passwordInput"
                                                                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                                                                                    @error('password')
                                                                                                        <span
                                                                                                            class="text-danger">{{ $message }}</span>
                                                                                                    @enderror
                                                                                                </div>

                                                                                                <div id="password-contain-{{ $teachers->id }}"
                                                                                                    class="p-3 bg-light mb-2 rounded">
                                                                                                    <h5 class="fs-13">
                                                                                                        Sandi harus
                                                                                                        memiliki:
                                                                                                    </h5>
                                                                                                    <p id="pass-length-{{ $teachers->id }}"
                                                                                                        class="invalid fs-12 mb-2">
                                                                                                        Minimal <b>8
                                                                                                            Karakter</b>
                                                                                                    </p>
                                                                                                    <p id="pass-lower-{{ $teachers->id }}"
                                                                                                        class="invalid fs-12 mb-2">
                                                                                                        Terdapat
                                                                                                        <b>huruf
                                                                                                            kecil</b>
                                                                                                        (a-z)
                                                                                                    </p>
                                                                                                    <p id="pass-upper-{{ $teachers->id }}"
                                                                                                        class="invalid fs-12 mb-2 ">
                                                                                                        Terdapat
                                                                                                        Huruf
                                                                                                        <b>Besar</b>
                                                                                                        (A-Z)
                                                                                                    </p>
                                                                                                    </p>
                                                                                                    <p id="pass-number-{{ $teachers->id }}"
                                                                                                        class="invalid fs-12 mb-0 ">
                                                                                                        Terdapat
                                                                                                        <b>angka</b>
                                                                                                        (0-9)
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div><!--end col-->
                                                                                            <div class="col-lg-12">
                                                                                                <div class="text-end">
                                                                                                    <button
                                                                                                        type="submit"
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
                                                                    <div class="modal fade zoomIn"
                                                                        id="deleteRecordModal-{{ $teachers->id }}"
                                                                        tabindex="-1" aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"
                                                                                        id="btn-close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="mt-2 text-center">
                                                                                        <lord-icon
                                                                                            src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                                            trigger="loop"
                                                                                            colors="primary:#f7b84b,secondary:#f06548"
                                                                                            style="width:100px;height:100px"></lord-icon>
                                                                                        <div
                                                                                            class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                            <h4>Apakah Anda Yakin Ingin
                                                                                                Menghapus?</h4>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                                        <button type="button"
                                                                                            class="btn w-sm btn-light"
                                                                                            data-bs-dismiss="modal">TUTUP</button>
                                                                                        <form method="POST"
                                                                                            action="{{ route('teacher.hapus', $teachers->id) }}"
                                                                                            class="d-inline">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit"
                                                                                                class="btn w-sm btn-danger ">YA,
                                                                                                HAPUS
                                                                                                It!</button>
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
                                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                                trigger="loop"
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


                    </div>

                    <!-- Modal -->
                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-labelledby="deleteOrderLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#405189,secondary:#f06548"
                                        style="width:90px;height:90px"></lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>You are about to delete a order ?</h4>
                                        <p class="text-muted fs-15 mb-4">Deleting your order will remove all of
                                            your
                                            information from our database.</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link link-success fw-medium text-decoration-none"
                                                id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                    class="ri-close-line me-1 align-middle"></i> Close</button>
                                            <button class="btn btn-danger" id="delete-record">Yes, Delete
                                                It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end modal -->
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->

    </div><!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Scode
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-4">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                    <p class="text-muted">Choose Light or Dark Scheme.</p>

                    <div class="colorscheme-cardradio">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-mode"
                                        id="layout-mode-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check card-radio dark">
                                    <input class="form-check-input" type="radio" name="data-layout-mode"
                                        id="layout-mode-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100 bg-dark"
                                        for="layout-mode-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-soft-light d-block p-1"></span>
                                                    <span class="bg-soft-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-visibility">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Visibility</h6>
                        <p class="text-muted">Choose show or Hidden sidebar.</p>


                    </div>

                    <div id="layout-width">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                        <p class="text-muted">Choose Fluid or Boxed layout.</p>


                    </div>

                    <div id="layout-position">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                        <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                        <div class="btn-group radio" role="group">
                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-fixed" value="fixed">
                            <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                            <input type="radio" class="btn-check" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                    <p class="text-muted">Choose Light or Dark Topbar Color.</p>



                    <div id="sidebar-size">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                        <p class="text-muted">Choose a size of Sidebar.</p>


                    </div>

                    <div id="sidebar-view">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                        <p class="text-muted">Choose Default or Detached Sidebar view.</p>


                    </div>
                    <div id="sidebar-color">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                        <p class="text-muted">Choose a color of Sidebar.</p>


                        <!-- end row -->

                        <div class="collapse" id="collapseBgGradient">

                        </div>
                    </div>

                    <div id="sidebar-img">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
                        <p class="text-muted">Choose a image of Sidebar.</p>


                    </div>

                    <div id="preloader-menu">
                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Preloader</h6>
                        <p class="text-muted">Choose a preloader.</p>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-preloader"
                                        id="preloader-view-custom" value="enable">
                                    <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                        <!-- <div id="preloader"> -->
                                        <div id="status" class="d-flex align-items-center justify-content-center">
                                            <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                        <!-- </div> -->
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Enable</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-preloader"
                                        id="preloader-view-none" value="disable">
                                    <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Disable</h5>
                            </div>
                        </div>
                    </div>
                    <!-- end preloader-menu -->

                </div>
            </div>

        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy
                        Now</a>
                </div>
            </div>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/plugins.js"></script>
    <!-- prismjs plugin -->
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/list.js/list.min.js"></script>
    <script src="assets/libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- validation init -->
    <script src="assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    {{-- <script src="assets/js/pages/passowrd-create.init.js"></script> --}}
    <script src="assets/js/pages/password-new.init.js"></script>

    <!-- listjs init -->
    <script src="assets/js/pages/listjs.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    @if (Session::has('Success'))
        <script>
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Berhasil !</h4><p class="text-muted mx-4 mb-0">{{ Session::get('Success') }}</p></div></div>',
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Kembali",
                buttonsStyling: false,
                showCloseButton: true,
            });
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <script>
                Swal.fire({
                    html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...!</h4><p class="text-muted mx-4 mb-0">{{ $item }}</p></div></div>',
                    showCancelButton: !0,
                    showConfirmButton: !1,
                    cancelButtonClass: "btn btn-primary w-xs mb-1",
                    cancelButtonText: "Tutup",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                });
            </script>
        @endforeach
    @endif

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        var search = document.querySelector('#search');
        search.onfocus = function() {
            search.onkeyup = function(e) {
                e.preventDefault();
                var search = $('#search').val();
                console.log(search);
                $.ajax({
                    url: "{{ route('teacher.search') }}",
                    method: 'GET',
                    data: {
                        search: search
                    },
                    success: function(data) {
                        console.log(data.status);
                        $('.table-data').html(data);
                        if (data.status == 'not_found') {
                            $('.noresult').show();
                        }
                    }
                })
            }
        }
    </script>

    <!-- TODO: Edit ketika dihapus masih tidak bisa, coba cara lain -->
    {{-- <script>
        function update(id) {
            var nip = document.getElementById('nip-' + id).value;
            var name = document.getElementById('name-' + id).value;
            var get_email = document.getElementById('email-' + id).value;
            var email = get_email + "@gmail.com";
            var gender = document.getElementById('gender-' + id).value;
            var phone = document.getElementById('hp-' + id).value;
            var address = document.getElementById('address-' + id).value;
            var password = document.getElementById('password-input-' + id).value;

            console.log(email);

            $.ajax({
                url: "{{ route('teacher.update', ['id' => $teachers->id]) }}",
                type: "POST",
                data: {
                    nip: nip,
                    name: name,
                    email: email,
                    gender: gender,
                    phone: phone,
                    address: address,
                    password: password,
                    _token: '{{csrf_token()}}', // CSRF token
                    _method: 'PUT' // Method spoofing to make a PUT request
                },
                success: function (response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                   console.log(textStatus, errorThrown);
                }
            });

        }
    </script> --}}


</body>

</html>
