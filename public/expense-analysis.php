<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expense Analysis - Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Fade in animation */
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.4s; }
    .delay-3 { animation-delay: 0.6s; }

    /* Hover effect for table rows */
    tr:hover {
      background-color: #2a4365;
      transition: background-color 0.3s ease;
    }

    /* Hover effect for button */
    .hover-btn:hover {
      transform: scale(1.05);
      transition: transform 0.2s ease-in-out;
    }
  </style>
</head>
<body class="bg-[#0f172a] text-slate-100 min-h-screen">

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

  <main class="px-4 py-12 max-w-5xl mx-auto">
    <section class="bg-[#1e293b] w-full rounded-xl p-8 shadow-lg">
      <h2 class="text-3xl font-semibold text-center mb-6 fade-in delay-1">📉 Expense Analysis</h2>
      <p class="text-slate-400 text-center mb-10 fade-in delay-2">A breakdown of your monthly expenses to help you better manage your finances.</p>

      <!-- Chart -->
      <div class="mb-10">
        <canvas id="expenseChart" class="mx-auto max-w-xs sm:max-w-md fade-in delay-3"></canvas>
      </div>

      <!-- Expense Table -->
      <div class="overflow-x-auto mb-6 fade-in delay-3">
        <table class="min-w-full table-auto text-left text-sm border border-slate-700">
          <thead class="bg-slate-700 text-slate-200">
            <tr>
              <th class="py-3 px-4 border-b border-slate-600">Category</th>
              <th class="py-3 px-4 border-b border-slate-600">Amount (Rp)</th>
              <th class="py-3 px-4 border-b border-slate-600">Percentage</th>
            </tr>
          </thead>
          <tbody class="text-slate-300">
            <tr class="border-t border-slate-600">
              <td class="py-2 px-4">Food & Dining</td>
              <td class="py-2 px-4">1,200,000</td>
              <td class="py-2 px-4">40%</td>
            </tr>
            <tr class="border-t border-slate-600">
              <td class="py-2 px-4">Transport</td>
              <td class="py-2 px-4">600,000</td>
              <td class="py-2 px-4">20%</td>
            </tr>
            <tr class="border-t border-slate-600">
              <td class="py-2 px-4">Utilities</td>
              <td class="py-2 px-4">400,000</td>
              <td class="py-2 px-4">13.3%</td>
            </tr>
            <tr class="border-t border-slate-600">
              <td class="py-2 px-4">Entertainment</td>
              <td class="py-2 px-4">500,000</td>
              <td class="py-2 px-4">16.7%</td>
            </tr>
            <tr class="border-t border-slate-600">
              <td class="py-2 px-4">Other</td>
              <td class="py-2 px-4">300,000</td>
              <td class="py-2 px-4">10%</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Back Button -->
      <div class="text-center mt-10 fade-in delay-3">
        <a href="pengguna.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow transition hover-btn">⬅ Back to Dashboard</a>
      </div>
    </section>
  </main>

  <footer class="bg-[#1e293b] py-4 mt-10">
    <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center text-sm text-slate-400">
      <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
      <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
    </div>
  </footer>

  <script>
    const ctx = document.getElementById('expenseChart');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Food & Dining', 'Transport', 'Utilities', 'Entertainment', 'Other'],
        datasets: [{
          label: 'Expenses',
          data: [1200000, 600000, 400000, 500000, 300000],
          backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ec4899', '#a855f7'],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          legend: {
            labels: {
              color: '#e2e8f0'
            }
          }
        }
      }
    });
  </script>

</body>
</html>
