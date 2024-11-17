<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .error-container {
            text-align: center;
        }

        .error-container h1 {
            font-size: 8rem;
            color: #dc3545;
            margin-bottom: 1rem;
        }

        .error-container p {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .error-container a {
            padding: 0.75rem 1.5rem;
            font-size: 1.25rem;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .error-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <a href="{{ route('home') }}">Back to Home</a>
    </div>
</body>

</html>
