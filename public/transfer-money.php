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
    <title>Transfer Money - Finance Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <section class="bg-[#1e293b] w-full max-w-3xl rounded-xl p-8 shadow-lg">
            <h2 class="text-3xl font-semibold text-center mb-6">💸 Transfer Money</h2>
            <div class="text-center text-slate-400 mb-8">
                <p>Transfer money between your accounts securely.</p>
            </div>
            <form class="space-y-6">
                <div>
                    <label for="recipient" class="block text-sm text-slate-300">Recipient</label>
                    <input type="text" id="recipient" class="w-full p-3 bg-[#334155] text-slate-100 rounded-lg mt-2" placeholder="Enter recipient's name">
                </div>
                <div>
                    <label for="amount" class="block text-sm text-slate-300">Amount</label>
                    <input type="number" id="amount" class="w-full p-3 bg-[#334155] text-slate-100 rounded-lg mt-2" placeholder="Amount to transfer">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-medium py-3 rounded-lg shadow transition w-full">Transfer</button>
                </div>
            </form>
            <div class="text-center mt-6">
                <a href="pengguna.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg text-center shadow transition">Back to Dashboard</a>
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
