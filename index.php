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
        //   $mail->Host = "smtp.gmail.com";
        //   $mail->SMTPAuth = true;
        //   $mail->Username = "mohamedremili500@gmail.com";
        //   $mail->Password = "kekr gvgh ekfk kjkw";
        //   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //   $mail->Port = 587;

        //   $mail->setFrom($useremail, $sender);
        //   $mail->addAddress("mohamedremili500@gmail.com");



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
                recipient_adress: "mohamedremili5000@gmail.com",
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALEXANDER</title>
    <link rel="stylesheet" href="style.css?v=1.2">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>



    <div class="box">
        <img class="simon" src="./alexanderIMAGES/simon.webp" alt="">
            <h1 class="title">
        <span class="letter">I</span>
        <span class="letter">B</span>
        <span class="letter">R</span>
        <span class="letter">A</span>
        <span class="letter">H</span>
        <span class="letter">I</span>
        <span class="letter">M</span>
        <p class="just">Just a web developer</p>
    </h1>
    </div>

    <button class="title2" id="aboutme" onclick="showtheAboutMe()">About Me</button>
   



    <div class="rightside" id="ABOUTME"></div>

    <div class="soundboard">
        <i class="bi bi-volume-mute-fill"></i>
        <audio id="audio" src="./ALEXANDERvc/اية الكرسي.mp3" preload="auto"></audio>
        <div id="controller" class="square" ondrag="changeVolume()"></div>
        <i class="bi bi-volume-up-fill"></i>
    </div>

    <div class="scroll">
        <div id="scrolldown" class="observer-target"></div>
        <hr>
     
       
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="FORM bg-white p-4 p-md-5">
                <h1 id="prrr" class="text-center mb-4 fw-bold display-5">Contact me</h1>
                
                <?php if(isset($note)): ?>
                <div class="alert alert-info text-center mb-4">
                    <?= $note ?>
                </div>
                <?php endif; ?>

                <div class="form-container">
                    <form method="post" class="needs-validation" novalidate>
                        <!-- Name Field -->
                        <div class="form-group mb-4">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control rounded-0 border-2 border-dark" 
                                   placeholder="Your name" 
                                   required
                                   value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
                            <div class="invalid-feedback">Please enter your name</div>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group mb-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control rounded-0 border-2 border-dark" 
                                   placeholder="your.email@example.com" 
                                   required
                                   value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                            <div class="invalid-feedback">Please enter a valid email</div>
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group mb-4">
                            <label for="phone" class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   class="form-control rounded-0 border-2 border-dark" 
                                   placeholder="+1 (123) 456-7890"
                                   value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                            <?php if(isset($feedback)): ?>
                            <div class="text-muted small mt-1"><?= $feedback ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- Message Field -->
                        <div class="form-group mb-4">
                            <label for="message" class="form-label fw-semibold">Message</label>
                            <textarea id="message" 
                                      name="message" 
                                      class="form-control rounded-0 border-2 border-dark" 
                                      rows="5"
                                      required><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                            <div class="invalid-feedback">Please enter your message</div>
                        </div>

                        <!-- CSRF Token -->
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">

                        <!-- Submit Button -->
                        <button id="submit" 
                                type="submit" 
                                name="submit" 
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
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
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
        </section>

        <footer class="footer">
            <ul class="contact">
                <li class="ibraCONTACT"><a id="github" href="https://github.com/ibra01001"><i class="bi bi-github"></i></a></li>
                <li class="ibraCONTACT"><a id="instagram" href="https://www.instagram.com/portal_eyes/"><i class="bi bi-instagram"></i></a></li>
                <li class="ibraCONTACT"><a id="discord" href=""><i class="bi bi-discord"></i></a></li>
                <li class="ibraCONTACT"><a id="facebook" href="https://web.facebook.com/tf.ue.355/"><i class="bi bi-facebook"></i></a></li>
                <li class="ibraCONTACT"><a id="email" href="mailto:mohamedremili5000@gmail.com">mohamedremili5000@gmail.com</a></li>
            </ul>
            <p id="made">Made by 👀 mohamed remili in DZ</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
        <script src="index.js"></script>


</body>

</html>