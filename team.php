<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cursor.css"/>
    <link rel="stylesheet" href="css/team.css"/>
	<!-- Fonts & Logos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap">
	<link rel="icon" type="image/svg" href="resources/logos/evos.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
    <!-- Navigation bar of the Document -->
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="home.php"><img src="resources/logos/evos.png" alt="logo"></a></li>
			<li><a href="home.php" ><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
			<li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
			<li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
			<li><a href="team.php" class="active"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
        </ul>
    </nav>
    <div class="cursor rounded move" id="cursor"></div>  <!-- Cursor of the Document -->

    
    <!-- Main Content of the Document -->
	<div class="photoWrapperMain">
        <div class="photoWrapper">
            <div class="card">
                <div class="imageContaner">
                    <div class="details2">
                        <h3 class="devName">Gervic Kawengian</h3>
                        <p class="devDes">NIM - 230211060097</p>
                    </div>
                    <img class="devImage" src="resources/images/developers/Gervik.jpg" alt="">
                </div>
                <div class="details"></div>
            </div>
            <div class="card">
                <div class="imageContaner">
                    <div class="details2">
                        <h3 class="devName">Riano Kaunang</h3>
                        <p class="devDes">NIM - 230211060090</p>
                    </div>
                    <img class="devImage" src="resources/images/developers/ano.jpg" alt="">
                </div>
                <div class="details"></div>
            </div>
            <div class="card">
                <div class="imageContaner">
                    <div class="details2">
                        <h3 class="devName">Graciano Tilaar</h3>
                        <p class="devDes">NIM - 230211060031</p>
                    </div>
                    <img class="devImage" src="resources/images/developers/gley.jpg" alt="">
                </div>
                <div class="details"></div>
            </div>  
        </div>
    </div>

    <!-- Footer Section of the Document -->
	<div id="footer">
		<div class="footer__container">
			<div class="animate" id="dev">
				<a href="subpages/lashen-info.html"><img src="resources/images/developers/Univ.png" alt="Lashen Martino"><span>TUGAS WEB</span></a>
			</div>
			<div class="footer__container__left">
				<h3>Life on Land</h3>
				<p>&copy; Life on Land is a collaborative website built by a group of students from Universitas Sam Ratulangi</p>
			</div>
			<div class="footer__container__right">
				<h3>Contact Us</h3>
				<ul>
					<li><a href="mailto:kelompokrweb@gmail.com">Email</a></li>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com">Twiter</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- JavaScript files -->
    <script src="js/cursor.js"></script>
	
	

</body>

</html>