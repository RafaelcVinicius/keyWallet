<?php

namespace App\Services;

use App\Http\Resources\KeyWalletResource;
use App\Models\User;
use App\Repositories\Contracts\KeyWalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Collection\Collection;

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
    public function getWallet()
    {
        return KeyWalletResource::collection($this->keyWalletRepository->getWallet());
    }
    // public function getKeyWallet()
    // {
    //     return $this->keyWalletRepository->index();
    // }

    private function prepareStoreKeyWallet($data)
    {
        $newRequest["Key"] = [
            'id_user'       => Auth::user()->id,
            'apelido'       => $data->apelido,
            'email'         => Crypt::encrypt($data->email),
            'key'           => Crypt::encrypt($data->key),
        ];
        return $newRequest;
    }

}
