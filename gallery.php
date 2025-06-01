<?php
session_start();
include_once 'api/config/database.php';

$database = new Database();
$db = $database->getConnection();

// Fetch content by category
$categories = ['Biodiversity', 'Nature', 'Sustainable Agriculture', 'Reforestation'];
$content_by_category = [];

foreach ($categories as $category) {
    $query = "SELECT * FROM content WHERE category = :category ORDER BY created_at DESC";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':category', $category);
    $stmt->execute();
    $content_by_category[$category] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/gallery.css"/>

	<!-- Fonts & Logos -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap">
	<link rel="icon" type="image/svg" href="resources/logos/evos.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
	
	<!--Google fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation bar of the Document -->
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="home.php"><img src="resources/logos/evos.png" alt="logo"></a></li>
			<li><a href="home.php"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
			<li><a href="gallery.php" class="active"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
			<li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
			<li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>

			<!-- Change color, font size and font family of the page -->
			<li style="float: right">
				<select name="list" onchange="bgcolor(this.value)">
					<option value="" selected>Hitam</option>
					<option value="orange">Oranye</option>
					<option value="Green">Hijau</option>
					<option value="#67C6E3">Biru</option>
					<option value="#8C6A5D">Coklat</option>
				</select>

				<select id="font-size-selector" onchange="changeFontSize(this.value)">
					<option value="0.6em">Kecil</option>
					<option value="1.0em" selected>Sedang</option>
					<option value="1.25em">Besar</option>
				</select>

				<select id="font-family-selector" onchange="changeFontFamily(this.value)">
					<option value="'Roboto', sans-serif" selected>Roboto</option>
					<option value="'Times New Roman', serif">Times New Roman</option>
					<option value="Courier New", monospace>Monospace</option>
					<option value="Brush Script MT", cursive>Cursive</option>
				</select>
			</li>
        </ul>
    </nav>
	<div class="cursor rounded move" id="cursor"></div>  <!-- Cursor of the Document -->

    <!-- Main Content of the Document -->
<div class="slider">
		<h1 class="slider-heading">Gallery</h1>
		<div class="list">
			<div class="item">
				<img src="resources/images/gallery/banner19.jpg">
			</div>
			<div class="item">
				<img src="resources/images/gallery/banner3.jpg">
			</div шанс>
			<div class="item">
				<img src="resources/images/gallery/banner15.jpg">
			</div>
			<div class="item">
				<img src="resources/images/gallery/banner1.jpg">
			</div>
			<div class="item">
				<img src="resources/images/gallery/banner17.jpg">
			</div>
			<div class="item">
				<img src="resources/images/gallery/banner14.jpg">
			</div>
		</div>
		<div class="buttons">
			<button id="prev"><</button>
			<button id="next">></button>
		</div>
		<ul class="dots">
			<li class="active"></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>

	<!-- Row 1 gallery card -->
	<div class="wrapper">
		<div class="card">
			<img src="resources/images/gallery/image1.jpeg" alt="">
			<div class="info">
				<h1>Mamalia Terbesar di Daratan</h1>
				<p>Gajah Africa</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image2.jpeg" alt="">
			<div class="info">
				<h1>Burung Burung</h1>
				<p>Macaw</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image3.jpeg" alt="">
			<div class="info">
				<h1>Pertanian Berkelanjutan</h1>
				<p>Anggur yang Vibrant dan Mudah Beradaptasi</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image4.jpeg" alt="">
			<div class="info">
				<h1>Keindahan Alam</h1>
				<p>Hutan, Danau, Gunung, Sungai....</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image5.jpeg" alt="">
			<div class="info">
				<h1>Kucing besar</h1>
				<p>Harimau</p>
				<a href="#" class="btn">Read More</a>
			</div>
		</div>
	</div>	
	<div id="popup-overlay">
		<div id="popup-content">
			<span id="close-popup">&times;</span>
			<div id="popup-image"></div>
			<h2 id="popup-title"></h2>
			<p id="popup-description"></p>
		</div>
	</div>

	<!-- Row 2 gallery card -->
	<div class="headers">
		<h1>Biodiversity</h1>
	</div>
	<div class="wrapper">
		<div class="card">
			<img src="resources/images/gallery/image6.jpeg" alt="">
			<div class="info">
				<h1>Panda Merah</h1>
				<p>Asli dari Himalaya Timur, panda merah menjalani kehidupan yang kesepian di...</p>
				<a href="#" class="btn2">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image7.jpeg" alt="">
			<div class="info">
				<h1>Robin</h1>
				<p>Umum ditemukan di Eropa, Asia, dan Amerika Utara, robin dibedakan oleh...</p>
				<a href="#" class="btn2">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image8.jpeg" alt="">
			<div class="info">
				<h1>Panda Besar</h1>
				<p>Panda hidup di hutan bambu China dan terkenal sebagai simbol konservasi. Mereka adalah...</p>
				<a href="#" class="btn2">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image9.jpeg" alt="">
			<div class="info">
				<h1>Emperor Penguin</h1>
				<p>Simbol Antartika, penguin empu, dapat bertahan hidup pada suhu serendah -40°C. Mereka adalah...</p>
				<a href="#" class="btn2">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image10.jpeg" alt="">
			<div class="info">
				<h1>Kupu-Kupu</h1>
				<p>Proses transformasi fantastis yang dilalui oleh kupu-kupu adalah...</p>
				<a href="#" class="btn2">Read More</a>
			</div>
		</div>
		<!-- Dynamic content for Biodiversity -->
        <?php if (!empty($content_by_category['Biodiversity'])): ?>
            <?php foreach ($content_by_category['Biodiversity'] as $content): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($content['image_path']); ?>" alt="">
                    <div class="info">
                        <h1><?php echo htmlspecialchars($content['title']); ?></h1>
                        <p><?php echo htmlspecialchars(substr($content['description'], 0, 100)) . '...'; ?></p>
                        <a href="#" class="btn2" data-description="<?php echo htmlspecialchars($content['description'], ENT_QUOTES); ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Debugging: No content found -->
            <p>No dynamic content for Biodiversity.</p>
        <?php endif; ?>
	</div>	
	<div id="popup-overlay2">
		<div id="popup-content2">
			<span id="close-popup2">&times;</span>
			<div id="popup-image2"></div>
			<h2 id="popup-title2"></h2>
			<p id="popup-description2"></p>
		</div>
	</div>

	<!-- Row 3 gallery card -->
	<div class="headers">
		<h1>Nature</h1>
	</div>
	<div class="wrapper">
		<div class="card">
			<img src="resources/images/gallery/image11.jpeg" alt="">
			<div class="info">
				<h1>Landscapes dan Geograpfi</h1>
				<p>Ciri-ciri fisik permukaan Bumi, seperti gunung, dataran, sungai, dan...</p>
				<a href="#" class="btn3">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image12.jpeg" alt="">
			<div class="info">
				<h1>Iklim dan Cuaca</h1>
				<p>Komponen penting dari alam, iklim dan cuaca membentuk ekosistem dan...</p>
				<a href="#" class="btn3">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image13.jpeg" alt="">
			<div class="info">
				<h1>Ekologi dan Ekosistem</h1>
				<p>Ekologi mempelajari interaksi antara makhluk hidup dan lingkungan mereka, dengan fokus pada...</p>
				<a href="#" class="btn3">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image14.jpeg" alt="">
			<div class="info">
				<h1>Flora dan Fauna</h1>
				<p>Flora dan fauna alam mewakili keberagaman besar kehidupan tumbuhan dan hewan di...</p>
				<a href="#" class="btn3">Read More</a>
			</div>
		</div>
		<!-- Dynamic content for Nature -->
        <?php if (!empty($content_by_category['Nature'])): ?>
            <?php foreach ($content_by_category['Nature'] as $content): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($content['image_path']); ?>" alt="">
                    <div class="info">
                        <h1><?php echo htmlspecialchars($content['title']); ?></h1>
                        <p><?php echo htmlspecialchars(substr($content['description'], 0, 100)) . '...'; ?></p>
                        <a href="#" class="btn3" data-description="<?php echo htmlspecialchars($content['description'], ENT_QUOTES); ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No dynamic content for Nature.</p>
        <?php endif; ?>
	</div>	
	<div id="popup-overlay3">
		<div id="popup-content3">
			<span id="close-popup3">&times;</span>
			<div id="popup-image3"></div>
			<h2 id="popup-title3"></h2>
			<p id="popup-description3"></p>
		</div>
	</div>

	<!-- Row 4 gallery card -->
	<div class="headers">
		<h1>Pertanian Berkelanjutan</h1>
	</div>
	<div class="wrapper">
		<div class="card">
			<img src="resources/images/gallery/image15.jpeg" alt="">
			<div class="info">
				<h1>Agroekologi</h1>
				<p>Salah satu dasar dari pertanian berkelanjutan adalah agroekologi, yang mencakup...</p>
				<a href="#" class="btn4">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image22.jpg" alt="">
			<div class="info">
				<h1>Kesehatan Tanah</h1>
				<p>Dalam pertanian berkelanjutan, kesehatan tanah sangat penting untuk menjaga dan meningkatkan kualitas tanah...</p>
				<a href="#" class="btn4">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image17.jpeg" alt="">
			<div class="info">
				<h1>Keanekaragaman Tanaman</h1>
				<p>Dalam pertanian berkelanjutan, keanekaragaman tanaman adalah praktik menanam berbagai spesies tanaman...</p>
				<a href="#" class="btn4">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image18.jpeg" alt="">
			<div class="info">
				<h1>Manajemen Air</h1>
				<p>Untuk menjaga hasil pertanian sambil meminimalkan dampak lingkungan, pengelolaan air...</p>
				<a href="#" class="btn4">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image16.jpeg" alt="">
			<div class="info">
				<h1>Keterlibatan komunitas</h1>
				<p>Dalam pertanian berkelanjutan, keterlibatan komunitas melibatkan petani, komunitas lokal, dan...</p>
				<a href="#" class="btn4">Read More</a>
			</div>
		</div>
		<!-- Dynamic content for Sustainable Agriculture -->
        <?php if (!empty($content_by_category['Sustainable Agriculture'])): ?>
            <?php foreach ($content_by_category['Sustainable Agriculture'] as $content): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($content['image_path']); ?>" alt="">
                    <div class="info">
                        <h1><?php echo htmlspecialchars($content['title']); ?></h1>
                        <p><?php echo htmlspecialchars(substr($content['description'], 0, 100)) . '...'; ?></p>
                        <a href="#" class="btn4" data-description="<?php echo htmlspecialchars($content['description'], ENT_QUOTES); ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No dynamic content for Sustainable Agriculture.</p>
        <?php endif; ?>
	</div>	
	<div id="popup-overlay4">
		<div id="popup-content4">
			<span id="close-popup4">&times;</span>
			<div id="popup-image4"></div>
			<h2 id="popup-title4"></h2>
			<p id="popup-description4"></p>
		</div>
	</div>

	<!-- Row 5 gallery card -->
	<div class="headers">
		<h1>Reforestasi</h1>
	</div>
	<div class="wrapper">
		<div class="card">
			<img src="resources/images/gallery/image20.jpeg" alt="">
			<div class="info">
				<h1>Restorasi ekologis</h1>
				<p>Dengan memulihkan spesies pohon asli, mendorong regenerasi alami, dan menciptakan habitat...</p>
				<a href="#" class="btn5">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image23.jpg" alt="">
			<div class="info">
				<h1>Mitigasi Perubahan Iklim</h1>
				<p>Perubahan Iklim Disebabkan oleh Reforestasi Menanam pohon untuk menyerap karbon dioksida dari...</p>
				<a href="#" class="btn5">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image24.jpg" alt="">
			<div class="info">
				<h1>Pengelolaan Sumber Daya Air</h1>
				<p>Reforestasi berkontribusi pada manajemen sumber daya air dengan meningkatkan ketersediaan, kualitas, dan regulasi...</p>
				<a href="#" class="btn5">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image25.jpg" alt="">
			<div class="info">
				<h1>Manfaat Sosial-Ekonomi</h1>
				<p>Manfaat sosial-ekonomi dari reforestasi melampaui restorasi ekologi untuk mencakup...</p>
				<a href="#" class="btn5">Read More</a>
			</div>
		</div>
		<div class="card">
			<img src="resources/images/gallery/image26.jpg" alt="">
			<div class="info">
				<h1>Konservasi Keanekaragaman Hayati</h1>
				<p>Karena reforestasi mengembalikan habitat bagi berbagai spesies tumbuhan dan hewan, ini sangat penting untuk konservasi keanekaragaman hayati.</p>
				<a href="#" class="btn5">Read More</a>
			</div>
		</div>
		<!-- Dynamic content for Reforestation -->
        <?php if (!empty($content_by_category['Reforestation'])): ?>
            <?php foreach ($content_by_category['Reforestation'] as $content): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($content['image_path']); ?>" alt="">
                    <div class="info">
                        <h1><?php echo htmlspecialchars($content['title']); ?></h1>
                        <p><?php echo htmlspecialchars(substr($content['description'], 0, 100)) . '...'; ?></p>
                        <a href="#" class="btn5" data-description="<?php echo htmlspecialchars($content['description'], ENT_QUOTES); ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No dynamic content for Reforestation.</p>
        <?php endif; ?>
	</div>	
	<div id="popup-overlay5">
		<div id="popup-content5">
			<span id="close-popup5">&times;</span>
			<div id="popup-image5"></div>
			<h2 id="popup-title5"></h2>
			<p id="popup-description5"></p>
		</div>
	</div>

    <!-- Footer Section of the Document -->
	<div id="footer">
		<div class="footer__container">
			<div class="animate" id="dev">
				<a href="https://www.unsrat.ac.id/"><img src="resources/images/developers/Univ.png" alt="UNSRAT"><span>Universitas Sam Ratulangi</span></a>
			</div>
			<div class="footer__container__left">
				<h3>Life on Land</h3>
				<p>&copy; Life on Land is a collaborative website built by a group of students from Universitas Sam Ratulangi</p>
			</div>
			<div class="footer__container__right">
				<h3>Contact Us</h3>
				<ul>
					<li><a href="mailto:kelompokweb@gmail.com">Email</a></li>
					<li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://twitter.com/">Twitter</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- JavaScript files -->
	<script src="js/gallery.js"></script>
	<script src="js/cursor.js"></script>
</body>
</html>