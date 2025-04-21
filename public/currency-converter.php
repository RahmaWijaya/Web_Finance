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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Currency Converter - Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
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

  <main class="flex-grow flex items-center justify-center px-4 py-12">
    <section class="bg-[#1e293b] w-full max-w-xl rounded-xl p-8 shadow-lg fade-in delay-1">
      <h2 class="text-3xl font-semibold text-center mb-6">💱 Currency Converter</h2>
      <p class="text-center text-slate-400 mb-6 fade-in delay-2">Convert currencies with real-time exchange rates.</p>

      <form id="converterForm" class="space-y-4">
        <div class="flex flex-col fade-in delay-3">
          <label for="amount" class="mb-1 text-sm font-medium">Amount</label>
          <input type="number" id="amount" placeholder="Enter amount" class="bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="grid grid-cols-2 gap-4 fade-in delay-3">
          <div class="flex flex-col">
            <label for="from" class="mb-1 text-sm font-medium">From</label>
            <select id="from" class="bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="USD">USD - US Dollar</option>
              <option value="IDR">IDR - Indonesian Rupiah</option>
              <option value="EUR">EUR - Euro</option>
              <option value="JPY">JPY - Japanese Yen</option>
            </select>
          </div>
          <div class="flex flex-col">
            <label for="to" class="mb-1 text-sm font-medium">To</label>
            <select id="to" class="bg-slate-800 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="IDR">IDR - Indonesian Rupiah</option>
              <option value="USD">USD - US Dollar</option>
              <option value="EUR">EUR - Euro</option>
              <option value="JPY">JPY - Japanese Yen</option>
            </select>
          </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition hover-btn">Convert</button>
      </form>

      <div id="result" class="mt-6 text-center text-lg font-semibold text-green-400 fade-in delay-4"></div>

      <div class="text-center mt-8 fade-in delay-5">
        <a href="pengguna.php" class="bg-slate-700 hover:bg-slate-800 text-white font-medium py-2 px-4 rounded-lg transition hover-btn">⬅ Back to Dashboard</a>
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
    const rates = {
      USD: { IDR: 16000, EUR: 0.91, JPY: 151 },
      IDR: { USD: 0.000063, EUR: 0.000057, JPY: 0.0094 },
      EUR: { USD: 1.1, IDR: 17500, JPY: 165 },
      JPY: { USD: 0.0066, IDR: 110, EUR: 0.0060 }
    };

    document.getElementById('converterForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const amount = parseFloat(document.getElementById('amount').value);
      const from = document.getElementById('from').value;
      const to = document.getElementById('to').value;

      if (from === to) {
        document.getElementById('result').textContent = 'Choose different currencies to convert.';
        return;
      }

      const rate = rates[from][to];
      const converted = amount * rate;
      document.getElementById('result').textContent = `${amount} ${from} = ${converted.toFixed(2)} ${to}`;
    });
  </script>

</body>
</html>
