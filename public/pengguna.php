<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Dummy data
$transactions_count = 35;
$notification_count = 2;

$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"];
$monthly_income = [5000000, 5200000, 5400000, 5600000, 5800000, 6000000, 6200000];
$monthly_expenses = [1500000, 1600000, 1550000, 1650000, 1700000, 1800000, 1900000];

// Hitung total uang dimiliki
$total_income = array_sum($monthly_income);
$total_expenses = array_sum($monthly_expenses);
$total_balance = $total_income - $total_expenses;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard - Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease, transform 0.6s ease;
    }
    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body class="bg-[#1e293b] text-slate-100 min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-[#1e293b] px-8 py-6 shadow-md">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <h1 class="text-xl font-semibold text-white">💼 Finance Application</h1>
      <nav class="space-x-6 text-sm">
        <a href="pengguna.php" class="hover:text-blue-400 transition">Dashboard</a>
        <a href="logout.php" class="hover:text-red-400 transition">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow flex items-center justify-center px-4 py-12">
    <section class="bg-[#2d3748] w-full max-w-6xl rounded-xl p-8 shadow-xl fade-in">
      <div class="flex flex-col items-center mb-8 fade-in">
        <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_name']); ?>&background=3b82f6&color=fff&size=120" alt="User Avatar" class="w-28 h-28 rounded-full shadow-md mb-4">
        <h2 class="text-3xl font-semibold">Hello, <?= htmlspecialchars($_SESSION['user_name']); ?> 👋</h2>
        <p class="text-slate-400 mt-2 text-center">Your personal finance dashboard. Stay in control and make smart financial decisions.</p>
      </div>

      <!-- Total Uang Dimiliki -->
      <div class="bg-green-700 w-full text-center py-4 rounded-lg mb-8 shadow fade-in">
        <p class="text-lg font-semibold">💰 Jumlah Uang Dimiliki</p>
        <h3 class="text-3xl font-bold mt-2">Rp <?= number_format($total_balance, 0, ',', '.'); ?></h3>
      </div>

      <!-- Grafik -->
      <div class="bg-[#2d3748] p-6 rounded-lg shadow-md mb-8 fade-in">
        <h3 class="text-lg font-semibold text-center mb-4">Financial Overview (Graph)</h3>
        <canvas id="financialGraph"></canvas>
      </div>

      <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 fade-in">
        <a href="view-transactions.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg text-center shadow transition">💳 View Transactions</a>
        <a href="account-settings.php" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 rounded-lg text-center shadow transition">⚙️ Account Settings</a>
        <a href="financial-report.php" class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 rounded-lg text-center shadow transition">📊 Financial Reports</a>
        <a href="goal-setting.php" class="bg-yellow-600 hover:bg-yellow-700 text-white font-medium py-3 rounded-lg text-center shadow transition">🎯 Set Financial Goals</a>
        <a href="expense-analysis.php" class="bg-teal-600 hover:bg-teal-700 text-white font-medium py-3 rounded-lg text-center shadow transition">📉 Expense Analysis</a>
        <a href="transfer.php" class="bg-pink-600 hover:bg-pink-700 text-white font-medium py-3 rounded-lg text-center shadow transition">💸 Transfer Money</a>
        <a href="reminders.php" class="bg-orange-600 hover:bg-orange-700 text-white font-medium py-3 rounded-lg text-center shadow transition">⏰ Payment Reminders</a>
        <a href="transaction-history.php" class="bg-red-600 hover:bg-red-700 text-white font-medium py-3 rounded-lg text-center shadow transition">📝 Transaction History</a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-[#1e293b] py-4 mt-10">
    <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center text-sm text-slate-400">
      <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
      <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
    </div>
  </footer>

  <script>
    const ctx = document.getElementById('financialGraph').getContext('2d');
    const financialGraph = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?= json_encode($months); ?>,
        datasets: [
          {
            label: 'Income',
            data: <?= json_encode($monthly_income); ?>,
            borderColor: 'rgba(59,130,246,1)',
            backgroundColor: 'rgba(59,130,246,0.2)',
            fill: true
          },
          {
            label: 'Expenses',
            data: <?= json_encode($monthly_expenses); ?>,
            borderColor: 'rgba(248,113,113,1)',
            backgroundColor: 'rgba(248,113,113,0.2)',
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            mode: 'index',
            intersect: false,
          }
        },
        scales: {
          x: {
            beginAtZero: true,
          },
          y: {
            beginAtZero: true
          }
        }
      }
    });

    document.addEventListener("DOMContentLoaded", () => {
      const animatedElements = document.querySelectorAll(".fade-in");
      animatedElements.forEach((el, index) => {
        setTimeout(() => {
          el.classList.add("show");
        }, index * 150);
      });
    });
  </script>
</body>
</html>
