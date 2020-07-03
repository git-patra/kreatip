<?php

namespace App\Http\Controllers\me;

use App\t_landing_blog;
use App\User;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $blog = t_landing_blog::where('id', 5)->first();
        $users = User::all();

        return view('/me/index', [
            'blog' => $blog,
            'users' => $users
        ]);
    }
    public function terms()
    {
        $blog = t_landing_blog::where('id', 1)->first();

        return view('/me/rules', [
            'blog' => $blog
        ]);
    }
    public function privacy()
    {
        $blog = t_landing_blog::where('id', 3)->first();

        return view('/me/rules', [
            'blog' => $blog
        ]);
    }

    // ! Sendmail
    public function sendMail(Request $request)
    {
        $blog = t_landing_blog::where('id', 5)->first();
        $users = User::all();

        $subject = "Contact dari " . $request->input('name');
        $name = $request->input('name');
        $emailAddress = $request->input('email');
        $message = $request->input('message');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // Pengaturan Server
            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            // $mail->Mailer = "smtp";
            $mail->Host = "smtp.hostinger.co.id";
            // $mail->Host = 'smtp.gmail.com"';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'info@kreatip.id';                 // SMTP username
            $mail->Password = 'Left4dead';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            // Siapa yang mengirim email
            $mail->setFrom('info@kreatip.id');

            // Siapa yang akan menerima email
            $mail->addAddress('patra@kreatip.id');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional

            // ke siapa akan kita balas emailnya
            $mail->addReplyTo($emailAddress, $name);

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();

            $request->session()->flash('status', 'Email berhasil terkirim!');

            return view('/me/index', [
                'blog' => $blog,
                'users' => $users
            ]);
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
