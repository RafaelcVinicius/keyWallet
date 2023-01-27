<?php

namespace App\Repositories;

use App\Models\KeyWallet;
use App\Models\User;
use App\Repositories\Contracts\KeyWalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class KeyWalletRepository implements KeyWalletRepositoryInterface
{
    public function store(array $data)
    {
        DB::beginTransaction();

        // $keyWallet = KeyWallet::create($data["Key"]);
        $keyWallet = new KeyWallet();
        $keyWallet->id_user = $data["Key"]["id_user"];
        $keyWallet->key = $data["Key"]["key"];
        $keyWallet->apelido = $data["Key"]["apelido"];
        $keyWallet->email = $data["Key"]["email"];
        $keyWallet->save();


        DB::commit();
        return $keyWallet;
    }
    // public function update()
    // {
    //     return $this->KeyWalletService->index();
    // }
    public function getWallet()
    {
        return Auth::user()->keyWallet;
    }
    // public function getKeyWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }

}
