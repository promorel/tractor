@extends('layout.template')

@section('contenu')

    <style>
        .contact-intro h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .contact-intro p {
            font-size: 1.15rem;
            line-height: 1.8;
        }

        .whatsapp-btn img {
            max-width: 200px;
            height: auto;
            transition: transform 0.3s;
        }

        .whatsapp-btn img:hover {
            transform: scale(1.05);
        }

        .section-title h2.title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .title-border-bottom {
            width: 60px;
            height: 3px;
            background-color: #ffc107;
            margin-top: 10px;
        }

        .input-item {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .input-item:focus {
            outline: none;
            border-color: #ffc107;
        }

        .textarea-item {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            min-height: 150px;
            resize: vertical;
        }

        .textarea-item:focus {
            outline: none;
            border-color: #ffc107;
        }

        .single-contact-info {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .single-contact-icon {
            width: 50px;
            height: 50px;
            background-color: #ffc107;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .single-contact-icon i {
            font-size: 20px;
            color: #000;
        }

        .single-contact-title-content h4.title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .single-contact-title-content p,
        .single-contact-title-content a {
            color: #666;
            margin: 0;
        }

        .single-contact-title-content a:hover {
            color: #ffc107;
        }

        .contact-map {
            width: 100%;
            height: 450px;
            border: 0;
        }

        .contactinfo table {
            width: 100%;
        }

        .contactinfo table td {
            padding: 15px 10px;
            vertical-align: top;
        }

        .contactinfo table td:first-child {
            width: 50px;
        }

        .contactinfo table td i {
            font-size: 20px;
            color: #ffc107;
        }

        .contactinfo h4 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .contactinfo p,
        .contactinfo a {
            color: #666;
            margin: 0;
        }

        .contactinfo a:hover {
            color: #ffc107;
        }

        select.input-item {
            background-color: white;
            cursor: pointer;
        }

        .btn-yellow {
            background-color: #ffc107;
            color: #000;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-yellow:hover {
            background-color: #ffb300;
            color: #000;
            transform: translateY(-2px);
        }

        .faq-link {
            font-size: 1.1rem;
            font-weight: bold;
            color: #000;
            text-decoration: none;
            border-bottom: 2px solid #ffc107;
        }

        .faq-link:hover {
            color: #ffc107;
        }
    </style>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Contact</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Contact Introduction Section Start -->

    <div class="section mt-5">
        <div class="container">
            <div class="row text-center contact-intro">
                <div class="col">
                    <h2>Interested in our bumpers?</h2>
                    <p>
                        You can contact us directly via the details below.<br>
                        This can be done by telephone, by e-mail or by filling out our contact form.<br>
                        We'd like to hear from you!
                    </p>

                    <div class="row mt-5">
                        <div class="col-md-6 mb-3">
                            <a href="{{ route('faq') }}" class="faq-link">Click here for Frequently Asked Questions</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="https://wa.me/33602926393" target="_blank" class="whatsapp-btn">
                                <img src="https://tractorbumper.com/wp-content/uploads/2025/08/Whatsapp_contact_TractorBumper.png"
                                    alt="Contact via WhatsApp" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Introduction Section End -->

    <!-- Contact Form & Info Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10 justify-content-center">
                <!-- Contact Info Start -->
                <div class="col-12 col-lg-5 mb-10">
                    <!-- Section Title Start -->
                    <div class="section-title mb-5">
                        <h2 class="title pb-3">Contact Info</h2>
                        <div class="title-border-bottom"></div>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Information Wrapper Start -->
                    <div class="contactinfo">
                        <table>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-user"></i></td>
                                    <td>
                                        <h4>Contact</h4>
                                        <p>
                                            <strong>Fons Janssen</strong><br>
                                            Hondseind 25<br>
                                            5131 RE Alphen<br>
                                            The Netherlands
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-envelope"></i></td>
                                    <td>
                                        <h4>E‑mail</h4>
                                        <a href="mailto:contact@tractorrbumper.com">contact@tractorrbumper.com</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-file-alt"></i></td>
                                    <td>
                                        <h4>Data</h4>
                                        <p>
                                            <strong>KVK</strong> 71251073<br>
                                            <strong>BTW</strong> 8586.37.042.B01
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Contact Information Wrapper End -->
                </div>
                <!-- Contact Info End -->
                
                <!-- Contact Form Start -->
                <div class="col-12 col-lg-5 mb-10">
                    <!-- Section Title Start -->
                    <div class="section-title mb-5">
                        <h2 class="title pb-3">Get In Touch</h2>
                        <div class="title-border-bottom"></div>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <div id="form-messages" style="display: none; padding: 15px; border-radius: 5px; margin-bottom: 20px;"></div>
                        
                        <form action="{{ route('contact.submit') }}" id="contact-form" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="text" placeholder="Name *" name="name" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="email" placeholder="E-mail *" name="email" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="tel" placeholder="Phone" name="phone">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="text" placeholder="Address *" name="address" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="text" placeholder="City *" name="city" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <input class="input-item" type="text" placeholder="Country *" name="country" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <select class="input-item" name="model">
                                        <option value="">Interested in which model?</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Connect">Connect</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Safetyweight">Safetyweight</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <select class="input-item" name="user_type">
                                        <option value="">End user or dealer?</option>
                                        <option value="End user">End user</option>
                                        <option value="Dealer">Dealer</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <select class="input-item" name="tractor_brand">
                                        <option value="">Tractor brand?</option>
                                        <option value="Fendt">Fendt</option>
                                        <option value="John Deere">John Deere</option>
                                        <option value="New Holland">New Holland</option>
                                        <option value="Deutz Fahr">Deutz Fahr</option>
                                        <option value="Case IH">Case IH</option>
                                        <option value="Massey Ferguson">Massey Ferguson</option>
                                        <option value="Claas">Claas</option>
                                        <option value="Valtra">Valtra</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <textarea class="textarea-item" name="message" placeholder="Your message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-yellow" id="submit-btn">
                                        <span class="btn-text">Send A Message</span>
                                        <span class="btn-loading" style="display: none;">
                                            <i class="fa fa-spinner fa-spin"></i> Sending...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form Wrapper End -->

                    <script>
                        document.getElementById('contact-form').addEventListener('submit', async function(e) {
                            e.preventDefault();
                            
                            const form = this;
                            const submitBtn = document.getElementById('submit-btn');
                            const btnText = submitBtn.querySelector('.btn-text');
                            const btnLoading = submitBtn.querySelector('.btn-loading');
                            const formMessages = document.getElementById('form-messages');
                            
                            // Désactiver le bouton
                            submitBtn.disabled = true;
                            btnText.style.display = 'none';
                            btnLoading.style.display = 'inline';
                            
                            // Préparer les données
                            const formData = new FormData(form);
                            
                            try {
                                const response = await fetch(form.action, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest',
                                        'Accept': 'application/json'
                                    }
                                });
                                
                                const data = await response.json();
                                
                                if (data.success) {
                                    // Succès
                                    formMessages.style.display = 'block';
                                    formMessages.style.backgroundColor = '#d4edda';
                                    formMessages.style.color = '#155724';
                                    formMessages.style.border = '1px solid #c3e6cb';
                                    formMessages.innerHTML = '<i class="fa fa-check-circle"></i> ' + data.message;
                                    
                                    // Réinitialiser le formulaire
                                    form.reset();
                                    
                                    // Scroll vers le message
                                    formMessages.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                } else {
                                    // Erreur
                                    formMessages.style.display = 'block';
                                    formMessages.style.backgroundColor = '#f8d7da';
                                    formMessages.style.color = '#721c24';
                                    formMessages.style.border = '1px solid #f5c6cb';
                                    formMessages.innerHTML = '<i class="fa fa-exclamation-circle"></i> ' + data.message;
                                }
                            } catch (error) {
                                formMessages.style.display = 'block';
                                formMessages.style.backgroundColor = '#f8d7da';
                                formMessages.style.color = '#721c24';
                                formMessages.style.border = '1px solid #f5c6cb';
                                formMessages.innerHTML = '<i class="fa fa-exclamation-circle"></i> An error occurred. Please try again.';
                            } finally {
                                // Réactiver le bouton
                                submitBtn.disabled = false;
                                btnText.style.display = 'inline';
                                btnLoading.style.display = 'none';
                            }
                        });
                    </script>
                </div>
                <!-- Contact Form End -->
            </div>
        </div>
    </div>
    <!-- Contact Form & Info Section End -->

    <!-- Google Map Section Start -->
    <div class="section">
        <div class="google-map-area w-100">
            <iframe class="contact-map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2460.8424985956816!2d4.955472076631916!3d51.81466967183445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6f0e8e8e8e8e9%3A0x9b9b9b9b9b9b9b9b!2sHondseind%2025%2C%205131%20RE%20Alphen%2C%20Netherlands!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <!-- Google Map Section End -->

    <!-- Brochure Section Start -->
    <section class="brochure section" style="padding: 80px 0; background-color: #ffe100ff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="https://tractorbumper.com/wp-content/themes/tractor-bumper/images/brochure.png" alt="Brochure" class="img-fluid" style="border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                </div>
                <div class="col-md-8">
                    <div class="brochure-content">
                        <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 20px;">Online Brochure</h2>
                        <p style="font-size: 1.15rem; line-height: 1.8; margin-bottom: 30px; color: #666;">
                            <b>You will also find an online brochure for more information and practical details.</b>
                        </p>
                        <a href="https://tractorbumper.com/wp-content/uploads/2020/10/tractorbumper_brochure_nl_website.pdf" target="_blank" class="btn btn-yellow" style="background: linear-gradient(135deg, #FDC830 0%, #311101ff 100%); border: none; padding: 15px 40px; font-size: 1.1rem; border-radius: 50px; color: white; font-weight: bold; text-decoration: none; display: inline-block; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                            Download PDF Document
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brochure Section End -->

@endsection