<?php


class Kohana_Recaptcha {

	const PUBLIC_KEY_NAME = 'g-recaptcha';
	/** @var string $publicKey */
	private $publicKey;

	public function __construct()
	{
		$config                = Kohana::$config->load('koseven-recaptcha');
		$this->publicKey       = $config->get('site_key');
		$this->verificationUrl = $config->get('verification_url');
	}

	public function getPublicKey()
	{
		return $this->publicKey;
	}

	public function getPrivateKey()
	{
		$config = Kohana::$config->load('koseven-recaptcha');
		return $config->get('secret_key');
	}

	public function validate($response)
	{
		if (isset($response[static::PUBLIC_KEY_NAME]))
		{
			/** @var Request $request */
			$request = Request::factory($this->verificationUrl);
			$request->method(Request::POST);
			$request->post('secret', $this->getPrivateKey());
			$request->post('response', $response[static::PUBLIC_KEY_NAME]);
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
		else
		{
			return FALSE;
		}
	}
}