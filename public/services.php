<?php
// Menyertakan header jika dibutuhkan (misalnya session, config, dll)
// include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Finance App - Services</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
      body {
        font-family: 'Inter', sans-serif;
      }

      /* Animasi untuk elemen fade-in */
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

      /* Hover effect untuk service cards */
      .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
      }

      /* Hover effect untuk tombol */
      .hover-btn:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
      }
    </style>
  </head>

  <body class="bg-[#181d20] text-[#cbd5e1] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 sm:px-8 sm:py-6 fade-in delay-1">
      <div class="text-[#cbd5e1] font-semibold text-lg">Finance App</div>
      <nav class="space-x-6 sm:space-x-8 text-[#cbd5e1] text-base font-normal">
        <a class="hover:underline" href="index.php">Home</a>
        <a class="hover:underline" href="about.php">About</a>
        <a class="hover:underline" href="services.php">Services</a>
        <a class="hover:underline" href="contact.php">Contact</a>
      </nav>
    </header>

    <!-- Services Hero -->
    <section class="py-12 px-6 sm:px-8 bg-[#263238] text-white fade-in delay-2">
      <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-2xl sm:text-3xl font-semibold">Our Services</h1>
        <p class="mt-3 text-base sm:text-lg text-[#cbd5e1]">
          Discover the features we offer to help you manage your finances with ease and efficiency.
        </p>
      </div>
    </section>

    <!-- Service Cards -->
    <section class="py-12 px-4 sm:px-6 bg-[#181d20] text-white fade-in delay-3">
      <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Service 1 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#4fc3f7] text-xl mb-2">
            <i class="fas fa-wallet"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Expense Tracking</h3>
          <p class="text-xs text-[#94a3b8]">
            Easily log and categorize your daily spending to see where your money is going.
          </p>
        </div>

        <!-- Service 2 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#81c784] text-xl mb-2">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Budget Management</h3>
          <p class="text-xs text-[#94a3b8]">
            Set budgets and receive alerts when you're near your limit.
          </p>
        </div>

        <!-- Service 3 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#ffb74d] text-xl mb-2">
            <i class="fas fa-piggy-bank"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Savings Goals</h3>
          <p class="text-xs text-[#94a3b8]">
            Plan and track your saving targets with visual progress.
          </p>
        </div>

        <!-- Service 4 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#9575cd] text-xl mb-2">
            <i class="fas fa-coins"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Income Analysis</h3>
          <p class="text-xs text-[#94a3b8]">
            Understand your income sources and trends in real-time.
          </p>
        </div>

        <!-- Service 5 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#e57373] text-xl mb-2">
            <i class="fas fa-balance-scale"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Financial Reports</h3>
          <p class="text-xs text-[#94a3b8]">
            Create custom reports to analyze your financial performance.
          </p>
        </div>

        <!-- Service 6 -->
        <div class="bg-[#1e272b] rounded-md p-4 shadow-md hover:shadow-lg transition hover-card">
          <div class="text-[#4db6ac] text-xl mb-2">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <h3 class="text-lg font-semibold mb-1">Mobile Access</h3>
          <p class="text-xs text-[#94a3b8]">
            Access Finance App across devices — anywhere, anytime.
          </p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#263238] text-[#cbd5e1] py-3 mt-8">
      <div class="max-w-7xl mx-auto px-8 flex justify-between items-center">
        <div>
          <p class="text-xs">© 2025 Finance App. By Inovator Muda.</p>
        </div>
        <nav class="space-x-6">
          <a href="privacy-policy.php" class="hover:underline text-xs">Privacy Policy</a>
          <a href="terms-of-service.php" class="hover:underline text-xs">Terms of Service</a>
          <a href="mailto:contact@financeapp.com" class="hover:underline text-xs">Contact Us</a>
        </nav>
      </div>
    </footer>
  </body>
</html>
