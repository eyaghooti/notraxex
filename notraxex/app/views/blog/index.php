<?php require_once __DIR__ . '/../partials/header.php'; ?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مقالات نوتراکس</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <style>
    body.dark-mode { background-color: #121212; color: #f1f1f1; }
    .navbar.dark-mode { background-color: #1e1e1e !important; }
    .btn-toggle { position: fixed; bottom: 20px; left: 20px; z-index: 999; }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>


<div class="container my-5">
  <h3 class="mb-4 text-center">📰 مقالات نوتراکس</h3>
  <div class="row">
    <div class="col-md-4">
      <div class="card p-3 mb-3 shadow-sm">
        <h5>تحلیل تکنیکال بیت‌کوین</h5>
        <p>بررسی روند صعودی و مقاومت‌های کلیدی در بازار BTC.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 mb-3 shadow-sm">
        <h5>تفاوت کیف‌پول‌ها</h5>
        <p>مقایسه کیف‌پول سخت‌افزاری با نرم‌افزاری برای نگهداری ایمن رمزارزها.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 mb-3 shadow-sm">
        <h5>۵ اشتباه رایج تریدرها</h5>
        <p>خطاهایی که ممکن است سرمایه شما را نابود کنند و چگونه از آن‌ها دوری کنیم.</p>
      </div>
    </div>
  </div>
</div>

<button id="darkToggle" class="btn btn-outline-secondary btn-sm btn-toggle">🌙 حالت شب</button>
<script>
  const body = document.body;
  const nav = document.querySelector(".navbar");
  const toggle = document.getElementById("darkToggle");

  function applyTheme(isDark) {
    if (isDark) {
      body.classList.add("dark-mode");
      nav.classList.remove("bg-light");
      nav.classList.add("bg-dark", "navbar-dark");
      toggle.innerText = "☀️ حالت روشن";
    } else {
      body.classList.remove("dark-mode");
      nav.classList.remove("bg-dark", "navbar-dark");
      nav.classList.add("bg-light");
      toggle.innerText = "🌙 حالت شب";
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
