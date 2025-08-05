<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body> 
    <header>
        <h1 ><a href="admin.php">Stack Overflex</a></h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_home.php">Trang chủ</a></li>
            <li><a href="admin.php">See question</a></li>
            <li><a href="manage_user_module.php">manage user and module</a></li>
            <li><a href="../logout.php">Logout</a></li>
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