<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <meta name="description" content="Website design">

  <meta name="copyright" content="Terrafl, <?= base_url();?>">

  <title>Terrafl - Design for you</title>

  <link rel="shortcut icon" href="<?= base_url();?>assets/frontend/favicon.png" type="image/x-icon">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/maicons.css">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendor/animate/animate.css">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/vendor/owl-carousel/css/owl.carousel.min.css">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/bootstrap.css">

  <link rel="stylesheet" href="<?= base_url();?>assets/frontend/css/mobster.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-floating">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url();?>">
      <img src="<?= base_url();?>assets/frontend/favicon.png" alt="" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav ml-lg-5 mt-3 mt-lg-0">
        <li class="nav-item <?= ($this->uri->segment(1) == "beranda" || empty($this->uri->segment(1)) ? "active" : "") ?>">
          <a class="nav-link" href="<?= site_url('beranda');?>">Beranda</a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "temukan-design" ? "active" : "") ?>">
          <a class="nav-link" href="<?= site_url('temukan-design');?>">Temukan Design</a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "berita" ? "active" : "") ?>">
          <a class="nav-link" href="<?= site_url('berita');?>">Berita</a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "tentang" ? "active" : "") ?>">
          <a class="nav-link" href="<?= site_url('tentang');?>">Tentang</a>
        </li>
      </ul>
      <div class="ml-auto my-2 my-lg-0">
        <a href="<?= site_url('daftar');?>" class="btn btn-dark rounded-pill">daftar</a>
      </div>
    </div>
  </div>
</nav>