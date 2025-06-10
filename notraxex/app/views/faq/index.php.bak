<?php require_once __DIR__ . '/../partials/header.php'; ?>


<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>سوالات متداول | نوتراکس</title>
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
  <h3 class="mb-4">سوالات متداول</h3>
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="q1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1">
          چگونه ثبت‌نام کنم؟
        </button>
      </h2>
      <div id="a1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
        <div class="accordion-body">از صفحه اصلی گزینه ثبت‌نام را انتخاب و اطلاعات خود را وارد کنید.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="q2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2">
          آیا امکان برداشت سریع وجود دارد؟
        </button>
      </h2>
      <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">بله، پس از تأیید هویت می‌توانید سریع برداشت انجام دهید.</div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
