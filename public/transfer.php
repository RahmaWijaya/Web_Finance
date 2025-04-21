<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Simulasi data pengguna dan saldo di session
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        'rahma' => ['balance' => 500000],
        'andi' => ['balance' => 300000],
        'budi' => ['balance' => 200000],
    ];
}

// Jika pengguna belum punya data, tambahkan default
if (!isset($_SESSION['users'][$_SESSION['user_name']])) {
    $_SESSION['users'][$_SESSION['user_name']] = ['balance' => 500000];
}

$sender = $_SESSION['user_name'];
$transferSuccess = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = trim($_POST['recipient']);
    $amount = (int) $_POST['amount'];
    $note = trim($_POST['note']);

    if (!isset($_SESSION['users'][$recipient])) {
        $error = "Penerima tidak ditemukan!";
    } elseif ($_SESSION['users'][$sender]['balance'] < $amount) {
        $error = "Saldo tidak cukup!";
    } else {
        // Kurangi saldo pengirim dan tambah saldo penerima
        $_SESSION['users'][$sender]['balance'] -= $amount;
        $_SESSION['users'][$recipient]['balance'] += $amount;
        $transferSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Transfer Money - Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
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
    .hover-btn:hover {
      transform: scale(1.05);
      transition: transform 0.2s ease-in-out;
    }
  </style>
</head>
<body class="bg-[#0f172a] text-slate-100 min-h-screen">

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
      <h2 class="text-3xl font-semibold text-center mb-6">💸 Transfer Money</h2>
      <p class="text-center text-slate-400 mb-4">Saldo saat ini: <strong class="text-green-400">Rp <?= number_format($_SESSION['users'][$sender]['balance'], 0, ',', '.') ?></strong></p>

      <?php if ($error): ?>
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-4"><?= $error ?></div>
      <?php elseif ($transferSuccess): ?>
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">Transfer berhasil ke <strong><?= htmlspecialchars($recipient) ?></strong> sejumlah Rp <?= number_format($amount, 0, ',', '.') ?></div>
      <?php endif; ?>

      <form action="transfer.php" method="POST" class="space-y-6">
        <div class="fade-in delay-3">
          <label for="recipient" class="block text-sm font-medium text-slate-300">Recipient Username</label>
          <input type="text" name="recipient" id="recipient" class="w-full p-3 bg-slate-800 text-slate-100 border border-slate-600 rounded-lg mt-2" required>
        </div>
        <div class="fade-in delay-3">
          <label for="amount" class="block text-sm font-medium text-slate-300">Amount</label>
          <input type="number" name="amount" id="amount" class="w-full p-3 bg-slate-800 text-slate-100 border border-slate-600 rounded-lg mt-2" required>
        </div>
        <div class="fade-in delay-3">
          <label for="note" class="block text-sm font-medium text-slate-300">Note (Optional)</label>
          <textarea name="note" id="note" rows="3" class="w-full p-3 bg-slate-800 text-slate-100 border border-slate-600 rounded-lg mt-2"></textarea>
        </div>
        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 rounded-lg transition hover-btn">Submit Transfer</button>
      </form>

      <div class="text-center mt-6 fade-in delay-4">
        <a href="pengguna.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition hover-btn">⬅ Back to Dashboard</a>
      </div>
    </section>
  </main>

  <footer class="bg-[#1e293b] py-4 mt-10">
    <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center text-sm text-slate-400">
      <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
      <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
    </div>
  </footer>

</body>
</html>
