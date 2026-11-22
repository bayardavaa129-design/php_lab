<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $firstname = htmlspecialchars($_POST["firstname"]);
 $lastname = htmlspecialchars($_POST["lastname"]);
 $course = htmlspecialchars($_POST["course"]);
 if (empty($firstname) || empty($lastname)) {
 header("Location: ../contact.php");
 exit();
 }
 echo "<h2>Хүлээн авсан мэдээлэл</h2>";
 echo "<p>Нэр: $firstname</p>";
 echo "<p>Овог: $lastname</p>";
 echo "<p>Хичээл: $course</p>";
 echo '<p><a href="../contact.php">Буцах</a></p>';
} else {
 header("Location: ../contact.php");
 exit();
}