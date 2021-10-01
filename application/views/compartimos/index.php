<!-- Main page content -->
<main role="main" class="flex-shrink-0">


  <!-- Subpage Header -->

  <section class="page-section sh-trayectoria text-white mb-0" id="subpage-head">
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">

      <!-- Subpage Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white line-behind"><span>Compartimos</span></h2>


    </div>
  </section>
  <!-- END Some About -->


  <!-- We do... Boxes -->

  <section id="subpage_cont0">
    <div class="container pt-0">

      <div class="compartimos">

        <div class="container pt-0">
          <div class="row align-items-center ">
            <div class="d-none d-md-block col-md-6 text-center">
              <img class="img-fluid" src="<?= base_url('assets/img/biblioteca/book-biblioteca.png') ?>">
            </div>
            <div class="col-6">
              <h3 class="fc-4">Biblioteca <span class="fc-1">VIRTUAL</span></h3>
              <p class="text-decoration-none"><span>HERRAMIENTA DE APOYO</span><br> para estudiantes, docentes y familias</p>
              <h4><span class="badge badge-pill bc-1 text-white"><b>Más de 21,000</b> recursos académicos</span></h4>
            </div>
          </div>
        </div>

      </div>
      <div class="row px-5 no-gutters">
        <div class="col">
          <!-- <center><img src="<?= base_url('assets/img/otros/') . $logo ?>" width="230" height="70"></center> -->
          <div class="cc-light px-3">
            <center>
              <h4 class="font-weight-bold">Recursos de apoyo para el aprendizaje</h4>
            </center>
            <p>Ponemos a tu alcance una selección con más de <strong>21,000</strong> recursos de fuentes confiables, para apoyar a estudiantes, docentes y familias en sus actividades académicas.</p>
            <p>Selecciona el área de conocimiento, nivel educativo y grado que deseas en el buscador siguiente. Puedes consultar varios niveles y grados a la vez.</p>
            <p>Si deseas proponer un recurso o tienes una sugerencia, escribe por favor a <a style="font-size:0.8em;" href="mailto:contacto@proyectoeducativo.org">contacto@proyectoeducativo.org</a></p>
            <center>
              <p><strong>VAMOS A CUIDARNOS TODOS.</strong></p>
            </center>
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
                  <option value="<?= $v = ($value['sub_area'] != 'sub_area') ? $value['idsubarea'] : $value['idarea'] ?>" style="<?= $style = ($value['sub_area'] == 'sub_area') ? 'font-weight: bold' : '' ?>" data-tipo="<?= $tipo = ($value['sub_area'] == 'sub_area') ? 'P' : 'H' ?>">
                    <?= $area = ($value['sub_area'] != 'sub_area') ? '&nbsp; &nbsp;' . $value['sub_area'] : $value['area'] ?></option>
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
                <div class="autocomplete">
                  <input id="inp_pclave" title="Puede poner palabras separadas por comas para multiples búsquedas" type="text" maxlength="150" name="inp_pclave" placeholder="Escriba palabras clave" class="form-control">
                </div>
              </form>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
              <label for="btn_buscar_filtro"></label><br>
              <button class="btn bc-1 btn-block text-white" id="btn_buscar_filtro">Buscar</button>
            </div>
          </div>
        </div>
      </div>

  </section>
  <!-- END We do... Boxes -->
</main>
<!-- END Main page content -->
<script src="<?= base_url('assets/js/autocomplete.js'); ?>"></script>
<script src="<?= base_url('assets/js/informacion_apoyo.js'); ?>"></script>