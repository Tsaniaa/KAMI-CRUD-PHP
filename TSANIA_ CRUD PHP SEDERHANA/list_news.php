<?php 
    include "connection.php"; 
    include "session.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="img/logoo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script language="javascript"> 
        function tanya() { 
            if (confirm ("Apakah Anda yakin akan menghapus berita ini ?")) { 
                return true; 
            } else {
                return false; 
            } 
        } 
    </script>

    <title>Berita Tsania</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #040A18;">
    <a class="navbar-brand" href="#"><img src="img/header.png" height="60" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="list_news.php">List News <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="create_news.php">Create News</a>
        </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-danger my-2 my-sm-0" type="button" href="logout.php">Logout</a>
        </form>
    </div>
    </nav>
    <div class="container mt-3">
        <?php 
            $query = "SELECT A.id_berita, B.nm_kategori, A.judul, A.pengirim, A.tanggal from berita A, 
            kategori B where A.id_kategori=B.id_kategori order by A.id_berita DESC"; 
            $sql = mysqli_query ($link, $query); 
            while ($hasil = mysqli_fetch_array ($sql)) { 
                $id_berita = $hasil['id_berita']; 
                $kategori = stripslashes($hasil['nm_kategori']);
                $judul = stripslashes ($hasil['judul']); 
                $pengirim = stripslashes ($hasil['pengirim']); 
                $tanggal = stripslashes ($hasil['tanggal']); 
        ?>
        <div class="wrapper">
            <div class="row justify-content">
                <?php
                    echo "<br><font size='4'><b>$judul</b></font><br>"; 
                    echo "<small><i>Ditulis oleh <b>$pengirim</b>, pada <b>$tanggal</b></i></small><br>";
                    ?>
                <div class="col-2 badge bg-success text-decoration-none link-light ml-3">kategori: <b><?= $kategori ?></b></div>
                <div class="row justify-content-center mt-3">
                    <div class="col-2">
                        <a class="btn btn-outline-warning my-2 my-sm-0" type="button" href="detail_news.php?id=<?=$id_berita?>">Baca Selengkapnya</a>                   
                    </div>
                    <div class="col-2">
                        <a class="btn btn-outline-warning my-2 my-sm-0" type="button" href="edit_news.php?id=<?=$id_berita?>">Edit</a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-outline-warning my-2 my-sm-0" type="button" href="delete.php?id=<?=$id_berita?>" onClick='return tanya()'>Hapus</a>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
            } 
        ?> 
    </div>
    <style>
        .wrapper {
            margin: 20px auto;
            padding: 40px 30px 30px 30px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>