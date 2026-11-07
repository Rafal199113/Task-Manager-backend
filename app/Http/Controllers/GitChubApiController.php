<?php

namespace App\Http\Controllers;

use App\Api\GitChub\Client as GitChubClient;
use App\Support\ErrorContainer;

class GitChubApiController
{
    public function repositories(GitChubClient $client, ErrorContainer $errors)
    {   
         if ($errors->hasErrors()) {
            return response()->json([
                'success' => false,
                'errors' => $errors->all(),
            ], 422);
        }

        try {
            $github = $client->getClient();

            $user = $github->api('current_user')->show();

            $repositories = $github
                ->api('user')
                ->repositories($user['login']);

            return response()->json([
                'success' => true,
                'data' => $repositories,
            ]);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'errors' => [
                    [
                        'field' => 'github_token',
                        'message' => 'Nieprawidłowy token GitHub lub brak dostępu do API.',
                    ],
                ],
            ], 401);
        }
    }
    
}