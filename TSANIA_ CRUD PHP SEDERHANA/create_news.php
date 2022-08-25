<?php 
    include "connection.php";
    include "session.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") { 
        $judul = addslashes (strip_tags ($_POST['judul'])); 
        $kategori = $_POST['kategori'];
        $headline = addslashes (strip_tags ($_POST['headline'])); 
        $isi_berita = addslashes (strip_tags ($_POST['isi'])); 
        $pengirim = addslashes (strip_tags ($_POST['pengirim'])); 

        $query = "INSERT INTO berita VALUES('','$kategori','$judul','$headline','$isi_berita','$pengirim', now())"; 
        
        $sql = mysqli_query($link, $query); 
        if ($sql) { 
            // echo "<h2><font color=blue>Berita telah berhasil ditambahkan</font></h2>"; 
            header('location: list_news.php');
        } else {
        echo "<p><font color=red>Berita gagal ditambahkan</font></p>"; 
        } 
    } 
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
            <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="list_news.php">List News</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="create_news.php">Create News <span class="sr-only">(current)</span></a>
        </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-danger my-2 my-sm-0" type="button" href="logout.php">Logout</a>
        </form>
    </div>
    </nav>
    <div class="container mt-3 mb-3">
        <div class="wrapper">
            <div class="logo">
                <img src="img/header2.png"  height="60" alt="">
            </div>
            <div class="text-center name">
                Berita Baru
            </div>
            <form class="p-5 mt-0" action="" method="POST" name="input">
                <h5 class="mb-2">Judul Berita</h5>
                <div class="form-field d-flex align-items-center">
                    <Input type="text" name="judul" size="30">
                </div>
                <h5 class="mb-2">Kategori Berita</h5>
                <div class="form-field d-flex align-items-center">
                    <select name="kategori" width="160" style="background-color: transparent; border-color: transparent">
                        <option value=0 selected>Pilih </option>
                        <?php
                            $tampil = mysqli_query($link, "SELECT * FROM kategori ORDER BY nm_kategori");
                            while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <option value="<?=$data['id_kategori'];?>"><?php echo $data['nm_kategori'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <h5 class="mb-2">Headline Berita</h5>
                <div class="form-field d-flex align-items-center">
                    <textarea name="headline" cols="160" rows="5" style="background-color: transparent; border-color: transparent"></textarea></td>
                </div>
                <h5 class="mb-2">Isi Berita</h5>
                <div class="form-field d-flex align-items-center">
                    <textarea name="isi" cols="160" rows="5" style="background-color: transparent; border-color: transparent"></textarea></td>
                </div>
                <h5 class="mb-2">Penulis Berita</h5>
                <div class="form-field d-flex align-items-center">
                    <input type="text" name="pengirim" size="20" ></td>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <input class="btn btn-outline-info my-2 my-sm-0" type="submit" name="input" value="Input Berita">                   
                    </div>
                    <div class="col-4">
                        <input class="btn btn-outline-info my-2 my-sm-0" type="reset" name="reset" value="Reset">
                    </div>
                </div>
                
            </form>
        </div>
    </div>
        <style>
            h5 {
                color: #555;
            }
        </style>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>