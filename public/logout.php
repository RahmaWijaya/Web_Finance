<?php
session_start();

// Hapus semua data session
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out - Finance Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #1e293b;
            color: #fff;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        /* Animasi Fade In untuk pesan */
        .message {
            font-size: 1.5rem;
            margin-bottom: 20px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Animasi Spinner */
        .loading-spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            opacity: 0;
            animation: fadeIn 2s 1s forwards, spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Pop-up Modal */
        .modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 30px;
            border-radius: 10px;
            display: none; /* Initially hidden */
            animation: showModal 1s forwards;
        }

        @keyframes showModal {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.8);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        /* Close Button Style */
        .close-btn {
            margin-top: 20px;
            background-color: #ff5733;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Message before logout -->
    <div class="message">
        You are being logged out, please wait...
    </div>

    <!-- Loading spinner -->
    <div class="loading-spinner"></div>

    <!-- Pop-up Modal -->
    <div class="modal" id="logoutModal">
        <h2 class="text-xl font-semibold">Logging Out...</h2>
        <p>You will be redirected shortly.</p>
        <button class="close-btn" id="closeModal">Close</button>
    </div>

    <script>
        // Display the modal after 1 second
        setTimeout(function() {
            document.getElementById('logoutModal').style.display = 'block';
        }, 1000); // Pop-up appears after 1 second

        // Simulate the logout process before redirecting
        setTimeout(function() {
            // Redirect to the homepage after 3 seconds (to allow the animation to finish)
            window.location.href = "index.php";
        }, 3000);

        // Close the modal when the button is clicked (optional)
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('logoutModal').style.display = 'none';
        });
    </script>
</body>
</html>
