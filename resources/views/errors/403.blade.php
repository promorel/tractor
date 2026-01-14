<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Unavailable</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 60px 40px;
            max-width: 600px;
            text-align: center;
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-icon {
            font-size: 100px;
            margin-bottom: 30px;
        }

        .error-code {
            font-size: 80px;
            font-weight: 800;
            color: #333;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .error-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .contact-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
            margin-top: 30px;
        }

        .contact-info p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .contact-info a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .contact-info a:hover {
            color: #764ba2;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">⚠️</div>
        <div class="error-code">503</div>
        <h1 class="error-title">Service Temporarily Unavailable</h1>
        <p class="error-message">
            We're experiencing technical difficulties at the moment.
        </p>
        <p class="error-message">
            Our team is working to resolve this issue. Please try again later.
        </p>
        
        <div class="contact-info">
            <p><strong>Need assistance?</strong></p>
            <p>Email: <a href="mailto:contact@tractorrbumper.com">contact@tractorrbumper.com</a></p>
            <p>WhatsApp: <a href="https://wa.me/33602926393" target="_blank">+33 6 02 92 63 93</a></p>
        </div>
    </div>
</body>
</html>
