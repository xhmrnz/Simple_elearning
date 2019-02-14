
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Fixed Menu Example - Semantic</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/semantic.min.css">

  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/reset.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/site.css">

  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/container.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/grid.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/header.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/image.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/menu.css">

  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/divider.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/list.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearningt/components/segment.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/elearning/components/icon.css">
  
  <script
  src="http://localhost/elearning/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="http://localhost/elearning/semantic.min.js"></script>

  <style type="text/css">
  body {
    background-color: #FFFFFF;
  }
  .ui.menu .itemright {
    margin: 0 auto;
    margin-right: 1.5em;
    color: white;
  }
  .ui.menu .item img.logo {
    margin-right: 1.5em;
  }
  .main.container {
    margin-top: 7em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  </style>
  
</head>
<body>

  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="<?= base_url(); ?>" class="header item">
        <img class="logo" src="web-image/e-logo.png">
        E-Dukasi
      </a>
        
      <a href="#" class="item">Materi</a>
      <a href="<?= base_url('crud/keluar'); ?>" class="itemright"><br>Logout</a>
    </div>
  </div>

  <div class="ui main text container">
      
    <h1 class="ui header">List Materi</h1>
    <p>Selamat Datang, <?= $this->session->username; ?>.</p>
    <p>Anda Login Sebagai <?= $this->session->level; ?>, Anda Dapat <?php if($this->session->level == "administrator"){
        echo "Menambahkan, Mengedit, dan Menghapus Seluruh Materi Yang Ada.";
    }
    else{
      echo "Membaca Semua Materi Yang Tersedia.";  
    }
    ?>
  </div>
    <br>
    <?php if($this->session->level == "administrator"){
        echo "<button><center>";
        ?>
    <a href="<?= base_url('crud/tambah'); ?>" class="ui fluid large teal submit button">Tambah Materi</a>
    <?php
        echo "</center></button>";
    }else{
        
    }
    ?>
            <table class="ui selectable inverted table">
                <thead>
                <tr>
                    <th>Kode</th>
                    <th>Pelajaran</th>
                    <th>Judul</th>
                    <th>Sampul</th>
                    <th>Deskripsi</th>
                    <th>Oleh</th>
                    <?php 
                    if($this->session->level == "administrator"){
                    echo "<th>Aksi</th>";    
                    }else{
                    }
                    ?>
                </tr>
                </thead>
                <?php
                if( ! empty($list_materi)){
                foreach($list_materi as $u)
                    {
                    ?>
                <tr>
                    
                    <td><?= $u->materi_id ?></td>
                    <td><?= $u->pelajaran ?></td>
                    <td><?= anchor(base_url('crud/buka_materi/').$u->materi_id,"$u->judul")?></td>
                    <td><img src="<?= base_url('images/'.$u->image) ?>" width="64"</td>
                    <td><?= $u->deskripsi ?></td>
                    <td><?= $u->oleh ?></td>
                    <?php
                    if($this->session->level == "administrator"){
                        
                    
                    echo "<td>";
                    ?>
                    <?= anchor('crud/edit/'.$u->materi_id,'Edit'); ?>
                    <?= anchor('crud/delete/'.$u->materi_id,'Hapus'); ?>
                    <?php
                    echo "</td>";
                    }else{
                    } ?>
                </tr>
                <?php }
                }?>
            </table>
    
    

  
  
</body>

</html>
