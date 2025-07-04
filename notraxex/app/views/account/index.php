<?php require_once __DIR__ . '/../partials/header.php'; ?>


<?php
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "notrax";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_id = $_SESSION["user_id"];
$email = "";
$success = "";
$error = "";

// دریافت ایمیل کاربر
$stmt = $conn->prepare("SELECT email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

// تغییر رمز عبور
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new_password"])) {
    $new_password = $_POST["new_password"];
    $hashed = password_hash($new_password, PASSWORD_BCRYPT);
    $update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $update->bind_param("si", $hashed, $user_id);
    if ($update->execute()) {
        $success = "رمز عبور با موفقیت تغییر یافت.";
    } else {
        $error = "خطا در تغییر رمز عبور.";
    }
    $update->close();
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مدیریت حساب کاربری</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; font-family: Tahoma, sans-serif; }
    .account-box {
        max-width: 600px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="account-box">
    <h4 class="mb-4 text-center">⚙️ مدیریت حساب کاربری</h4>
    <?php if ($success): ?>
      <div class="alert alert-success text-center"><?php echo $success; ?></div>
    <?php elseif ($error): ?>
      <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php endif; ?>

    <p><strong>ایمیل شما:</strong> <?php echo htmlspecialchars($email); ?></p>

    <hr>
    <h6>تغییر رمز عبور</h6>
    <form method="post">
      <div class="mb-3">
        <label for="new_password" class="form-label">رمز عبور جدید</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">ثبت تغییر</button>
    </form>

    <div class="text-center mt-3">
      <a href="pages/dashboard.php" class="btn btn-outline-secondary">بازگشت به داشبورد</a>
    </div>
  </div>
</body>
</html>
