<?php require_once __DIR__ . '/../partials/header.php'; ?>

<?php
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$conn = new mysqli("localhost", "root", "", "notrax");
if ($conn->connect_error) die("DB error");

$user_id = $_SESSION["user_id"];
$role = $conn->query("SELECT role FROM users WHERE id = $user_id")->fetch_assoc()["role"] ?? "";
if ($role !== "admin") {
    echo "<div style='text-align:center;margin-top:50px;font-family:sans-serif'>⛔ دسترسی غیرمجاز</div>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["kyc_id"], $_POST["action"])) {
    $kyc_id = intval($_POST["kyc_id"]);
    $action = $_POST["action"] === "approve" ? "approved" : "rejected";
    $conn->query("UPDATE kyc SET status = '$action' WHERE id = $kyc_id");
}

$page = $_GET["page"] ?? "dashboard";
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>پنل مدیریت | نوتراکس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body.dark-mode { background-color: #0d1117; color: #e6edf3; }
    .dark-mode .card, .dark-mode .table, .dark-mode .navbar, .dark-mode .form-control {
      background-color: #161b22; color: #e6edf3;
    }
    .dark-mode .table thead th {
      background-color: #21262d; color: #e6edf3;
    }
    .dark-mode .table td, .dark-mode .table th {
      border-color: #30363d;
    }
    .dark-mode .table-striped tbody tr:nth-of-type(odd) {
      background-color: #1f2937;
    }
    .dark-mode .table-striped tbody tr:nth-of-type(even) {
      background-color: #151b26;
    }
    .btn-toggle { position: fixed; left: 20px; bottom: 20px; z-index: 999; }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>

<button id="darkToggle" class="btn btn-outline-secondary btn-sm btn-toggle"><i class="bi bi-moon"></i></button>

<div class="container py-4">
  <h3 class="text-center mb-4">🛡️ پنل مدیریت نوتراکس</h3>
  <div class="mb-3 text-center">
    <a href="admin.php?page=dashboard" class="btn btn-outline-primary btn-sm">داشبورد</a>
    <a href="admin.php?page=withdrawals" class="btn btn-outline-primary btn-sm">برداشت‌ها</a>
    <a href="admin.php?page=kyc" class="btn btn-outline-primary btn-sm">تأیید هویت</a>
    <a href="admin.php?page=users" class="btn btn-outline-primary btn-sm">کاربران</a>
  </div>
  <?php
  switch ($page) {
    case 'withdrawals':
      $result = $conn->query("SELECT * FROM withdraw_requests ORDER BY created_at DESC");
      echo "<h5>📤 درخواست‌های برداشت</h5>
      <table class='table table-bordered table-sm table-striped text-center'><thead class='table-light'><tr><th>کاربر</th><th>ارز</th><th>مقدار</th><th>آدرس</th><th>تاریخ</th></tr></thead><tbody>";
      while ($w = $result->fetch_assoc()) {
        echo "<tr><td>{$w['user_id']}</td><td>{$w['currency']}</td><td>{$w['amount']}</td><td>{$w['address']}</td><td>{$w['created_at']}</td></tr>";
      }
      echo "</tbody></table>";
      break;

    case 'kyc':
      $kyc = $conn->query("SELECT k.*, u.email FROM kyc k JOIN users u ON k.user_id = u.id ORDER BY k.submitted_at DESC");
      echo "<h5>🧾 تایید هویت کاربران</h5>
      <table class='table table-bordered table-striped text-center'><thead class='table-dark'><tr><th>کاربر</th><th>کد ملی</th><th>وضعیت</th><th>تاریخ</th><th>عملیات</th></tr></thead><tbody>";
      while ($k = $kyc->fetch_assoc()) {
        echo "<tr><td>{$k['email']}</td><td>{$k['national_id']}</td><td>{$k['status']}</td><td>{$k['submitted_at']}</td>
        <td>
          <form method='post' class='d-inline'>
            <input type='hidden' name='kyc_id' value='{$k['id']}'>
            <button name='action' value='approve' class='btn btn-success btn-sm'>تأیید</button>
            <button name='action' value='reject' class='btn btn-danger btn-sm'>رد</button>
          </form>
        </td></tr>";
      }
      echo "</tbody></table>";
      break;

    case 'users':
      $users = $conn->query("SELECT u.id, u.email, u.role, k.status AS kyc_status, u.created_at FROM users u LEFT JOIN kyc k ON u.id = k.user_id ORDER BY u.created_at DESC");
      echo "<h5>👥 لیست کاربران</h5>
      <div class='table-responsive'><table class='table table-bordered table-striped table-hover text-center'>
      <thead class='table-dark'><tr><th>#</th><th>ایمیل</th><th>نقش</th><th>وضعیت KYC</th><th>تاریخ ثبت‌نام</th></tr></thead><tbody>";
      $i = 1;
      while ($u = $users->fetch_assoc()) {
        echo "<tr><td>{$i}</td><td>{$u['email']}</td><td>{$u['role']}</td><td>" . ($u['kyc_status'] ?? 'نامشخص') . "</td><td>{$u['created_at']}</td></tr>";
        $i++;
      }
      echo "</tbody></table></div>";
      break;

    default:
      $total_users = $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
      $total_transactions = $conn->query("SELECT COUNT(*) FROM transactions")->fetch_row()[0];
      $total_wallet_balance = $conn->query("SELECT SUM(balance) FROM wallets")->fetch_row()[0] ?? 0;
      $total_withdrawals = $conn->query("SELECT COUNT(*) FROM withdraw_requests")->fetch_row()[0];
      $pending_kyc = $conn->query("SELECT COUNT(*) FROM kyc WHERE status = 'pending'")->fetch_row()[0];
      $recent_users = $conn->query("SELECT email, created_at FROM users ORDER BY created_at DESC LIMIT 5");
      echo "<div class='row text-center mb-4'>
      <div class='col-md-4'><div class='card border-info'><div class='card-body'><h5>👥 کاربران</h5><p class='display-6'>{$total_users}</p></div></div></div>
      <div class='col-md-4'><div class='card border-success'><div class='card-body'><h5>💳 تراکنش‌ها</h5><p class='display-6'>{$total_transactions}</p></div></div></div>
      <div class='col-md-4'><div class='card border-warning'><div class='card-body'><h5>💰 موجودی</h5><p class='display-6'>" . number_format($total_wallet_balance, 4) . "</p></div></div></div>
      </div>
      <div class='row text-center mb-4'>
      <div class='col-md-6'><div class='card border-danger'><div class='card-body'><h5>📤 برداشت‌ها</h5><p class='display-6'>{$total_withdrawals}</p></div></div></div>
      <div class='col-md-6'><div class='card border-secondary'><div class='card-body'><h5>🕵️ KYC در انتظار</h5><p class='display-6'>{$pending_kyc}</p></div></div></div>
      </div>
      <div class='card mb-4'><div class='card-header'>🆕 ۵ کاربر آخر</div><div class='card-body p-0'>
      <table class='table table-sm table-striped text-center'><thead><tr><th>#</th><th>ایمیل</th><th>تاریخ ثبت‌نام</th></tr></thead><tbody>";
      $i = 1;
      while ($u = $recent_users->fetch_assoc()) {
        echo "<tr><td>{$i}</td><td>{$u['email']}</td><td>{$u['created_at']}</td></tr>";
        $i++;
      }
      echo "</tbody></table></div></div>
      <div class='card mb-4'><div class='card-header'>📈 نمودار تراکنش‌های ۷ روز اخیر</div><div class='card-body'><canvas id='txChart' height='100'></canvas></div></div>
      <script>
        fetch('admin_stats_api.php')
          .then(res => res.json())
          .then(data => {
            new Chart(document.getElementById('txChart'), {
              type: 'line',
              data: {
                labels: data.labels,
                datasets: [{
                  label: 'تعداد تراکنش‌ها',
                  data: data.counts,
                  borderColor: 'rgb(75, 192, 192)',
                  backgroundColor: 'rgba(75,192,192,0.1)',
                  tension: 0.3
                }]
              }
            });
          });
      </script>";
  }
  ?>
</div>
<script>
  const toggle = document.getElementById("darkToggle");
  const body = document.body;
  const nav = document.querySelector("nav");

  function applyTheme(isDark) {
    if (isDark) {
      body.classList.add("dark-mode");
      nav.classList.add("bg-dark", "navbar-dark");
      nav.classList.remove("bg-light", "navbar-light");
      toggle.innerHTML = '<i class="bi bi-sun"></i>';
    } else {
      body.classList.remove("dark-mode");
      nav.classList.remove("bg-dark", "navbar-dark");
      nav.classList.add("bg-light", "navbar-light");
      toggle.innerHTML = '<i class="bi bi-moon"></i>';
    }
  }

  toggle.addEventListener("click", () => {
    const isDark = !body.classList.contains("dark-mode");
    applyTheme(isDark);
    localStorage.setItem("darkMode", isDark ? "1" : "0");
  });

  window.onload = () => {
    const saved = localStorage.getItem("darkMode") === "1";
    applyTheme(saved);
  };
</script>
</body>
</html>
