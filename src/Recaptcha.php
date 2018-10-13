<?php

namespace almod90\Recaptcha;

use GuzzleHttp\Client;

class Recaptcha
{

    /**
     * Get JS reference for recaptcha
     *
     * @return string
     */
    public function script()
    {
        return "<script src='https://www.google.com/recaptcha/api.js'></script>";
    }

    /**
     * Get the HTML content of recaptcha
     *
     * @param string $id
     * @return string
     *
     * @throws \Throwable
     */
    public function render($id = "recaptcha")
    {
        return view('Recaptcha::recaptcha')->with(['id' => $id])->render();
    }

    /**
     * Call this to validate your user input
     *
     * @param $response
     * @return bool
     */
    public function validate($response)
    {
        $client = new Client();
        $res = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('recaptcha.secret'),
                'response' => $response,
            ]
        ]);
        $code = $res->getStatusCode();
        if ($code == 200) {
            $data = json_decode($res->getBody());
            return isset($data->success) && $data->success;
        }

        return false;
    }
}