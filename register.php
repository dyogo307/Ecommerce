<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

if(isset($_POST['register'])){
	
	$email= $_POST['email'];
	$pass= sha1($_POST['pass']);
	$name= $_POST['name'];
	$city= $_POST['city'];
	$contact= $_POST['contact'];

	$insert_u = "insert into users (user_email, user_pass,user_name, user_city, user_contact) values ('$email','$pass','$name','$city','$contact')";
	$run_u = mysqli_query($con, $insert_u);
	
	$run_cart=mysqli_query($con, $sell_cart);
	$check_cart= mysqli_num_rows($run_cart);
	if($check_cart==0){
		$_SESSION['user_email']=$email;
		echo "<script>alert('Conta criada com sucesso!')</script>";
		echo "<script>window.open('home.php','_self')</script>";
	}
	else{
		$_SESSION['user_email']=$email;
		echo "<script>alert('Conta criada com sucesso!')</script>";
		echo "<script>window.open('home.php','_self')</script>";
	}
	    header('Location: ' . $_SERVER['home.php']);

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
        <title>Kaus Store</title>
        <?php include('./views/structure/head.php'); ?>
	<head/>

<body>
        <?php include('./views/navbar.php'); ?>
		
		 <div class="container my-5">
            <h2 class="mb-4">Cria a tua Conta</h2>


            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input class="form-control" name="name" id="name" required>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Cidade:</label>

                    <select name="city" id="city" class="form-select" required>
                        <option value="">Seleciona a tua cidade</option>
                        <option value="Porto" >Porto</option>
                        <option value="Lisboa">Lisboa</option>
                        <option value="Braga">Braga</option>
                        <option value="Guimarães" >Guimarães</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contacto:</label>
                    <input class="form-control" name="contact" id="contact" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
				
				 <div class="mb-3">
                    <label for="pass" class="form-label">Password:</label>
                    <input type="pass" class="form-control" name="pass" id="pass" required>
                </div>

                <button type="submit" class="btn btn-primary" name="register">Cria a tua conta</button>
            </form>
        </div>

        <?php include('./views/footer.php'); ?>

        <?php include('./views/structure/scripts.php'); ?>
 
</body>
</html>




