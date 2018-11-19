<?php

/**
 * Class Kohana_Recaptcha
 */
class Kohana_Recaptcha
{
    /** String PUBLIC_KEY_NAME Key where response is stored */
    const PUBLIC_KEY_NAME = 'g-recaptcha';
    const VERIFICATION_URL = 'https://www.google.com/recaptcha/api/siteverify';

    /**
     * Returns name of key added to form
     * @return string
     */
    public static function getPublicKeyName()
    {
        return static::PUBLIC_KEY_NAME;
    }

    /**
     * Returns value of your public site key
     * @return string
     */
    public static function getSiteKey()
    {
        $config = Kohana::$config->load('koseven-recaptcha');
        return $config->get('site_key');
    }

    /**
     * Validation method
     * Can be used in Valid class
     * @param String $response
     * @return bool
     */
    public static function recaptchaValid(String $response)
    {
        $config = Kohana::$config->load('koseven-recaptcha');
        $secretKey = $config->get('secret_key');
        /** @var Request $request */
        $request = Request::factory(static::VERIFICATION_URL);
        $request
            ->method(Request::POST)
            ->post([
                'secret' => $secretKey,
                'response' => $response
            ]);
        $result = $request->execute();
        if ($result->status() !== 200)
        {
            return FALSE;
        }

        $body = json_decode($result->body());
        if ($body === NULL)
        {
            return FALSE;
        }

        return $body->success;
    }
}