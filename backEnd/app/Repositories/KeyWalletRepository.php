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

        $keyWallet = KeyWallet::create($data["Key"]);

        DB::commit();
        return $keyWallet;
    }
    // public function update()
    // {
    //     return $this->KeyWalletService->index();
    // }
    // public function getWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }
    // public function getKeyWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }

}
