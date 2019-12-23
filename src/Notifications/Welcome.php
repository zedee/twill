<?php

namespace A17\Twill\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class Welcome extends ResetPassword
{
    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->markdown('twill::emails.html.email', [
            'url' => url(config('twill.admin_app_url') . route('admin.password.reset.welcome.form', $this->token, false)),
            'actionText' => Lang::getFromJson('Choose your own password'),
            'title' => Lang::getFromJson('Welcome'),
            'copy' => Lang::getFromJson('You are receiving this email because an account was created for you on ') . config('app.name') . '.',
        ]);

    }
}
