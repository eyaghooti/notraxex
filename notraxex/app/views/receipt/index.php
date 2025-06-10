<?php require_once __DIR__ . '/../partials/header.php'; ?>


<?php
if (!isset($_SESSION["user_id"])) {
    die("لطفاً وارد شوید.");
}
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "notrax";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$tx_id = intval($_GET["id"] ?? 0);
$res = $conn->query("SELECT * FROM transactions WHERE id = $tx_id AND user_id = " . $_SESSION["user_id"]);
if ($res->num_rows == 0) {
    die("⛔ تراکنش مورد نظر یافت نشد.");
}
$t = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>رسید تراکنش #<?= $t["id"] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: Tahoma, sans-serif; background: #f2f4f7; padding: 40px; }
    .receipt {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }
    .receipt h4 { text-align: center; margin-bottom: 20px; }
    .receipt table { width: 100%; }
    .receipt td { padding: 8px 0; }
    .print-btn {
      display: block;
      margin: 20px auto 0;
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
  <div class="receipt">
    <h4>📄 رسید تراکنش</h4>
    <table>
      <tr><td><strong>شناسه:</strong></td><td><?= $t["id"] ?></td></tr>
      <tr><td><strong>نوع:</strong></td><td><?= $t["type"] ?></td></tr>
      <tr><td><strong>ارز:</strong></td><td><?= $t["symbol"] ?></td></tr>
      <tr><td><strong>مقدار:</strong></td><td><?= number_format($t["amount"], 8) ?></td></tr>
      <tr><td><strong>وضعیت:</strong></td><td><?= $t["status"] ?></td></tr>
      <tr><td><strong>تاریخ:</strong></td><td><?= $t["created_at"] ?></td></tr>
    </table>
    <div class="print-btn">
      <button onclick="window.print()">🖨️ چاپ رسید</button>
    </div>
  </div>
</body>
</html>
