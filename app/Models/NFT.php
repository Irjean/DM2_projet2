<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nft extends Model
{
    use HasFactory;
    
    //One NFT have one user
    public function user(){
        return $this->hasOne(User::class);
    }
}
