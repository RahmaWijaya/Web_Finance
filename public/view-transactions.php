<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit;
}

$transactions = [
  ['date' => '2025-04-18', 'description' => 'Grocery', 'amount' => -150000],
  ['date' => '2025-04-17', 'description' => 'Salary', 'amount' => 5000000],
  ['date' => '2025-04-15', 'description' => 'Electric Bill', 'amount' => -300000],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_by_date'])) {
  usort($transactions, fn($a, $b) => strtotime($a['date']) <=> strtotime($b['date']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filter_by_amount'])) {
  usort($transactions, fn($a, $b) => $a['amount'] <=> $b['amount']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['download_csv'])) {
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="transactions.csv"');
  $output = fopen('php://output', 'w');
  fputcsv($output, ['Date', 'Description', 'Amount']);
  foreach ($transactions as $tx) {
    fputcsv($output, $tx);
  }
  fclose($output);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Transactions</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .notif {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: white;
      color: black;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      font-weight: 600;
      font-size: 1rem;
      opacity: 0;
      transition: opacity 0.5s ease;
      pointer-events: none;
    }

    .notif span {
      animation: spin 0.7s linear infinite;
      margin-right: 10px;
      display: inline-block;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .notif.show {
      opacity: 1;
      pointer-events: auto;
    }

    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.6s ease-out;
    }

    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="bg-[#0f172a] text-white font-sans min-h-screen">

<div id="notif" class="notif">
  <span>🔄</span> Loading transactions...
</div>

<header id="header" class="bg-[#1e293b] px-8 py-6 shadow-md fade-in">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <h1 class="text-xl font-semibold">💼 Finance Application</h1>
    <nav class="space-x-6 text-sm">
      <a href="pengguna.php" class="hover:text-blue-400">Dashboard</a>
      <a href="logout.php" class="hover:text-red-400">Logout</a>
    </nav>
  </div>
</header>

<main id="mainContent" class="max-w-5xl mx-auto mt-12 px-6 fade-in">
  <h2 class="text-3xl font-semibold mb-6">💳 Transaction History</h2>

  <div class="flex justify-between mb-6 fade-in">
    <div class="w-1/2 pr-4">
      <input type="text" placeholder="Search transactions..." id="searchInput" class="w-full px-4 py-2 bg-[#334155] text-white border border-[#475569] rounded-md mb-2">
      <button onclick="filterTransactions()" class="bg-blue-600 hover:bg-blue-700 py-2 px-6 rounded-md text-white text-sm w-full">🔍 Search</button>
    </div>
    <div class="flex flex-col space-y-4 w-1/2">
      <form method="POST" class="w-full" onsubmit="return showNotif()">
        <button name="filter_by_date" class="bg-blue-600 hover:bg-blue-700 py-2 px-6 rounded-md text-white text-sm w-full my-2">🗓️ Sort by Date</button>
        <button name="filter_by_amount" class="bg-blue-600 hover:bg-blue-700 py-2 px-6 rounded-md text-white text-sm w-full my-2">💸 Sort by Amount</button>
      </form>
      <form method="POST" class="w-full" onsubmit="return showNotif()">
        <button name="download_csv" class="bg-green-600 hover:bg-green-700 py-2 px-6 rounded-md text-white text-sm w-full my-2">💾 Download CSV</button>
      </form>
    </div>
  </div>

  <div class="bg-[#1e293b] rounded-lg shadow overflow-x-auto fade-in">
    <table class="w-full text-left">
      <thead class="bg-[#334155] text-slate-300">
        <tr>
          <th class="px-4 py-3">Date</th>
          <th class="px-4 py-3">Description</th>
          <th class="px-4 py-3 text-right">Amount</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-700" id="txBody">
        <?php foreach ($transactions as $tx): ?>
        <tr class="hover:bg-[#273449] transition fade-in">
          <td class="px-4 py-3"><?= $tx['date'] ?></td>
          <td class="px-4 py-3"><?= $tx['description'] ?></td>
          <td class="px-4 py-3 text-right <?= $tx['amount'] < 0 ? 'text-red-400' : 'text-green-400' ?>">
            <?= number_format($tx['amount'], 0, ',', '.') ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-right fade-in">
    <a href="pengguna.php" class="inline-block bg-slate-700 hover:bg-slate-600 text-white px-6 py-2 rounded-md transition">⬅️ Back to Dashboard</a>
  </div>
</main>

<script>
function filterTransactions() {
  const keyword = document.getElementById("searchInput").value.toLowerCase();
  const rows = document.querySelectorAll("#txBody tr");

  rows.forEach(row => {
    const text = row.innerText.toLowerCase();
    row.style.display = text.includes(keyword) ? "" : "none";
  });
}

function showNotif() {
  const notif = document.getElementById("notif");
  notif.classList.add("show");

  setTimeout(() => {
    notif.classList.remove("show");
  }, 1000);

  return true;
}

// Animasi masuk saat DOM dimuat
window.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll('.fade-in').forEach((el, i) => {
    setTimeout(() => {
      el.classList.add('show');
    }, i * 150);
  });
});
</script>

</body>
</html>
