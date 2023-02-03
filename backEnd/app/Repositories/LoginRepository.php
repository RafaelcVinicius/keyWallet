<?php

namespace App\Repositories;

use App\Models\KeyWallet;
use App\Models\User;
use App\Repositories\Contracts\LoginRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LoginRepository implements LoginRepositoryInterface
{
    public function login(array $data)
    {

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('JWT');

            return response()->json([
                'status'  => 'success',
                'message' => 'Usuário autorizado',
                'token'   => $token->plainTextToken
            ], 200);
        }

        return response()->json([
            'status'    => 'error',
            'message'   => 'Usuário invalido',
        ], 401);
    }

}
