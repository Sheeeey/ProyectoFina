<?php

include "./conexion.php";

elseif(isset($_POST["tabla_nom_alu"])) { //Con filtro ALUMNOS
    $sql_query = "SELECT FROM tbl_alumne
    WHERE (dni_alu LIKE \"%{$_POST['tabla_dni_alu']}%\" OR dni_alu IS NULL)
    AND (nom_alu LIKE \"%{$_POST['tabla_nom_alu']}%\" OR nom_alu IS NULL)
    AND (cognom1_alu LIKE \"%{$_POST['tabla_cognom1_alu']}%\" OR cognom1_alu IS NULL)
    AND (cognom2_alu LIKE \"%{$_POST['tabla_cognom2_alu']}%\" OR cognom2_alu IS NULL)
    AND (email_alu LIKE \"%{$_POST['tabla_email_alu']}%\" OR email_alu IS NULL)
    AND (classe LIKE \"%{$_POST['tabla_classe']}%\" OR classe IS NULL)
    AND (telf_alu LIKE \"%{$_POST['tabla_telf_alu']}%\" OR telf_alu IS NULL);";
    
    
    $sql = mysqli_query($connection, $sql_query);
    echo true;
}
elseif (isset($_POST["tbl_professor"])) { //Con filtro PROFESORES
    $sql_query = "SELECT FROM tbl_professor 
    WHERE (id_professor LIKE \"%{$_POST['tabla_id_professor']}%\" OR id_professor IS NULL)
    AND (nom_prof LIKE \"%{$_POST['tabla_nom_prof']}%\" OR nom_prof IS NULL)
    AND (cognom1_prof LIKE \"%{$_POST['tabla_cognom1_prof']}%\" OR cognom1_prof IS NULL)
    AND (cognom2_prof LIKE \"%{$_POST['tabla_cognom2_prof']}%\" OR cognom2_prof IS NULL)
    AND (email_prof LIKE \"%{$_POST['tabla_email_prof']}%\" OR email_prof IS NULL)
    AND (telf_profe LIKE \"%{$_POST['tabla_telf_profe']}%\" OR telf_profe IS NULL)
    AND (dept LIKE \"%{$_POST['tabla_dept']}%\" OR dept IS NULL);";
    $sql = mysqli_query($connection, $sql_query);
    echo true;
}

