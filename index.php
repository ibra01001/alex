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
        header("Location: index.php");



    } else {
        $feedback = "Invalid phone number";
    }
}





//mail($to, $, $body, $message);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ALEXANDER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <h1 class="title">
        <span class="letter">W</span>
        <span class="letter">E</span>
        <span class="letter">L</span>
        <span class="letter">C</span>
        <span class="letter">O</span>
        <span class="letter">M</span>
        <span class="letter">E</span>
    </h1>

    <div class="box">
        <img class="simon" src="./alexanderIMAGES/simon.webp" alt="">
    </div>

    <button class="title2" id="aboutme" onclick="showtheAboutMe()">ABOUT ME</button>
    <button class="title3" id="proj" onclick="showthePROJECTS()">SEE MORE</button>

    <div class="leftside" id="temp">
        <ul id="PROJ"></ul>
    </div>

    <div class="rightside" id="ABOUTME"></div>

    <div class="soundboard">
        <i class="bi bi-volume-mute-fill"></i>
        <audio id="audio" src="./ALEXANDERvc/اية الكرسي.mp3" preload="auto"></audio>
        <div id="controller" class="square draggable" ondrag="changeVolume()"></div>
        <i class="bi bi-volume-up-fill"></i>
    </div>

    <div class="scroll">
        <div id="scrolldown" class="observer-target"></div>
        <hr>
        <h1>Contact me</h1>
        <div class="FORM" style="display: <?= !isset($_SESSION['is_form_active']) ? 'block' : 'none' ?>">
            <?= $note; ?>
            <div class="form-container">

                <form method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="name" required
                       
                            <?= !isset($_SESSION["is_form_active"]) ? "" : "disabled"; ?>
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email" required
                        <?= !isset($_SESSION["is_form_active"]) ? "" : "disabled"; ?>
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="phone number"
                        <?= !isset($_SESSION["is_form_active"]) ? "" : "disabled"; ?>
                            value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                        <span><?= $feedback ?? "" ?></span>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5"
                            required <?= !isset($_SESSION["is_form_active"]) ? "" : "disabled"; ?>><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?? ''; ?>">
                    <button id="submit" type="submit" name="submit" <?= !isset($_SESSION["is_form_active"]) ? "" : "disabled"; ?> >Send Message</button>
                </form>
            </div>
        </div>
        </section>

        <footer class="footer" style="display:none">
            <ul class="contact">
                <li class="ibraCONTACT"><a id="github" href=""><i class="bi bi-github"></i></a></li>
                <li class="ibraCONTACT"><a id="instagram" href=""><i class="bi bi-instagram"></i></a></li>
                <li class="ibraCONTACT"><a id="discord" href=""><i class="bi bi-discord"></i></a></li>
                <li class="ibraCONTACT"><a id="facebook" href=""><i class="bi bi-facebook"></i></a></li>
                <li class="ibraCONTACT"><a id="email" type="email">mohamedremili5000@gmail.com</a></li>
            </ul>
            <p>Made by mohamed remili in &caps; in DZ</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/animejs@3.2.1/lib/anime.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Draggable.min.js"></script>
        <script src="index.js"></script>


</body>

</html>