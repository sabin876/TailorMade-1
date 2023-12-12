
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
    var_dump($_POST);

    echo "<br>-------------------------------";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $countries=$_POST['country'];
    $countries = join(", ",$countries);
    echo "countries: " . $countries. "<br>";

    $adventures = $_POST['adventure'];
    $adventures = join(", ", $adventures);
    echo "adventures: " . $adventures . "<br>";

    $description=$_POST['own-description'];
    echo "description: " . $description . "<br>";
    $travels_with=$_POST['travels-with'][0];
    echo "travels_with: " . $travels_with . "<br>";
    $travel_date=$_POST['date-from-to'];
    echo "travel_date: " . $travel_date . "<br>";
    $est_budget=$_POST['est-budget'];
    echo "est_budget: " . $est_budget . "<br>";
    $lodge=$_POST['lodge'][0];
    echo "lodge: " . $lodge . "<br>";
    $name=$_POST['full-name'];
    echo "name: " . $name . "<br>";
    $email=$_POST['email'];
    echo "email: " . $email . "<br>";
    $phone=$_POST['phone-skype'];
    echo "phone: " . $phone . "<br>";
    $nationality=$_POST['nationality'];
    echo "nationality: " . $nationality . "<br>";

    $contact_via=$_POST['contact-via'];
    $contact_via= join(", ", $contact_via);
    echo "contact_via: " . $contact_via . "<br>";

    $additional_information=$_POST['add-info'];
    echo "additional_information: " . $additional_information . "<br>";
    $found_by=$_POST['found-by'];
    echo "found_by: " . $found_by . "<br>";

    
// Reading file content
$myfile = fopen("main.html", "r") or die("Unable to open file!");
$file_content = " ";
while(!feof($myfile)) {
    echo "Reading main.html ... <br> ";
    $file_content .= fgets($myfile);
  }


fclose($myfile);

//writing post value in HTML
foreach($_POST as $key => $value) {
    if (gettype($value) == "array"){
        $value = join(", ", $value);
    }
    try {
        $file_content = str_replace("{{".$key."}}", $value, $file_content);
    } catch (\Throwable $th) {
        echo $th;
    }
}

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'prajwalsiwakoti39@gmail.com';                     //SMTP username
    $mail->Password   = 'xosp mbms dynk gjgv ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('prajwalsiwakoti39@gmail.com', 'Wilderness');
    $mail->addAddress('techsayatri@gmail.com', 'Reciever');     //Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    echo "sending main.html ... <br> ";
    $mail->Body = $file_content;
    

    $mail->send();
    echo 'Message has been sent' . "<br>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}" . "<br>";
}
}
header("Location: /tailormode/");
?>