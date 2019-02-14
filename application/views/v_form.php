<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Login Example - Semantic</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/reset.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/site.css">

  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/container.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/grid.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/header.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/image.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/menu.css">

  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/divider.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/segment.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/form.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/input.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/button.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/list.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/message.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/icon.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/dropdown.css">

  <script src="assets/library/jquery.min.js"></script>
  <script src="http://localhost/elearning/components/form.js"></script>
  <script src="http://localhost/elearning/components/transition.js"></script>

<link rel="stylesheet" type="text/css" href="http://localhost/elearning/semantic.min.css">
<script
  src="http://localhost/elearning/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="http://localhost/elearning/semantic.min.js"></script>
  <style type="text/css">
    body {
      background : url(web-image/web-login-bg.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      
    }
    body > .grid {
      height: 100%;
      width: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>

</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
       
        <div class="content">
        <h1>Tambah Gambar</h1
        <form class="ui large form">
            <div class="ui stacked segment">
<!-- Menampilkan Error jika validasi tidak valid -->
<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
<?php echo form_open("crud/tambah", array('enctype'=>'multipart/form-data')); ?>
<div class="ui form">
    <div class="field">
        <label>Pelajaran</label>
        
<select name="pelajaran" value="<?php echo set_value('pelajaran'); ?>" required>
  <option value="">Pilih Mata Pelajaran</option>
  <option value="Bahasa Indonesia">Bahasa Indonesia</option>
  <option value="Matematika">Matematika</option>
  <option value="Ilmu Pengetahuan Alam">IPA</option>
  <option value="Ilmu Pengetahuan Sosial">IPS</option>
  <option value="Fisika">Fisika</option>
  <option value="Biologi">Biologi</option>
  <option value="Bahasa Inggris">Bahasa Inggris</option>
</select>
    </div>
    <div class="field">
      <label>Judul</label>
      <input type="text" name="judul" value="<?php echo set_value('judul'); ?>" required>
    </div>
      <div class="field">
      <label>Deskripsi</label>
      <textarea name="deskripsi" value="<?php echo set_value('deskripsi'); ?>" required></textarea>
      </div>
    <div class="field">
      <label>Gambar</label>
      <input type="file" name="image">
    </div>
    <div class="field">
      <label>Oleh</label>
      <input type="text" name="oleh" value="<?php echo set_value('oleh'); ?>">
    </div>
  </div>
        
    
  <hr>
  <input type="submit" name="submit" value="Simpan">
  <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
<?php echo form_close(); ?>