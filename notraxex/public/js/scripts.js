// From about.php
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


// From admin.php
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


// From admin.php
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


// From blog.php
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


// From dashboard.php
const ctx = document.getElementById('walletChart').getContext('2d');
    const walletChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: <?php echo json_encode(array_column($balances, 'currency')); ?>,
        datasets: [{
          label: 'موجودی',
          data: <?php echo json_encode(array_column($balances, 'balance')); ?>,
          backgroundColor: ['#4caf50','#2196f3','#ff9800','#e91e63','#9c27b0']
        }]
      },
      options: {
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              color: document.body.classList.contains("dark-mode") ? '#f1f1f1' : '#000'
            }
          }
        }
      }
    });

    const toggle = document.getElementById("darkToggle");
    const body = document.body;
    const navbar = document.getElementById("mainNavbar");

    function applyTheme(isDark) {
  if (isDark) {
    body.classList.add("dark-mode");
    toggle.innerText = "☀️ حالت روشن";
    const navbar = document.querySelector(".navbar");
    if (navbar) {
      navbar.classList.remove("bg-light", "navbar-light");
      navbar.classList.add("bg-dark", "navbar-dark");
    }
  } else {
    body.classList.remove("dark-mode");
    toggle.innerText = "🌙 حالت شب";
    const navbar = document.querySelector(".navbar");
    if (navbar) {
      navbar.classList.remove("bg-dark", "navbar-dark");
      navbar.classList.add("bg-light", "navbar-light");
    }
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


// From faq.php
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


// From index.php
async function loadPrices() {
    try {
      const res = await fetch("https://api.binance.com/api/v3/ticker/price");
      const data = await res.json();
      const btc = data.find(i => i.symbol === "BTCUSDT");
      const eth = data.find(i => i.symbol === "ETHUSDT");
      const bnb = data.find(i => i.symbol === "BNBUSDT");
      document.getElementById("btcPrice").innerText = parseFloat(btc.price).toLocaleString() + " USDT";
      document.getElementById("ethPrice").innerText = parseFloat(eth.price).toLocaleString() + " USDT";
      document.getElementById("bnbPrice").innerText = parseFloat(bnb.price).toLocaleString() + " USDT";
    } catch (e) {
      document.getElementById("market").innerHTML = '<div class="alert alert-danger">خطا در دریافت قیمت‌ها ❌</div>';
    }
  }

  loadPrices();

  const body = document.body;
  const nav = document.querySelector(".navbar");
  const toggle = document.getElementById("darkToggle");

  function applyTheme(isDark) {
    if (isDark) {
      body.classList.add("dark-mode");
      nav.classList.remove("bg-light");
      nav.classList.add("bg-dark", "navbar-dark");
      document.querySelectorAll(".card").forEach(c => c.classList.add("dark-mode"));
      toggle.innerText = "☀️ حالت روشن";
    } else {
      body.classList.remove("dark-mode");
      nav.classList.remove("bg-dark", "navbar-dark");
      nav.classList.add("bg-light");
      document.querySelectorAll(".card").forEach(c => c.classList.remove("dark-mode"));
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


// From login.php
const toggle = document.getElementById("darkToggle");
const body = document.body;
const nav = document.querySelector(".navbar");

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


// From market.php
const symbols = ["BTCUSDT", "ETHUSDT", "BNBUSDT", "XRPUSDT", "SOLUSDT"];

// TradingView widgets
symbols.forEach(pair => {
  new TradingView.widget({
    autosize: false,
    width: 120,
    height: 60,
    symbol: `BINANCE:${pair}`,
    interval: "30",
    timezone: "Asia/Tehran",
    theme: localStorage.getItem("darkMode") === "1" ? "dark" : "light",
    style: "1",
    locale: "fa",
    enable_publishing: false,
    allow_symbol_change: false,
    container_id: `tv-chart-${pair}`
  });
});

// Binance Sparkline (Mini charts with Chart.js)
async function drawSparklines() {
  try {
    for (let pair of symbols) {
      const url = `https://api.binance.com/api/v3/klines?symbol=${pair}&interval=5m&limit=30`;
      const res = await fetch(url);
      const data = await res.json();
      const prices = data.map(item => parseFloat(item[4])); // close prices
      const canvas = document.getElementById("sparkline-" + pair);
      new Chart(canvas, {
        type: 'line',
        data: {
          labels: prices.map((_, i) => i),
          datasets: [{
            data: prices,
            borderWidth: 1,
            borderColor: '#00c853',
            backgroundColor: 'transparent',
            pointRadius: 0,
            tension: 0.3
          }]
        },
        options: {
          plugins: { legend: { display: false } },
          scales: {
            x: { display: false },
            y: { display: false }
          }
        }
      });
    }
  } catch (err) {
    console.error("❌ Sparkline error", err);
  }
}

drawSparklines();

// Binance Price Fetch
async function updatePrices() {
  try {
    const res = await fetch("https://api.binance.com/api/v3/ticker/price");
    const data = await res.json();
    symbols.forEach(pair => {
      const found = data.find(item => item.symbol === pair);
      if (found) {
        document.getElementById("price-" + pair).innerText = parseFloat(found.price).toLocaleString() + " USDT";
      }
    });
  } catch (err) {
    console.error("❌ خطا در دریافت قیمت‌ها", err);
  }
}
updatePrices();


// From market.php
// Dark Mode
const toggle = document.getElementById("darkToggle");
const body = document.body;
function applyTheme(isDark) {
  const nav = document.querySelector(".navbar");
if (nav) {
  if (isDark) {
    nav.classList.remove("bg-light", "navbar-light");
    nav.classList.add("bg-dark", "navbar-dark");
  } else {
    nav.classList.remove("bg-dark", "navbar-dark");
    nav.classList.add("bg-light", "navbar-light");
  }
}

  const tableHead = document.getElementById("tableHead");
if (tableHead) {
  if (isDark) {
    tableHead.classList.remove("table-light");
    tableHead.classList.add("table-dark");
  } else {
    tableHead.classList.remove("table-dark");
    tableHead.classList.add("table-light");
  }
}

  if (isDark) {
    body.classList.add("dark-mode");
    toggle.innerText = "☀️ حالت روشن";
  } else {
    body.classList.remove("dark-mode");
    toggle.innerText = "🌙 حالت شب";
  }
}
toggle.addEventListener("click", () => {
  const isDark = !body.classList.contains("dark-mode");
  applyTheme(isDark);
  localStorage.setItem("darkMode", isDark ? "1" : "0");
  location.reload();
});
window.onload = () => {
  const saved = localStorage.getItem("darkMode") === "1";
  applyTheme(saved);
};


// From trade.php
new TradingView.widget({
    "autosize": true,
    "symbol": "BINANCE:BTCUSDT",
    "interval": "30",
    "timezone": "Asia/Tehran",
    "theme": "dark",
    "style": "1",
    "locale": "fa_IR",
    "container_id": "tv_chart_container"
  });

  async function fetchOrderBook() {
    const res = await fetch("https://api.binance.com/api/v3/depth?symbol=BTCUSDT&limit=10");
    const data = await res.json();
    const container = document.getElementById("orderBook");
    container.innerHTML = '<div class="text-success mb-2">خرید</div>' +
      data.bids.map(b => `<div class='text-success'>${parseFloat(b[0]).toFixed(2)} / ${parseFloat(b[1]).toFixed(4)}</div>`).join('') +
      '<div class="text-danger mt-3">فروش</div>' +
      data.asks.map(a => `<div class='text-danger'>${parseFloat(a[0]).toFixed(2)} / ${parseFloat(a[1]).toFixed(4)}</div>`).join('');
  }

  fetchOrderBook();
  setInterval(fetchOrderBook, 10000);

  function setPercent(btn, percent) {
    const form = btn.closest("form");
    const amountField = form.querySelector(".amount-field");
    const balance = 1000; // placeholder for real balance
    amountField.value = ((balance * percent) / 100).toFixed(4);
  }

  const toggle = document.getElementById("darkToggle");
  const body = document.body;
  const nav = document.querySelector(".navbar");

  function applyTheme(isDark) {
    if (isDark) {
      body.classList.add("dark-mode");
      nav.classList.remove("bg-light");
      nav.classList.add("bg-dark", "navbar-dark");
      toggle.innerHTML = '<i class="bi bi-sun"></i>';
    } else {
      body.classList.remove("dark-mode");
      nav.classList.remove("bg-dark", "navbar-dark");
      nav.classList.add("bg-light");
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
    document.querySelectorAll(".order-type-select").forEach(sel => {
      sel.addEventListener("change", () => {
        const form = sel.closest("form");
        const priceField = form.querySelector(".price-field");
        const hint = form.querySelector(".market-hint");
        if (sel.value === "market") {
          priceField.classList.add("d-none");
          priceField.removeAttribute("required");
          hint.classList.remove("d-none");
        } else {
          priceField.classList.remove("d-none");
          priceField.setAttribute("required", "required");
          hint.classList.add("d-none");
        }
      });
    });
  };

document.addEventListener("DOMContentLoaded", () => {
  // فرم خرید (همیشه USDT)
  const buySymbol = document.querySelector('#buy-form select[name="symbol"]');
  const usdtText = document.getElementById("usdtBalanceText");
  buySymbol.addEventListener("change", () => {
    const usdt = document.getElementById("usdtBalance").dataset.value;
    usdtText.innerText = `موجودی: ${parseFloat(usdt).toFixed(2)} USDT`;
  });

  // فرم فروش (BTC یا ETH)
  const sellSymbol = document.querySelector('#sell-form select[name="symbol"]');
  const cryptoText = document.getElementById("cryptoBalanceText");
  sellSymbol.addEventListener("change", () => {
    const coin = sellSymbol.value.replace("USDT", "");
    const balance = document.getElementById(coin.toLowerCase() + "Balance").dataset.value;
    cryptoText.innerText = `موجودی: ${parseFloat(balance).toFixed(6)} ${coin}`;
  });
});


// From trade_process.php
alert('✅ سفارش با موفقیت انجام شد. کیف پول به‌روزرسانی شد.'); window.location.href = 'trade.php';


// From user_balances.php
const userBalances = <?php echo json_encode($balances); ?>;


// From wallet.php
new QRCode(document.getElementById("qr-<?= $w["currency"] ?>"), {
            text: "<?= $w["address"] ?>", width: 90, height: 90
          });


// From wallet.php
const toggle = document.getElementById("darkToggle");
  const body = document.body;
  const nav = document.querySelector(".navbar");

  function applyTheme(isDark) {
  const nav = document.querySelector(".navbar");
  if (isDark) {
    document.body.classList.add("dark-mode");
    nav.classList.remove("bg-light", "navbar-light");
    nav.classList.add("bg-dark", "navbar-dark");
    toggle.innerHTML = '<i class="bi bi-sun"></i>';
  } else {
    document.body.classList.remove("dark-mode");
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


// From wallet.php
const nav = document.querySelector("nav.navbar");

function applyTheme(isDark) {
  if (isDark) {
    document.body.classList.add("dark-mode");
    nav.classList.add("bg-dark", "navbar-dark");
    nav.classList.remove("bg-light", "navbar-light");
  } else {
    document.body.classList.remove("dark-mode");
    nav.classList.add("bg-light", "navbar-light");
    nav.classList.remove("bg-dark", "navbar-dark");
  }
}

const toggle = document.getElementById("darkToggle");
if (toggle) {
  toggle.addEventListener("click", () => {
    const isDark = !document.body.classList.contains("dark-mode");
    applyTheme(isDark);
    localStorage.setItem("darkMode", isDark ? "1" : "0");
  });

  window.onload = () => {
    const saved = localStorage.getItem("darkMode") === "1";
    applyTheme(saved);
  };
}
