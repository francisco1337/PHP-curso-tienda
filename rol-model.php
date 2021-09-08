<?php
//* Se incluye la conexión 
require_once("funciones/conexion.php");

//* Función que registra un Rol en nuestra base de datos
function registro($conn){   
    //* Obtiene el dato del Rol desde POST
    $Rol=$_POST['Rol'];

    //* Valida si el Rol esta vacio en caso de si regresa un error
    if($Rol=='') {
        header("Location: Rol.php?error=8");
    }

    //* SQL que inserta un dato en la tabla estado con el valor que tenemos en $Estados
    $sql="INSERT INTO `rol` (NombreRol) VALUES ('$Rol')";

    if($conn->query($sql)==TRUE){
        header('Location: rol-crud.php');
    }else{
        echo "Error";
    }

    $conn->close();
}

function eliminar($conn){
    //* Se recibe el id por post
    $id = $_POST['id'];

    //* se arma la sentencia SQL que dice = ELIMINAR DE la tabla rol DONDE el id sea igual al $id
    $sql = "DELETE FROM rol WHERE id=$id";

    //* se ejecuta la sentencia SQL en caso de ser ejecutada correctamente redireccionamos al CRUD
    if( $conn->query($sql) === TRUE) {
        header('Location: rol-crud.php');
    }else {
        echo ("Error");
    }
}

//* Funcion que edita el rol identificandolo por medio del ID
function editar($conn) {

    $Rol = $_POST['Rol'];
    $id = $_POST['id'];

    // * ACTUALIZAR en Rol en el atributo NombreRol el valor de $Rol donde el ID sea igual a $id
    $sql = " UPDATE rol SET NombreRol='$Rol' WHERE id=$id ";

    //* Valida si el resultado fue correcto devuelve al CRUD
    if( $conn->query($sql) === TRUE) {
        header('Location: rol-crud.php');
    }
    else {
        echo "Error";
    }
    //* Cerramos nuestra conexion
    $conn->close();

}


//* Evaluamos desde donde recibimos nuestro formulario desde el TIPO
if(isset($_POST['tipo'])){   
    switch ($_POST['tipo']) {
        case 'registro':   
                registro($conn);
            break;
        
        case 'editar':
                editar($conn);
            break;

        case 'eliminar':
                eliminar($conn);
            break;
    }
}
