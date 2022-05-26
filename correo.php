<!DOCTYPE html>
<html lang="en">
<head>
<title>Formulario Correo</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="./styles/correo.css">
<link rel="shortcut icon" href="./img/correo2.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
</head>
<body class="header">

<!--coact start here-->
<h1 class="paddingb2" >Formulario de contacto</h1>
<div class="contact header">
	<div class="contact-main">
		
		<form method="post" action="./enviar-correo-phpmailer/sendemail.php">
			<h3>Correo electrónico</h3>
			<?php
				/*Coje el email por el id*/
				include './proc/conexion.php';
				$id=$_GET['id'];
				
				$sql = "SELECT email_alu FROM tbl_alumne WHERE id_alumne ={$id}";
				$listadoalu= mysqli_query($connection, $sql);
			
				foreach ($listadoalu as $alumno) {
					echo "<div class='input-group mb-3 paddingl paddingr'>";
					echo	"<input type='email' class='form-control' placeholder='your@email.com' value='{$alumno['email_alu']}' name='customer_email' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-default' required>";
					echo "</div>";
				}
			?>
			<!-- <div class="input-group mb-3 paddingl paddingr">
				<input type="email" class="form-control" placeholder="your@email.com" value="1" name="customer_email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
			</div> -->
			<h3>Tu nombre</h3>
			<div class="input-group mb-3 paddingl paddingr">
				<input type="text" class="form-control" placeholder="Your name" name="customer_name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
			</div>
			<h3>Asunto</h3>
			<div class="input-group mb-3 paddingl paddingr">
				<input type="text" class="form-control" placeholder="Subject" name="subject" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
			</div>
			<h3>Mensaje</h3>
			<div class="input-group mb-3 paddingl paddingr">
				<textarea type="text" class="form-control" name="message" placeholder="Leave your message here ...." aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required ></textarea>
			</div>
	</div>
	<div class="enviar">
		<div class="contact-check">
			
		</div>
        <div class="contact-enviar">
		  <input type="submit" value="Enviar mensaje" name="send">
		</div>
		<div class="clear"> </div>
		</form>
	</div>
</div>
<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
	<defs>
		<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
	</defs>
	<g class="parallax">
		<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"></use>
		<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"></use>
		<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"></use>
		<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"></use>
	</g>
</svg>
</div>
<div class="content">
	<div class="paddingt paddingr2">
		<button type="submit" value="Login" onclick="window.location.href = './adminalu.php'" class="btn btn-outline-dark">Atrás</button>
	</div>
</div>
<!--contact end here-->


</body>
</html>