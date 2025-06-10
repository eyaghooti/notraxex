
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "notrax";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$code = $_GET["code"] ?? "";
$msg = "";

if ($code) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE verification_code = ? AND is_verified = 0");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $conn->query("UPDATE users SET is_verified = 1, verification_code = NULL WHERE id = $user_id");
        $msg = "✅ ایمیل شما با موفقیت تأیید شد. اکنون می‌توانید وارد حساب کاربری خود شوید.";
    } else {
        $msg = "⛔ لینک تأیید معتبر نیست یا قبلاً استفاده شده است.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تأیید ایمیل | نوتراکس</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>
  <div class="container text-center mt-5">
    <div class="alert alert-info"><?php echo $msg; ?></div>
    <a href="login.php" class="btn btn-primary">ورود به حساب</a>
  </div>
</body>
</html>
