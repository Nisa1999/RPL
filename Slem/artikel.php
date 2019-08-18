<?php
	require_once("koneksi.php");
	
	$ArticleID = $_GET['ID'];
	
	$GetArticle = $koneksi->query("SELECT * FROM `artikel` WHERE `ID` = '$ArticleID'");
	
	$Article = $GetArticle->fetch_assoc(); 
	if ($Article == null) {
		die("Artikel tidak ditemukan");
	}
	
	$GetMatkul = $koneksi->query("SELECT `Nama` FROM `daftar_matkul` WHERE `ID` = '{$Article['ID_Matkul']}'");
	
	$Matkul = $GetMatkul->fetch_assoc();
	if ($Matkul == null) {
		die("Matkul tidak ditemukan");
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Artikel - <?= $Article['Judul'] ?></title>
	<!-- C Plus Plus &ndash; SLEM CODE ; -->
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
    <link rel="stylesheet" href="styles/articles.css" />
    <link rel="stylesheet" href="styles/article-header.css" />
    <link rel="stylesheet" href="styles/code-box.css" />
    <link rel="stylesheet" href="styles/extras.css" />
  </head>
  <body>
    <?php include_once("Navbar.php"); ?>

    <header class="main-header-wrapper">
      <div class="return-link-container">
        <a href="../">
          <i class="fas fa-chevron-left"></i>
          <span><?= $Matkul['Nama'] ?> > articles</span>
        </a>
      </div> 

      <div class="header-text-wrapper header-padding">
        <div class="header-text-left">
          <span><?= $Article['Author'] ?></span>
          <span class="date-published gray-text"><?= $Article['TGLPost'] ?></span>
          <div><?= $Matkul['Nama'] ?></div>
        </div>
        <div class="header-text-right">
          <a href="video.php?ID=<?= $ArticleID?>" class="link-styling">
            VIDEO
          </a>
          <a
            href="../practices/dasar-pemrograman-c++.html"
            class="link-styling"
          >
            LATIHAN
          </a>
        </div>
      </div>
    </header>

    <div class="content-wrapper">
      <section class="content-container">
        <header>
          <h2><?= $Article['Judul'] ?></h2>
        </header>
        <article>
          <?= $Article['Isi_Artikel'] ?>
        </article>

        <footer class="content-footer">
          <a href="#" class="link-article-footer disable-link">
            PREV
          </a>
          <a href="#" class="link-article-footer">
            <span>Syntax di C++</span>
            <span>|&emsp;NEXT</span>
          </a>
        </footer>
      </section>

      <section class="reaction-wrapper">
        <header>
          <h4>Gimana reaksi kamu tentang artikel ini ?</h4>
        </header>
        <article class="reaction-container">
          <div class="reaction-button-wrapper">
            <button class="reaction-button button-style">
              Bagus banget !!
            </button>
            <button class="reaction-button button-style">Terima kasih</button>
            <button class="reaction-button button-style">
              Perlu perbaikan
            </button>
          </div>
          <span class="gray-text">0 responses</span>
        </article>
      </section>

      <section class="comment-wrapper">
        <header>
          <h4>Kuy diskusi tentang artikel ini !!</h4>
          <span class="gray-text">4 responses</span>
        </header>
        <div class="comment-form-container">
          <a href="#" class="comment-avatar">
            <img src="assets/images/avatar.jpg" alt="avatar.jpg" />
          </a>
          <form action="">
            <input
              type="text"
              placeholder="Tulis tanggapan dan tambahan anda ..."
              class="comment-input"
            />
          </form>
        </div>

        <article class="comment-container">
          <div class="main-comment">
            <a href="#" class="comment-avatar">
              <img src="assets/images/avatar.jpg" alt="avatar.jpg" />
            </a>
            <div class="comment-placeholder">
              <div class="comment-title">
                <span>Test Satu</span>
                <span class="gray-text">1 jam yang lalu</span>
              </div>
              <div>hmm.. video nya menarik dan bermanfaat</div>
              <div class="gray-text">reply</div>
            </div>
          </div>
        </article>

        <article class="comment-container">
          <div class="main-comment">
            <a href="#" class="comment-avatar">
              <img src="assets/images/avatar.jpg" alt="avatar.jpg" />
            </a>
            <div class="comment-placeholder">
              <div class="comment-title">
                <span>Test Dua</span>
                <span class="gray-text">1 jam yang lalu</span>
              </div>
              <div>
                tips dari aku perbanyak pelajari sintaks dan bagaimana cara
                menyelesaikan algoritma dengan baik
              </div>
              <div class="gray-text">reply</div>
            </div>
          </div>

          <div class="reply-comment">
            <a href="#" class="comment-avatar">
              <img src="assets/images/avatar.jpg" alt="avatar.jpg" />
            </a>
            <div class="comment-placeholder">
              <div class="comment-title">
                <span>Test Satu</span>
                <span class="gray-text">1 jam yang lalu</span>
              </div>
              <div>Terima kasih sarannya</div>
            </div>
          </div>
        </article>

        <article class="comment-container">
          <div class="main-comment">
            <a href="#" class="comment-avatar">
              <img src="assets/images/avatar.jpg" alt="avatar.jpg" />
            </a>
            <div class="comment-placeholder">
              <div class="comment-title">
                <span>Test Satu</span>
                <span class="gray-text">1 jam yang lalu</span>
              </div>
              <div>hmm.. video nya menarik dan bermanfaat</div>
              <div class="gray-text">reply</div>
            </div>
          </div>
        </article>
      </section>
    </div>

    <?php include_once("Footer.php"); ?>
  </body>
</html>
