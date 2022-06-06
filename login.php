<?php
include("includes/db.php");
include("functions/functions.php");

session_start();

if (isset($_SESSION['user'])) {
    header('location: ./index.php');
    exit;
}

// Login do utilizador
if (isset($_POST['login'])) {
    // Parâmetros do formulário
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Validar dados de entrada
    $errors = [];
    if (empty($email)) {
        $errors[] = 'Preencha o email';
    }
    if (empty($password)) {
        $errors[] = 'Preencha a password';
    }

    if (!empty($errors)) {
        setcookie('login_errors', serialize($errors), time() + 10);

        header('Location: ' . $_SERVER['PHP_SELF'] . '?fail=validation');

        exit;
    }

    // Obter utilizador da BD
	
    $sqlUser    = "SELECT * FROM users WHERE user_email = 
	'$email' AND user_pass = '" . sha1($password) . "' LIMIT 0, 1";
    
	$resultUser = mysqli_query($con, $sqlUser);
    $user       = mysqli_fetch_assoc($resultUser);

    // Se encontrarmos o utilizador, fazemos login
    if ($user !== null) {
        $_SESSION['user'] = $user;

        header('Location: ./index.php');
        exit;
    } else {
        header('Location: ' . $_SERVER['PHP_SELF'] . '?fail=no_user');
        exit;
    }
}
?>
<!doctype html>
<html lang="pt">
    <head>
        <title>Kaus Store - Login</title>

        <?php include('./views/structure/head.php'); ?>
		<?php include('./views/navbar.php'); ?>
		

        <head/>

    <body>
        

        <div class="container py-5 mt-5 mb-5">
            <form method="post">
                <?php
                if (isset($_GET['fail'])) {
                    if ($_GET['fail'] === 'no_user') {
                        echo '<p class="alert alert-danger">Utilizador não encontrado!</p>';
                    }

                    if ($_GET['fail'] === 'validation') {
                        $errors = unserialize($_COOKIE['login_errors'] ?? []);

                        echo '<p>Validação falhou!</p>';
                        echo '<ul>';

                        foreach ($errors as $error) {
                            echo '<li>' . $error . '</li>';
                        }

                        echo '</ul>';
                    }
                }
                ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>

                    <a href="register.php" style="text-decoration:none; color:black;">Regista-te Aqui</a>
                </div>
            </form>
        </div>
<footer>
        <?php include('./views/footer.php'); ?>
</footer>
        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
