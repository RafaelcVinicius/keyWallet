<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeyWalletRequest;
use App\Services\KeyWalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KeyWalletController extends Controller
{
    private $keyWalletService;
    public function __construct(KeyWalletService $keyWalletService)
    {
        $this->keyWalletService = $keyWalletService;
    }

    public function index(){
        $encrypted = Crypt::decrypt('eyJpdiI6IjYrYU9vMXdRZ1k4MHdxOE1LbFlEV3c9PSIsInZhbHVlIjoicno5TnE1cmpXZVdTNjg0RmVqSENqQT09IiwibWFjIjoiZTA2YTQ2ZDU2OTc3YjBkYjY5YzUxOGVjODM2NWI3M2VlMTVjMzgyM2JkZmJjZDI1NGFhNTIzMzMyOTNkMmJjMiIsInRhZyI6IiJ9');
        return  $encrypted;
    }
    public function store(StoreKeyWalletRequest $request)
    {
        return $this->keyWalletService->store($request);
    }
    // public function update()
    // {
    //     return $this->KeyWalletService->index();
    // }
    public function getWallet(Request $request)
    {
        return $this->keyWalletService->getWallet();
    }
    // public function getKeyWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }

}
