<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MailInterface
{
    /**
     * @param string $ip
     * @param string $content
     * @return mixed
     */
    public function send(string $ip, string $content): bool;

}
