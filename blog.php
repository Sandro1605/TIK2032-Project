<?php
include 'config.php';

$sql = "SELECT title, content FROM blog";
$result = $conn->query($sql);

$posts = [];
if ($result->num_rows > 0) {
    // Fetch all posts
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <link rel="stylesheet" href="Gaya.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu-links">
                <li><a href="index.html">HOME</a></li>
                <li><a href="galeri.html">GALLERY</a></li>
                <li><a href="blog.php">BLOG</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </nav>
    </header>

    <main class="blog-content">
        <article>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                    <br>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No posts available.</p>
            <?php endif; ?>
        </article>
    </main>
</body>
</html>