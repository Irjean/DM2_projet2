<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class NftController extends Controller
{
    public function getAll() {
        $nfts = Nft::all();

        return view('home', ["nfts" => $nfts]);
    }

    public function getOne($id) {
        $nft = Nft::findOrFail($id);
        $owner = User::find($nft->user_id);
        if($owner == null){
            $owner = new stdClass();
            $owner->name = "nobody";
        }
        return view("nft", ["nft" => $nft, "owner" => $owner, "cssLink" => "css/nft.css"]);
    }

    public function buyNft($id){
        $nft = Nft::findOrFail($id);
        $userId = Auth::user()->id;
        $user = User::find($userId);

        if($user->wallet > $nft->price && $nft->user_id == null){
            $nft->user_id = $user->id;
            $user->wallet = $user->wallet - $nft->price;
            $nft->save();
            $user->save();
            return back()->with("success", "Purchase complete !");
        }

        return back()->withErrors("error", "Purchase failed");
    }
}
