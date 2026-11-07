<?php

namespace App\Api\GitChub;

use Github\Client as GitChubClient;
use Symfony\Component\HttpClient\HttplugClient;
use Github\AuthMethod;
use App\Models\Setting;
use App\Support\ErrorContainer;

class Client
{
    protected $client;
    protected $errors;

    public function __construct(ErrorContainer $errors)
    {
        $this->errors = $errors;

        $this->client = GitChubClient::createWithHttpClient(
            new HttplugClient()
        );

        $token = Setting::where('id_user', auth()->user()->id_user)
            ->where('setting_short_name', 'GitChub token')
            ->first()->setting_value;

        if (empty($token)) {
            $this->errors->add(
                'Nie skonfigurowano tokenu GitHub.',
                'github_token'
            );

            return;
        }

        $this->client->authenticate(
            $token,
            null,
            AuthMethod::ACCESS_TOKEN
        );
    }

    public function getClient()
    {
        return $this->client;
    }
}