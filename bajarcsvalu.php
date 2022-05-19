<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>
<body>

<?php

include './proc/conexion.php';

$comprobar= "SELECT * FROM tbl_alumne;";
$cons = mysqli_query($connection,$comprobar);

if(!file_exists("bajarusuariosalu.csv")){
    file_put_contents("bajarusuariosalu.csv","DNI;Nombre;1r Apellido;2n Apellido;Correo;Clase:Telefono;Contrasena \n");
} 
foreach ($cons as $value) {

file_put_contents("bajarusuariosalu.csv","{$value['dni_alu']};{$value['nom_alu']};{$value['cognom1_alu']};{$value['cognom2_alu']};{$value['email_alu']};{$value['classe']};{$value['telf_alu']};{$value['passwd_alu']} \n",FILE_APPEND);

}


    ?>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function aviso(url) {
                Swal.fire({
                        title: 'Proceso terminado',
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
</body>
</html>