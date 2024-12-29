<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
<<<<<<< HEAD

                <a class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}" href="{{ url('admin/dashboard')}}">
=======
                <a class="nav-link" href="{{ url('admin/dashboard')}}">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>

                <!-- Category Section -->
<<<<<<< HEAD
                <a class="nav-link {{Request::is('admin/faculty') ? 'active' : ''}}" href="{{ url('admin/faculty/')}}">
=======
                <a class="nav-link" href="{{ url('admin/faculty/')}}">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                    <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                    Faculty
                </a>

<<<<<<< HEAD
                <!-- post Section -->
                <a class="nav-link {{Request::is('admin/post'  , 'admin/add-post' , 'admin/edit-post') ? 'active' : ''}}" href="{{ url('admin/post')}}">
=======
                <!-- Subcategory Section -->
                <a class="nav-link" href="{{ url('admin/post')}}">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                </a>
                

<<<<<<< HEAD
                <a class="nav-link {{Request::is('admin/users') ? 'active' : ''}}" href="{{ url('admin/users')}}">
=======
                <a class="nav-link" href="{{ url('admin/users')}}">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>

<<<<<<< HEAD
                
              

                <!-- Pages Section -->
                <a class="nav-link collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
=======
                <!-- Posts Section -->
              

                <!-- Pages Section -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @auth
                {{ Auth::user()->name }} | Admin
            @endauth
        </div>
    </nav>
</div>
