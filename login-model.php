<?php
//* Se incluye la conexión 
require_once("funciones/conexion.php");

//* Funcion que registra un usuario nuevo
function Registro($conn) {

    //* Recibimos el dato del PASSWORD desde post y la almacenamos en una variable
    $Password = $_POST['Password'];
    $RepetirPassword = $_POST['RepetirPassword'];

    //* Si las contraseñas no son iguales regresamos un error al registro
    if($Password != $RepetirPassword) {
        header("Location: registro.php?error=2");
    }

    //* Se asigna un array con un costo que indica la complejidad de nuestro hash y por ende la carga de procesamiento
    $Opciones = [
        'cost' => 12,
    ];

    //* Se realiza un hash de la contraseña a almacenar con el metodo password_hash, la contraseña, el hash PASSWORD_BCRYPT y el costo
    $Password_hashed = password_hash($Password, PASSWORD_BCRYPT, $Opciones);

    $Email = $_POST['Email'];
    $Nombre = $_POST['Nombre'];
    $ApPat = $_POST['ApPat'];
    $ApMat = $_POST['ApMat'];

    if($Email==""){
        header('Location: registro.php?error=3');
    }elseif($Nombre==""){
        header('Location: registro.php?error=4');
    }elseif($ApPat==""){
        header('Location: registro.php?error=5');
    }elseif($ApMat==""){
        header('Location: registro.php?error=6');
    }

    //* Se insertan los datos del usuario en la tabla usuarios
    $sql = "INSERT INTO `usuarios` (`Email`,`Nombre`,`ApPat`,`ApMat`,`Password`) VALUES ('$Email','$Nombre','$ApPat','$ApMat','$Password_hashed')";

    //* Se evalua si el dato fue insertado correctamente en caso de no se muestra el error
    if($conn->query($sql) === TRUE){
        echo "Dato insertado";
    }else{
        echo "Error ".$conn->error;
    }
    //* se cierra la conexión
    $conn->close();    
}

//* Funcion que realiza el inicio de sesión
function Login($conn) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT Password FROM usuarios WHERE Email = '$Email' ";

    $resultado = $conn->query($sql);

    $datos = $resultado->fetch_assoc();


    if(password_verify($Password, $datos['Password'] )) {
        
        session_start();
        $_SESSION['Email']=$Email;

        header('Location: inicio.php');

    }else{
        header('Location: login.php?error=1');
    }

    die($Password);
}


if(isset($_POST['tipo'])) {
    switch ($_POST['tipo']) {
        case 'registro':
            Registro($conn);          
            break;


        case 'login': 
            Login($conn);

            break;


        default:
            # code...
            break;
    }
}


 






