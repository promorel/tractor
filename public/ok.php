<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Under Maintenance</title>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/images/logo/tractorbumper-logo.png">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css" />

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .maintenance-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 60px 40px;
            max-width: 700px;
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
        
        .maintenance-icon {
            font-size: 120px;
            color: #FDC830;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        
        .maintenance-title {
            font-size: 48px;
            font-weight: 800;
            color: #333;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .maintenance-subtitle {
            font-size: 24px;
            color: #666;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .maintenance-text {
            font-size: 16px;
            color: #777;
            line-height: 1.8;
            margin-bottom: 30px;
        }
        
        .contact-info {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin-top: 40px;
        }
        
        .contact-info h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
        }
        
        .contact-item i {
            color: #FDC830;
            font-size: 20px;
        }
        
        .contact-item a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .contact-item a:hover {
            color: #764ba2;
        }
        
        .social-links {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-links a {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
        }
        
        .social-links a:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .loader {
            display: inline-block;
            width: 60px;
            height: 60px;
            margin-top: 20px;
        }
        
        .loader:after {
            content: " ";
            display: block;
            width: 46px;
            height: 46px;
            margin: 1px;
            border-radius: 50%;
            border: 5px solid #FDC830;
            border-color: #FDC830 transparent #FDC830 transparent;
            animation: loader 1.2s linear infinite;
        }
        
        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        .logo {
            max-width: 200px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="maintenance-wrapper">
        
        <!-- Icon -->
        <div class="maintenance-icon">
            <i class="pe-7s-tools"></i>
        </div>
        
        <!-- Title -->
        <h1 class="maintenance-title">Under Maintenance</h1>
        <h2 class="maintenance-subtitle">We'll be back soon!</h2>
        
        <!-- Description -->
        <p class="maintenance-text">
            Our site is currently under maintenance to offer you a better experience.<br>
            We are working hard to improve our services and will be back very soon.
        </p>
        
        <p class="maintenance-text">
            <strong>Estimated time:</strong> A few hours<br>
            Thank you for your patience and understanding.
        </p>
        
        <!-- Loader -->
        <div class="loader"></div>
        
    </div>

    <!-- Scripts -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    
    <script>
        // Auto-refresh every 5 minutes
        setTimeout(function(){
            location.reload();
        }, 300000);
        
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>
