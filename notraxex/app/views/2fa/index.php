
<?php
if (!isset($_SESSION["temp_user_id"])) {
    header("Location: login.php");
    exit();
}
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "notrax";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_id = $_SESSION["temp_user_id"];
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];
    $stmt = $conn->prepare("SELECT 2fa_code, 2fa_expires FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($expected, $expires);
    if ($stmt->fetch()) {
        if ($code === $expected && strtotime($expires) > time()) {
            unset($_SESSION["temp_user_id"]);
            $_SESSION["user_id"] = $user_id;
            $conn->query("UPDATE users SET 2fa_code = NULL, 2fa_expires = NULL WHERE id = $user_id");
            header("Location: pages/dashboard.php");
            exit();
        } else {
            $msg = "⛔ کد نامعتبر یا منقضی شده است.";
        }
    } else {
        $msg = "⛔ خطا در بررسی کد.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>ورود دومرحله‌ای | نوتراکس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background-color: #eef1f4; font-family: Tahoma, sans-serif; }
    .box {
        max-width: 400px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
<?php include 'header.php'; ?>\n
  <div class="box">
    <h5 class="text-center mb-4">🔐 ورود دومرحله‌ای</h5>
    <?php if ($msg): ?>
      <div class="alert alert-danger text-center"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">کد تأیید</label>
        <input type="text" name="code" class="form-control text-center" maxlength="10" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">تأیید</button>
    </form>
  </div>
</body>
</html>
