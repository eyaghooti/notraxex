<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$is_logged_in = isset($_SESSION["user_id"]);
$is_admin = false;

if ($is_logged_in) {
  $conn = new mysqli("localhost", "root", "", "notrax");
  if (!$conn->connect_error) {
    $uid = $_SESSION["user_id"];
    $res = $conn->query("SELECT role FROM users WHERE id = $uid LIMIT 1");
    if ($res && $row = $res->fetch_assoc()) {
      $is_admin = $row["role"] === "admin";
    }
  }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<nav class="navbar navbar-expand-lg <?php echo (isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] == '1') ? 'bg-dark navbar-dark' : 'bg-light navbar-light'; ?>">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/notraxex/">
      <i class="bi bi-currency-exchange fs-5 me-1"></i> <strong>نوتراکس</strong>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#notraxNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="notraxNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/notraxex/dashboard"><i class="bi bi-speedometer2 me-1"></i> داشبورد</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/market"><i class="bi bi-bar-chart-line me-1"></i> بازار</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/wallet"><i class="bi bi-wallet2 me-1"></i> کیف پول</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/trade"><i class="bi bi-graph-up-arrow me-1"></i> معامله</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/transactions"><i class="bi bi-arrow-left-right me-1"></i> تراکنش‌ها</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/blog"><i class="bi bi-newspaper me-1"></i> اخبار</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/about"><i class="bi bi-info-circle me-1"></i> درباره ما</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/faq"><i class="bi bi-question-circle me-1"></i> سوالات متداول</a></li>
        <li class="nav-item"><a class="nav-link" href="/notraxex/support"><i class="bi bi-headset me-1"></i> پشتیبانی</a></li>
        <?php if ($is_admin): ?>
          <li class="nav-item"><a class="nav-link" href="/notraxex/admin"><i class="bi bi-shield-lock me-1"></i> مدیریت</a></li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if ($is_logged_in): ?>
          <li class="nav-item"><a class="nav-link btn btn-outline-secondary me-2" href="/notraxex/account"><i class="bi bi-person-circle"></i> پروفایل</a></li>
          <li class="nav-item"><a class="nav-link btn btn-danger" href="/notraxex/logout"><i class="bi bi-box-arrow-right"></i> خروج</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link btn btn-outline-success me-2" href="/notraxex/login"><i class="bi bi-box-arrow-in-right"></i> ورود</a></li>
          <li class="nav-item"><a class="nav-link btn btn-success" href="/notraxex/register"><i class="bi bi-person-plus-fill"></i> ثبت‌نام</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
