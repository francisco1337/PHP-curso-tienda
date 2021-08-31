<?php
//* Se incluye el codigo de nuestra sesion.php
include_once("funciones/sesion.php");

//* Se incluye el codigo de nuestro Header
include_once("templates/header.php");

//* Se incluye el codigo de nuestro navbar
include_once("templates/navbar.php");

//* Se incluye el codigo de nuestro sidebar
include_once("templates/sidebar.php");
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
          <input class="form-control" type="text" name="Estado" placeholder="Estado" />

          <input type="hidden" name="tipo" value="registro" />
          <button class="btn btn-primary btn-block mt-2" type="submit"> Registrar </button>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once("templates/footer.php");