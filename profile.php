<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

$userQuery  = "SELECT * FROM users WHERE user_id = " . $_SESSION['user']['user_id'] . " LIMIT 0, 1";
$userResult = mysqli_query($con, $userQuery);
$user       = mysqli_fetch_assoc($userResult);

if (isset($_POST['update_profile'])) {
    $email   = $_POST['email'];
    $name    = $_POST['name'];
    $city    = $_POST['city'];
    $contact = $_POST['contact'];

    $userUpdateQuqer = "UPDATE users SET user_email = '$email', user_name = '$name', user_city = '$city', user_contact = '$contact' WHERE user_id = " . $user['user_id'];
    mysqli_query($con, $userUpdateQuqer);

    header('Location: ' . $_SERVER['PHP_SELF']);

    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Kaus Store</title>
        <?php include('./views/structure/head.php'); ?>
    </head>

    <body>
        <?php include('./views/navbar.php'); ?>

        <div class="container my-5">
            <h2 class="mb-4">Perfil do utilizador</h2>


            <form action="profile.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input class="form-control" name="name" id="name" value="<?php echo $user['user_name'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Cidade:</label>

                    <select name="city" id="city" class="form-select" required>
                        <option value="">Seleciona a tua cidade</option>
                        <option value="Porto" <?php echo $user['user_city'] == 'Porto' ? 'selected' : '' ?>>Porto</option>
                        <option value="Lisboa" <?php echo $user['user_city'] == 'Lisboa' ? 'selected' : '' ?>>Lisboa
                        </option>
                        <option value="Braga" <?php echo $user['user_city'] == 'Braga' ? 'selected' : '' ?>>Braga</option>
                        <option value="Guimarães" <?php echo $user['user_city'] == 'Guimarães' ? 'selected' : '' ?>>
                            Guimarães
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contacto:</label>
                    <input class="form-control" name="contact" id="contact" value="<?php echo $user['user_contact'] ?>"
                           required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"
                           value="<?php echo $user['user_email'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary" name="update_profile">Atualizar</button>
            </form>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
    </body>
</html>
