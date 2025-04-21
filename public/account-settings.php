<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header("Location: login.php");
  exit;
}

$user_name = $_SESSION['user_name'];
$user_email = $user_name . "@example.com";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Transisi munculnya form */
    .fade-slide-enter {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.4s ease;
    }

    .fade-slide-enter-active {
      opacity: 1;
      transform: translateY(0);
    }

    .fade-slide-leave {
      opacity: 1;
      transform: translateY(0);
      transition: all 0.4s ease;
    }

    .fade-slide-leave-active {
      opacity: 0;
      transform: translateY(20px);
    }
  </style>
</head>
<body class="bg-[#0f172a] text-white font-sans min-h-screen">

<header class="bg-[#1e293b] px-8 py-6 shadow-md">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <h1 class="text-xl font-semibold">💼 Finance Application</h1>
    <nav class="space-x-6 text-sm">
      <a href="pengguna.php" class="hover:text-blue-400">Dashboard</a>
      <a href="logout.php" class="hover:text-red-400">Logout</a>
    </nav>
  </div>
</header>

<main class="max-w-3xl mx-auto mt-12 px-6">
  <h2 class="text-3xl font-semibold mb-8">⚙️ Account Settings</h2>

  <!-- User Info Section -->
  <div class="bg-[#1e293b] rounded-lg shadow-md p-6 mb-8">
    <div class="flex items-center space-x-4 mb-4">
      <img src="https://ui-avatars.com/api/?name=<?= urlencode($user_name); ?>&background=3b82f6&color=fff&size=80" class="rounded-full" alt="User">
      <div>
        <p class="text-lg font-medium"><?= htmlspecialchars($user_name) ?></p>
        <p class="text-slate-400 text-sm"><?= $user_email ?></p>
      </div>
    </div>
    <button id="toggleForm" class="mt-4 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded transition text-sm font-medium">✏️ Edit Profile</button>
  </div>

  <!-- Update Form Section -->
  <form id="settingsForm" class="bg-[#1e293b] p-6 rounded-lg shadow-md space-y-5 hidden fade-slide-enter">
    <div>
      <label class="text-sm text-slate-300">Full Name</label>
      <input type="text" value="<?= htmlspecialchars($user_name) ?>" class="w-full mt-1 px-4 py-2 bg-[#334155] border border-[#475569] rounded-md focus:ring-blue-500 transition duration-300 focus:outline-none">
    </div>

    <div>
      <label class="text-sm text-slate-300">Email Address</label>
      <input type="email" value="<?= $user_email ?>" class="w-full mt-1 px-4 py-2 bg-[#334155] border border-[#475569] rounded-md focus:ring-blue-500 transition duration-300 focus:outline-none">
    </div>

    <div>
      <label class="text-sm text-slate-300">Change Profile Picture</label>
      <input type="file" class="w-full mt-1 px-4 py-2 bg-[#334155] text-slate-400 rounded-md transition duration-300">
    </div>

    <div>
      <label class="text-sm text-slate-300">Email Notifications</label>
      <div class="flex items-center">
        <input type="checkbox" class="mr-2 bg-[#334155] rounded">
        <span class="text-slate-400">Receive email notifications for account activity</span>
      </div>
    </div>

    <div>
      <label class="text-sm text-slate-300">New Password</label>
      <input type="password" placeholder="Enter new password" class="w-full mt-1 px-4 py-2 bg-[#334155] border border-[#475569] rounded-md transition duration-300 focus:ring-blue-500 focus:outline-none">
    </div>

    <div class="mt-6">
      <button type="button" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-md font-semibold transition">❌ Delete Account</button>
    </div>

    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 py-2 rounded-md font-semibold transition">💾 Save Changes</button>
  </form>

  <div class="mt-6 text-right">
    <a href="pengguna.php" class="inline-block bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-md transition">⬅️ Back to Dashboard</a>
  </div>
</main>

<script>
  const toggleButton = document.getElementById("toggleForm");
  const settingsForm = document.getElementById("settingsForm");

  toggleButton.addEventListener("click", () => {
    if (settingsForm.classList.contains("hidden")) {
      settingsForm.classList.remove("hidden");
      requestAnimationFrame(() => {
        settingsForm.classList.add("fade-slide-enter-active");
      });
    } else {
      settingsForm.classList.add("fade-slide-leave-active");
      setTimeout(() => {
        settingsForm.classList.add("hidden");
        settingsForm.classList.remove("fade-slide-leave-active", "fade-slide-enter-active");
      }, 400);
    }
  });
</script>

</body>
</html>
