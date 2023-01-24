<?php

namespace App\Http\Controllers;

use App\Services\KeyWalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KeyWalletController extends Controller
{
    private $KeyWalletService;
    public function __construct(KeyWalletService $KeyWalletService)
    {
        $this->KeyWalletService = $KeyWalletService;
    }

    public function index(){
        $encrypted = Crypt::decrypt('eyJpdiI6IjYrYU9vMXdRZ1k4MHdxOE1LbFlEV3c9PSIsInZhbHVlIjoicno5TnE1cmpXZVdTNjg0RmVqSENqQT09IiwibWFjIjoiZTA2YTQ2ZDU2OTc3YjBkYjY5YzUxOGVjODM2NWI3M2VlMTVjMzgyM2JkZmJjZDI1NGFhNTIzMzMyOTNkMmJjMiIsInRhZyI6IiJ9');
        return  $encrypted;
    }
    // public function getWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }
    // public function getKeyWallet()
    // {
    //     return $this->KeyWalletService->index();
    // }
    // public function store()
    // {
    //     return $this->KeyWalletService->index();
    // }
    // public function update()
    // {
    //     return $this->KeyWalletService->index();
    // }
}
