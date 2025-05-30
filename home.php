<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/home.css"/>
	<link rel="stylesheet" href="css/slider.css"/>
    <link rel="stylesheet" href="css/cursor.css"/>
	<!-- Fonts & Logos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap">
	<link rel="icon" type="image/svg" href="resources/logos/favicon.svg">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
    <!-- Navigation bar of the Document -->
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="index.php"><img src="resources/logos/logo.svg" alt="logo"></a></li>
			<li><a href="home.php" class="active"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
			<li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
			<li><a href="profile.php"><span class="material-symbols-rounded">account_circle</span><span class="nav__text">Profile</span></a></li>
			<li><a href="sitemap.php"><span class="material-symbols-rounded">lan</span><span class="nav__text">Sitemap</span></a></li>
			<li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
			<li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
        </ul>
    </nav>
    
  
    
	<!-- Home page slider -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="resources/images/home/img1.jpg" alt="">
                <div class="content">
                    <div class="topic">Life on Land RPL</div>
                    <div class="des">
                        "Misi kami adalah menciptakan kesadaran mendalam tentang saling ketergantungan semua kehidupan di daratan dengan memberdayakan individu dan komunitas untuk merawat ekosistem darat.  
Kami mempromosikan teknik konservasi, restorasi, dan pengelolaan berkelanjutan yang melindungi keanekaragaman hayati, menjaga spesies yang terancam punah, dan melestarikan sumber daya penting yang menjadi sandaran semua kehidupan melalui advokasi, pendidikan, dan solusi kreatif.  
Bersama-sama, kami membayangkan dunia di mana umat manusia dan alam hidup berdampingan secara damai, melindungi kesehatan dan vitalitas planet untuk generasi saat ini dan masa depan."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="resources/images/home/img2.jpg" alt="">
                <div class="content">
                    <div class="topic">Life on Land RPL</div>
                    <div class="des">
                        "Misi kami adalah menciptakan kesadaran mendalam tentang saling ketergantungan semua kehidupan di daratan dengan memberdayakan individu dan komunitas untuk merawat ekosistem darat.  
Kami mempromosikan teknik konservasi, restorasi, dan pengelolaan berkelanjutan yang melindungi keanekaragaman hayati, menjaga spesies yang terancam punah, dan melestarikan sumber daya penting yang menjadi sandaran semua kehidupan melalui advokasi, pendidikan, dan solusi kreatif.  
Bersama-sama, kami membayangkan dunia di mana umat manusia dan alam hidup berdampingan secara damai, melindungi kesehatan dan vitalitas planet untuk generasi saat ini dan masa depan."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="resources/images/home/img.jpg" alt="">
                <div class="content">
                    <div class="topic">Life on Land RPL</div>
                    <div class="des">
                        "Misi kami adalah menciptakan kesadaran mendalam tentang saling ketergantungan semua kehidupan di daratan dengan memberdayakan individu dan komunitas untuk merawat ekosistem darat.  
                        Kami mempromosikan teknik konservasi, restorasi, dan pengelolaan berkelanjutan yang melindungi keanekaragaman hayati, menjaga spesies yang terancam punah, dan melestarikan sumber daya penting yang menjadi sandaran semua kehidupan melalui advokasi, pendidikan, dan solusi kreatif.  
                        Bersama-sama, kami membayangkan dunia di mana umat manusia dan alam hidup berdampingan secara damai, melindungi kesehatan dan vitalitas planet untuk generasi saat ini dan masa depan."
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="resources/images/home/img4.jpg" alt="">
                <div class="content">
                    <div class="topic">Life on Land RPL</div>
                    <div class="des">
                        "Misi kami adalah menciptakan kesadaran mendalam tentang saling ketergantungan semua kehidupan di daratan dengan memberdayakan individu dan komunitas untuk merawat ekosistem darat.  
Kami mempromosikan teknik konservasi, restorasi, dan pengelolaan berkelanjutan yang melindungi keanekaragaman hayati, menjaga spesies yang terancam punah, dan melestarikan sumber daya penting yang menjadi sandaran semua kehidupan melalui advokasi, pendidikan, dan solusi kreatif.  
Bersama-sama, kami membayangkan dunia di mana umat manusia dan alam hidup berdampingan secara damai, melindungi kesehatan dan vitalitas planet untuk generasi saat ini dan masa depan."
                    </div>
                </div>
            </div>
        </div>
        <!-- list slider thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="resources/images/home/img1.jpg" alt="">
            </div>
            <div class="item">
                <img src="resources/images/home/img2.jpg" alt="">
            </div>
            <div class="item">
                <img src="resources/images/home/img.jpg" alt="">
            </div>
            <div class="item">
                <img src="resources/images/home/img4.jpg" alt="">
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"> ◁ </button>
            <button id="next"> ▷ </button>
        </div>
        <!-- time running for slider -->
        <div class="time"></div>
    </div>


    <!-- Main Content of the Document -->
	<div class="container">
        <div class="cursor rounded move" id="cursor"></div>  <!-- Cursor of the Document -->
		<h1>Top Articles</h1>
		<div class="wrapper">
			<div class="article animate" id="article1"><span>Hutan Dan Pegunungan</span></div>
			<div class="article animate" id="article2"><span>Kehilangan Keanekaragaman Hayati dan Ekosistem</span></div>
			<div class="article animate" id="article3"><span>Pertanian Berkelanjutan</span></div>
			<div class="article animate" id="article4"><span>Desertifikasi dan Degradasi Lahan</span></div>
		</div>
        <h2>More Links</h2>
		<div class="wrapper wrapper__links">
			<div class="banner article animate" id="life_on_land"><span>Life on Land</span></div>
			<div class="banner article animate" id="web__gallery"><span>Gallery</span></div>
			<div class="banner article animate" id="target__banner"><span>Target dan Indikator</span></div>
			<div class="banner article animate" id="SDGs__banner"><span>United Nations Sustainable Development Goals</span></div>
		</div>
		<h2>Sitemap</h2>
		<div class="wrapper article animate" id="sitemap">
			<a href="sitemap.html"><span>Check the whole website</span></a>
		</div>
    </div>

    <!-- Footer Section of the Document -->
	<div id="footer">
		<div class="footer__container">
			<div class="animate" id="dev">
				<a href="subpages/lashen-info.html"><img src="resources/images/developers/Univ.png" alt="Lashen Martino"><span>TUGAS RPL</span></a>
			</div>
			<div class="footer__container__left">
				<h3>Life on Land</h3>
				<p>&copy; Life on Land is a collaborative website built by a group of students from Universitas Sam Ratulangi</p>
			</div>
			<div class="footer__container__right">
				<h3>Contact Us</h3>
				<ul>
					<li><a href="mailto:kelompokrpl@gmail.com">Email</a></li>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com">Twiter</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- JavaScript files -->
	<script src="js/home.js"></script>
	<script src="js/slider.js"></script>
    <script src="js/cursor.js"></script>

</body>

</html>