    <!-- Main page content -->
    <main role="main" class="flex-shrink-0">
      <!-- Jumbo Home -->
      <div class="jumbotron jumbohome">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="cc-light">
                <i class="fas fa-info"></i>
                <center><h4 class="font-weight-bold">Recursos de apoyo para el aprendizaje</h4></center>
                <p>Ponemos a tu alcance una selección con más de <strong>4,000</strong> recursos de fuentes confiables, para apoyar a estudiantes, docentes y familias en sus actividades académicas.</p>
                <p>Selecciona el área de conocimiento, nivel educativo y grado que deseas en el buscador siguiente. Puedes consultar varios niveles y grados a la vez.</p>
                <p>Si deseas proponer un recurso o tienes una sugerencia, escribe por favor a <a style="font-size:0.8em;" href="mailto:contacto@proyectoeducativo.org">contacto@proyectoeducativo.org</a></p>
                <center><p><strong>VAMOS A CUIDARNOS TODOS.</strong></p></center>
              </div>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">

              <div class="row">

                <div class="col-12 col-md-6 col-lg-3">
                  <label for="slc_area">Área / tema</label>
                  <select id="slc_area" class="form-control">
                    <option value='0'>TODOS</option>
                    <?php foreach ($c_area as $key => $value) { ?>
                        <option value="<?=$v = ($value['sub_area'] != 'sub_area') ? $value['idsubarea'] : $value['idarea']?>"
                  style="<?=$style = ($value['sub_area'] == 'sub_area')?'font-weight: bold':''?>"
                  data-tipo="<?=$tipo = ($value['sub_area'] == 'sub_area')?'P':'H'?>">
                  <?=$area = ($value['sub_area'] != 'sub_area')?'&nbsp; &nbsp;'.$value['sub_area']:$value['area']?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-12 col-md-6 col-lg-2">
                  <label for="slc_nivel">Nivel</label>
                  <select id="slc_nivel" class="form-control">
                    <option value='0'>TODOS</option>
                    <?php foreach ($c_nivel as $key => $value) { ?>

                      <option value="<?= $value['idnivel'] ?>" <?= $selected = ($value['idnivel'] == $nivel) ? 'selected' : '' ?>><?= $value['nivel'] ?></option>
                    <?php } ?>
                  </select>
                </div>



                <div class="col-12 col-md-6 col-lg-2">
                  <label for="slc_grado">Grado / Semestre</label>
                  <select id="slc_grado" class="form-control">
                    <option value='0'>TODOS</option>
                    <?php foreach ($c_grado as $key => $value) { ?>

                      <option value="<?= $value['grado'] ?>" <?= $selected = ($value['grado'] == $grado) ? 'selected' : '' ?>><?= $value['grado'] ?>°</option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                   <label for="inp_pclave">Palabras clave</label>
                   <form autocomplete="off" action="">
                    <div class="autocomplete" >
                      <input id="inp_pclave" type="text" name="inp_pclave" placeholder="Escriba palabras clave" class="form-control">
                    </div>
                  </form>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                  <label for="btn_buscar_filtro"></label><br>
                  <button class="btn btn-lg bc-1 btn-block text-white" id="btn_buscar_filtro">Buscar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- END Jumbo Home -->




      <!-- Some About -->

      <section class="page-section text-white mb-0" id="about">
        <div class="container" data-aos="zoom-in" data-aos-duration="1000">

          <!-- About Section Heading -->
          <h2 class="page-section-heading text-center text-uppercase text-white line-behind"><span>Somos</span></h2>

          <!-- About Section Content -->
          <div class="row mt-5 justify-content-md-center">
            <div class="col-lg-8">
              <p class="lead text-justify">Una institución especializada en elevar la calidad y la equidad de la educación mediante la asesoría, el diseño y el acompañamiento de acciones innovadoras en la educación básica y media superior.</p>
              <p class="lead text-justify">Contribuimos a que el sistema educativo ofrezca un mejor servicio educativo, eleve su percepción entre la población y se ubique como referente nacional.</p>
            </div>
          </div>

          <!-- About Section Button -->
          <div class="text-center mt-4">
            <a class="btn btn-xl btn-outline-light" href="<?= base_url('Somos'); ?>">
              <i class="fas fa-plus-square"></i>
              Leer más
            </a>
          </div>

        </div>
      </section>
      <!-- END Some About -->

      <!-- We do... Boxes -->

      <section id="services">
        <div class="container">
          <div class="row mb-3">

            <div class="col-lg-12 text-center" data-aos="zoom-in">
              <!--  <h2 class="section-heading text-uppercase line-behind"><span>Que hacemos</span></h2>
                 <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
          </div>

          <div class="row justify-content-center text-center no-gutters">

            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/modelo_apa'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x fc-1">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-puzzle-piece fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Política educativa - Modelo APA</h5>
                        <!-- <div class="badge bc-1 text-wrap text-white" style="width: 6rem;">
                        Leer más
                      </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </a>



            </div>

            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Formacion_Docente'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x fc-2">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-chalkboard-teacher fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Formación continua para docentes</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>

            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Gestion_Escolar'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x fc-3">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-user-tie fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Capacitación de directores y supervisores</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>



            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Asistencia_Permanencia'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x fc-4">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-clipboard-list fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Impulso a la asistencia y permanencia</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Evaluacion_Aprendizaje'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x text-warning">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-book-reader fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Evaluación del aprendizaje</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>

            <div class="d-none d-lg-block d-xl-block w-100"></div>

            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Sistemas_Informacion'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x fc-5">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-layer-group fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold mb-0">Sistemas de información educativa</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>


            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="<?= base_url('Hacemos/Descarga_Administrativa'); ?>" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x text-info">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-business-time fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Descarga administrativa</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>

            <div class="col-md-6 col-lg-4" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">

              <a href="#" class="text-decoration-none" role="button" aria-pressed="true">
                <div class="card mb-3 sm-box-1">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-4">
                      <span class="fa-stack fa-3x text-success m-0 p-0">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-square fa-stack-2x square"></i>
                        <i class="fas fa-hand-holding-usd fa-stack-1x"></i>
                      </span>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">Optimización de recursos</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </a>

            </div>


          </div>




          <!-- <div class="row justify-content-center text-center mt-5">
              <div class="col-md-3 box" data-aos="flip-right" data-aos-delay="0" data-aos-duration="1000">
                <span class="fa-stack fa-4x icon">
                  <i class="fas fa-circle fa-stack-2x text-info"></i>
                  <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading text-info">Diagnósticos</h4>
                <p class="text-muted px-4">Creemos en que las mejores decisiones se sustentan en el conocimiento amplio de la realidad.</p>
                <a class="btn btn-info" href="#" role="button">Leer mas</a>
              </div>
              <div class="col-md-3 box" data-aos="flip-right" data-aos-delay="200" data-aos-duration="1000">
                <span class="fa-stack fa-4x icon">
                  <i class="fas fa-circle fa-stack-2x text-secondary"></i>
                  <i class="far fa-thumbs-up fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading text-secondary">Viabilidad</h4>
                <p class="text-muted px-4">Las soluciones que proponemos consideran en todo momento su viabilidad en el sentido más amplio.</p>
                <a class="btn btn-secondary" href="#" role="button">Leer mas</a>
              </div>
              <div class="col-md-3 box" data-aos="flip-right" data-aos-delay="300" data-aos-duration="1000">
                <span class="fa-stack fa-4x icon">
                  <i class="fas fa-circle fa-stack-2x text-warning"></i>
                  <i class="fas fa-rocket fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading text-warning">Implementación</h4>
                <p class="text-muted px-4">El centro de las acciones tiene que ser siempre el mejoramiento de la calidad y equidad del aprendizaje.</p>
                <a class="btn btn-warning text-white" href="#" role="button">Leer mas</a>
              </div>
            </div> -->
        </div>
      </section>
      <!-- END We do... Boxes -->


      <!-- Main Features -->
      <section class="showcase">
        <div class="container-fluid p-0">
          <div class="row no-gutters">

            <div class="col-12 col-lg-6 text-white showcase-parent">
              <div class="showcase-child img-1"></div>
            </div>

            <div class="col-12 col-lg-6 p-5 my-auto showcase-text" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
              <h4 class="text-white font-weight-bold mb-3">¿Cómo lo logramos?</h4>

              <ol class="fa-ul text-justify">
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Enfatizamos en los temas que puedan tener un efecto mayor para la mejora educativa y que además tengan viabilidad legal, presupuestal, operativa y política.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Partimos del principio de que lo más importante son las personas, de manera que la mejora debe sustentarse en el desarrollo de las capacidades.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Sustentamos nuestras recomendaciones en la investigación aplicada para combinar rigor técnico y metodológico con sentido práctico.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Focalizamos nuestras acciones en aquellas escuelas, modalidades y regiones en donde sus efectos pueden ser mayores, con lo que atendemos equidad y calidad a la vez.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Buscamos siempre la sustentabilidad al corto, mediano y largo plazos. Por ello nos orientamos a acciones que requieren muy pocos o nulos recursos financieros adicionales.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Llevamos a cabo un acompañamiento muy cercano a la implementación, que incluye el contacto directo y continuo con la comunidad escolar y los padres de familia.</span></li>
                <li class="mb-2"><span class="fa-li fa-lg my-2"><i class="fas fa-arrow-right fa-pull-right fa-border mr-3"></i></span><span class="text-white">Nos ponemos la camiseta de nuestros clientes, pues nos sentimos corresponsables de las acciones como parte de un equipo del que queremos contribuir a desarrollar.</span></li>
              </ol>
              <!-- <div class="text-center mt-4">
                      <a class="btn btn-xl btn-outline-light" href="#">
                        <i class="fas fa-download mr-2"></i>
                        Leer más
                      </a>
                    </div> -->
            </div>
          </div>

        </div>
      </section>
      <!-- END Main Features -->


      <!-- Campos Slider -->
      <div id="carouselcampos" class="carousel slide" data-ride="carousel">

        <div class="container" data-aos="zoom-in" data-aos-duration="1000">
          <!-- About Section Heading -->
          <h2 class="page-section-heading text-center text-uppercase text-white line-behind mb-5"><span>Hacemos</span></h2>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Política educativa y Modelo APA</h2>
                  <p>El Modelo de Asistencia, Permanencia, Aprendizaje (APA), un referente de la gestión educativa nacional.</p>
                  <a href="<?= base_url('Hacemos/modelo_apa'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-1.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Formación continua para docentes</h2>
                  <p>Con capacitación de calidad construimos y avanzamos.</p>
                  <a href="<?= base_url('Hacemos/Formacion_Docente'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-3.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Capacitación de directores y supervisores</h2>
                  <p>Esencial en toda estrategia que aspire a la mejora educativa.</p>
                  <a href="<?= base_url('Hacemos/Gestion_Escolar'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-4.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Asistencia y permanencia escolares</h2>
                  <p>Cada alumno es el más importante: todos a la escuela.</p>
                  <a href="<?= base_url('Hacemos/Asistencia_Permanencia'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-2.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Evaluación del aprendizaje</h2>
                  <p>La evaluación educativa aún está por mostrar sus mayores beneficios.</p>
                  <a href="<?= base_url('Hacemos/Evaluacion_Aprendizaje'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-7.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Sistemas de información para la gestión educativa</h2>
                  <p>Que favorezcan los procesos de toma de decisión.</p>
                  <a href="<?= base_url('Hacemos/Sistemas_Informacion'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-5.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row align-items-center no-gutters">
                <div class="col-lg-6 cc-light">
                  <h2>Descarga administrativa</h2>
                  <p>Reducir la carga administrativa del personal de las escuelas.</p>
                  <a href="<?= base_url('Hacemos/Descarga_Administrativa'); ?>" class="btn btn-lg btn-outline-secondary" role="button" aria-pressed="true">Leer más</a>
                </div>
                <div class="d-none d-lg-block col-lg-6"><img src="<?= base_url('assets/img/home/ct-slider/ct-slider-6.jpg'); ?>" class="img-fluid" alt="Responsive image"></div>
              </div>
            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselcampos" role="button" data-slide="prev">
          <span class="arrow" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselcampos" role="button" data-slide="next">
          <span class="arrow" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
      <!-- END Main Slider -->


      <!-- News -->
      <section class="page-section mb-0" id="news">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center" data-aos="zoom-in">
              <h2 class="section-heading text-uppercase line-behind"><span>Noticias</span></h2>
              <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6 mb-8">
              <div class="card tweets">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0"></script>
                <div class="fb-page" data-href="https://es-la.facebook.com/proyectoeducativosc" data-tabs="timeline" data-width="2500" data-height="435" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                  <blockquote cite="https://es-la.facebook.com/proyectoeducativosc" class="fb-xfbml-parse-ignore"><a href="https://es-la.facebook.com/proyectoeducativosc">Proyecto Educativo SC</a></blockquote>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card tweets">


                <a class="twitter-timeline" data-lang="es" data-height="435" data-theme="light" data-link-color="#FAB81E" href="https://twitter.com/Proyed?ref_src=twsrc%5Etfw">Tweets by Proyed</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- END News -->

    </main>
    <!-- END Main page content -->
    <script src="<?= base_url('assets/js/autocomplete.js'); ?>"></script>
    <script src="<?= base_url('assets/js/informacion_apoyo.js'); ?>"></script>
