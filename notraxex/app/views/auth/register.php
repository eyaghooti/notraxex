
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "notrax";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$msg = "";
$show_login_button = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $msg = "⚠️ این ایمیل قبلاً ثبت شده است. لطفاً وارد شوید یا ایمیل دیگری وارد کنید.";
        $show_login_button = true;
    } else {
        $stmt = $conn->prepare("INSERT INTO users (email, password, is_verified) VALUES (?, ?, 1)");
        $stmt->bind_param("ss", $email, $password);
        if ($stmt->execute()) {
            header("Location: login.php?registered=1");
            exit();
        } else {
            $msg = "⛔ خطا در ثبت‌نام: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>ثبت‌نام در نوتراکس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; font-family: Tahoma, sans-serif; }
    .register-box {
        max-width: 400px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
  <div class="register-box">
    <h4 class="text-center mb-4">ثبت‌نام در نوتراکس</h4>
    <?php if ($msg): ?>
      <div class="alert alert-warning text-center"><?php echo $msg; ?></div>
      <?php if ($show_login_button): ?>
        <div class="text-center">
          <a href="login.php" class="btn btn-sm btn-outline-primary mt-2">ورود به حساب</a>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <form method="post" action="">
      <div class="mb-3">
        <label for="email" class="form-label">ایمیل</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">رمز عبور</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">ثبت‌نام</button>
    </form>
  </div>
</body>
</html>
