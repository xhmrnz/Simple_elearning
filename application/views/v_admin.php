<!DOCTYPE html>
<html>
    <head>
        <title>Sukses</title>
    </head>
    <body>
        <h1>Login berhasil !</h1>
        <h2>Selamat datang, <?= $this->session->userdata("email"); ?></h2>
        
        <a href="<?= base_url('login/logout'); ?>">Logout</a>
    </body>
</html>