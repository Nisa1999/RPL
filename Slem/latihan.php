<?php
	require_once("koneksi.php");
	$LatihanID= $_GET['ID'];
	$GETLatihan = $koneksi->query("SELECT * FROM `latihan` WHERE `ID` = $LatihanID");

	$Latihan = $GETLatihan->fetch_assoc();
	if ($Latihan == null) {
		die("Latihan tidak ada, harap sabar yaaa :)))");
	}
	
	$GETMateri = $koneksi->query("SELECT `ID_Matkul` FROM `daftar_materi` WHERE `ID` = '{$Latihan['ID']}'");
	
	$Materi = $GETMateri->fetch_assoc();
	if ($Materi == null) {
		die("Materi tidak ada sayang, sabar yaa:)))");
	}
	
	$GETMatkul = $koneksi->query("SELECT `nama` FROM `daftar_matkul` WHERE `ID` = '{$Materi['ID_Matkul']}'");
	
	$Matkul = $GETMatkul->fetch_assoc();
	if ($Matkul == null) {
		die("Matkul tidak ada sayang, sabar yaa:)))");
	}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>C Plus Plus &ndash; SLEM CODE ;</title>
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
    <link rel="stylesheet" href="styles/practices.css" />
    <link rel="stylesheet" href="styles/article-header.css" />
    <link rel="stylesheet" href="styles/code-box.css" />
  </head>
  <body>
    <?php require_once("Navbar.php");?>

    <section class="main-header-wrapper">
      <header>
        <div class="return-link-container">
          <a href="../">
            <i class="fas fa-chevron-left"></i>
            <span><?php
					
					$Query= $koneksi->query("SELECT `ID_Matkul` FROM `daftar_materi` WHERE `ID`= $LatihanID");
					$ID_Matkul = $Query->fetch_object()->ID_Matkul;
					
					$Query2= $koneksi->query("SELECT `Nama` FROM `daftar_matkul` WHERE `ID` = $ID_Matkul");
					$ID_Matkul2 = $Query2->fetch_object()->Nama;
					echo $ID_Matkul2;
			?></span>
          </a>
        </div>

        <div class="header-text-wrapper header-padding">
          <div class="header-text-left">
            <span><?=$Latihan['Author']?></span>
            <span class="date-published gray-text"><?=$Latihan['Tanggal']?></span>
			<?php
				$Query = $koneksi->query("SELECT `Judul` FROM `daftar_materi` WHERE `ID` = $LatihanID");
				$JudulMateri = $Query->fetch_object()->Judul;
				echo '<div>'.$JudulMateri.'</div>';?>
          </div>
          <div class="header-text-right">
            <a
              href="../articles/dasar-pemrograman-c++.html"
              class="link-styling"
            >
              ARTIKEL
            </a>
            <a href="../videos/dasar-pemrograman-c++.html" class="link-styling">
              VIDEO
            </a>
          </div>
        </div>
      </header>
    </section>

    <div class="content-wrapper">
      <form>
		<?php 
			$Query = $koneksi->query("SELECT * FROM `soal` WHERE `ID_latihan` = $LatihanID");
			while ($Object = $Query->fetch_object())
			{
				echo '<section class="content-container">
					  <header class="content-title">
						<h2>'.$Object->Soal.'</h2>
						<button class="dark-green button-style">HINT</button>
					  </header>
					  <article>
						<div class="content-answer">';
			
				$Query2 = $koneksi->query("SELECT * FROM `jawaban` WHERE `ID_soal` = $Object->ID");
				while ($Object2 = $Query2->fetch_object())
				{
					echo '<div>
							<input type="radio" name="answer1" id="'.$Object2->Jawaban.'" />
							<label for="'.$Object2->Jawaban.'">'.$Object2->Jawaban.'</label>
						  </div>';
				}
				
				echo '</div>
					</article>
					</section>';
			}
			
		?>

        <footer class="content-footer">
          <button class="result button-style">SEE RESULT</button>
        </footer>
      </form>
    </div>

    <?php require_once("Footer.php");?>
  </body>
</html>
