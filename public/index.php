<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Finance Application</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    body { font-family: 'Inter', sans-serif; }

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

    .animate-text {
      display: inline-block;
      position: relative;
      animation: moveText 3s ease-in-out infinite;
    }

    @keyframes moveText {
      0% {
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.5);
        transform: translateY(0);
      }
      50% {
        text-shadow: 0 0 12px rgba(255, 255, 255, 1), 0 0 30px rgba(255, 255, 255, 0.7);
        transform: translateY(-10px);
      }
      100% {
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.5);
        transform: translateY(0);
      }
    }

    .animate-background {
      background: #181d20;
      background-size: 400% 400%;
      animation: gradientBackground 10s ease infinite;
    }

    @keyframes gradientBackground {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .hover-btn:hover {
      transform: scale(1.05);
      transition: transform 0.2s ease-in-out;
    }

    .hover-card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
    }

    .animate-bitcoin {
      animation: spin 4s linear infinite, glowWhite 2s ease-in-out infinite alternate;
      color: #ffffff;
    }

    @keyframes spin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes glowWhite {
      from {
        text-shadow: 0 0 5px #ffffff, 0 0 10px #ffffff, 0 0 15px #ffffff;
      }
      to {
        text-shadow: 0 0 10px #e2e8f0, 0 0 20px #e2e8f0, 0 0 30px #e2e8f0;
      }
    }
  </style>
</head>

<body class="min-h-screen flex flex-col animate-background">

  <!-- Header -->
  <header class="flex items-center justify-between px-8 py-6 fade-in delay-1">
    <div class="flex items-center gap-3 text-[#cbd5e1] font-semibold text-lg">
      <i class="fab fa-bitcoin text-4xl animate-bitcoin"></i>
      <span>Finance Application</span>
    </div>
    <nav class="space-x-8 text-[#cbd5e1] text-base font-normal">
      <a class="hover:underline" href="index.php">Home</a>
      <a class="hover:underline" href="about.php">About</a>
      <a class="hover:underline" href="services.php">Services</a>
      <a class="bg-[#263238] rounded-md px-4 py-1.5 hover:bg-[#37474f] transition-colors" href="contact.php">Contact</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <main class="flex flex-col md:flex-row items-start justify-center flex-grow px-8 md:px-16 gap-12 md:gap-24 py-12 max-w-7xl mx-auto w-full">
    <section class="max-w-md flex flex-col gap-4 fade-in delay-2">
      <h1 class="text-[#cbd5e1] text-5xl font-semibold leading-tight animate-text">Manage<br />Your<br />Finances</h1>
      <p class="text-[#64748b] text-lg font-normal">Track your expenses,<br />grow your wealth</p>
      <a href="get-started.php" class="mt-6 bg-[#263238] hover:bg-[#37474f] transition-colors rounded-md px-6 py-3 text-white text-lg font-medium w-max hover-btn">
        Get Started
      </a>
    </section>

    <!-- Grafik Investasi -->
    <section class="bg-[#1e272b] rounded-lg p-6 w-full max-w-lg flex flex-col gap-4 fade-in delay-3">
      <div>
        <p class="text-[#64748b] text-sm mb-1">Investment Growth</p>
        <canvas id="investmentChart" class="w-full h-64"></canvas>
      </div>
    </section>
  </main>

  <!-- Dashboard Section -->
  <section class="bg-[#161c1f] text-[#a3b1bc] py-6 px-4 fade-in delay-1">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-4xl mx-auto">
      <!-- Isi Dashboard -->
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-[#263238] text-[#cbd5e1] py-3 mt-8">
    <div class="max-w-7xl mx-auto px-8 flex justify-between items-center">
      <p class="text-xs">© 2025 Finance App. By Inovator Muda.</p>
      <nav class="space-x-6">
        <a href="privacy-policy.php" class="hover:underline text-xs">Privacy Policy</a>
        <a href="terms-of-service.php" class="hover:underline text-xs">Terms of Service</a>
        <a href="mailto:contact@financeapp.com" class="hover:underline text-xs">Contact Us</a>
      </nav>
    </div>
  </footer>

  <script>
    const data = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Investment Growth',
        data: [1500, 1700, 1600, 1900, 2100, 2300, 2500],
        borderColor: '#76c7c0',
        backgroundColor: 'rgba(118, 199, 192, 0.2)',
        tension: 0.4,
        fill: true,
        pointBackgroundColor: '#76c7c0',
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {
        responsive: true,
        animations: {
          tension: {
            duration: 1000,
            easing: 'easeInOutQuad',
            from: 1,
            to: 0,
            loop: true
          }
        },
        scales: {
          x: {
            grid: { display: false },
          },
          y: {
            beginAtZero: true,
            grid: { color: 'rgba(255, 255, 255, 0.2)' },
            ticks: { color: '#cbd5e1' }
          }
        },
        plugins: {
          legend: {
            labels: { color: '#cbd5e1' }
          }
        }
      }
    };

    const ctx = document.getElementById('investmentChart').getContext('2d');
    const investmentChart = new Chart(ctx, config);
  </script>
</body>
</html>
