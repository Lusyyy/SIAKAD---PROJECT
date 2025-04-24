<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar-link {
            color: white;
        }
        .sidebar-link:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 sidebar">
                <div class="d-flex flex-column p-3">
                    <a href="{{ route('dashboard') }}" class="mb-3 mb-md-0 text-white text-decoration-none">
                        <span class="fs-4">SIAKAD</span>
                    </a>
                    <hr class="text-white">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link sidebar-link {{ request()->is('/') ? 'active' : '' }}">
                                <i class="bi bi-house me-2"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mahasiswa.index') }}" class="nav-link sidebar-link {{ request()->is('mahasiswa*') ? 'active' : '' }}">
                                <i class="bi bi-people me-2"></i>Mahasiswa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dosen.index') }}" class="nav-link sidebar-link {{ request()->is('dosen*') ? 'active' : '' }}">
                                <i class="bi bi-person-badge me-2"></i>Dosen
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('matakuliah.index') }}" class="nav-link sidebar-link {{ request()->is('matakuliah*') ? 'active' : '' }}">
                                <i class="bi bi-book me-2"></i>Matakuliah
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('jadwal.index') }}" class="nav-link sidebar-link {{ request()->is('jadwal*') ? 'active' : '' }}">
                                <i class="bi bi-calendar-check me-2"></i>Jadwal
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('krs.index') }}" class="nav-link sidebar-link {{ request()->is('krs*') ? 'active' : '' }}">
                                <i class="bi bi-clipboard-check me-2"></i>KRS
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('presensi.index') }}" class="nav-link sidebar-link {{ request()->is('presensi*') ? 'active' : '' }}">
                                <i class="bi bi-list-check me-2"></i>Presensi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('golongan.index') }}" class="nav-link sidebar-link {{ request()->is('golongan*') ? 'active' : '' }}">
                                <i class="bi bi-tags me-2"></i>Golongan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('ruang.index') }}" class="nav-link sidebar-link {{ request()->is('ruang*') ? 'active' : '' }}">
                                <i class="bi bi-building me-2"></i>Ruang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pengampu.index') }}" class="nav-link sidebar-link {{ request()->is('pengampu*') ? 'active' : '' }}">
                                <i class="bi bi-person-workspace me-2"></i>Pengampu
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Content -->
            <div class="col-md-9 col-lg-10 content">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>