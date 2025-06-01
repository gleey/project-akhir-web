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
$query_content = "SELECT * FROM content ORDER BY created_at DESC";
$stmt_content = $db->prepare($query_content);
$stmt_content->execute();
$contents = $stmt_content->fetchAll(PDO::FETCH_ASSOC);

// Fetch all users
$query_users = "SELECT id, username, role, created FROM users ORDER BY created DESC";
$stmt_users = $db->prepare($query_users);
$stmt_users->execute();
$users = $stmt_users->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/home.css"/>
    <link rel="icon" type="image/svg" href="resources/logos/evos.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <style>
        .success { color: green; }
        .error { color: red; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #000; }
        button, a.button { padding: 5px 10px; text-decoration: none; color: #fff; background-color: #007bff; border-radius: 3px; }
        button.delete { background-color: #dc3545; cursor: pointer; }
    </style>
</head>
<body>
    <nav>
        <ul id="navbar">
            <li id="logo" style="float:left"><a href="home.php"><img src="resources/logos/evos.png" alt="logo"></a></li>
            <li><a href="home.php"><span class="material-symbols-rounded">home</span><span class="nav__text">Home</span></a></li>
            <li><a href="gallery.php"><span class="material-symbols-rounded">movie</span><span class="nav__text">Gallery</span></a></li>
            <li><a href="feedback.php"><span class="material-symbols-rounded">chat</span><span class="nav__text">Comments</span></a></li>
            <li><a href="team.php"><span class="material-symbols-rounded">info</span><span class="nav__text">About Us</span></a></li>
            <li><a href="admin.php" class="active"><span class="material-symbols-rounded">admin_panel_settings</span><span class="nav__text">Admin Dashboard</span></a></li>
            <li id="logout-nav"><a href="api/user/logout.php" class="logout-button"><span class="material-symbols-rounded">logout</span><span class="nav__text">Logout</span></a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Notification -->
        <div id="notification" style="display: none; padding: 10px; margin-bottom: 20px;"></div>

        <!-- Add/Edit Content Form -->
        <h2>Add/Edit Content</h2>
        <form id="content_form" method="POST" enctype="multipart/form-data" action="javascript:void(0)">
            <input type="hidden" name="id" id="content_id">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
            
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
            
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
            <div id="current_image" style="display: none; margin-top: 5px;"></div>
            
            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="Biodiversity">Biodiversity</option>
                <option value="Nature">Nature</option>
                <option value="Sustainable Agriculture">Sustainable Agriculture</option>
                <option value="Reforestation">Reforestation</option>
            </select>
            
            <input type="submit" value="Save Content">
        </form>

        <!-- Content List -->
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
                                <button class="edit-button" data-content='<?php echo json_encode([
                                    "id" => $content["id"],
                                    "title" => $content["title"],
                                    "description" => $content["description"],
                                    "category" => $content["category"],
                                    "image_path" => $content["image_path"] ?? ""
                                ], JSON_HEX_QUOT | JSON_HEX_APOS); ?>'>Edit</button>
                                <button class="delete" onclick="deleteContent(<?php echo $content['id']; ?>)">Delete</button>
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

        <!-- User List -->
        <h2>User List</h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($users) > 0): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td><?php echo htmlspecialchars($user['created']); ?></td>
                            <td>
                                <button class="delete" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No users available</td>
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
                <p>© Life on Land is a collaborative website built by a group of students from Universitas Sam Ratulangi</p>
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

    <script src="js/admin.js"></script>
</body>
</html>