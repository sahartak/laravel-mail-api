<?php

namespace App\Repositories;

use App\Interfaces\MailInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Message;

class MailRepository implements MailInterface
{
    public function send(string $ip, string $content): bool
    {
        try {
            Mail::send(new SendMail($content));
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
        $message = new Message();
        $message->content = $content;
        $message->ip = $ip;
        return $message->save();
    }
}
