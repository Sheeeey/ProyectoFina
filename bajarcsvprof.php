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

$comprobar= "SELECT * FROM tbl_professor;";
$cons = mysqli_query($connection,$comprobar);

if(!file_exists("bajarusuariosprof.csv")){
    file_put_contents("bajarusuariosprof.csv","DNI;Nombre;1r Apellido;2n Apellido;Correo;Clase:Telefono \n");
} 
foreach ($cons as $value) {

file_put_contents("bajarusuariosprof.csv","{$value['dni_prof']};{$value['nom_prof']};{$value['cognom1_prof']};{$value['cognom2_prof']};{$value['email_prof']};{$value['dept']};{$value['telf']} \n",FILE_APPEND);

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

            aviso('./adminp.php');
        </script>
</body>
</html>