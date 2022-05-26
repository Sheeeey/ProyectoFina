<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>CSV Profesores</title>
</head>
<body>


<?php

include './proc/conexion.php';

$comprobar= "SELECT id_professor, dni_prof, nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, d.nom_dept as 'dept', passwd_prof
FROM tbl_professor 
INNER JOIN tbl_dept d
ON dept = d.id_dept;";
$cons = mysqli_query($connection,$comprobar);

if(!file_exists("bajarusuariosprof.csv")){
    file_put_contents("bajarusuariosprof.csv","DNI;Nombre;1r Apellido;2n Apellido;Correo;Clase:Telefono \n");
} 
foreach ($cons as $value) {

file_put_contents("bajarusuariosprof.csv","{$value['dni_prof']};{$value['nom_prof']};{$value['cognom1_prof']};{$value['cognom2_prof']};{$value['email_prof']};{$value['dept']};{$value['telf']} \n",FILE_APPEND);

}


$servidor_ftp="192.168.1.100";
$usuario_ftp="usuarioftp";
$passwd_usuarioftp="qweQWE123";
$file = "bajarusuariosprof.csv";
$nombre_final = "profesores.csv";


$conexion_ftp = ftp_connect($servidor_ftp);

$sesion_ftp = ftp_login($conexion_ftp, $usuario_ftp, $passwd_usuarioftp);


if (ftp_put($conexion_ftp, $nombre_final, $file, FTP_ASCII)) {
} else {

   echo "Hay un problema al subir el archivo $file\n";
   echo "<br><br><a href='adminalu.php'>Volver</a>";
   exit;
}

ftp_close($conexion_ftp);

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