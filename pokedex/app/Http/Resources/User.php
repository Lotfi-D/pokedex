<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User as UserMax;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                    
            
            'id'=>$this->id,

            'Username'=>$this->username,

            'Photo de profil'=>$this->profil_icon,

          
           

        ];
    }
}
