<?php require_once("koneksi.php"); ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home &ndash; SLEM CODE ;</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/home.css" />
  </head>
  <body>
  <?php include_once("Navbar.php"); ?> 
	

	
    <section id="main-banner-wrapper">
      <header class="main-banner">
        <p>
          Share, Learn and Make a Code <br />
          With Us
        </p>
        <a href="#daftar-materi" class="link-styling">MULAI BELAJAR</a>
      </header>
    </section>

    <section id="daftar-materi">
      <header>
        <h1>DAFTAR MATA KULIAH</h1>
      </header>
      <article>
		<?php
		$Query = mysqli_query($koneksi, "SELECT * FROM `daftar_matkul`");
		while($Object = mysqli_fetch_object($Query)) {
			$artikel = mysqli_query($koneksi, "SELECT `ID` FROM `artikel` WHERE `ID_Matkul` = $Object->ID");
			$video = mysqli_query($koneksi, "SELECT `ID` FROM `video` WHERE `ID_MatVid` = $Object->ID");
			//$artikelk = mysqli_query($koneksi, "SELECT `ID` FROM `artikel` WHERE `ID_Matkul` = $Object->ID");
			echo '<div class="materi-cpp materi-container">
          <div class="materi-container-header">
		  '.$Object->Nama.'
          </div>
          <div class="materi-container-content">
            <p>
              <span>'.mysqli_num_rows($artikel).' artikel</span>
              <span>&#9679;</span>
              <span>'.mysqli_num_rows($video).' video</span>
              <span>&#9679;</span>
              <span>ga ada latihan</span>
            </p>
            <a href="filemateri.php?ID='.$Object->ID.'" class="link-styling">Mulai Belajar</a>
          </div>
        </div>';
		}
		?> 
		
        <div class="materi-container">
          <div class="materi-container-header">
            Tunggu materi <br />
            selanjutnya ya ...
          </div>
          <div class="materi-container-content">
            <p>
              <span>&nbsp;</span>
            </p>
            <a class="link-styling disable-link">Mulai Belajar</a>
          </div>
        </div>
      </article>
    </section>

    <section id="materi-favorite">
      <!-- Artikel Favorit -->
      <header>
        <h1>ARTIKEL FAVORIT</h1>
      </header>
      <article>
		<?php 
			$Query =$koneksi->query("SELECT * FROM `artikel` ORDER BY `ID` DESC LIMIT 3");
			
			while ($object=$Query->fetch_object()) {
			
				echo'
				<div class="favorite-container materi-cpp">
				  <div class="favorite-container-title-wrapper">
					<p class="favorite-container-materi">Bahasa Pemrograman : C++</p>
					<p class="favorite-container-title">'.$object->Judul.'</p>
				  </div>
				  <div class="favorite-link-wrapper">
					<a href="artikel.php?ID='.$object->ID.'" class="link-styling">Lihat Artikel</a>
				  </div>
				</div>';
			}
			?>
      </article>

      <!-- Video Favorit -->
      <header>
        <h1>VIDEO FAVORIT</h1>
      </header>
      <article>
		<?php 
			$Query = mysqli_query($koneksi, "SELECT * FROM `video` ORDER BY `ID` DESC LIMIT 3");
			while ($Object = $Query->fetch_object()) {
				
				$Query2 = mysqli_query($koneksi, "SELECT `Nama` FROM `daftar_matkul` WHERE `ID`= '{$Object->ID_MatVid}'");

				$Object2 = $Query2->fetch_object();

				echo '
				
		        <div class="favorite-container materi-cpp">
				  <div class="favorite-container-title-wrapper">
					<p class="favorite-container-materi">'.$Object2->Nama.'</p>
					<p class="favorite-container-title">'.$Object->Judul.'</p>
				  </div>
				  <div class="favorite-link-wrapper">
					<a href="video.php?ID='.$Object->ID.'" class="link-styling">Lihat Video</a>
				  </div>
				</div>
				';
			}
			?>
      </article>
    </section>
	
	
  <?php include_once("Footer.php"); ?> 
  
 </body>
 </html>