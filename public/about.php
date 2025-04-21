<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Finance App - About</title>
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

      .hover-btn:hover {
        transform: scale(1.05);
        transition: transform 0.2s ease-in-out;
      }

      .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
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

    <!-- About Section -->
    <section class="py-12 px-6 sm:px-8 bg-[#263238] text-white fade-in delay-2">
      <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-2xl sm:text-3xl font-semibold">About Finance</h1>
        <p class="mt-3 text-base sm:text-lg text-[#cbd5e1]">
          Discover the features we offer to help you manage your finances with ease and efficiency.
        </p>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 px-6 sm:px-8 bg-[#161c1f] text-white fade-in delay-3">
      <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl font-semibold mb-8">Our Features</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Expense Tracking -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Expense Tracking</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Easily track and manage your spending habits to stay on top of your finances.
            </p>
          </div>

          <!-- Investment Insights -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Investment Insights</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Gain valuable insights into your investment portfolio and track growth over time.
            </p>
          </div>

          <!-- Goal Setting -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Goal Setting</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Set and track your financial goals to achieve your desired outcomes.
            </p>
          </div>

          <!-- Security & Privacy -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Security & Privacy</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Your data is securely encrypted to ensure your financial information is kept private.
            </p>
          </div>

          <!-- Budget Planning -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Budget Planning</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Plan monthly budgets and keep your finances in check with smart budget recommendations.
            </p>
          </div>

          <!-- Real-Time Notifications -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Real-Time Notifications</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Get instant alerts about transactions, spending limits, and important updates.
            </p>
          </div>

          <!-- Multi-Account Support -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Multi-Account Support</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Connect and manage multiple bank accounts from one centralized dashboard.
            </p>
          </div>

          <!-- Analytics Dashboard -->
          <div class="flex flex-col items-center text-center bg-[#263238] p-6 rounded-lg hover-card">
            <h3 class="text-lg font-semibold">Analytics Dashboard</h3>
            <p class="mt-2 text-sm text-[#cbd5e1]">
              Visualize your financial health with intuitive charts and performance indicators.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Mission Section -->
    <section class="py-16 px-6 sm:px-8 bg-[#161c1f] text-white fade-in delay-3">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl font-semibold">Our Mission</h2>
        <p class="mt-4 text-lg sm:text-xl text-[#cbd5e1]">
          Our mission is to provide an easy-to-use platform for individuals and families to manage their finances,
          track spending habits, and make informed decisions to secure their financial future.
        </p>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#263238] text-[#cbd5e1] py-3 mt-8 fade-in delay-1">
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
