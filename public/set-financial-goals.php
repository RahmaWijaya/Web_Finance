<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Simpan goal jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $goal = [
        'name' => $_POST['goal_name'] ?? '',
        'target' => $_POST['target_amount'] ?? 0,
        'date' => $_POST['target_date'] ?? '',
        'saved' => 0
    ];
    $_SESSION['goals'][] = $goal;
    header("Location: goal-setting.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set Financial Goals - Finance Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in { opacity: 0; transform: translateY(20px); animation: fadeInUp 0.6s ease-out forwards; }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
        .delay-1 { animation-delay: 0.2s; } .delay-2 { animation-delay: 0.4s; } .delay-3 { animation-delay: 0.6s; }
        .hover-btn:hover { transform: scale(1.05); transition: transform 0.2s ease-in-out; }
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
    <section class="bg-[#1e293b] w-full max-w-4xl rounded-xl p-8 shadow-lg space-y-10 fade-in delay-1">

        <h2 class="text-3xl font-semibold text-center mb-4">🎯 Set Your Financial Goals</h2>
        <p class="text-center text-slate-400 mb-6">Create, track, and stay focused on your financial dreams.</p>

        <form action="" method="POST" class="space-y-6">
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium">Goal Name</label>
                    <input type="text" name="goal_name" required placeholder="e.g. Buy a Car" class="w-full px-4 py-2 rounded-lg bg-slate-800 text-white focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium">Target Amount</label>
                    <input type="number" name="target_amount" required placeholder="e.g. 30000000" class="w-full px-4 py-2 rounded-lg bg-slate-800 text-white focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium">Target Date</label>
                <input type="date" name="target_date" required class="w-full px-4 py-2 rounded-lg bg-slate-800 text-white focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition hover-btn">
                Save Goal
            </button>
        </form>

        <div class="text-center mt-6 fade-in delay-3">
            <a href="goal-setting.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow transition hover-btn">View My Goals</a>
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
