<?php
//* Se incluye la conexión 
require_once("funciones/conexion.php");

//* Función que registra un Estadp en nuestra base de datos
function registro($conn){   
    //* Obtiene el dato del Estado desde POST
    $estados=$_POST['Estado'];

    //* Valida si el estado esta vacio en caso de si regresa un error
    if($estados=='') {
        header("Location: estados.php?error=7");
    }

    //* SQL que inserta un dato en la tabla estado con el valor que tenemos en $Estados
    $sql="INSERT INTO `estado` (Estado) VALUES ('$estados')";

    //* Valida si el resultado fue correcto devuelve al CRUD
    if( $conn->query($sql) === TRUE ) {
        header('Location: estados-crud.php');
    }else{
        echo "Error";
    }
    $conn->close();
}

//* Funcion que edita el estado identificandolo por medio del ID
function editar($conn) {

    $Estado = $_POST['Estado'];
    $id = $_POST['id'];

    // * ACTUALIZAR en ESTADO en el atributo ESTADO el valor de $Estado donde el ID sea igual a $id
    $sql = " UPDATE estado SET Estado='$Estado' WHERE id=$id ";

    //* Valida si el resultado fue correcto devuelve al CRUD
    if( $conn->query($sql) === TRUE) {
        header('Location: estados-crud.php');
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
            echo "eliminar";
            break;
    }
}
