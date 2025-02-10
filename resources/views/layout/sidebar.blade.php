<div class="sidebar pe-4 pb-3">

    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><a class="fa fa-hashtag me-2"  href="{{ route('home') }}" ></a>Rent Car</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                <span>{{ auth()->user()->role }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link  {{ request()->routeIs('home') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('transaksi') }}" class="nav-item nav-link  {{ request()->routeIs('transaksi') ? 'active' : '' }}"><i class="fa fa-shopping-cart me-2"></i>Transaksi</a>
            <a href="{{ route('transaksiProses') }}" class="nav-item nav-link  {{ request()->routeIs('transaksiProses') ? 'active' : '' }}"><i class="fa fa-user-clock me-2"></i>Transaksi Proses</a>
            <a href="{{ route('transaksiSelesai') }}" class="nav-item nav-link  {{ request()->routeIs('transaksiSelesai') ? 'active' : '' }}"><i class="fa fa-check-circle me-2"></i>Transaksi Selesai</a>
            <a href="{{ route('laporan') }}" class="nav-item nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}"><i class="fa fa-file-archive me-2"></i>Laporan Transaksi</a>
            <a href="{{ route('sewa') }}" class="nav-item nav-link {{ request()->routeIs('sewa') ? 'active' : '' }}"><i class="fa fa-stopwatch me-2"></i>Sewa Mobil</a>
            <a href="{{ route('mobil') }}" class="nav-item nav-link {{ request()->routeIs('mobil') ? 'active' : '' }}"><i class="fa fa-car me-2"></i>Mobil</a>
            <a href="{{ route('users') }}" class="nav-item nav-link {{ request()->routeIs('users') ? 'active' : '' }}"><i class="fa fa-user me-2"></i>User</a>
        
        </div>
    </nav>

</div>