<?php
//* Se incluye el codigo de nuestra sesion.php
include_once("funciones/sesion.php");

//* Se incluye el codigo de nuestro Header
//include_once("templates/header.php");

//* Se incluye el codigo de nuestro navbar
include_once("templates/navbar.php");

//* Se incluye el codigo de nuestro sidebar
include_once("templates/sidebar.php");

// * Se incluye conexion a BD
include_once("funciones/conexion.php");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Perfil</h1>
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
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <?php
                  
                  $id = $_SESSION["Id"];
                  $sql = "SELECT * FROM usuarios WHERE idUsuario = $id";
                  $resultado = $conn->query($sql);
                  $resultado = $resultado->fetch_assoc();

                  var_dump($resultado);
                ?>

                <form action="perfil-modelo.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" class="form-control" value="<?= $resultado['Nombre'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" name="ApellidoPaterno" class="form-control" value="<?= $resultado['ApPat'] ?>">
                        </div> 

                        <div class="form-group">
                            <label>Apellido Materno</label>
                            <input type="text" name="ApellidoMaterno" class="form-control" value="<?= $resultado['ApMat'] ?>">
                        </div> 

                        <div class="form-group">
                            <label>Genero</label>
                            <input type="text" name="Genero" class="form-control" value="<?= $resultado['Genero'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Fecha</label>
                            <input type="text" name="Fecha" class="form-control" value="<?= $resultado['FechaNac'] ?>">
                        </div> 

                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="Telefono" class="form-control" value="<?= $resultado['Telefono'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="Email" class="form-control" value="<?= $resultado['Email'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Ciudad</label>
                            <input type="text" name="Ciudad" class="form-control" value="<?= $resultado['Ciudad'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Fraccionamiento</label>
                            <input type="text" name="Fraccionamiento" class="form-control" value="<?= $resultado['Fraccionamiento'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Calle</label>
                            <input type="text" name="Calle" class="form-control" value="<?= $resultado['Calle'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Numero Exterior</label>
                            <input type="text" name="NumeroExterior" class="form-control" value="<?= $resultado['NumExt'] ?>">
                        </div> 

                        <div class="form-group">
                            <label>Numero Interior</label>
                            <input type="text" name="NumeroInterior" class="form-control" value="<?= $resultado['NumInt'] ?>">
                        </div> 

                        <div class="form-group">
                            <label>Codigo Postal</label>
                            <input type="text" name="CodigoPostal" class="form-control" value="<?= $resultado['CodP'] ?>">
                        </div> 
                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-primary">Actualizar</button>

                    </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once("templates/footer.php");



  