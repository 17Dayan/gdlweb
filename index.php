<?php include_once 'includes/templates/header.php'; ?>
    <section class="seccion contenedor">
        <h2>LA MEJOR CONFERENCIA DE DISEÑO WEB EN ESPAÑOL</h2>
        <p>Le Lorem Ipsum est simplementmise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de
            polices de texte du faux texte employé dans la composition et la mise en page avant impression</p>

    </section>
    <!--seccion-->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogv">
      </video>
        </div>
        <!--contenedor video-->
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>PROGRAMA DEL EVENTO</h2>
                    <?php
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT * FROM `categoria_evento`";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
              ?>

                       <nav class="menu-programa">
                          <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                            <?php $categoria = $cat['cat_evento']; ?>
                                <a href="#<?php echo strtolower($categoria) ?>">
                                      <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                                </a>
                          <?php } ?>
                        </nav>

   
                        <?php
                            try {
                              require_once('includes/funciones/bd_conexion.php');
                              $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 1 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                              $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 2 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                              $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                              $sql .= "FROM `eventos` ";
                              $sql .= "INNER JOIN `categoria_evento` ";
                              $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                              $sql .= "INNER JOIN `invitados` ";
                              $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                              $sql .= "AND eventos.id_cat_evento = 3 ";
                              $sql .= "ORDER BY `evento_id` LIMIT 2;";
                            } catch (Exception $e) {
                              $error = $e->getMessage();
                            }
                         ?>

<?php $conn->multi_query($sql); ?>    

        <?php
                do {
                     $resultado = $conn->store_result();
                    $row = $resultado->fetch_all(MYSQLI_ASSOC);    ?>

                 <?php $i = 0; ?>
                 <?php foreach($row as $evento): ?>
                 <?php if($i % 2 == 0) { ?>
                 <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
          <?php } ?>
                  <div class="detalle-evento">
                      <h3><?php echo html_entity_decode($evento['nombre_evento']) ?></h3>
                      <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                      <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?></p>
                      <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " .  $evento['apellido_invitado']; ?></p>
                  </div>
                       <?php if($i % 2 == 1): ?>
                <a href="calendario.php" class="button float-right">Ver todos</a>
                 </div> <!--#talleres-->
          <?php endif; ?>
                 <?php $i++; ?>
                 <?php endforeach; ?>
                 <?php $resultado->free(); ?>
          <?php  } while ($conn->more_results() && $conn->next_result());?>

                </div>
                <!--programa evento-->
            </div>
            <!--contenedor-->
        </div>
        <!--contenido del programa-->
    </section>
    <!--programa-->

    <section class="invitados contenedor seccion">
        <h2>NUESTRIS INVITADOS</h2>
        <ul class="lista-invitados clearfix">
            <li>
                <div class="invitado">
                    <img src="img/invitado1.jpg" alt="imagen invitadi">
                    <p>RAFAEL BAUTISTA</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado2.jpg" alt="imagen invitadi">
                    <p>SHARIT HERRERA</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado3.jpg" alt="imagen invitadi">
                    <p>GREGORIO SANCHEZ</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado4.jpg" alt="imagen invitadi">
                    <p>SUSANA RIVERA</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado5.jpg" alt="imagen invitadi">
                    <p>HAROLD GARCIA</p>
                </div>
            </li>
            <li>
                <div class="invitado">
                    <img src="img/invitado6.jpg" alt="imagen invitadi">
                    <p>SUSAN SANCHEZ</p>
                </div>
            </li>
        </ul>
    </section>


    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero"></p> Invitados</li>
                <li>
                    <p class="numero"></p> Talleres</li>
                <li>
                    <p class="numero"></p> Días</li>
                <li>
                    <p class="numero"></p> Conferencias</li>

            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>PRECIOS</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>PASE POR DIA</h3>
                        <p class="numero">30</p>
                        <ul>
                            <li>BOCADILLOS GRATIS</li>
                            <li>TODAS LAS CONFERENCIAS</li>
                            <li>TODOS LOS TALLERES </li>
                        </ul>
                        <a href="#" class="button hollow">comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>TODOS LOS DIAS</h3>
                        <p class="numero">50</p>
                        <ul>
                            <li>BOCADILLOS GRATIS</li>
                            <li>TODAS LAS CONFERENCIAS</li>
                            <li>TODOS LOS TALLERES </li>
                        </ul>
                        <a href="#" class="button">comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>PASE POR DOS DIAS</h3>
                        <p class="numero">45</p>
                        <ul>
                            <li>BOCADILLOS GRATIS</li>
                            <li>TODAS LAS CONFERENCIAS</li>
                            <li>TODOS LOS TALLERES </li>
                        </ul>
                        <a href="#" class="button hollow">comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <div id="mapa" class="mapa"></div>

    <section class="seccion">
        <h2>TESTIMONIALES</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>Le Lorem Ipsum est simplementmise en page avant impression. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte <span> DISEÑADOR EN @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Le Lorem Ipsum est simplementmise en page avant impression. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte <span> DISEÑADOR EN @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>Le Lorem Ipsum est simplementmise en page avant impression. </p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte <span> DISEÑADOR EN @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>registrate al newsletter</p>
            <h3>GDLWEBCAMP</h3>
            <a href="#" class="button transparente">REGISTRO</a>
        </div>
        <!---contenido-->
    </div>
    <!---newsletter-->

    <section class="seccion">
        <h2>FALTAN</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p>DIAS</li>
                <li>
                    <p id="horas" class="numero"></p>horas</li>
                <li>
                    <p id="minutos" class="numero"></p>minutos</li>
                <li>
                    <p id="segundos" class="numero"></p>segundos</li>
            </ul>
        </div>
    </section>


   <?php include_once 'includes/templates/footer.php'; ?>