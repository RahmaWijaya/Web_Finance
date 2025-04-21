<?php
session_start();

// Redirect jika sudah login
if (isset($_SESSION['user_name'])) {
    header('Location: pengguna.php');
    exit;
}

// Akun default jika belum ada
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        'admin@gmail.com' => ['name' => 'Admin 1', 'password' => '123'],
        'admin2@gmail.com' => ['name' => 'Admin 2', 'password' => '234']
    ];
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (array_key_exists($email, $_SESSION['users'])) {
        $user = $_SESSION['users'][$email];
        if ($user['password'] === $password) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $email;
            $login_success = true; // Set flag login success
        } else {
            $error_message = "Password salah!";
        }
    } else {
        $error_message = "Email tidak terdaftar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Animasi notifikasi */
    .notification {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      color: #333;
      padding: 20px 40px;
      border-radius: 5px;
      display: none;
      font-size: 14px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      z-index: 1000;
      text-align: center;
      min-width: 200px;
      border: 1px solid #ddd;
    }

    .notification-error {
      background-color: #dc3545;
    }

    /* Animasi loading */
    .loading-spinner {
      border: 4px solid rgba(255, 255, 255, 0.3);
      border-top: 4px solid #333;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      animation: spin 1s linear infinite;
      margin-bottom: 10px;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Hover Effect pada tombol dan input */
    .hover-btn:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease-in-out;
    }

    .hover-input:focus {
      border-color: #4fc3f7;
      outline: none;
      box-shadow: 0 0 0 2px rgba(79, 195, 247, 0.5);
    }

    /* Animasi Fade-In */
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
  </style>
</head>
<body class="bg-[#181d20] text-[#cbd5e1] min-h-screen flex flex-col">

<header class="flex items-center justify-between px-8 py-6 fade-in delay-1">
  <div class="text-[#cbd5e1] font-semibold text-lg">Finance Application</div>
</header>

<section class="bg-[#1e272b] text-[#cbd5e1] p-8 w-full max-w-md mx-auto mt-12 rounded-lg shadow-md fade-in delay-2">
  <h2 class="text-3xl text-center font-semibold mb-6">Login</h2>
  <p class="text-center text-lg mb-6">Welcome back! Please login to continue.</p>

  <form action="login.php" method="POST" class="space-y-5">
    <div>
      <label for="email" class="block text-sm mb-1">Email Address</label>
      <input type="email" id="email" name="email" required class="w-full px-4 py-2 rounded bg-[#263238] text-white hover-input" />
    </div>
    <div>
      <label for="password" class="block text-sm mb-1">Password</label>
      <input type="password" id="password" name="password" required class="w-full px-4 py-2 rounded bg-[#263238] text-white hover-input" />
    </div>

    <?php if (isset($error_message)): ?>
      <p class="text-red-500 text-sm text-center"><?= $error_message; ?></p>
    <?php endif; ?>

    <button type="submit" class="w-full py-2 mt-4 bg-blue-600 hover:bg-blue-700 rounded text-white font-medium hover-btn">Login</button>
  </form>

  <p class="text-sm text-center text-[#94a3b8] mt-6">
    Don't have an account?
    <a href="get-started.php" class="text-blue-400 hover:underline">Create one</a>
  </p>

  <div class="text-center mt-6">
    <a href="index.php" class="inline-block px-6 py-2 bg-[#37474f] hover:bg-[#455a64] text-white rounded">← Back to Home</a>
  </div>
</section>

<!-- Notifikasi -->
<div id="loginNotification" class="notification">
    <div class="loading-spinner"></div>
    Logging in...
</div>

<script>
  <?php if (isset($login_success) && $login_success): ?>
    document.getElementById('loginNotification').style.display = 'block';  // Show notification immediately
    setTimeout(function() {
      document.getElementById('loginNotification').style.display = 'none';  // Hide notification after 3 seconds
      window.location.href = "pengguna.php";  // Redirect to pengguna.php
    }, 3000);  // 3000 milliseconds = 3 seconds (Include loading time)
  <?php endif; ?>
</script>

<footer class="bg-[#263238] text-[#cbd5e1] py-3 mt-8">
  <div class="max-w-7xl mx-auto px-8 flex justify-between items-center">
    <p class="text-xs">© 2025 Finance App. By Inovator Muda.</p>
  </div>
</footer>

</body>
</html>
