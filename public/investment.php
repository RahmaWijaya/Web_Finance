<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Contoh data investasi (dummy)
$investments = [
    ["name" => "Saham ABC", "type" => "Stock", "value" => 3500000, "growth" => 8.2],
    ["name" => "Reksa Dana XYZ", "type" => "Mutual Fund", "value" => 2000000, "growth" => 5.4],
    ["name" => "Crypto BTC", "type" => "Cryptocurrency", "value" => 1500000, "growth" => -2.1],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Investments - Finance Application</title>
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

        /* Hover effect for investment cards */
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
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
            <h2 class="text-3xl font-bold mb-6 text-center">📊 Your Investments</h2>
            <div class="text-center text-slate-400 mb-8">
                <p>Monitor your current portfolio and growth of your investments.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <?php foreach ($investments as $inv): ?>
                    <div class="bg-[#334155] p-6 rounded-xl shadow hover-card transition fade-in">
                        <h3 class="text-lg font-semibold mb-2 text-white"><?= htmlspecialchars($inv['name']); ?></h3>
                        <p class="text-sm text-slate-300 mb-1">Type: <span class="text-slate-200"><?= $inv['type']; ?></span></p>
                        <p class="text-sm text-slate-300 mb-1">Value: <span class="text-green-400">Rp <?= number_format($inv['value'], 0, ',', '.'); ?></span></p>
                        <p class="text-sm text-slate-300">
                            Growth: 
                            <span class="<?= $inv['growth'] >= 0 ? 'text-green-400' : 'text-red-400' ?>">
                                <?= $inv['growth'] ?>%
                            </span>
                        </p>
                    </div>
                <?php endforeach; ?>
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
