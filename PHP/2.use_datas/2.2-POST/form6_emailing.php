<?php

# GOAL: send email for a personal website

# USE A SERVER: INFINITYFREE (infinityfree.net)
#   > download Filezilla

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

if($_POST)
{
    extract($_POST);

    $perso_mail = "team@keepizi.com";

    $header = "FROM: $name_sender - $mail_sender \r\n";
    $header .= "Reply-To: $perso_mail \r\n";
    $header .= "MIME-Version: 1.0 \r\n"; // MIME = Multipurpose Internet Mail Extensions >> it's a way to have more possibilities while writing a newsletter (image, sound ...)
    $header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    $title = "Mail from your website | $subject";

    $message = "<h1> $subject | FROM $name_sender - $mail_sender</h1>";
    $message .= "<ul>";
    $message .= "   <li>Name: $name_sender</li>";
    $message .= "   <li>Email: $mail_sender</li>";
    $message .= "</ul><hr>";
    $message .= "<p>$content</p>";

    if(mail($perso_mail, $title, $message, $header)) // function mail allows me to send email. It takes 4 arguments : receiver + email subject + email content + header (optional)
    {
        echo "<div style='background:green;'>Email sent, thank you for your kind message.</div>";
    }
    else 
    {
        echo "<div style='background:red;'>Error ! Try to send a new mail in few minutes.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emailing</title>
</head>
<body>
    <h1>Send a newsletter thanks to a form</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="name_sender">Your name</label>
        </div>
        <div>
            <input type="text" name="name_sender" id="name_sender">
        </div>
        <div>
            <label for="mail_sender">Your mail</label>
        </div>
        <div>
            <input type="email" name="mail_sender" id="mail_sender">
        </div>
        <div>
            <label for="subject">Subject of your mail</label>
        </div>
        <div>
            <input type="text" name="subject" id="subject">
        </div>
        <div>
            <label for="content">Your message</label>
        </div>
        <div>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </div>    
        <div>
            <input type="submit" value="Send it !">
        </div>
    </form>

</body>
</html>