<div class="menubar">
    <ul id="menu">
        <li><a href="home.php">Home</a></li>
        <?php if (isset($_SESSION['user_email'])) { ?>
            <li><a href="my_account.php">My Account</a></li>
        <?php } ?>
        <li><a href="cart.php">Shopping Cart</a></li>
        <?php if (!isset($_SESSION['user_email'])) { ?>
            <li><a href="register.php">Sign Up</a></li>
            <li><a href='login.php'>Login</a></li>
        <?php } else { ?>
            <li><a href='logout.php'>Logout</a></li>
        <?php } ?>
    </ul>

    <ul id="cats">
        <?php getCats(); ?>
    </ul>
</div>
