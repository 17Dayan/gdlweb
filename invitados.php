<?php include_once 'includes/templates/header.php'; ?>
       
              
              <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                }
                
              
              ?>
              
              <section class="invitados contenedor seccion">
                  <h2>nuestros invitados</h2>
                  <ul class="lista-invitados clearfix">

                  <?php while($invitados = $resultado->fetch_assoc() ) { ?>
                     <li>
                         <div class="invitado">
                             <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']; ?>">
                             <img src="img/<?php echo $invitados(url_imagen)?> alt="imagen invitado">
                             <p><?php echo $invitados['nombre_invitado']. "" . $invitado['apellido_invitado'] ?> </p>
                              
                              </a>
                            </div>
                     </li>

                     <div style="display:none;">
                          <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id']; ?>">
                               <h2><?php echo $invitados['nombre_invitado']."". $inviatados['apellido_invitado']?></h2>  
                               <img src="img/<?php echo $invitados(url_imagen)?> alt="imagen invitado">
                               <?php echo $invitados ['descripcion'] ?></p>
                          </div>
                     </div>
                  <?php } ?>
                  </ul>
        </section>


        
                      <?php 
                            $conn->close();
                       ?>

    
 <?php include_once 'includes/templates/footer.php'; ?>  