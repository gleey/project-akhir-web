<?php
// Include database connection
include_once 'api/config/database.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Query to fetch online users
$query = "SELECT username FROM users WHERE is_logged_in = 1 AND role = 'member'";
$stmt = $db->prepare($query);
$stmt->execute();
$online_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
	<link rel="icon" type="image/svg" href="resources/logos/evos.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
    <!-- Navigation bar of the Document -->
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="home.php"><img src="resources/logos/evos.png" alt="logo"></a></li>
			<li><a href="home.php" class="active"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
			<li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
			<li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
			<li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
            <li id="logout-nav"><a href="api/user/logout.php" class="logout-button"><span class="material-symbols-rounded">logout</span><span class="nav__text">Logout</span></a></li>
        </ul>
    </nav>
    
  
    
	<!-- Home page slider -->
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="resources/images/home/img1.jpg" alt="">
                <div class="content">
                    <div class="topic">Life on Land</div>
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
                    <div class="topic">Life on Land</div>
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
                    <div class="topic">Life on Land</div>
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
                    <div class="topic">Life on Land</div>
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
			<div class="article animate" id="article1"><a href="subpages/article1.html"><span>Hutan Dan Pegunungan</span></a></div>
			<div class="article animate" id="article2"><a href="subpages/article2.html"><span>Kehilangan Keanekaragaman Hayati dan Ekosistem</span></a></div>
			<div class="article animate" id="article3"><a href="subpages/article3.html"><span>Pertanian Berkelanjutan</span></a></div>
			<div class="article animate" id="article4"><a href="subpages/article4.html"><span>Desertifikasi dan Degradasi Lahan</span></a></div>
		</div>
        <h2>More Links</h2>
		<div class="wrapper wrapper__links">
			<div class="banner article animate" id="life_on_land"><a href="subpages/life-on-land.html"><span>Life on Land</span></a></div>
			<div class="banner article animate" id="web__gallery"><a href="gallery.php"><span>Gallery</span></a></div>
			<div class="banner article animate" id="target__banner"><a href="subpages/targets-indicators.html"><span>Target dan Indikator</span></a></div>
			<div class="banner article animate" id="SDGs__banner"><a href="subpages/united-nations-goals.html"><span>United Nations Sustainable Development Goals</span></a></div>
		</div>
    </div>

    <!-- Footer Section of the Document -->
	<div id="footer">
		<div class="footer__container">
			<div class="animate" id="dev">
				<a href="https://www.unsrat.ac.id/"><img src="resources/images/developers/Univ.png" alt="UNSRAT"><span>TUGAS WEB</span></a>
			</div>
			<div class="footer__container__left">
				<h3>Life on Land</h3>
				<p>&copy; Life on Land is a collaborative website built by a group of students from Universitas Sam Ratulangi</p>
			</div>
			<div class="footer__container__right">
				<h3>Contact Us</h3>
				<ul>
					<li><a href="mailto:kelompokweb@gmail.com">Email</a></li>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://twitter.com">Twiter</a></li>
				</ul>
                    </div>            
                  <!-- Online Users Table -->
            <h2>Online Users</h2>
            <div class="online-users">
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($online_users) > 0): ?>
                            <?php foreach ($online_users as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td>No users online</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>

	<!-- JavaScript files -->
	<script src="js/home.js"></script>
	<script src="js/slider.js"></script>
    <script src="js/cursor.js"></script>

</body>

</html>