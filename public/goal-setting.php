<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}
$goals = $_SESSION['goals'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial Goals - Finance Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in { opacity: 0; transform: translateY(20px); animation: fadeInUp 0.6s ease-out forwards; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .delay-1 { animation-delay: 0.2s; } .delay-2 { animation-delay: 0.4s; } .delay-3 { animation-delay: 0.6s; }
        .goal-box:hover { transform: translateY(-5px); transition: transform 0.3s ease-in-out; }
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
    <section class="bg-[#1e293b] w-full max-w-4xl rounded-xl p-8 shadow-lg space-y-10">
        <h2 class="text-3xl font-semibold text-center mb-4 fade-in delay-1">🎯 Manage Financial Goals</h2>
        <p class="text-center text-slate-400 mb-6 fade-in delay-2">Set new goals or track your existing financial targets easily.</p>

        <div class="text-right mb-4 fade-in delay-3">
            <a href="set-financial-goals.php" class="inline-block bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg font-medium shadow transition">+ Add New Goal</a>
        </div>

        <div class="space-y-6">
            <?php if (empty($goals)) : ?>
                <p class="text-center text-slate-400">No goals yet. Start by adding one.</p>
            <?php else: ?>
                <?php foreach ($goals as $goal): 
                    $percentage = $goal['target'] > 0 ? min(100, round(($goal['saved'] / $goal['target']) * 100)) : 0;
                ?>
                <div class="bg-[#334155] p-6 rounded-xl shadow-lg goal-box fade-in delay-3">
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="text-xl font-semibold text-teal-300"><?= htmlspecialchars($goal['name']) ?></h4>
                        <span class="text-sm text-slate-400">Target: <?= htmlspecialchars($goal['date']) ?></span>
                    </div>
                    <p class="text-sm text-slate-400 mb-2">Goal: Rp <?= number_format($goal['target'], 0, ',', '.') ?> | Saved: Rp <?= number_format($goal['saved'], 0, ',', '.') ?></p>
                    <div class="w-full bg-slate-700 rounded-full h-4 overflow-hidden">
                        <div class="bg-teal-500 h-full text-xs text-center text-white" style="width: <?= $percentage ?>%"><?= $percentage ?>%</div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-6 fade-in delay-3">
            <a href="pengguna.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow transition">Back to Dashboard</a>
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
