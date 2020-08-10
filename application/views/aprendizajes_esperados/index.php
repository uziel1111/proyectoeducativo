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
          <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              <!-- <strong>Seleccione la opción deseada:</strong> -->
            </div>
            <div class="col-12 col-md-6 col-lg-6" id="div_pclaves">
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12"><h1>  </h1></div>
          <div class="col-lg-12"><h1>  </h1></div>
        </div>
        <form name="form_aprendizaje_esperado" id="form_aprendizaje_esperado">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_nivel_ae">Nivel</label>
              <select id="slc_nivel_ae" class="form-control">
                <option value='0'>SELECCIONE</option>
                <?php foreach ($niveles as $key => $value): ?>
                  <option <?= (isset($idnivelselec) && $idnivelselec == $value['idnivel'])? "selected":""?> value='<?=$value['idnivel']?>'><?=$value['nivel']?></option>
                <?php endforeach ?>
                
              </select>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_componente_ae">Componente</label>
              <select id="slc_componente_ae" class="form-control" <?= isset($niveles)? "": "disabled"?> >
                <option value='0'>SELECCIONE</option>
                <?php if (isset($componentes)): ?>
                  <?php foreach ($componentes as $key => $value): ?>
                    <option <?= (isset($idcomponenteselec) && $idcomponenteselec == $value['idcomponente'])? "selected":""?> value='<?=$value['idcomponente']?>'><?=$value['componente']?></option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
            </div>
            <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_campo_ae">Campo</label>
              <select id="slc_campo_ae" class="form-control" <?= isset($componentes)? "": "disabled"?> >
               <option value='0'>SELECCIONE</option>
               <?php if (isset($campos)): ?>
                 <?php foreach ($campos as $key => $value): ?>
                   <option <?= (isset($idcamposelec) && $idcamposelec == $value['idcampo'])? "selected":""?> value='<?=$value['idcampo']?>'><?=$value['campo']?></option>
                 <?php endforeach ?>
               <?php endif ?>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_grado_ae">Grador</label>
              <select id="slc_grado_ae" class="form-control" <?= isset($campos)?"":"disabled" ?> >
               <option value='0'>SELECCIONE</option>
               <?php if (isset($grados)): ?>
                 <?php foreach ($grados as $key => $value): ?>
                   <option <?= (isset($idgradoselec) && $idgradoselec == $value['idgrado'])? "selected":""?> value='<?=$value['idgrado']?>'><?=$value['grado']?></option>
                 <?php endforeach ?>
               <?php endif ?>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_asignatura_ae">Asignatura</label>
              <select id="slc_asignatura_ae" class="form-control" <?= isset($grados)? "": "disabled"?>>
               <option value='0'>SELECCIONE</option>
               <?php if (isset($asignaturas)): ?>
                 <?php foreach ($asignaturas as $key => $value): ?>
                   <option <?= (isset($idasignaturaselec) && $idasignaturaselec == $value['idasignatura'])? "selected":""?> value='<?=$value['idasignatura']?>'><?=$value['asignatura']?></option>
                 <?php endforeach ?>
               <?php endif ?>
             </select>
           </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_eje_ae">Eje</label>
              <select id="slc_eje_ae" class="form-control" <?= isset($asignaturas)?"":"disabled" ?>>
               <option value='0'>SELECCIONE</option>
               <?php if (isset($ejes)): ?>
                 <?php foreach ($ejes as $key => $value): ?>
                   <option <?= (isset($idejeselec) && $idejeselec == $value['ideje'])? "selected":""?> value='<?=$value['ideje']?>'><?=$value['eje']?></option>
                 <?php endforeach ?>
               <?php endif ?>
             </select>
           </div>
           <div class="col-12 col-md-6 col-lg-2">
              <label for="slc_tema_ae">Tema</label>
              <select id="slc_tema_ae" class="form-control" <?= isset($ejes)? "":"disabled"?>>
               <option value='0'>SELECCIONE</option>
               <?php if (isset($temas)): ?>
                 <?php foreach ($temas as $key => $value): ?>
                   <option <?= (isset($idtemaselec) && $idtemaselec == $value['idtema'])? "selected":""?> value='<?=$value['idtema']?>'><?=$value['tema']?></option>
                 <?php endforeach ?>
               <?php endif ?>
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
          <?=$vista_aprendizajes?>
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
