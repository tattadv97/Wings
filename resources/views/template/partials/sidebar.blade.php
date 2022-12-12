<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Muzijat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (auth()->user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data:</h6>
                <a class="collapse-item" href="/product">Product</a>
                <a class="collapse-item" href="/customer">Customer</a>
                <a class="collapse-item" href="/supplier">Supplier</a>
                <a class="collapse-item" href="/unit">Unit Produk</a>
                <a class="collapse-item" href="/register">User</a>
                <a class="collapse-item" href="{{ route('info.edit', ['info' => 'all']) }}">Info Stock</a>
            </div>
        </div>
    </li>
    @endif

    <!-- Nav Item - Utilities Collapse Menu -->
    @if (auth()->user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-file"></i>
            <span>Report</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="{{ route('report.index') }}">Transaction</a>
                <a class="collapse-item" href="{{ route('reportPo.index') }}">PO</a>
                <a class="collapse-item" href="{{ route('reportOperational.index') }}">Operational</a>
            </div>
        </div>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('po.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>PO</span>
        </a>
    </li>
    @endif
    @if (auth()->user()->role == 'User')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Transaction</span>
        </a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('operational.index') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Operational</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
