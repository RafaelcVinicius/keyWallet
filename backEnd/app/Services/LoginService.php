<?php

namespace App\Services;

use App\Classes\CustomRequest;
use App\Http\Resources\KeyWalletResource;
use App\Models\User;
use App\Repositories\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Ramsey\Collection\Collection;

class LoginService
{
    private $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;

    }

    public function login($request)
    {
        $req = new CustomRequest;
        $req->setRoute(config('routesApi.google.reCaptcha'). '?secret='. env("RECAPTCHA_SECRET") . '&response='. $request->get("reCaptcha"));

        if($req->post() && $req->response->asJson->success){
            Log::info(json_encode($request->all()));
            Log::info(json_encode($request->all()));
            return $this->loginRepository->login(array_slice($request->all(),0,2));
        }else{
            return response()->json([
                'status'    => 'error',
                'message'   => 'Você é uma máquina?',
            ], 403);
        }
    }
}
