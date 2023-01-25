<?php

namespace App\Services;

use App\Http\Resources\KeyWalletResource;
use App\Models\User;
use App\Repositories\Contracts\KeyWalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KeyWalletService
{
    private $keyWalletRepository;

    public function __construct(KeyWalletRepositoryInterface $keyWalletRepository)
    {
        $this->keyWalletRepository = $keyWalletRepository;

    }

    public function store($request)
    {

        return new KeyWalletResource($this->keyWalletRepository->store($this->prepareStoreKeyWallet($request)));
    }
    // public function update()
    // {
    //     return $this->keyWalletRepository->index();
    // }
    // public function getWallet()
    // {
    //     return $this->keyWalletRepository->index();
    // }
    // public function getKeyWallet()
    // {
    //     return $this->keyWalletRepository->index();
    // }

    private function prepareStoreKeyWallet($data)
    {
        $newRequest["Key"] = [
            'id_user'       => Auth::loginUsingId(1)->id,
            'apelido'       => $data->apelido,
            'email'         => $data->email,
            'key'           => Crypt::encrypt($data->key),
        ];
        return $newRequest;
    }

}
