<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginPostRequest $request)
    {
        return $this->loginService->login($request);
    }

    /*
    **     registrar e chamar a função logar
    */
    public function register(RegisterPostRequest $request)
    {
        $credentials = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = new User();
        $user->name     = $credentials['name'];
        $user->email    = $credentials['email'];
        $user->password = bcrypt($credentials['password']);
        try {
            $user->save();
            $token = $user->createToken('JWT');

            return response()->json([
                'status'  => 'success',
                'message' => 'Dados gravados com sucesso',
                'token'   => $token->plainTextToken
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Erro ao gravar os dados',
                'descricao' => 'error'.$th,
            ], 400);
        }
    }

    /*
    **  atualizar os registros
    */
    public function edit(EditPostRequest $request, $id)
    {
        $user = User::find($id);
        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        try {
            $user->save();
            $token = $user->createToken('JWT');

            return response()->json([
                'status'  => 'success',
                'message' => 'Dados gravados com sucesso',
                'token'   => $token->plainTextToken
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Erro ao gravar os dados',
                'descricao' => 'error'.$th,
            ], 400);
        }
    }
}
