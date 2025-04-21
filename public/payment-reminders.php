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
    <title>Payment Reminders - Finance Application</title>
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
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <h1 class="text-xl font-semibold text-white">💼 Finance Application</h1>
            <nav class="space-x-6 text-sm">
                <a href="pengguna.php" class="hover:text-blue-400 transition">Dashboard</a>
                <a href="reminders.php" class="hover:text-yellow-400 transition">View Reminders</a>
                <a href="logout.php" class="hover:text-red-400 transition">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <section class="bg-[#1e293b] w-full max-w-3xl rounded-xl p-8 shadow-lg fade-in delay-1">
            <h2 class="text-3xl font-semibold text-center mb-6">⏰ Set Payment Reminder</h2>
            <p class="text-center text-slate-400 mb-8">Schedule reminders to never miss a payment.</p>

            <form action="reminders.php" method="POST" class="space-y-6">
                <div>
                    <label for="payment-name" class="block text-sm text-slate-300">Payment Name</label>
                    <input type="text" name="payment_name" id="payment-name" required class="w-full p-3 bg-[#334155] text-slate-100 rounded-lg mt-2" placeholder="e.g., Internet Bill">
                </div>
                <div>
                    <label for="due-date" class="block text-sm text-slate-300">Due Date</label>
                    <input type="date" name="due_date" id="due-date" required class="w-full p-3 bg-[#334155] text-slate-100 rounded-lg mt-2">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-lg shadow transition w-full hover-btn">Set Reminder</button>
                </div>
            </form>

            <div class="text-center mt-6 fade-in delay-2">
                <a href="pengguna.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow transition hover-btn">⬅ Back to Dashboard</a>
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
</body>
</html>
