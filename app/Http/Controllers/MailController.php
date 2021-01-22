<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MailInterface;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{

    protected $mail;

    /**
     * MailController constructor.
     * @param MailInterface $mail
     */
    public function __construct(MailInterface $mail)
    {
        $this->mail=$mail;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function send(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content' => "required"
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(),429);
            }
            $response = $this->mail->send($request->ip(), $request->get('content'));
            return response($response);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
