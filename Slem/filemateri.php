 <?php 
	require_once("koneksi.php");
	
	$MatkulID = $_GET['ID'];
	
	
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
    <link rel="stylesheet" href="styles/materi-page.css" />
  </head>
  <body>
    <?php include_once("Navbar.php"); ?>

    <section class="materi-wrapper">
		<?php 
		$Query = mysqli_query($koneksi, "SELECT `Nama` FROM `daftar_matkul` WHERE `ID` = $MatkulID");
		$Object = $Query->fetch_object();
		?>
		
      <header class="return-link-container">
        <a href="">
          <i class="fas fa-chevron-left"></i>
          <span><?= $Object->Nama ?></span>
        </a>
      </header>
	  <?php 
	  
	  $GETMateri = $koneksi->query("SELECT * FROM `Daftar_Materi` WHERE `ID_Matkul`= $MatkulID ORDER BY `KetMat` ASC");
	  //print_r($GETMateri);
	  while ($Object = $GETMateri->fetch_object()){
		  //print_r($Object);
		  echo '
		  <article>
				<div class="materi-container materi-cpp">
				  <div class="materi-header">
					<p class="materi-header-count">'.$Object->KetMat.'</p>
					<p class="materi-header-title">'.$Object->Judul.'</p>
				  </div>
				  <div class="materi-link-container">
					<span>
					  <a href="artikel.php?ID='.$Object->ID_artikel.'" class="link-styling">ARTIKEL</a>
					</span>
					<span>
					  <a href="video/php?ID='.$Object->ID_Video.'" class="link-styling">VIDEO</a>
					</span>
					<span>
					  <a href="#" class="link-styling">LATIHAN</a>
					</span>
				  </div>
				</div>
			  </article>';
	  }
	  
      ?>
    </section>

    <?php include_once("Footer.php"); ?>
  </body>
</html>
