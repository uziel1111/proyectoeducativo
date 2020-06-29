<!-- Main page content -->
<main role="main" class="flex-shrink-0" >

  <!-- Subpage Header -->

  <section class="page-section sh-trayectoria text-white mb-0" id="subpage-head">
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">
      <!-- Subpage Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white line-behind"><span>Recursos de apoyo para el aprendizaje</span></h2>
    </div>
  </section>
  <!-- END Some About -->
  <!-- We do... Boxes -->

  <section id="subpage_cont1">
    <div class="container pt-0">
      <center><img src="<?=base_url('assets/img/otros/').$logo?>" width="200" height="70"></center>
      <div class="row" id="row-lowgray-1">
        <div class="col-lg-12 text-justify" data-aos="zoom-in">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              <strong>Seleccione la opción deseada:</strong>
            </div>
            <div class="col-12 col-md-6 col-lg-6" id="div_pclaves">
              <?php if (strlen($pclave) > 0): ?>
                <label for="pc">Palabras clave aplicadas:</label> 
                <input id="pc" class="form-control" disabled name="" value="<?=$pclave?>">
              <?php endif ?>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
          <div class="row">

            <div class="col-12 col-md-6 col-lg-3">
              <label for="slc_area">Área / tema</label>
              <select id="slc_area" class="form-control">
                <option value='0'>TODOS</option>
                <?php foreach ($c_area as $key => $value) { ?>
                  <option value="<?=$v = ($value['sub_area'] != 'sub_area') ? $value['idsubarea'] : $value['idarea']?>"<?=$selected = (($tipo_slctd == $value['tipo_a']))? 'selected':''?>
                  style="<?=$style = ($value['sub_area'] == 'sub_area')?'font-weight: bold':''?>"
                  data-tipo="<?=$tipo = ($value['sub_area'] == 'sub_area')?'P':'H'?>">
                  <?=$area = ($value['sub_area'] != 'sub_area')?'&nbsp; &nbsp;'.$value['sub_area']:$value['area']?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
              <label for="slc_nivel">Nivel</label>
              <select id="slc_nivel" class="form-control">
                <option value='0'>TODOS</option>
                <?php foreach ($c_nivel as $key => $value) { ?>

                  <option value="<?=$value['idnivel']?>" <?=$selected = ($value['idnivel'] == $nivel)? 'selected':''?> ><?=$value['nivel']?></option>
                <?php } ?>
              </select>
            </div>



            <div class="col-12 col-md-6 col-lg-3">
              <label for="slc_grado">Grado / Semestre</label>
              <select id="slc_grado" class="form-control">
               <option value='0'>TODOS</option>
               <?php foreach ($c_grado as $key => $value) { ?>

                 <option value="<?=$value['grado']?>" <?=$selected = ($value['grado'] == $grado)? 'selected':''?>><?=$value['grado']?>°</option>
               <?php } ?>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
            <label for="btn_buscar_filtro"></label><br>
            <button class="btn btn-lg bc-1 btn-block text-white" id="btn_buscar_filtro"><i class="fas fa-search"></i> Buscar</button>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
        <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
        <div class="row">
         <div class="col-12" style="overflow-x:auto;" id="div_tabla">
          <span class="etq-oculta" style="color:#00AE9A;">*Deslice hacia la derecha para ver la tabla completa</span>
          <table class="table table-sm table-borderless dataTables_length" id="tabla_datos">
            <thead>
             <tr>
               <th style="width:60% !important">Nombre del recurso</th>
               <th style="width:15% !important">Fuente</th>
               <th style="width:15% !important">Tipo de recurso</th>
               <th style="width:10% !important">Público objetivo</th>
             </tr>
           </thead>
           <tbody>
            <?php if ($datos_tabla != 'error') { ?>
              <?php foreach ($datos_tabla as $key => $v) { ?>
                <tr>
                 <td><a target="_blank" href="<?=$v['link']?>"><?=$v['nombre']?></a></td>
                 <td><?=$v['fuente']?></td>
                 <td><?=$v['tipo_recurso']?></td>
                 <td><?=$v['publico_objetivo']?></td>
               </tr>
             <?php } ?>
           <?php } ?>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
</div><!-- .container pt-0 -->
</section>
<!-- END We do... Boxes -->
</main>
<!-- END Main page content -->
<script src="<?= base_url('assets/js/informacion_apoyo.js'); ?>"></script>
