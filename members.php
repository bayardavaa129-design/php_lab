
<?php
require_once "includes/config_session.inc.php";

// Нэвтрээгүй хэрэглэгчийг буцаана
if (!isset($_SESSION["user_id"])) {
    header("Location: account.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Гишүүдийн хуудас</title>
</head>
<body>

    <h2>Гишүүдийн хуудас</h2>

    <p>
        Тавтай морил,
        <?php echo htmlspecialchars($_SESSION["user_username"]); ?>!
    </p>

    <p>Та амжилттай нэвтэрсэн байна.</p>

    <a href="account.php">Буцах</a>

</body>
</html>
