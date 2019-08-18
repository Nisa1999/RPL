<?php 
	require_once("koneksi.php");
	
	$VideoID = $_GET['ID'];
	$GETVideo = $koneksi->query("SELECT * FROM `video` WHERE `ID` = $VideoID");
	
	$Video = $GETVideo->fetch_assoc();
	if ($Video == null) {
		die("video tidak ada");
	}
	
	$GETMatkul = $koneksi->query("SELECT `nama` FROM `daftar_matkul` WHERE `ID` = '{$Video['ID_MatVid']}'");
	
	$Matkul = $GETMatkul->fetch_assoc();
	if ($Matkul == null) {
		die("Markul tidak ada sayang, sabar yaa:)))");
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
    <link rel="stylesheet" href="styles/videos.css" />
    <link rel="stylesheet" href="styles/article-header.css" />
    <link rel="stylesheet" href="styles/code-box.css" />
    <link rel="stylesheet" href="styles/extras.css" />
  </head>
  <body>
    <?php include_once("Navbar.php"); ?>

    <div class="content-wrapper">
      <header class="return-link-container">
        <a href="../">
          <i class="fas fa-chevron-left"></i>
          <span>Bahasa Pemrograman : C++ > videos</span>
        </a>
      </header>

      <div class="content-container">
        <section class="left-container">
          <article>
            <div class="video-container">
				<iframe width="560" height="315" src="<?= $Video['link_video'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
            <header class="header-text-wrapper">
              <div class="header-text-left">
                <span><?= $Video['Author'] ?></span>
                <span class="date-published gray-text"><?= $Video['TglPost'] ?></span>
                <div><?= $Video['Judul'] ?></div>
              </div>
              <div class="header-text-right">
                <a
                  href="artikel.php?ID=<?= $VideoID?>"
                  class="link-styling"
                >
                  ARTIKEL
                </a>
                <a
                  href="../practices/dasar-pemrograman-c++.html"
                  class="link-styling"
                >
                  LATIHAN
                </a>
              </div>
            </header>
            <p>
             <?= $Video['Deskripsi'] ?>
            </p>
          </article>

          <footer class="content-footer">
            <a href="#" class="link-article-footer disable-link">
              PREV
            </a>
            <a href="#" class="link-article-footer">
              <span>Syntax di C++</span>
              <span>&emsp;|&emsp;NEXT</span>
            </a>
          </footer>

          <section class="reaction-wrapper">
            <header>
              <h4>Gimana reaksi kamu tentang artikel ini ?</h4>
            </header>
            <article class="reaction-container">
              <div class="reaction-button-wrapper">
                <button class="reaction-button button-style">
                  Bagus banget !!
                </button>
                <button class="reaction-button button-style">
                  Terima kasih
                </button>
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
        </section>
        <section class="right-container">
          <div class="code-box-wrapper">
            <div class="code-box-title">Source Code</div>
            <div class="code-box">
              <code>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum
                facere commodi, laudantium et itaque illum excepturi, quidem,
                odio dicta eligendi aspernatur! Quam vero, ex accusantium
                facilis sunt repellat omnis repellendus?
              </code>
            </div>
          </div>
          <div class="code-box-wrapper">
            <div class="code-box">
              <code>
                #include &lt;iostream&gt; <br />
                using namespace std; <br /><br />
                int main () { <br />
                &emsp; cout &lt;&lt; "Welcome to C++"; <br />
                &emsp; return 0; <br />
                }
              </code>
            </div>
          </div>
        </section>
      </div>
    </div>

    <?php include_once("Footer.php"); ?>
  </body>
</html>
