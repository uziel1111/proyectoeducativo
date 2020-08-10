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
      <div class="row" id="row-lowgray-1">
        <div class="col-lg-12 text-justify" data-aos="zoom-in">

        <form name="form_aprendizaje_esperado" id="form_aprendizaje_esperado">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_nivel_ae">Nivel</label>
              <select id="slc_nivel_ae" class="form-control">
                <option value='0'>SELECCIONE</option>
                <?php foreach ($niveles as $key => $value): ?>
                  <option value='<?=$value['idnivel']?>'><?=$value['nivel']?></option>
                <?php endforeach ?>

              </select>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <label for="slc_componente_ae">Componente</label>
              <select id="slc_componente_ae" class="form-control" disabled>
                <option value='0'>SELECCIONE</option>
              </select>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <label for="slc_campo_ae">Campo</label>
              <select id="slc_campo_ae" class="form-control" disabled>
               <option value='0'>SELECCIONE</option>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_grado_ae">Grador</label>
              <select id="slc_grado_ae" class="form-control" disabled>
               <option value='0'>SELECCIONE</option>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_asignatura_ae">Asignatura</label>
              <select id="slc_asignatura_ae" class="form-control" disabled>
               <option value='0'>SELECCIONE</option>
             </select>
           </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_eje_ae">Eje</label>
              <select id="slc_eje_ae" class="form-control" disabled>
               <option value='0'>SELECCIONE</option>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_tema_ae">Tema</label>
              <select id="slc_tema_ae" class="form-control" disabled>
               <option value='0'>SELECCIONE</option>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
            <label for="btn_buscar_filtro"></label><br>
            <button class="btn btn-lg bc-1 btn-block text-white" id="btn_buscar_filtro_ae"><i class="fas fa-search"></i> Buscar</button>
          </div>
        </div>
        </form>
        <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
        <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
        <div class="row">
         <div class="col-12" style="overflow-x:auto;" id="div_tabla_aprendizajes">

         </div>
   </div>
 </div>
</div>
</div><!-- .container pt-0 -->
</section>
<!-- END We do... Boxes -->
</main>
<!-- END Main page content -->
<script src="<?= base_url('assets/js/aprendizajes_esperados/aprendizajes_e.js'); ?>"></script>
