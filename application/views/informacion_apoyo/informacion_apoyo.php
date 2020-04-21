<!-- Main page content -->
<main role="main" class="flex-shrink-0" >

  <!-- Subpage Header -->

  <section class="page-section sh-trayectoria text-white mb-0" id="subpage-head">
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">
      <!-- Subpage Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white line-behind"><span>Información de apoyo</span></h2>
    </div>
  </section>
  <!-- END Some About -->
  <!-- We do... Boxes -->

  <section id="subpage_cont1">
    <div class="container pt-0">

      <div class="row" id="row-secondary-1" id="info_apoyo">

        <div class="col-lg-12 text-justify" data-aos="zoom-in">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-3">
              <h4 class=" ml-0 pl-0 text-center text-white">Ponemos a tu alcance una selección de más de 1,300 recursos de fuentes confiables, para apoyar a estudiantes, docentes y familias en sus actividades académicas. <br><br>
 
Selecciona el área del conocimiento, nivel educativo y grado que deseas en el buscador siguiente. Puedes consultar varios niveles y grados a la vez.  <br><br>
 
Si deseas proponer un recurso o tienes una sugerencia, escribe por favor a <a href="mailto:contacto@proyectoeducativo.org">contacto@proyectoeducativo.org</a>  <br>
 
Vamos a cuidarnos <strong>todos</strong>.</h4>
            </div><!-- .col-12 col-xs-12 col-md-12 col-lg-12 -->
          </div><!-- .row -->

        </div>
      </div> 



      <div class="row" id="row-lowgray-1">

        <div class="col-lg-12 text-justify" data-aos="zoom-in">
          <div class="row">
            <label for="">Seleccione la opción deseada:</label>
          </div>
          <div class="row">
            
            <div class="col-3">
                <label for="slc_area">Área</label>
                <select id="slc_area" class="form-control">
                  <option value='0'>TODOS</option>
                <?php foreach ($c_area as $key => $value) { ?>
                    <option value="<?=$value['idarea']?>" <?=$selected = ($value['idarea'] == $area)? 'selected':''?>><?=$value['area']?></option>
                    <?php } ?>
                </select>
              </div>

            <div class="col-3">
              <label for="slc_nivel">Nivel</label>
              <select id="slc_nivel" disabled class="form-control">
                <option value='0'>TODOS</option>
                <?php foreach ($c_nivel as $key => $value) { ?>
                  
                    <option value="<?=$value['idnivel']?>" <?=$selected = ($value['idnivel'] == $nivel)? 'selected':''?> ><?=$value['nivel']?></option>
                    <?php } ?>
                </select>
            </div>
            
              
            
             <div class="col-3">
                <label for="slc_grado">Grado</label>
               <select id="slc_grado" disabled class="form-control">
                 <option value='0'>TODOS</option>
               <?php foreach ($c_grado as $key => $value) { ?>
                 
                   <option value="<?=$value['grado']?>" <?=$selected = ($value['grado'] == $grado)? 'selected':''?>><?=$value['grado']?>°</option>
                   <?php } ?>
               </select>
             </div>
              <div class="col-3">
                <label for="btn_buscar_filtro"></label><br>
                <button class="btn btn-lg bc-1 btn-block text-white" id="btn_buscar_filtro">Buscar</button>
              </div>
          </div>
            <div class="row">
              <br><br>
              <table class="table table-sm table-borderless dataTables_length" id="tabla_datos">
               <thead>
                <tr>
                  <th>Nombre del recurso</th>
                  <th>Fuente</th>
                  <th>Tipo de recurso</th>
                  <th>Público objetivo</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach ($datos_tabla as $key => $v) { ?>
                 <tr>
                  <td><a href="<?=$v['link']?>"><?=$v['nombre']?></a></td>
                  <td><?=$v['fuente']?></td>
                  <td><?=$v['tipo_recurso']?></td>
                  <td><?=$v['publico_objetivo']?></td>
                </tr>
              <?php } ?>
                        </tbody>
                      </table>
            </div>
      </div>
    </div> 
  </div><!-- .container pt-0 -->
</section>
<!-- END We do... Boxes -->
</main>
<!-- END Main page content -->
<script src="<?= base_url('assets/js/informacion_apoyo.js'); ?>"></script>