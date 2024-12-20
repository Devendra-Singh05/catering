<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Background Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
            position: relative;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            z-index: 1;
        }

        /* Large '404' Text */
        .error-code {
            font-size: 12rem;
            font-weight: 900;
            color: #e74c3c;
            text-transform: uppercase;
            animation: pop 1s ease-out infinite alternate;
        }

        /* Error message */
        .error-message {
            font-size: 2rem;
            color: #555;
            margin-top: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Back to Home Button */
        .back-home-btn {
            display: inline-block;
            margin-top: 40px;
            padding: 15px 30px;
            font-size: 1.5rem;
            background-color: #3498db;
            color: #fff;
            border-radius: 50px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .back-home-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Fun animation for the "Back Home" button */
        .back-home-btn::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid #3498db;
            border-radius: 50px;
            opacity: 0;
            animation: buttonGlow 2s infinite alternate;
        }

        /* Floating Animation for error elements */
        @keyframes pop {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Fade-in for error message */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Glowing effect for the button */
        @keyframes buttonGlow {
            0% {
                opacity: 0;
                transform: scale(1);
            }
            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        /* Background Animation */
        .background-illustration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://source.unsplash.com/1600x900/?space,stars') no-repeat center center;
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
            animation: moveBackground 60s linear infinite;
        }

        /* Animating background to give depth */
        @keyframes moveBackground {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Floating stars background animation */
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://www.transparenttextures.com/patterns/black-tile.png');
            z-index: -2;
            opacity: 0.1;
            animation: starField 3s infinite ease-in-out;
        }

        @keyframes starField {
            0% {
                opacity: 0.1;
            }
            50% {
                opacity: 0.3;
            }
            100% {
                opacity: 0.1;
            }
        }
    </style>
</head>
<body>

    <!-- Background Animation (Space stars & Blurred background) -->
    <div class="background-illustration"></div>
    <div class="stars"></div>

    <!-- Main 404 Container -->
    <div class="container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! Looks like you’ve reached a dead-end in space.</p>
        <a href="/" class="back-home-btn">Return to Earth</a>
    </div>

</body>
</html>
