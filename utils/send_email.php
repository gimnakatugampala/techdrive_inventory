<?php                
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../includes/db_config.php';
require_once '../lib/phpmailer/src/PHPMailer.php';
require_once '../lib/phpmailer/src/Exception.php';
require_once '../lib/phpmailer/src/SMTP.php';



// GET THE CURRENT HOST
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$Url = "{$protocol}://{$host}" . dirname($_SERVER['PHP_SELF'], 2);


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
    $mail->addAddress('gimnakatugampala1@gmail.com'); //$MAIN_EMAIL  // 
    $mail->addAttachment($email_invoice_path);   
    
    if($EMAIL_STATS == "INPROGRESS"){
      // ---------------------- SEND INPROGRESS EMAIL TEMPLATE ---------------
      
    $mail->Subject = 'Tech Drive Solutions Invoice INPROGRESS - '.$SALES_CODE.'';

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
    <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>Your sales order is in progress. We appreciate your business and look forward to serving you.</p>

    <p>We hope this email finds you well. Attached to this email is the sales order invoice for the services provided by Tech Drive Solutions on the <b>'.$PLACED_DATE.' </b>.</p>
    
    <p>Please find the attached invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <img width="100" src="'.$Url.'/utils/qrimg/'.$QRCODE.'" >

    <h4>CHECK YOUR ORDER</h4>
    <h2 id="code">'.$Url.'/order/track.php?code='.$SALES_CODE.'</h2>

    <h4>INVOICE CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing Tech Drive Solutions.</p>
  </div>
  <div class="footer">
    <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
  </div>
  </body>

    '; 


    // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------
      
      
    }else if($EMAIL_STATS == "COMPLETED"){

        // ---------------------- SEND COMPLETED EMAIL TEMPLATE ---------------
      
    $mail->Subject = 'Tech Drive Solutions Invoice COMPLETED - '.$SALES_CODE.'';

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
    <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>Thank you for completing your order with us. We appreciate your business and hope you had a great
    experience with our products and services. Please Come and Collect Your Order</p>

    <p>We hope this email finds you well. Attached to this email is the sales order invoice for the services provided by Tech Drive Solutions on the <b>'.$PLACED_DATE.' </b>.</p>
    
    <p>Please find the attached invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <img width="100" src="'.$Url.'/utils/qrimg/'.$QRCODE.'" >

    <h4>CHECK YOUR ORDER</h4>
    <h2 id="code">'.$Url.'/order/track.php?code='.$SALES_CODE.'</h2>

    <h4>INVOICE CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing Tech Drive Solutions.</p>
  </div>
  <div class="footer">
    <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
  </div>
  </body>

    '; 


    // ------------------- SENDING ONLY COMPLETED INVOICE - WHEN ASKED  TEMPLATE -----------------
      

    }else if($EMAIL_STATS == "CANCELED"){

              // ---------------------- SEND CANCELED EMAIL TEMPLATE ---------------
      
      $mail->Subject = 'Tech Drive Solutions Invoice CANCELED - '.$SALES_CODE.'';

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
      <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
      <h3>Dear '.$NAME.',</h3>

      <p>We regret to inform you that your order with us has been canceled. We apologize for any inconvenience this may have caused.</p>
      
      <p>Please find the attached invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

      <img width="100" src="'.$Url.'/utils/qrimg/'.$QRCODE.'" >

      <h4>CHECK YOUR ORDER</h4>
      <h2 id="code">'.$Url.'/order/track.php?code='.$SALES_CODE.'</h2>

      <h4>INVOICE CODE</h4>
      <h2 id="code">'.$SALES_CODE.'</h2>
    
      <p>Thank you for choosing Tech Drive Solutions.</p>
    </div>
    <div class="footer">
      <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
    </div>
    </body>

      '; 


    }else if($EMAIL_STATS == "QUOTATION"){

        // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------
      
    $mail->Subject = 'Tech Drive Solutions QUOTATION - '.$SALES_CODE.'';

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
    <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>We hope this email finds you well. Attached to this email is the quotation for the services provided by Tech Drive Solutions on the <b>'.$PLACED_DATE.' </b>.</p>
    <p>Please find the attached quotation details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <img width="100" src="'.$Url.'/utils/qrimg/'.$QRCODE.'" >

      <h4>CHECK YOUR ORDER</h4>
      <h2 id="code">'.$Url.'/order/track.php?code='.$SALES_CODE.'</h2>

    <h4>QUOTATION CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing Tech Drive Solutions.</p>
  </div>
  <div class="footer">
    <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
  </div>
  </body>

    '; 


    // ------------------- SENDING ONLY QUOTATION - WHEN ASKED  TEMPLATE -----------------


    }else if($EMAIL_STATS =="SOR"){

        // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------
      
    $mail->Subject = 'Tech Drive Solutions Return Invoice - '.$SALES_CODE.'';

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
    <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>We hope this email finds you well. Attached to this email is the sales order return invoice for the services provided by Tech Drive Solutions on the <b>'.$PLACED_DATE.' </b>.</p>
    <p>Please find the attached return invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <h4>INVOICE CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing Tech Drive Solutions.</p>
  </div>
  <div class="footer">
    <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
  </div>
  </body>

    '; 


    // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------



    }else{
      
      // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------
      
    $mail->Subject = 'Tech Drive Solutions Invoice - '.$SALES_CODE.'';

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
    <h1>'.$EMAIL_TYPE.' from Tech Drive Solutions</h1>
    <h3>Dear '.$NAME.',</h3>

    <p>We hope this email finds you well. Attached to this email is the sales order invoice for the services provided by Tech Drive Solutions on the <b>'.$PLACED_DATE.' </b>.</p>
    <p>Please find the attached invoice details below. If you have any questions or concerns, feel free to contact our support team.</p>

    <h4>INVOICE CODE</h4>
    <h2 id="code">'.$SALES_CODE.'</h2>
   
    <p>Thank you for choosing Tech Drive Solutions.</p>
  </div>
  <div class="footer">
    <p>© '.date("Y").' Tech Drive Solutions | Fortune Arcade, 39/11, Galle Road, Bambalapitiya | 0777424239</p>
  </div>
  </body>

    '; 


    // ------------------- SENDING ONLY INVOICE - WHEN ASKED  TEMPLATE -----------------


    }
    
    $mail->isHTML(true); 

    $mail->send();
    
    echo 'success';
    if($EMAIL_STATS == null){
      echo '<script>window.history.back();</script>';
    }
    // exit;



} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
// }

?>