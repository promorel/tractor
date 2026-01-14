<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TRACTOR BUMPER')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        .header {
            background-color: #ffffff;
            padding: 30px 20px;
            text-align: left;
        }
        
        .header img {
            max-width: 250px;
            height: auto;
        }
        
        .content {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        
        .footer {
            background-image: url('https://express-bois.com/wp-content/uploads/2025/12/background-email-tractorbumper.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #ffffff;
            padding: 40px 30px;
            text-align: center;
            font-size: 11px;
            line-height: 1.8;
            position: relative;
        }
        
        .footer-logo {
            display: inline-block;
            margin-bottom: 15px;
        }
        
        .footer-logo img {
            max-width: 150px;
            height: auto;
        }
        
        .footer p {
            margin: 5px 0;
            color: #ffffff;
        }
        
        .footer a {
            color: #FFC107;
            text-decoration: none;
        }
        
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #FFC107;
            color: #000000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 20px 0;
        }
        
        .button:hover {
            background-color: #FFD54F;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        .info-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        h1, h2, h3 {
            color: #000000;
            margin-bottom: 15px;
        }
        
        h1 {
            font-size: 24px;
        }
        
        h2 {
            font-size: 20px;
        }
        
        h3 {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <img src="https://tractorrbumper.com/assets/images/logo/tractorbumper-logo.png" alt="TRACTOR BUMPER" />
        </div>
        
        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">
                <img src="https://tractorrbumper.com/assets/images/logo/tractorbumper-logo.png" alt="TRACTOR BUMPER" />
            </div>
            <p>WWW.TRACTORBUMPER.COM</p>
            <p>WHATSAPP : <a href="https://wa.me/33602926393">06 02 92 63 93</a></p>
            <p>EMAIL : <a href="mailto:contact@tractorrbumper.com">contact@tractorrbumper.com</a></p>
            <p>ADDRESS: 1183 RTE de la Réatière 38090 Roche</p>
            <p style="margin-top: 15px; font-size: 10px; color: #999;">
                © {{ date('Y') }} TRACTOR BUMPER - All rights reserved
            </p>
        </div>
    </div>
</body>
</html>
