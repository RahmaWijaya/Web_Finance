<?php
// include('header.php'); // Uncomment jika ada file header.php
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Finance App - Contact</title>
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

      /* Hover effect pada tombol kirim */
      .hover-btn:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
      }

      /* Hover effect pada input dan textarea */
      .hover-input:focus, .hover-textarea:focus {
        border-color: #4fc3f7;
        outline: none;
        box-shadow: 0 0 0 2px rgba(79, 195, 247, 0.5);
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

    <!-- Contact Hero -->
    <section class="py-12 px-6 sm:px-8 bg-[#263238] text-white fade-in delay-2">
      <div class="max-w-5xl mx-auto text-center">
        <h1 class="text-2xl sm:text-3xl font-semibold">Our Contact</h1>
        <p class="mt-3 text-base sm:text-lg text-[#cbd5e1]">
          Get in touch with us for any inquiries or support related to your financial needs.
        </p>
      </div>
    </section>

    <!-- Contact Form -->
    <section class="py-12 px-6 sm:px-8 bg-[#181d20] fade-in delay-3">
      <div class="max-w-md mx-auto bg-[#1e272b] p-6 sm:p-8 rounded-lg shadow-md">
        <form action="#" method="POST" class="space-y-5">
          <div>
            <label for="name" class="block text-sm font-medium mb-1">Name</label>
            <input type="text" id="name" name="name" required
              class="w-full px-4 py-2 rounded-md bg-[#2e3a3f] text-white focus:outline-none focus:ring-2 focus:ring-blue-500 hover-input" />
          </div>

          <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" required
              class="w-full px-4 py-2 rounded-md bg-[#2e3a3f] text-white focus:outline-none focus:ring-2 focus:ring-blue-500 hover-input" />
          </div>

          <div>
            <label for="message" class="block text-sm font-medium mb-1">Message</label>
            <textarea id="message" name="message" rows="4" required
              class="w-full px-4 py-2 rounded-md bg-[#2e3a3f] text-white focus:outline-none focus:ring-2 focus:ring-blue-500 hover-textarea"></textarea>
          </div>

          <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-md transition duration-200 hover-btn">
            Send Message
          </button>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#263238] text-[#cbd5e1] py-4 mt-8 text-center">
      <div class="max-w-6xl mx-auto px-4">
        <p class="text-xs mb-2">&copy; 2025 Finance App. By Inovator Muda.</p>
        <div class="space-x-4">
          <a href="privacy-policy.php" class="hover:underline text-xs">Privacy Policy</a>
          <a href="terms-of-service.php" class="hover:underline text-xs">Terms of Service</a>
          <a href="mailto:contact@financeapp.com" class="hover:underline text-xs">contact@financeapp.com</a>
        </div>
      </div>
    </footer>
  </body>
</html>
