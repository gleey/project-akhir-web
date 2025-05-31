<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.html');
    exit();
}

include_once 'api/config/database.php';
$database = new Database();
$db = $database->getConnection();

// Fetch all content
$query = "SELECT * FROM content ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="icon" type="image/svg" href="resources/logos/evos.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>
<body>
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="home.php"><img src="resources/logos/evos.png" alt="logo"></a></li>
            <li><a href="home.php"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
            <li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
            <li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
            <li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
            <li><a href="content_management.php" class="active"><span class="material-symbols-rounded">edit</span><span class="nav__text">Manage Content</span></a></li>
            <li><a href="api/user/logout.php" class="logout-button"><span class="material-symbols-rounded">logout</span><span class="nav__text">Logout</span></a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Content Management</h1>
        
        <!-- Form Tambah/Edit Konten -->
        <h2>Add/Edit Content</h2>
        <form id="content_form" method="POST" action="api/content/save.php" enctype="multipart/form-data">
            <input type="hidden" name="id" id="content_id">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
            
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
            
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
            
            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="Biodiversity">Biodiversity</option>
                <option value="Nature">Nature</option>
                <option value="Sustainable Agriculture">Sustainable Agriculture</option>
                <option value="Reforestation">Reforestation</option>
            </select>
            
            <input type="submit" value="Save Content">
        </form>

        <!-- Daftar Konten -->
        <h2>Content List</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($contents) > 0): ?>
                    <?php foreach ($contents as $content): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($content['title']); ?></td>
                            <td><?php echo htmlspecialchars($content['category']); ?></td>
                            <td><?php echo htmlspecialchars($content['created_at']); ?></td>
                            <td>
                                <button onclick="editContent(<?php echo $content['id']; ?>, '<?php echo htmlspecialchars($content['title']); ?>', '<?php echo htmlspecialchars($content['description']); ?>', '<?php echo htmlspecialchars($content['category']); ?>')">Edit</button>
                                <a href="api/content/delete.php?id=<?php echo $content['id']; ?>" onclick="return confirm('Are you sure you want to delete this content?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No content available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

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
                    <li><a href="https://twitter.com">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function editContent(id, title, description, category) {
            document.getElementById('content_id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('description').value = description;
            document.getElementById('category').value = category;
        }
    </script>
</body>
</html>