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
    //Returns the main page with all nfts
    public function getAll() {
        $nfts = Nft::all();

        return view('home', ["nfts" => $nfts]);
    }

    //Returns the main pain with nfts depending of the category chosen
    public function getTag($id){
        $nfts = Nft::where("category", $id)->get();

        if($nfts == null){
            return back();
        }

        return view('home', ["nfts" => $nfts]);
    }

    //Return detailed page of one NFT
    public function getOne($id) {
        $nft = Nft::findOrFail($id);
        $owner = User::find($nft->user_id);
        if($owner == null){
            $owner = new stdClass();
            $owner->name = "nobody";
        }
        return view("nft", ["nft" => $nft, "owner" => $owner, "cssLink" => "css/nft.css"]);
    }

    //Return page with all the NFTs the logged in user has
    public function getUserNft(){
        $userId = Auth::id();
        $nfts = Nft::where("user_id", $userId)->get();

        return view("collection", ["nfts" => $nfts, "cssLink" => "css/collection.css"]);
    }
    
    //Changer the ownership of an NFT if it didn't have on already and if the user have enough currency
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

    //Change the ownership of an NFT to none and refund the currency to the used who had it
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
