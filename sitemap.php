<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/cursor.css"/>
    <link rel="stylesheet" href="css/sitemap.css"/>
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
            <li id="logo" style="float:left"><a href="index.html"><img src="resources/logos/logo.svg" alt="logo"></a></li>
			<li><a href="home.php"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
			<li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
			<li><a href="shop.php"><span class="material-symbols-rounded">shop</span><span class="nav__text">Shop</span></a></li>
			<li><a href="profile.php"><span class="material-symbols-rounded">account_circle</span><span class="nav__text">Profile</span></a></li>
			<li><a href="sitemap.php" class="active"><span class="material-symbols-rounded">lan</span><span class="nav__text">Sitemap</span></a></li>
			<li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
			<li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
        </ul>
    </nav>
    <div class="cursor rounded move" id="cursor"></div>

    <!-- Main Content of the Document -->
    <div class="map_body">
        <div class="sitehead">
            <h2>SITE MAP</h2>
        </div>
        <div class="sitemap">
            <!-- References: https://www.w3schools.com/html/html5_svg.asp -->
            <svg id="map">
                <g id="box1">
                    <rect x="680px" y="100px" width="200px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px" rx="5" ry="5" />
                    <text x="780px" y="130px" text-anchor="middle" fill="#fff"  ><a href="index.html">Life on Land</a></text>
                </g>
    
                <g id="box2">
                    <rect x="128px" y="300px" width="120px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px" rx="5" ry="5" />
                    <text x="180px" y="330px" text-anchor="middle" fill="#000" ><a href="home.html">Home</a></text>
                </g>
    
                <g id="box3">
                    <rect x="328px" y="300px" width="120px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px" rx="5" ry="5" />
                    <text x="380px" y="330px" text-anchor="middle" fill="#fff" ><a href="gallery.html">Gallery</a></text>
                    
                </g>
    
                <g id="box4">
                    <rect x="528px" y="300px" width="120px" height="50px"  fill="#2aa5da" stroke="#fff"  stroke-width="2px" rx="5" ry="5" />
                    <text x="580px" y="330px" text-anchor="middle" fill="#fff" ><a href="shop.html">shop</a></text>
                </g>
    
    
                <g id="box5">
                    <rect x="912px" y="300px" width="120px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px" rx="5" ry="5"/>
                    <text x="970px" y="330px" text-anchor="middle" fill="#fff" ><a href="profile.html">Profile</a></text>
                </g> 
    
    
                <g id="box6">
                    <rect x="1132px" y="300px" width="100px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px" rx="5" ry="5"/>
                    <text x="1180px" y="330px" text-anchor="middle" fill="#fff" ><a href="feedback.html">Comments</a></text>
                </g>
    
     
                <g id="box7">
                    <rect x="1322px" y="300px" width="110px" height="50px" fill="#2aa5da" stroke="#fff" stroke-width="2px"  rx="5" ry="5"/>
                    <text x="1378px" y="330px" text-anchor="middle" fill="#fff" ><a href="team.html">About Us</a></text>
                </g>
    
                <g>
                    <!-- main horizontal line -->
                    <line x1="188" y1="250" x2="1382" y2="250" stroke="#fff" stroke-width="4" />
                    <!-- box 1 vertical line --> 
                    <line x1="780" y1="250" x2="780" y2="150" stroke="#fff" stroke-width="4"/> 
                    <!-- box 2 vertical line -->
                    <line x1="190" y1="250" x2="190" y2="300" stroke="#fff" stroke-width="4"/>
                    <!-- box 3 vertical line -->
                    <line x1="390" y1="250" x2="390" y2="300" stroke="#fff" stroke-width="4"/>
                    <!-- box 4 vertical line -->
                    <line x1="590" y1="250" x2="590" y2="300" stroke="#fff" stroke-width="4"/>
                    <!-- box 5 vertical line -->
                    <line x1="970" y1="250" x2="970" y2="300" stroke="#fff" stroke-width="4"/>
                    <!-- box 6 vertical line -->
                    <line x1="1180" y1="250" x2="1180" y2="300" stroke="#fff" stroke-width="4"/>
                    <!-- box 7 vertical line -->
                    <line x1="1380" y1="250" x2="1380" y2="300" stroke="#fff" stroke-width="4"/>
                </g>
            </svg>
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
    <script src="js/cursor.js"></script>

</body>

</html>