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

//* Consulta SQL que SELECCIONA TODO DE la tabla ESTADO
$sql = "SELECT * FROM `rol`";

$resultado = $conn->query($sql);

//$resultado = $resultado->fetch_assoc();

// $conn->close();



?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Roles</h1>
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
          <div class="col-12">
            <div class="card">
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ROL</th>
                    <th>ACCIONES</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php 
                          //* While que itera los datos de nuestra consulta
                          //* Dara una iteración por cada fila de resultado 
                          //* que de la base de datos
                          while($dato = $resultado->fetch_assoc()): 
                    ?>
                          <tr>
                            <!-- Coloca el resultado del ID de la Iteración actual -->
                            <td><?= $dato['id'] ?></td>
                            <!-- Coloca el resultado del  Estado de la Iteración actual -->
                            <td><?= $dato['NombreRol'] ?></td>
                            <td >
                              <div clas="row">
                                
                              <!-- 
                                //*ACTUALIZAR 

                                //*Envia los datos por GET para despues abrir el formulario
                                //*con los valores cargados de ese registro.

                                //*Para ello es necesario enviar el id del elemento para saber
                                //*que elemento cargar en el formulario.
                              -->
                              <div class="col-6">
                                <!-- Coloca el resultado del ID de la Iteración actual -->
                                <a href="rol-actualizar.php?id=<?= $dato['id'] ?>">
                                  <button class="btn btn-warning">Actualizar</button>
                                </a>
                              </div>
                              

                              <!-- 
                                //* ELIMINAR 
                              
                                //* Enviar un formulario por POST a nuestro modelo con el id del
                                //* elemento a eliminar para que nuestro modelo elimine el registro
                                //* deseado.


                              -->
                              <div class="col-6">
                                <!-- Coloca el resultado del ID de la Iteración actual -->
                                <form action="rol-model.php" method="POST">
                                  <input type="hidden" name="id" value="<?= $dato['id'] ?>" />
                                  <input type="hidden" name="tipo" value="eliminar" />
                                  <button type="submit" class="btn btn-danger">
                                    Eliminar
                                  </button>
                                </form>
                              </div>


                              </div>

                              
                              
                            </td>
                          </tr>
                    <?php endwhile; ?>  

                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include_once("templates/footer.php");