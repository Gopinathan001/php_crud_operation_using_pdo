<?php 
// autoload file 
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function mailFunction($names,$dob,$age,$gen,$state,$city,$university,$college,$address,$phonenum,$email){        
    $mail = new PHPMailer(true);
    try{
        // server settings
        $mail->isSMTP();                                          
        $mail->Host       = 'smtp.gmail.com';                      
        $mail->SMTPAuth   = TRUE;                                  
        $mail->Username   = 'your_mail_id@gmail.com';                 
        $mail->Password   = 'your_password';                        
        $mail->SMTPSecure = 'tls';         
        $mail->Port       = 587; 

        // from 
        $mail->setFrom('your_mail_id@gmail.com', 'HDG Techno solutions'); 
        $mail->addAddress($email);

        // content data 
        $mail->isHTML(true);
        $mail->Subject = 'Thank you for registering';
        $mail->Body ='
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome Email</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-3">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h5 class="card-title">Welcome, ' . $names . '!</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Thank you for registering with us.</p>
                                <p class="card-text">Here are your registered details:</p>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Name :</strong> ' . $names . '</li>
                                    <li class="list-group-item"><strong>Date of Birth :</strong> ' . $dob . '</li>
                                    <li class="list-group-item"><strong>Age :</strong> ' . $age . '</li>
                                    <li class="list-group-item"><strong>Gender :</strong> ' . $gen . '</li>
                                    <li class="list-group-item"><strong>State :</strong> ' . $state . '</li>
                                    <li class="list-group-item"><strong>City :</strong> ' . $city . '</li>
                                    <li class="list-group-item"><strong>University :</strong> ' . $university . '</li>
                                    <li class="list-group-item"><strong>College :</strong> ' . $college . '</li>
                                    <li class="list-group-item"><strong>Address :</strong> ' . $address . '</li>
                                    <li class="list-group-item"><strong>Phone Number :</strong> ' . $phonenum . '</li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Sent via zigma global environ solutions</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        // sending mail 
        $mail->send();
        $message = "Email sent successfully!";
        echo "<script>alert('$message');</script>";
    }catch (Exception $er){
        $message = "Email sending failed. Error: {$mail->ErrorInfo}";
        echo "<script>alert('$message');</script>";
    }
}

?>