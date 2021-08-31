<?php
//* Se incluye el codigo de nuestra sesion.php
include_once("funciones/sesion.php");

//* Se incluye la conexion a nuestra base de datos para realizar la consulta
include_once("funciones/conexion.php");

//* Se incluye el codigo de nuestro Header
include_once("templates/header.php");

//* Se incluye el codigo de nuestro navbar
include_once("templates/navbar.php");

//* Se incluye el codigo de nuestro sidebar
include_once("templates/sidebar.php");


// *  VERIFICAMOS si existe el id en nuestra ruta por GET e isset
if( isset($_GET['id']) ) {

  // * TODOS LOS REGISTROS de la tabla estado DONDE el id sea igual al id de GET

  $sql = "SELECT * FROM `estado` WHERE id = " . $_GET['id'];

  // *  Ejecutamos nuestra sentencia $sql en nuestra conexion por el metodo $conn->query()

  $resultado = $conn->query($sql);

  // * Tomamos los registros que obtuvo la consulta por medio del metodo fetch_assoc()
  $resultado = $resultado->fetch_assoc();

  // * Cerramos nuestra conexion a la base de datos
  $conn->close();
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Estados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          //* Se incluye la lista de nuestros Errores
          include('listaErrores.php');
        ?>

        <form action="estados-model.php" method="POST">
          <!-- // * Es la caja de texto donde se introduce el Estado es de tipo text  -->
          <input class="form-control" type="text" name="Estado" placeholder="Estado" value="<?= $resultado['Estado'] ?>" />
          
          <!-- // * Es una caja de texto que no es visible por el usuario y esto nos ayuda a procesar
          //* el tipo en nuestro modelo -->
          <input type="hidden" name="tipo" value="editar" />

          <!-- //* input de type hidden que nos va a ayudar a identificar el id del registro 
               //* a modificar -->
          <input type="hidden" name="id" value="<?= $resultado['id'] ?>" >

          <!-- //* boton tipo submit que envia nuestro formulario -->
          <button class="btn btn-primary btn-block mt-2" type="submit"> Actualizar </button>
        </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once("templates/footer.php");