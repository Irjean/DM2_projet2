<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){
        $user = User::find(Auth::id());
        $users = User::all();
        $nfts = Nft::all();
        if($user->isAdmin == 1){
            return view("admin.home", ["cssLink" => "css/admin.css", "users" => $users, "nfts" => $nfts]);
        }
        return redirect("/");
    }

    public function nftList(){
        $nfts = Nft::all();
        $user = User::find(Auth::id());
        $users = User::all();

        if($user->isAdmin == 1){
            return view("admin.nfts", ["cssLink" => "css/adminNftList.css", "users" => $users, "nfts" => $nfts]);
        }
        return redirect("/");
    }

    public function deleteNft($id){
        $user = User::find(Auth::id());

        if($user->isAdmin == 1){
            Nft::find($id)->delete();
            return back();
        }
        return redirect("/");
    }

    public function addNftPage(){
        $user = User::find(Auth::id());

        if($user->isAdmin == 1){
            return view("admin.add-nft", ["cssLink" => "css/nftForm.css"]);
        }
        return redirect("/");
    }

    public function addNft(){
        csrf_token();

        $user = User::find(Auth::id());

        if($user->isAdmin == 1){
            return view("admin.add-nft");
        }
        return redirect("/");
    }
}
