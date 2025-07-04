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
$res = $conn->query("SELECT * FROM transactions WHERE user_id = $user_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>گزارشات | نوتراکس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
<?php include 'header_with_icons.php'; ?>
<div class="container my-5">
  <h4 class="mb-4 text-center">📋 گزارش تراکنش‌ها</h4>
  <?php if ($res->num_rows > 0): ?>
  <div class="table-responsive">
    <table class="table table-bordered text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>نوع</th>
          <th>ارز</th>
          <th>مقدار</th>
          <th>وضعیت</th>
          <th>تاریخ</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($t = $res->fetch_assoc()): ?>
        <tr>
          <td>
            <?php
              $type = trim(strtolower($t["type"]));
              echo $type === "buy" ? "خرید" : ($type === "sell" ? "فروش" : "نامشخص");
            ?>
          </td>
          <td><?= htmlspecialchars($t["symbol"]) ?></td>
          <td><?= number_format($t["amount"], 8) ?></td>
          <td><?= htmlspecialchars($t["status"]) ?></td>
          <td><?= htmlspecialchars($t["created_at"]) ?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <?php else: ?>
    <div class="alert alert-warning text-center">هیچ تراکنشی ثبت نشده است.</div>
  <?php endif; ?>
</div>
</body>
</html>
