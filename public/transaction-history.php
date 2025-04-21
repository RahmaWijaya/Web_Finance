<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Contoh data dummy (kamu bisa ganti ini dengan data dari database nanti)
$transactions = [
    ["date" => "2025-04-01", "type" => "Income", "description" => "Salary", "amount" => 5000000],
    ["date" => "2025-04-03", "type" => "Expense", "description" => "Groceries", "amount" => -350000],
    ["date" => "2025-04-05", "type" => "Expense", "description" => "Internet Bill", "amount" => -150000],
    ["date" => "2025-04-07", "type" => "Income", "description" => "Freelance Project", "amount" => 1200000],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction History - Finance Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fade-in animation */
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

        /* Hover effect for rows */
        .hover-row:hover {
            background-color: rgba(71, 85, 105, 0.3);
            transition: background-color 0.3s ease;
        }

        /* Hover effect for button */
        .hover-btn:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-100 min-h-screen flex flex-col">
    <header class="bg-[#1e293b] px-8 py-6 shadow-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <h1 class="text-xl font-semibold text-white">💼 Finance Application</h1>
            <nav class="space-x-6 text-sm">
                <a href="pengguna.php" class="hover:text-blue-400 transition">Dashboard</a>
                <a href="logout.php" class="hover:text-red-400 transition">Logout</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow px-4 py-10 max-w-6xl mx-auto w-full">
        <section class="bg-[#1e293b] p-8 rounded-xl shadow-lg fade-in delay-1">
            <h2 class="text-3xl font-bold mb-6 text-center">🧾 Transaction History</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-[#334155] text-slate-300">
                        <tr>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3 text-right">Amount (Rp)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#475569]">
                        <?php foreach ($transactions as $tx): ?>
                            <tr class="hover-row">
                                <td class="px-4 py-3"><?= htmlspecialchars($tx['date']); ?></td>
                                <td class="px-4 py-3">
                                    <span class="<?= $tx['type'] === 'Income' ? 'text-green-400' : 'text-red-400' ?>">
                                        <?= htmlspecialchars($tx['type']); ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3"><?= htmlspecialchars($tx['description']); ?></td>
                                <td class="px-4 py-3 text-right <?= $tx['amount'] > 0 ? 'text-green-400' : 'text-red-400' ?>">
                                    <?= number_format($tx['amount'], 0, ',', '.'); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-10 fade-in delay-2">
                <a href="pengguna.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition hover-btn">
                    ⬅ Back to Dashboard
                </a>
            </div>
        </section>
    </main>

    <footer class="bg-[#1e293b] py-4 mt-10">
        <div class="max-w-7xl mx-auto px-6 flex justify-between text-sm text-slate-400">
            <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
            <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
        </div>
    </footer>
</body>
</html>
