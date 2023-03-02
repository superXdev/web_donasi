<?php

namespace App\Http\Controllers;

use \Mailjet\Resources;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function composeEmail($data) {
      $mail = new PHPMailer(true);

      try {

          // Email server settings
          $mail->SMTPDebug = 0;
          $mail->isSMTP();
          $mail->Host = env('PHPMAILER_HOST');             //  smtp host
          $mail->SMTPAuth = true;
          $mail->Username = env('PHPMAILER_USERNAME');   //  sender username
          $mail->Password = env('PHPMAILER_PASSWORD');       // sender password
          $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
          $mail->Port = env('PHPMAILER_PORT');                          // port - 587/465

          $mail->setFrom(env('PHPMAILER_FROM_ADDRESS'), env('PHPMAILER_FROM_NAME'));
          $mail->addAddress($data['email']);

          $mail->addReplyTo(env('PHPMAILER_FROM_ADDRESS'), env('PHPMAILER_FROM_NAME'));


          $mail->isHTML(true); // Set email content format to HTML

          $mail->Subject = $data['subject'];
          $mail->Body    = $data['message'];

          return $mail->send();

      } catch (Exception $e) {
           return $e;
      }
    }
}
