<?php
	include("includes/db.php");
		$user=$_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user= mysqli_query($con,$get_user);
		$row_user = mysqli_fetch_array($run_user);
		$email = $row_user['user_email'];
		$pass = $row_user['user_pass'];
		$name = $row_user['user_name'];
		$city = $row_user['user_city'];
		$contact = $row_user['user_contact'];

?>
	<form action="register.php?id<?php echo $id;?>" method="post" enctype="multipart/form-data">
				<table align="center" width="500" style="margin-top:100px; color:black;">

					<tr>
						<td><h2>Atualiza a tua Conta</h2></td>
					</tr>
					
						<tr>
						<td align="right">Email</td>
						<td><input type="text" name="email" value="<?php echo $email;?>" required/></td>
						</tr>
						
						<tr>
						<td align="right">Password</td>
						<td><input type="password" name="pass" value="<?php echo $pass;?>" </td>
						</tr>


						<tr>
						<td align="right">Nome</td>
						<td><input type="text" name="name" value="<?php echo $name;?>" </td>
						</tr>
																	
						<tr>
						<td align="right">Cidade</td>
						<td>
						<select name="city">
						<option> <?php echo $city;?></option>
						<option> Porto</option>
						<option> Lisboa</option>
						<option> Braga</option>
						<option> Guimarães</option>
						<option> Bragança</option>
						</select>
						</td>
						
						<tr>
						<td align="right"> Contacto </td>
						<td><input type="text" name="contact" value="<?php echo $contact;?>" required/></td>
						</tr>
						
						<tr>
						<td><input type="submit" name="update" value="Alterar Dados"/></td>
						</tr>
						</table>
				</form>



<?php
if(isset($_POST['update'])){
	
	$ip=getIP();
	$user_id=$_GET['id'];
	$email= $_POST['email'];
	$pass= $_POST['pass'];
	$name= $_POST['name'];
	$city= $_POST['city'];
	$contact= $_POST['contact'];

	$update_u = "update users ser user_name=$name, user_email='$email', user_pass='$pass',user_name='$name', user_city='$city', user_contact='$contact' where user_id='$user_id'";
	$run_update = mysqli_query($con, $update_u);
	
	if($run_update){
		echo "<script>alert('Atualizou a conta com sucesso!')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
	}
}
?>

