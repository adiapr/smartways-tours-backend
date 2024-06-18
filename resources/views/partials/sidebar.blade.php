<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-primary">
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Menu</h4>
            </li>
            <li class="nav-item {{ request()->routeIs('paket-wisata.*') ? 'active' : '' }}">
                <a data-toggle="collapse" href="#Tours">
                    <i class="fas fa-suitcase-rolling"></i>
                    <p>Tours</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->routeIs('paket-wisata.*') ? 'show' : '' }}" id="Tours">
                    <ul class="nav nav-collapse">
                        <li class="{{ request()->routeIs('paket-wisata.create') ? 'active' : '' }}">
                            <a href="{{ route('paket-wisata.create') }}">
                                <span class="sub-item">Create Tours</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('paket-wisata.index') ? 'active' : '' }}">
                            <a href="{{ route('paket-wisata.index') }}">
                                <span class="sub-item">List Tours</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ request()->routeIs('rent-car.*') ? 'active' : '' }}">
                <a data-toggle="collapse" href="#Rent">
                    <i class="fas fa-car-side"></i>
                    <p>Rent Car/Bus</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->routeIs('rent-car.*') ? 'show' : '' }}" id="Rent">
                    <ul class="nav nav-collapse">
                        <li class="{{ request()->routeIs('rent-car.create') ? 'active' : '' }}">
                            <a href="{{ route('rent-car.create') }}">
                                <span class="sub-item">Create Rent</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('rent-car.index') ? 'active' : '' }}">
                            <a href="{{ route('rent-car.index') }}">
                                <span class="sub-item">List Rent</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>