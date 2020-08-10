<!DOCTYPE html>
<html lang="es">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $titulo ?></title>

  <!-- Favicon -->

  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/' . SKIN . '/favicon/apple-touch-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/' . SKIN . '/favicon/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/' . SKIN . '/favicon/favicon-16x16.png') ?>">
  <link rel="manifest" href="<?= base_url('assets/' . SKIN . '/favicon/site.webmanifest') ?>">
  <link rel="mask-icon" href="<?= base_url('assets/' . SKIN . '/favicon/safari-pinned-tab.svg') ?>" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>


  <!-- <link rel="stylesheet" href="<?= base_url('assets/multiselect/css/bootstrap-select.min.css') ?>"> -->

  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="<?= base_url('assets/' . SKIN . '/css/eclase/main-quali.css') ?>">

  <!-- Fontawesome -->

  <script src="https://kit.fontawesome.com/bcaa9c2716.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <!-- GOOGLE FONT -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/' . SKIN . '/css/eclase/style.css') ?>">

  <!-- Icons -->
  <link rel="shortcut icon" href="<?= base_url('assets/' . SKIN . '/favicon/favicon.ico') ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/ui/trumbowyg.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js"></script>
  <script src='<?= base_url('assets/js/utilerias/es.min.js') ?>'></script>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Custom Whatsapp for this template -->
    <link href="<?= base_url('assets/css/whatsapp_style.css'); ?>" rel="stylesheet">

  <script src='<?= base_url('assets/js/utilerias/helpers.js') ?>'></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/fc-3.3.0/kt-2.5.1/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/fc-3.3.0/kt-2.5.1/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      window.onbeforeunload = null;
      Header.irArriba();
    });
  </script>

  <script src='<?= base_url('assets/js/utilerias/trumbowyg.colors.min.js') ?>'></script>
</head>

<body>
  <a class="ir-arriba" title="Volver arriba">
    <span class="fas fa-stack">
      <i class="fas fa-circle fa-stack-2x"></i>
      <i class="fas fa-arrow-up fa-stack-1x fa-inverse"></i>
    </span>
  </a>
  <div>
    <!-- HEADER -->
    <header>
      <!-- COLOR BAR -->
      <!-- <div class="container-fluid color-bar top-fixed clearfix">
        <div class="row">
          <div class="col-sm-1 col-2 bg-color-1">fix bar</div>
          <div class="col-sm-1 col-2 bg-color-2">fix bar</div>
          <div class="col-sm-1 col-2 bg-color-3">fix bar</div>
          <div class="col-sm-1 col-2 bg-color-1">fix bar</div>
          <div class="col-sm-1 col-2 bg-color-2">fix bar</div>
          <div class="col-sm-1 col-2 bg-color-3">fix bar</div>
          <div class="col-sm-1 bg-color-1 hidden-xs">fix bar</div>
          <div class="col-sm-1 bg-color-2 hidden-xs">fix bar</div>
          <div class="col-sm-1 bg-color-3 hidden-xs">fix bar</div>
          <div class="col-sm-1 bg-color-1 hidden-xs">fix bar</div>
          <div class="col-sm-1 bg-color-2 hidden-xs">fix bar</div>
          <div class="col-sm-1 bg-color-3 hidden-xs">fix bar</div>
        </div>
      </div> -->
      <!-- TOP INFO BAR -->
      <div class="top-pattern-bar bg-primary"></div>
      <!-- NAVBAR -->

      <nav class="navbar navbar-expand-lg navbar-light bg-light py-0 shadow-sm bg-custom-1">

        <div class="container">
          <a class="navbar-brand mr-auto" href="">
            <!-- DESCOMENTAR ESTO DESPUÉS DE AJUSTE DE TAMAÑO DE IMAGEN EN HEADER -->

              <img src="<?= base_url('assets/' . SKIN . '/img/template/logo-main.png') ?>" alt="">
          </a>
          <div id="navbarContent" class="collapse navbar-collapse order-sm-12 order-lg-1">
            <ul class="navbar-nav ml-auto flex-row">
              <!-- Megamenu-->

                <!-- Drop Usuario -->
                <li class="nav-item dropdown megamenu">
                  <a id="megamenu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle font-weight-bold text-uppercase">
                    <img class="avatar mx-auto" src="<?= base_url('assets/' . SKIN . '/img/avatar/avatar-escolar-m.jpg') ?>" alt="...">

                    <span class="username"><?= $tipousuario ?></span>
                    <span class="caret"></span>
                  </a>
                </li>

            </ul>
          </div>
        </div>
      </nav>

    </header>
