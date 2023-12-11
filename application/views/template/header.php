<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url('public/css/style.css');?>">
</head>
<body>
<nav class="navbar navbar-expand-lg justify-content-center">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mt-auto justify-content-center" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="<?=base_url('home');?>">Beranda <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="<?=base_url('home/login');?>">Login</a>
      <a class="nav-link" href="<?=base_url('home/register');?>">Register</a>
      <a class="nav-link" href="<?=base_url('home/about');?>">About</a>
      <a class="nav-link" href="<?=base_url('home/tipe');?>">Tipe Sepeda</a>
      <a class="nav-link" href="<?=base_url('home/pengajuan');?>">Pengajuan Sewa</a>
      <a class="nav-link" href="<?=base_url('home/rute')?>">Panduan dan Rute</a>
    </div>
  </div>
</nav>
<div class="container">