<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="home.php">Kaus</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php getCats(); ?>
            </ul>

            <ul class="navbar-nav  mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Sign Up</a></li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownUserMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownUserMenuLink">
                            <li><a class="nav-link" href="profile.php">Perfil</a></li>
                            <li><a class="nav-link" href="orders.php">Encomendas</a></li>
                            <li>
                                <div class="nav-link">
                                    <a class="btn btn-secondary d-block" href='logout.php'>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

            <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
