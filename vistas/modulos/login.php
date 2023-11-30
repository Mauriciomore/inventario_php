<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <title>Tu Página</title>
</head>
<body>

   <div class="container">
      <div id="back"></div>

      <div class="login-box">
         <div class="login-logo">
            <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 0px 100px">
         </div>

         <div class="login-box-body">
            <p class="login-box-msg">Ingresar al sistema</p>

            <form method="post">
               <div class="form-group has-feedback">
                  <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
               </div>

               <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               </div>

               <div class="row">
                  <div class="col-xs-4">
                     <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                  </div>

                  <!-- Botón para abrir el modal de Agregar Usuario -->
                  <div class="col-xs-6">
                     <button type="button" class="btn btn-success btn-block btn-flat" data-toggle="modal" data-target="#modalAgregarUsuario"style="width: 100%;">Registrarse</button>
                  </div>
               </div>

               

            </form>
         </div>
      </div>
   </div>

   <!--=====================================
   MODAL AGREGAR USUARIO
   ======================================-->
   <div id="modalAgregarUsuario" class="modal fade" role="dialog">
      <!-- MODAL AGREGAR USUARIO -->
   <div class="modal-dialog">
   <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
           
            <div class="form-group">
             
              <div class="input-group">
             
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
             
              <div class="input-group">
             
                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
             
              <div class="input-group">
             
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
             
              <div class="input-group">
             
                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoPerfil">
                 
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
             
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

                  // Utilizando una ruta relativa desde la raíz del proyecto
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/controladores/usuarios.controlador.php';
                  $usrs_controller = new ControladorUsuarios();
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    console_log("POST");
                    if(isset($_POST["ingUsuario"])){
                      console_log("Login");
                      $usrs_controller->ctrIngresoUsuario();
                    }
                    else {
                      console_log("Create");
                      $usrs_controller -> ctrCrearUsuario();
                    }
                  }
                  ?>

      </form>

     </div>
  </div>
</div>

   <!-- Bootstrap JS y jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <!-- JavaScript para limpiar el formulario cuando se cierra el modal -->
   <script>
      $(document).ready(function(){
         $('#modalAgregarUsuario').on('hidden.bs.modal', function () {
            // Limpiar el formulario cuando se cierra el modal
            $(this).find('form')[0].reset();
         });
      });
   </script>

   

</body>
</html>