<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPMailer\PHPMailer\PHPMailer;
use function PHPSTORM_META\elementType;

class Mailer extends Model
{

    static $email = 'rabetskialeksandr@gmail.com';
    static $password = '3820168OverLord';

    public static function mail($email,$order){
        $mail = new PHPMailer();                             // Passing `true` enables exceptions
        try {
            //Server settings


            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP

            $mail->SMTPAuth = true;                               // Enable SMTP authentication

            //$mail->SMTPSecure = 'ssl';                          // secure transfer enabled REQUIRED for Gmail
            //$mail->Port = 465;                                  // TCP port to connect to
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->Username = self::$email;              // SMTP username
            $mail->Password = self::$password;                         // SMTP password

            //Recipients
            $mail->setFrom( self::$email, 'BUY-TICKETS.BY');
            $mail->addAddress($email);              // Name is optional

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Покупка';
            $mail->Body    =  view('mail')->with(['order'=>$order]);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();

        } catch (Exception $e) {
        }
    }

    public static function feedback($feedback){
        $mail = new PHPMailer();                             // Passing `true` enables exceptions
        try {
            //Server settings


            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP

            $mail->SMTPAuth = true;                               // Enable SMTP authentication

            //$mail->SMTPSecure = 'ssl';                          // secure transfer enabled REQUIRED for Gmail
            //$mail->Port = 465;                                  // TCP port to connect to
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->Username = self::$email;              // SMTP username
            $mail->Password = self::$password;                          // SMTP password

            //Recipients
            $mail->setFrom( self::$email, 'BUY-TICKETS.BY');
            $mail->addAddress($feedback->user->email);              // Name is optional

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Обратная связь';
            $mail->Body    =  view('emails.feedback')->with(['feedback'=>$feedback]);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

        } catch (Exception $e) {
        }
    }

    public static function news($news,$user){
        $mail = new PHPMailer();                             // Passing `true` enables exceptions
        try {
            //Server settings


            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP

            $mail->SMTPAuth = true;                               // Enable SMTP authentication

            //$mail->SMTPSecure = 'ssl';                          // secure transfer enabled REQUIRED for Gmail
            //$mail->Port = 465;                                  // TCP port to connect to
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->Username = self::$email;              // SMTP username
            $mail->Password = self::$password;                        // SMTP password

            //Recipients
            $mail->setFrom( self::$email, 'BUY-TICKETS.BY');
            $mail->addAddress($user->email);              // Name is optional

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Новости';
            $mail->Body    =  view('emails.news')->with(['news'=>$news]);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

        } catch (Exception $e) {
            dd($e);
        }
    }
}
