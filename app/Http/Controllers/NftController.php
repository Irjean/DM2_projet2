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

    public function getTag($id){
        $nfts = Nft::where("category", $id)->get();

        if($nfts == null){
            return back();
        }

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

    public function getUserNft(){
        $userId = Auth::id();
        $nfts = Nft::where("user_id", $userId)->get();

        return view("collection", ["nfts" => $nfts, "cssLink" => "css/collection.css"]);
    }
    
    public function buyNft($id){
        $nft = Nft::findOrFail($id);
        $user = User::find(Auth::id());

        if($user == null){
            return back()->withErrors("error", "You are not logged in");
        }

        if($user->wallet > $nft->price && $nft->user_id == null){
            $nft->user_id = $user->id;
            $user->wallet = $user->wallet - $nft->price;
            $nft->save();
            $user->save();
            return back()->with("success", "Purchase complete !");
        }

        return back()->withErrors("error", "Purchase failed");
    }

    public function sellNft($id){
        $nft = Nft::findOrFail($id);
        $user = User::find(Auth::id());

        if($user == null){
            return back()->withErrors("error", "You are not logged in");
        }

        $user->wallet += $nft->price;
        $nft->user_id = null;

        $nft->save();
        $user->save();

        return back();
    }

}
