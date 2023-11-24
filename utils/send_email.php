<?php                
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../includes/db_config.php';
require_once '../lib/phpmailer/src/PHPMailer.php';
require_once '../lib/phpmailer/src/Exception.php';
require_once '../lib/phpmailer/src/SMTP.php';





// if(isset($_POST["send"])){

    try {

        
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'gimnakatugampala12345@gmail.com';                     
    $mail->Password   = 'sfln pvfl yboi yjwu';                               
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;

    $mail->setFrom('gimnakatugampala12345@gmail.com');
    $mail->addAddress($MAIN_EMAIL);  
    $mail->addAttachment($email_invoice_path);    
    $mail->Subject = 'Techdrive Invoice - '.$SALES_CODE.'';
    $mail->Body    = '
    <head>
    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      box-sizing: border-box;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      border:1px #BFC9CA solid;
    }

    h1 {
      color: #333333;
    }

    p {
      color: #666666;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #3498db;
      color: #ffffff;
      text-decoration: none;
      border-radius: 3px;
    }

    .footer {
      margin-top: 20px;
      text-align: center;
      color: #999999;
    }

    #code{
        color:#E67E22;
    }
  </style>

  </head>

  <body>

    <div class="container">
    <h1>'.$EMAIL_TYPE.' from TechDrive Technologies</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>We hope this email finds you well. Attached to this email is the sales order invoice for the services provided by TechDrive Technologies on the <b>'.$PLACED_DATE.' </b>.</p>
    <p>Please find the attached invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <h4>INVOICE CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing TechDrive Technologies.</p>
  </div>
  <div class="footer">
    <p>© 2023 TechDrive Technologies | Address | Phone Number</p>
  </div>
  </body>

    '; 

    $mail->isHTML(true); 

    $mail->send();
    echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// }

?>