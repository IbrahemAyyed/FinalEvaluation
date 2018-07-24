<?php
# MyRecipe.com want a newsletter with a new recipe to send to new clients. The client need the firstname + lastname + email

ini_set('sendmail_from', 'noreply@myrecipe.com'); // initialize the "sending address". The function takes 2 arguments: parameter + the mail address

date_default_timezone_set("Europe/Paris"); // the function allows us to give informations about the timezone

// print_r($_POST);

if($_POST)
{
    $header = "TO: " . $_POST['mail'] . "\r\n";
    $header .= "FROM: MyRecipe.com <noreply@myrecipe.com> \r\n";
    $header .= "Reply-To: " . $_POST['mail'] . "\r\n";
    $header .= "MIME-Version: 1.0 \r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    $subject = "MyRecipe.com : burn the best Creme Brulee ever !";

    // function utf8_decode() allows us to have the interpretation
    $message = utf8_decode("
        <!DOCTYPE html>
        <html>
            <head>
                <meta name='viewport' content='width=device-width'>
                <meta http-equiv='Content-type' content='text/html; charset=UTF-8'>
                <title>MyRecipe.com | Creme Brulee in your face</title>
            </head>
            <body>
                <table border='0' cellpadding='0' style='width: 100%;'>
                    <tr style='text-align: center;'>
                        <td style='color:red'>
                            Welcome <strong>" . $_POST['firstname'] . "</strong> 
                        </td>
                    </tr>
                    <tr style='text-align: center;'>
                        <td style='width: 50%;'>
                            <img style='border: 1px solid blue;' src='https://irp-cdn.multiscreensite.com/0fe58c86/import/base/dms3rep/multi/desktop/1415882691579.png' alt='Welcome in the recipe community'>
                        </td>
                        <td style='width: 50%;'>
                            Welcome for the best Creme Brulee ever !
                        </td>
                    </tr>
                    <tr>
                        <td>
                            To have a perfect burn of your Creme Brulee, you should follow theses steps:
                            <ol>
                                <li>Preheat oven 300°F. Separate egg yolks from whites and save egg whites for another use.</li>

                                <li>In a large mixing bowl, beat together the egg yolks with the sugar until the sugar is dissolved and the mixture is a pale yellow.</li>

                                <li>Add the whipping cream and vanilla, and beat on low until well blended.</li>
                                
                                <li>I pour the mixture through a strainer into your 8 ramekins (See Note 1) or custard cups to get rid of any foam or bubbles (See Note 2). Pour up to a 1/4 inch from top of ramekin or cup.</li>
                            </ol>
                            BRAVO, you're a chef !
                        </td>
                    </tr>
                    <tr style='text-align: center; width:100%'>
                        <td style='font-weight: bold; width:50%'>
                            See you soon !
                        </td>
                        <td style='font-family: cursive; width: 50%;'>
                            CAPTAIN RECIPE
                        </td>
                    </tr>
                </table>
            </body>
        </html>
    ");

    if(mail($_POST['mail'], $subject, $message, $header))
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
    <title>Newsletter | MyRecipe.com</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" placeholder="Firstname">
        <input type="text" name="lastname" placeholder="Lastname">
        <input type="email" name='mail' placeholder="Email">
        <input type="submit" value="Receive the recipe">
    </form>
</body>
</html>