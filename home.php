<?php session_start();



require 'email_helper.php';


$feedback = "";
$note = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $sender = $_POST["name"];
    $useremail = $_POST["email"];
    $userphone = $_POST["phone"];
    $message = $_POST["message"];

    $body = '
    <div style="max-width:600px;margin:20px auto;padding:20px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;font-family:Arial,sans-serif;color:#333;">
        <h2 style="color:#007BFF;border-bottom:1px solid #ddd;padding-bottom:10px;">📩 Contact Form Submission</h2>
        <p><strong>👤 Name:</strong> ' . htmlspecialchars($sender) . '</p>
        <p><strong>📧 Email:</strong> ' . htmlspecialchars($useremail) . '</p>
        <p><strong>📱 Phone:</strong> ' . htmlspecialchars($userphone) . '</p>
        <p><strong>💬 Message:</strong></p>
        <div style="background:#fff;border-left:4px solid #007BFF;padding:10px;margin-top:5px;border-radius:4px;">
            ' . nl2br(htmlspecialchars($message)) . '
        </div>
        <p style="margin-top:20px;font-size:12px;color:#999;">You received this email from your website contact form.</p>
    </div>';




    $phoneFILTER = filter_var($userphone, FILTER_SANITIZE_NUMBER_INT);


    if (strlen($phoneFILTER) === 10) {
        // $mail = new PHPMailer(true);
        // try {
        //   $mail->isSMTP();
        //   $mail->Host =";
        //   $mail->SMTPAuth = true;
        
        //   $mail->Password = "";
        //   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //   $mail->Port = ;

        



        //   $mail->isHTML(true);
        //   $mail->Subject = 'New message from you web';
        //   $mail->Body = '                <h2>Contact Form</h2>
        //             <p><strong>Name:</strong> $sender</p>
        //             <p><strong>Email:</strong> $useremail</p>
        //             <p><strong>Phone:</strong> $userphone</p>
        //             <p><strong>Message:</strong><br>$message</p>';


        //   $mail->send();
        //   $note = "message sent";
        // } catch (Exception $e) {
        //   $feedback = "Mailer Error : {$mail->ErrorInfo}";

        // }

        for ($i = 0; $i < 1; $i++) {
            send_email(
                recipient_adress: "",
                subject: "Test",
                body: $body
            );
        }

        unset($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["message"]);
        $_SESSION["is_form_active"] = false;
        header("Location: thanks.php");



    } else {
        $feedback = "Invalid phone number";
    }
}









?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=1.2">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md bg-black p-3 border-bottom border-white">
        <div class="container-fluid">
            <ul class="nav nav-underline w-100 justify-content-center">
                <li class="nav-item mx-2">
                    <a class="nav-link text-white fw-bold active" href="#profile">PROFILE</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white fw-bold" href="#" onclick="showtheAboutMe()">ABOUT ME</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white fw-bold" href="#lan">SKILLS</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-white fw-bold" href="#cnc">CONTACT</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="profile" class="box bg-black text-white p-4 p-md-5" style="border: 2px solid #fff; box-shadow: 8px 8px 0 #fff;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2 text-center">
                    <img src="./alexanderIMAGES/simon.webp"
                        class="img-fluid rounded-circle border border-3 border-white" style="max-height: 300px;"
                        alt="Profile Image">
                </div>
                <div class="col-md-6 order-md-1 text-center text-md-start mt-4 mt-md-0">
                    <h1 class="display-4 fw-bold mb-3">IBRAHIM</h1>
                    <h2 class="fs-3 text-uppercase" style="letter-spacing: 2px;">WEB DEVELOPER</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- About Me Section -->
    <div id="ABOUTME" class="about-overlay d-none"></div>


    <style>
        /* Navigation Styling */
        .nav-underline .nav-link {
            font-size: 1.1rem;
            letter-spacing: 1px;
            padding: 0.5rem 1rem;
            position: relative;
        }

        .nav-underline .nav-link.active {
            border-bottom: 3px solid #fff;
        }

        .nav-underline .nav-link:hover {
            color: #fff !important;
            opacity: 0.8;
        }

        /* Box Styling */
        .box {
            position: relative;
            overflow: hidden;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem;
            }

            .nav-link {
                font-size: 0.9rem !important;
                padding: 0.5rem !important;
            }

            h1.display-4 {
                font-size: 2.5rem;
            }
        }
    </style>
    <hr>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="projectCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="0"
                            class="active bg-dark"></button>
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="1"
                            class="bg-dark"></button>
                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="2"
                            class="bg-dark"></button>
                    </div>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="./alexanderIMAGES/weather.png" class="d-block w-100" alt="Weather Project">
                            <div class="carousel-caption">
                                <h5 class="fw-bold"><a href="https://github.com/ibra01001/Weather-web">Weather App</a></h5>
                                <p class="d-none d-md-block">Interactive weather web using API</p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="./alexanderIMAGES/speed.png" class="d-block w-100" alt="Speed Test">
                            <div class="carousel-caption">
                                <h5 class="fw-bold"><a href="https://github.com/ibra01001/typing_speed_test">Speed Test</a></h5>
                                <p class="d-none d-md-block">Type quickly and get your score</p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="./alexanderIMAGES/color.png" class="d-block w-100" alt="Color Picker">
                            <div class="carousel-caption">
                                <h5 class="fw-bold"><a href="https://github.com/ibra01001/color-picker">Color Picker</a></h5>
                                <p class="d-none d-md-block">Choose an image and extract it colors</p>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-carousel {
            border: 2px solid #000;
            box-shadow: 8px 8px 0 #000;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.7);
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
        }

        .carousel-caption h5 {
            font-size: 1.5rem;
            color: #fff;
        }

        .carousel-caption p {
            color: #ddd;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 1px solid #000;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 60%;
            border: 2px solid #000;
        }
    </style>
    <hr>
    <style>
        .section-box {
            background-color: #fff;
            border: 2px solid #000;
            box-shadow: 8px 8px 0 #000;
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .skill-card {
            border: 2px solid #000;
            transition: all 0.3s ease;
            height: 100%;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            transition: transform 0.3s ease;
        }

        .skill-card:hover .skill-icon {
            transform: scale(1.1);
        }

        .skill-title {
            font-size: 1rem;
            font-weight: bold;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #000;
        }

        @media (max-width: 768px) {
            .skill-icon {
                width: 45px;
                height: 45px;
            }

            .skill-title {
                font-size: 0.9rem;
            }

            .section-box {
                box-shadow: 4px 4px 0 #000 !important;
            }
        }
    </style>
    </head>

    <body>

        <div id="lan" class="container py-5">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-dark">SKILLS</h1>
            </div>

            <!-- LANGUAGES -->
            <section class="section-box">
                <div class="text-center mb-4">
                    <h2 class="display-5 fw-bold text-dark">LANGUAGES</h2>
                </div>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 justify-content-center">
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/javascript-logo-svgrepo-com.svg" alt="JavaScript"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">JavaScript</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/php-svgrepo-com.svg" alt="PHP"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">PHP</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/mysql-logo-svgrepo-com.svg" alt="MySQL"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">MySQL</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/html-svgrepo-com.svg" alt="HTML"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">HTML</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/css-3-svgrepo-com.svg" alt="CSS"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">CSS</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FRAMEWORKS -->
            <section class="section-box">
                <div class="text-center mb-4">
                    <h2 class="display-5 fw-bold text-dark">FRAMEWORKS</h2>
                </div>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4 justify-content-center">
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/react-svgrepo-com.svg" alt="React"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">React</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/bootstrap-svgrepo-com.svg" alt="Bootstrap"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">Bootstrap</p>
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="skill-card p-3">
                            <img src="./alexanderIMAGES/laravel-svgrepo-com.svg" alt="Laravel"
                                class="skill-icon img-fluid mb-2">
                            <p class="skill-title">Laravel</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
            window.addEventListener('DOMContentLoaded', () => {
                anime({
                    targets: '.skill-icon',
                    rotate: '2turn',
                    scale: [0.2, 1],
                    opacity: [0, 1],
                    duration: 5000,
                    delay: anime.stagger(200),
                    easing: 'easeInOutExpo'
                });
            });
        </script>
        </div>
        <div class="container-fluid px-0">
            <section class="additional-skills bg-white p-4 p-md-5 mb-5">
                <div class="text-center mb-4">
                    <h2 class="display-5 fw-bold" style="letter-spacing: 1px;">ADDITIONAL SKILLS</h2>
                </div>
                <div class="row g-0">
                    <!-- PC Building -->
                    <div class="col-md-4 skill-item">
                        <div class="skill-image-container">
                            <img src="./alexanderIMAGES/pcc.jpg" alt="PC Building" class="skill-image">
                            <div class="skill-title-overlay">
                                <p class="skill-main-title fw-bold">PC BUILDING</p>
                            </div>
                        </div>
                        <div class="skill-footer py-3">
                            <p class="skill-subtitle">WINDOWS TROUBLESHOOTING</p>
                        </div>
                    </div>

                    <!-- Figma -->
                    <div class="col-md-4 skill-item">
                        <div class="skill-image-container">
                            <img src="./alexanderIMAGES/fgma.jpg" alt="Figma" class="skill-image">
                            <div class="skill-title-overlay">
                                <p class="skill-main-title fw-bold">FIGMA</p>
                            </div>
                        </div>
                        <div class="skill-footer py-3">
                            <p class="skill-subtitle">UI/UX DESIGN</p>
                        </div>
                    </div>

                    <!-- Digital Art -->
                    <div class="col-md-4 skill-item">
                        <div class="skill-image-container">
                            <img src="./alexanderIMAGES/tblt.jpg" alt="Digital Art" class="skill-image">
                            <div class="skill-title-overlay">
                                <p class="skill-main-title fw-bold">DIGITAL ART</p>
                            </div>
                        </div>
                        <div class="skill-footer py-3">
                            <p class="skill-subtitle">2D ILLUSTRATION</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <style>
            /* Main container styling */
            .additional-skills {
                border: 2px solid #000;
                box-shadow: 8px 8px 0 #000;
                position: relative;
            }

            /* Image container with border */
            .skill-image-container {
                position: relative;
                width: 100%;
                height: 0;
                padding-bottom: 75%;
                overflow: hidden;
                border-bottom: 2px solid #000;
            }

            /* Image styling */
            .skill-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: all 0.3s ease;
            }

            /* Title overlay */
            .skill-title-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: rgba(0, 0, 0, 0.7);
                opacity: 0;
                transition: all 0.3s ease;
            }

            /* Main title styling */
            .skill-main-title {
                color: white;
                font-size: 1.8rem;
                text-align: center;
                padding: 10px;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            /* Skill footer */
            .skill-footer {
                background: #fff;
                border-left: 2px solid #000;
                border-right: 2px solid #000;
                transition: all 0.3s ease;
            }

            /* Enhanced Subtitle styling */
            .skill-subtitle {
                font-size: 1.1rem;
                font-weight: 700;
                color: #000;
                text-align: center;
                margin: 0;
                letter-spacing: 1px;
                text-transform: uppercase;
            }

            /* Hover effects */
            .skill-item:hover .skill-title-overlay {
                opacity: 1;
            }

            .skill-item:hover .skill-image {
                transform: scale(1.05);
            }

            .skill-item:hover .skill-footer {
                background: #f8f9fa;
            }

            /* Borders for grid items */
            .skill-item:nth-child(1) .skill-image-container,
            .skill-item:nth-child(1) .skill-footer {
                border-left: none;
            }

            .skill-item:nth-child(3) .skill-image-container,
            .skill-item:nth-child(3) .skill-footer {
                border-right: none;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .additional-skills {
                    box-shadow: 4px 4px 0 #000;
                }

                .skill-main-title {
                    font-size: 1.4rem;
                }

                .skill-subtitle {
                    font-size: 0.9rem;
                }

                .skill-image-container {
                    padding-bottom: 100%;
                }

                /* Stack on mobile */
                .skill-item {
                    border-bottom: 2px solid #000;
                }

                .skill-item:last-child {
                    border-bottom: none;
                }

                .skill-item .skill-image-container,
                .skill-item .skill-footer {
                    border-left: none !important;
                    border-right: none !important;
                }
            }
        </style>

        <hr>
        <div id="cnc" class="container-fluid">

            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="FORM bg-white p-4 p-md-5">
                            <h1 id="prrr" class="text-center mb-4 fw-bold display-5">Contact me</h1>

                            <?php if (isset($note)): ?>
                                <div class="alert alert-info mb-4">
                                    <?= $note ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-container">
                                <form method="post" class="needs-validation" novalidate>
                                    <!-- Name Field -->
                                    <div class="form-group mb-4">
                                        <label for="name" class="form-label fw-semibold">Full Name</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control rounded-0 border-2 border-dark" placeholder="Your name"
                                            required
                                            value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                                        <div class="invalid-feedback">Please enter your name</div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group mb-4">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control rounded-0 border-2 border-dark"
                                            placeholder="your.email@example.com" required
                                            value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                                        <div class="invalid-feedback">Please enter a valid email</div>
                                    </div>

                                    <!-- Phone Field -->
                                    <div class="form-group mb-4">
                                        <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                        <input type="tel" id="phone" name="phone"
                                            class="form-control rounded-0 border-2 border-dark"
                                            placeholder="+1 (123) 456-7890"
                                            value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                                        <?php if (isset($feedback)): ?>
                                            <div class="text-muted small mt-1"><?= $feedback ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Message Field -->
                                    <div class="form-group mb-4">
                                        <label for="message" class="form-label fw-semibold">Message</label>
                                        <textarea id="message" name="message"
                                            class="form-control rounded-0 border-2 border-dark" rows="5"
                                            required><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                                        <div class="invalid-feedback">Please enter your message</div>
                                    </div>

                                    <!-- CSRF Token -->
                                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                                    <!-- Submit Button -->
                                    <button id="submit" type="submit" name="submit"
                                        class="btn btn-dark rounded-0 w-100 py-3 fw-bold text-uppercase">
                                        Send Message
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .FORM {
                    border: 2px solid #000;
                    box-shadow: 8px 8px 0 #000;
                }

                .form-control {
                    outline: none !important;
                    box-shadow: none !important;
                }

                .form-control:focus {
                    border-color: #000 !important;
                }

                #submit {
                    transition: all 0.3s ease;
                    letter-spacing: 1px;
                }

                #submit:hover {
                    background-color: #000;
                    transform: translateY(-2px);
                }

                .invalid-feedback {
                    font-weight: 500;
                }
            </style>

            <script>
                // Bootstrap form validation
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        var forms = document.getElementsByClassName('needs-validation');
                        var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>
        </div>
        <footer class="bg-black text-white py-5" style="border-top: 2px solid #fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <ul class="contact list-inline">
                    <li class="list-inline-item mx-3">
                        <a id="github" href="https://github.com/ibra01001" class="text-white" style="font-size: 1.5rem;">
                            <i class="bi bi-github"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-3">
                        <a id="instagram" href="https://www.instagram.com/portal_eyes/" class="text-white" style="font-size: 1.5rem;">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-3">
                        <a id="discord"  class="text-white" style="font-size: 1.5rem;">
                            <i class="bi bi-discord"></i>ibra9937
                        </a>
                    </li>
                    <li class="list-inline-item mx-3">
                        <a id="facebook" href="https://web.facebook.com/tf.ue.355/" class="text-white" style="font-size: 1.5rem;">
                            <i class="bi bi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mx-3">
                        <a id="email" href="mailto:mohamedremili5000@gmail.com" class="text-white fw-bold text-decoration-none" style="font-size: 1.1rem;">
                            <i class="bi bi-envelope-fill me-2"></i>mohamedremili5000@gmail.com
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 text-center">
                <p id="made" class="mb-0 fw-bold" style="letter-spacing: 1px;">MADE BY 👀 MOHAMED REMILI IN DZ</p>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer Styling */
    .contact a {
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .contact a:hover {
        transform: translateY(-3px);
        opacity: 0.8;
    }
    
    #email:hover {
        text-decoration: underline !important;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .list-inline-item {
            margin: 0 10px 15px !important;
            display: inline-block;
        }
        
        #email {
            font-size: 0.9rem !important;
        }
        
        #made {
            font-size: 0.9rem;
        }
    }
</style>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
    <script src="index.js"></script>

</html>
