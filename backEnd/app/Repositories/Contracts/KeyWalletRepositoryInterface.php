<?php

namespace App\Repositories\Contracts;

interface KeyWalletRepositoryInterface
{
    public function store(array $request);
    // public function update(array $filters);
    public function getWallet();
    // public function getKeyWallet(int $id);
}
