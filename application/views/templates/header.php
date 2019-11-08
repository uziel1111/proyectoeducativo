
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Proyecto Educativo, Proyed">

    <title>Proyecto Educativo</title>

    <link rel="canonical" href="http://www.proyectoeducativo.org/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fontawesome 5 -->
    <script src="https://kit.fontawesome.com/62fb77aec5.js" crossorigin="anonymous"></script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Proyed SVG icon -->
    <link rel="stylesheet" href="<?= base_url('assets/svg-icons/svg-icon.css') ?>">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">

    <!-- Custom Whatsapp for this template -->
    <link href="<?= base_url('assets/css/whatsapp_style.css'); ?>" rel="stylesheet">
  </head>

  <body class="d-flex flex-column h-100">
    <!-- Page header -->
    <header>
      <!-- Fixed navbar -->

      <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
          <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="<?= base_url('/'); ?>" id="mainLogo">
              <img src="<?= base_url('assets/img/template/Logo-Proyed-500-x-134.png'); ?>" class="img-fluid" alt="Proyecto Educativo Logo">
            </a>
            <div class="toggle">
              <span>Menú</span>
              <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                  <!--<li class="nav-item mx-0 mx-lg-1 dropdown">
                      <a class="nav-link px-0 px-lg-3 rounded dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="fa-layers fa-stack">
                      <i class="fas fa-circle fa-stack-2x holder"></i>
                      <i class="far fa-circle fa-stack-2x circle"></i>
                      <i class="fas fa-users fa-stack-1x icon"></i>

                    </span>
                        Somos
                      </a>
                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('index.php/Nosotros/Nosotros'); ?>">Organización</a>
                        <a class="dropdown-item" href="<?= base_url('index.php/Nosotros/Equipo'); ?>">Equipo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>-->
                    <li class="nav-item mx-0 mx-lg-1">

                <a class="nav-link rounded" href="<?= base_url('index.php/Nosotros/Equipo'); ?>">

                  <span class="fa-layers fa-stack">
                      <i class="fas fa-circle fa-stack-2x holder"></i>
                      <i class="far fa-circle fa-stack-2x circle"></i>
                      <i class="fas fa-users fa-stack-1x icon"></i>

                    </span>
                    Somos
                  </a>

                </li>
                <li class="nav-item mx-0 mx-lg-1">

                <a class="nav-link rounded" href="<?= base_url('index.php/Nosotros/Nosotros'); ?>">

                  <span class="fa-layers fa-stack">
                      <i class="fas fa-circle fa-stack-2x holder"></i>
                      <i class="far fa-circle fa-stack-2x circle"></i>
                      <i class="fas fa-briefcase fa-stack-1x icon"></i>

                    </span>
                    Hacemos
                  </a>

                </li>
                <li class="nav-item">
                <a class="nav-link rounded" href="<?= base_url('index.php/Trayectoria/'); ?>">

                  <span class="fa-layers fa-stack">
                      <i class="fas fa-circle fa-stack-2x holder"></i>
                      <i class="far fa-circle fa-stack-2x circle"></i>
                      <i class="fas fa-flag fa-stack-1x icon"></i>

                    </span>
                    Logramos
                  </a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link rounded" href="<?= base_url('index.php/Contacto') ?>">

                  <span class="fa-layers fa-stack">
                      <i class="fas fa-circle fa-stack-2x holder"></i>
                      <i class="far fa-circle fa-stack-2x circle"></i>
                      <i class="fas fa-paper-plane fa-stack-1x icon"></i>

                    </span>
                    Contáctanos
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- END Fixed navbar -->
    </header>
    <!-- END Page header -->
