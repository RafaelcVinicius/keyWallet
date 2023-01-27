<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class KeyWalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'apelido'       => $this->apelido,
            'email'         => Crypt::decrypt($this->email),
            'key'           => Crypt::decrypt($this->key),
            'created_at'    => Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at'    => $this->updated_at,
        ];
    }
}
