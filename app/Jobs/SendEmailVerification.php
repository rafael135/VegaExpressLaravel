<?php

namespace App\Jobs;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailVerification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $registerEmail = new RegisterEmail($this->user);

        // Para testar como o e-mail esta, basta retornar o proprio email
        //return $registerEmail;

        // Utilizo o método estático 'to' da classe 'Mail' para quem e qual email a ser enviado
        Mail::to($this->user->email)
            ->cc("no-reply@noreply.com")
        ->send($registerEmail);
    }
}
