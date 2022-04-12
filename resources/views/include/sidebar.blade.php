<nav id="sidebar"
    v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true "
    style="display:  none;">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <router-link class="sidebar-brand d-flex align-items-center justify-content-center" to="/">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('backend/img/logo/logo2.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3">Easy Inventory</div>
        </router-link>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <router-link class="nav-link" to="/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></router-link>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Employee</span>
            </a>
            <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee</h6>
                    <router-link class="collapse-item" to="/store-employee">Add Employee</router-link>
                    <router-link class="collapse-item" to="/employee">All Employee</router-link>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers"
                aria-expanded="true" aria-controls="collapseSuppliers">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Suppliers</span>
            </a>
            <div id="collapseSuppliers" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Suppliers</h6>
                    <router-link class="collapse-item" to="/store-supplier">Add Suppliers</router-link>
                    <router-link class="collapse-item" to="/supplier">All Suppliers</router-link>

                </div>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
                aria-expanded="true" aria-controls="collapseBootstrap2">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Category</span>
            </a>
            <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <router-link class="collapse-item" to="/store-category">Add Category</router-link>
                    <router-link class="collapse-item" to="/category">All Category</router-link>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
                aria-expanded="true" aria-controls="collapseBootstrap3">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Products</span>
            </a>
            <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <router-link class="collapse-item" to="/store-product">Add Product</router-link>
                    <router-link class="collapse-item" to="/product">All Product</router-link>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
                aria-expanded="true" aria-controls="collapseBootstrap4">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Expense</span>
            </a>
            <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <router-link class="collapse-item" to="/store-expense">Add Expense</router-link>
                    <router-link class="collapse-item" to="/expense">All Expense</router-link>

                </div>
            </div>
        </li>




        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
</nav>
