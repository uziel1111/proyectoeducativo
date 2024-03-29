<!-- Main page content -->
<main role="main" class="flex-shrink-0">

  <!-- Subpage Header -->

  <section class="page-section sh-trayectoria text-white mb-0" id="subpage-head">
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">
      <!-- Subpage Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white line-behind"><span>Contáctenos</span></h2>
    </div>
  </section>
  <!-- END Some About -->
  <!-- We do... Boxes -->

  <section id="subpage_cont1">
          <div class="container pt-0">

          <div class="row" id="row-secondary-1">

<div class="col-lg-12 text-justify" data-aos="zoom-in">
<div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-3">
                <h4 class=" ml-0 pl-0 text-center text-white">Use el siguiente formulario para ponerse en contacto con nosotros</h4>
              </div><!-- .col-12 col-xs-12 col-md-12 col-lg-12 -->
            </div><!-- .row -->

</div>
</div>



          <div class="row" id="row-lowgray-1">

<div class="col-lg-12 text-justify" data-aos="zoom-in">
<form action="<?= base_url('Contacto/enviar_correo') ?>" method="POST">
          <div class="form-group">



            <?php
            if( (isset($respuesta_envio)) && (strlen($respuesta_envio)>0) ){ ?>
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                  <div class="alert alert-success text-center" role="alert">
                    <?= $respuesta_envio ?>
                  </div>
                </div><!-- .col-12 col-sm-12 col-md-12 col-lg-12 -->
              </div><!-- .row -->
            <?php } ?>


            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                <label class="font-weight-bold text-secondary">Nombre completo:</label>
                <input type="text" name="nombre_completo" value="" class="form-control" required>
              </div><!-- .col-12 col-sm-12 col-md-12 col-lg-12 -->
            </div><!-- .row -->

            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                <label class="font-weight-bold text-secondary">Número de celular o fijo:</label>
                <input type="text" name="no_celular" value="" class="form-control" required>
              </div><!-- .col-12 col-sm-12 col-md-6 col-lg-6 -->
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                <label class="font-weight-bold text-secondary">Correo electrónico:</label>
                <input type="text" name="correo_electronico" value="" class="form-control">
              </div><!-- .col-12 col-sm-12 col-md-6 col-lg-6 -->
            </div><!-- .row -->

            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-2">
                <label class="font-weight-bold text-secondary">Asunto:</label>
                <input type="text" name="titulo" value="" class="form-control">
              </div><!-- .col-12 col-sm-12 col-md-12 col-lg-12 -->
            </div><!-- .row -->

            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                <label class="font-weight-bold text-secondary">Su mensaje:</label>
                <textarea name="texto_mensaje" rows="4" class="form-control"></textarea>
              </div><!-- .col-12 col-sm-12 col-md-12 col-lg-12 -->
            </div><!-- .row -->

            <div class="row justify-content-md-center">
              <div class="col-12 col-sm-12 col-md-2 col-lg-2 mt-3">
                <button type="submit" name="button" class="btn btn-lg bc-1 btn-block text-white"><i class="fas fa-paper-plane"></i> Enviar</button>
              </div><!-- .col-12 col-sm-12 col-md-2 col-lg-2 -->
            </div><!-- .row -->

          </div><!-- .form-grou -->
        </form>

</div>
</div>















  </div><!-- .container pt-0 -->


</section>
<!-- END We do... Boxes -->


</main>
<!-- END Main page content -->
