<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cool Minimalistic Text</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .center-text {
            font-size: 2rem;
            font-weight: 500;
            color: #000;
            transition: transform 0.3s ease, color 0.3s ease;
            cursor: pointer;
        }

        .center-text:hover {
            color: #ff4500;
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div class="center-text">
        <?php echo "YOU DID IT!"; ?>
    </div>
</body>
</html>
