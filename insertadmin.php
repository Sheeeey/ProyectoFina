<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
include './proc/conexion.php';

$DNI1=$_POST['logDNI'];
$nombre1=$_POST['lognombre'];
$apellido1=$_POST['logapellido1'];
$apellido2=$_POST['logapellido2'];
$email1=$_POST['logemail'];
$telf1=$_POST['logtelf'];
$clase1=$_POST['logclase'];
$pass1=$_POST['logpass'];



// $foto=$_POST['foto'];
// var_dump($_FILES);


// echo $nombre1;
// echo "<br>";
// echo $edad1;
// echo "<br>";
// echo $correo1;
// echo "<br>";
// echo $telefono1;
// echo "<br>";
// echo $apellido1;
// echo "<br>";
// print_r($_FILES);
// echo "<br>";
// print_r($_SERVER);


// echo $foto1['type'];
// echo "<br>";
// echo ($foto1['size'])/1024;



//if (isset(null$email1)) {
    $comprobar= "SELECT email_alu FROM tbl_alumne;";
    $cons = mysqli_query($connection,$comprobar);
    $lista_emails=array();

    while ($fila = mysqli_fetch_assoc($cons)){
        $lista_emails[]=$fila['email_alu']; 
    }
    

    if(!in_array($email1,$lista_emails)){
        $sql = "INSERT INTO tbl_alumne (dni_alu, nom_alu, cognom1_alu,cognom2_alu, email_alu, telf_alu, classe, passwd_alu) VALUES ('$DNI1', '$nombre1', '$apellido1','$apellido2', '$email1', '$telf1','$clase1','$pass1');";
        $insert = mysqli_query($connection, $sql);
?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Usario Creado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('./adminalu.php');
    </script>
    <?php
        header("Location:./adminalu.php");  
    } else{
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'Usario Repetido',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Volver'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    })
            }
    
            aviso('./crear_usuarios.php');
        </script>
        <?php
        header("Location:./crear_usuarios.php");
    }
    ?>
    
    <?php
       
    
//} else {
//    echo "<script>alert('Ya existe este email en nuestra base de datos')</script>'";
//}

 ?>
</body>
</html>
<?php


