<?php

//* Inicio de las funciones de Sesion 
session_start();


//* Función que revisa si el usuario inicio la sesión
function revisar_usuario () {
    return isset($_SESSION['Email']);
}

//* funcion que en caso de que el usuario no este autenticado lo regresa al login
function usuario_autenticado(){
    //* En caso de que la funcion sea negativa entra al IF
    if(!revisar_usuario()){
        header('Location:login.php');
        exit();
    }
}

//* Uso de las funciones anteriores 
usuario_autenticado();