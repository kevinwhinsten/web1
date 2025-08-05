<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Stack Overflex</title>
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 ><a href="home.php">Stack Overflex</a></h1>
    </header>
    <nav>
        <ul>
            <li><a href="home.php">home page</a></li>
            <li><a href="posts.php">See question</a></li>
            <li><a href="sendemail.php">contact with admin</a></li>
            <?php if(!isset($_SESSION['id'])): ?>
                <li><a href="login.php">login</a></li>
            <?php else: ?>
                <li><a href="add_post.php">update question</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>
            
            

        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <footer>
        <p>© 2025 - Dự án của bạn</p>
    </footer>
</body>
</html>