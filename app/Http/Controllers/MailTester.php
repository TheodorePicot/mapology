<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ForgotPassword;
use App\Mail\Welcome;
use App\Models\User;
use App\Models\PasswordResetToken;

class MailTester extends Controller
{
    public function reset_password_email_test()
    {
        $user = User::factory()->create();

        $token = PasswordResetToken::factory()->create([
            'email' => $user->email,
        ]);

        $mailable = new ForgotPassword($user->email, $token->token, $token->expires_at);

        return $mailable->render();
    }

    public function contact_email_test()
    {
        $mailable = new Contact('John', 'Doe', 'contact@mapology', 'This is a test message.');
        return $mailable->render();
    }

    public function welcome_email_test()
    {
        $user = User::factory()->create();

        $mailable = new Welcome($user);

        return $mailable->render();
    }

    public function verify_email_test()
    {
        $user = User::factory()->create();

        $mailable = new Welcome($user);


        return $mailable->render();
    }

    private function render($mailable)
    {

    }
}
