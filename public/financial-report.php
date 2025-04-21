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
    <title>Financial Reports - Finance Application</title>
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
    </style>
</head>
<body class="bg-[#0f172a] text-slate-100 min-h-screen flex flex-col">

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

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <section class="bg-[#1e293b] w-full max-w-7xl rounded-xl p-8 shadow-lg space-y-8">

            <!-- Section Title -->
            <h2 class="text-3xl font-semibold text-center text-white mb-6 fade-in delay-1">📊 Financial Reports</h2>

            <div class="text-center text-slate-400 mb-8 fade-in delay-2">
                <p class="text-lg">Analyze your financial health with detailed reports and insights.</p>
            </div>

            <!-- Financial Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 fade-in delay-2">
                <div class="bg-[#334155] p-6 rounded-xl shadow-lg text-center hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold text-teal-400">Total Income</h3>
                    <p class="text-3xl text-white">Rp 12,500,000</p>
                </div>
                <div class="bg-[#334155] p-6 rounded-xl shadow-lg text-center hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold text-yellow-400">Total Expenses</h3>
                    <p class="text-3xl text-white">Rp 7,200,000</p>
                </div>
                <div class="bg-[#334155] p-6 rounded-xl shadow-lg text-center hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold text-red-400">Net Savings</h3>
                    <p class="text-3xl text-white">Rp 5,300,000</p>
                </div>
            </div>

            <!-- Graph for Income and Expenses -->
            <div class="bg-[#334155] p-6 rounded-xl shadow-lg fade-in delay-3">
                <h3 class="text-xl font-semibold text-white mb-4">Income vs Expenses (Last 6 months)</h3>
                <canvas id="income-expenses-chart"></canvas>
            </div>

            <!-- Financial Summary Table -->
            <div class="bg-[#334155] p-6 rounded-xl shadow-lg fade-in delay-3 overflow-x-auto">
                <h3 class="text-xl font-semibold text-white mb-4">Detailed Financial Summary</h3>
                <table class="min-w-full bg-[#1e293b] text-slate-300">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left">Category</th>
                            <th class="px-6 py-3 text-left">Amount</th>
                            <th class="px-6 py-3 text-left">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-[#334155]/50 transition">
                            <td class="px-6 py-3">Salary</td>
                            <td class="px-6 py-3">Rp 10,000,000</td>
                            <td class="px-6 py-3">2025-04-10</td>
                        </tr>
                        <tr class="hover:bg-[#334155]/50 transition">
                            <td class="px-6 py-3">Rent</td>
                            <td class="px-6 py-3">Rp 2,500,000</td>
                            <td class="px-6 py-3">2025-04-05</td>
                        </tr>
                        <tr class="hover:bg-[#334155]/50 transition">
                            <td class="px-6 py-3">Groceries</td>
                            <td class="px-6 py-3">Rp 1,200,000</td>
                            <td class="px-6 py-3">2025-04-12</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-6 fade-in delay-3">
                <a href="pengguna.php"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg text-center shadow transition duration-300 transform hover:scale-105">
                   ⬅️ Back to Dashboard
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1e293b] py-4">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center text-sm text-slate-400">
            <p>© 2025 Finance App. Crafted by Inovator Muda.</p>
            <p>Logged in as: <span class="text-slate-200"><?= htmlspecialchars($_SESSION['user_name']); ?></span></p>
        </div>
    </footer>

    <!-- Chart.js Script -->
    <script>
        var ctx = document.getElementById('income-expenses-chart').getContext('2d');
        var incomeExpensesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [
                    {
                        label: 'Income',
                        data: [2000000, 2500000, 3000000, 3500000, 4000000, 4500000],
                        backgroundColor: 'rgba(34, 197, 94, 0.6)',
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Expenses',
                        data: [1500000, 1700000, 1800000, 2000000, 2200000, 2500000],
                        backgroundColor: 'rgba(239, 68, 68, 0.6)',
                        borderColor: 'rgba(239, 68, 68, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                },
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

</body>
</html>
