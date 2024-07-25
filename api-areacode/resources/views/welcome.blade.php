<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Code Information</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff00ff, #00ffff, #ffff00);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            margin: 0;
            padding: 0;
            color: rgb(237, 233, 157);
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
        }
        h1 {
            color: rgb(237, 233, 157);
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        p {
            font-size: 1.2em;
            margin: 10px 0;
            text-align: center;
            
        }
        strong {
            color: rgb(237, 233, 157);
        }
        .info-section {
            padding: 15px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #ffeb3b;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .error {
            color: #f44336;
            background: rgba(0, 0, 0, 1);
            border: 2px solid #f44336;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
        .info {
            color: #4caf50;
            background: rgba(76, 175, 80, 0.2);
            border: 2px solid #4caf50;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
        .search-form {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }
        .search-form input[type="text"] {
            padding: 12px;
            font-size: 1.2em;
            border: 2px solid #ffeb3b;
            border-radius: 25px 0 0 25px;
            color:(244, 233, 0);
            width: 300px;
            box-sizing: border-box;
            outline: none;
            background: rgba(255, 255, 255,0.2);
            
            transition: border-color 0.3s, background 0.3s;
        }
        .search-form input[type="text"]:focus {
            color: rgb(244, 233, 0);
            background: rgb(0, 0, 0);
        }
        .search-form button {
            padding: 12px;
            font-size: 1.2em;
            border: 2px solid #ffeb3b;
            border-radius: 0 25px 25px 0;
            background: #ffeb3b;
            color: #333;
            cursor: pointer;
            width: 120px;
            margin-left: -1px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .search-form button:hover {
            background: #00bcd4;
            color: #fff;
            border-color: #00bcd4;
        }
        .search-form button:active {
            background: #0097a7;
            border-color: #0097a7;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Area Code Information</h1>
        <p>Enter a 6 digit valid Area Code</p>
        @if(isset($message))
            @if(strpos($message, 'Invalid') !== false || strpos($message, 'error') !== false)
                <div class="error">{{ $message }}</div>
            @else
                <div class="info-section">
                    <p><strong>{{ $message }}</strong></p>
                    <p><strong>Area Code:</strong> {{ $AC ?? 'Not Available' }}</p>
                </div>
            @endif
        @endif

        <!-- Search Form -->
        <div class="search-form">
            <form id="search-form" method="GET">
                <input type="text" id="ip-region" name="code" placeholder="Enter Region IP"  maxlength="6" required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('search-form');
            const input = document.getElementById('ip-region');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                const code = input.value.trim(); // Get the trimmed value from input
                if (code) {
                    // Redirect to the new URL with the country code
                    window.location.href = `/${code}`;
                }
            });
        });
    </script>
</body>
</html>
