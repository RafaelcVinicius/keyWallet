<?php

namespace App\Services;

use App\Classes\CustomRequest;
use App\Http\Resources\KeyWalletResource;
use App\Models\User;
use App\Repositories\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        $secret = "6LcSgDgkAAAAAEJYhaXYSE2Xs4WFnOPrajdHSH6N";
        $req = new CustomRequest;
        $req->setRoute(config('routesApi.google.reCaptcha'). '?secret='. $secret . '&response='. $request->get("reCaptcha"));

        if($req->post() &&  $req->response->asJson->success){
            return $this->loginRepository->login($request->all());
        }else{
            return response()->json([
                'status'    => 'error',
                'message'   => 'Você é ruma máquina?',
            ], 403);
        }
    }
}
