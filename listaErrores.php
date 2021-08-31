<?php

//* Obtenemos el dato desde GET['error'] evaluamos el tipo de error
//* con SWITCH e imprimimos segun el error a mostrar
if(isset($_GET['error'])){
    echo '<div class="alert alert-danger" role="alert">';
    switch($_GET['error']){
        case "1": 
            echo "Usuario o Contraseña Incorrectos";
            break;
        case "2":
            echo "Los Passwords No Coinciden";
            break;
        case "3":
            echo "Favor de ingresar un correo";
            break;
        case "4":
            echo "Favor de ingresar su nombre";
            break;
        case "5":
            echo "Favor de ingresar su apellido paterno";
            break;
        case "6":
            echo "Favor de ingresar su apellido materno";
            break;
        case "7":
            echo "El campo Estado se encuentra vacio";
            break;
    }
    echo "</div>";
}