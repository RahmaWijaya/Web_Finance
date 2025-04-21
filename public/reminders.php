<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit;
}

// Simpan reminder ke sesi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reminder = [
        'name' => $_POST['payment_name'],
        'due_date' => $_POST['due_date']
    ];
    $_SESSION['reminders'][] = $reminder;
}
$reminders = $_SESSION['reminders'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Payment Reminders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body class="bg-[#0f172a] text-slate-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-[#1e293b] px-8 py-6 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-white">📅 Your Reminders</h1>
            <nav class="space-x-6 text-sm">
                <a href="payment-reminders.php" class="hover:text-orange-400 transition">Set New</a>
                <a href="pengguna.php" class="hover:text-blue-400 transition">Dashboard</a>
                <a href="logout.php" class="hover:text-red-400 transition">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-grow px-4 py-10 max-w-4xl mx-auto">
        <section class="bg-[#1e293b] rounded-xl p-8 shadow-lg fade-in delay-1">
            <h2 class="text-2xl font-bold mb-6 text-center">⏰ Upcoming Payment Reminders</h2>
            <?php if (empty($reminders)): ?>
                <p class="text-center text-slate-400 fade-in delay-2">No reminders set yet. <a href="payment-reminders.php" class="text-orange-400 underline">Add one now</a>.</p>
            <?php else: ?>
                <ul class="space-y-4">
                    <?php foreach ($reminders as $reminder): ?>
                        <li class="bg-[#334155] p-4 rounded-lg flex justify-between items-center fade-in delay-3">
                            <span class="font-medium"><?= htmlspecialchars($reminder['name']); ?></span>
                            <span class="text-sm text-slate-300"><?= htmlspecialchars($reminder['due_date']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="text-center mt-10 fade-in delay-4">
                <a href="payment-reminders.php" class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition hover-btn">⬅ Back to Set Reminder</a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1e293b] py-4">
        <div class="max-w-7xl mx-auto px-6 flex justify-between text-sm text-slate-400">
            <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
            <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
        </div>
    </footer>
</body>
</html>
