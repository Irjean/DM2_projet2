<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Returns the admin main page with all users registered if the user have admin rights
    public function home(){
        $user = User::find(Auth::id());
        $users = User::all();
        $nfts = Nft::all();
        if($user->isAdmin == 1){
            return view("admin.home", ["cssLink" => "css/admin.css", "users" => $users, "nfts" => $nfts]);
        }
        return redirect("/");
    }

    //Show all NFT created
    public function nftList(){
        $nfts = Nft::all();
        $user = User::find(Auth::id());
        $users = User::all();

        if($user->isAdmin == 1){
            return view("admin.nfts", ["cssLink" => "css/adminNftList.css", "users" => $users, "nfts" => $nfts]);
        }
        return redirect("/");
    }

    //Allow to remove a NFT from the database
    public function deleteNft($id){
        $user = User::find(Auth::id());

        if($user->isAdmin == 1){
            Nft::find($id)->delete();
            return back();
        }
        return redirect("/");
    }

    //Return the page to create a new NFT
    public function addNftPage(){
        $user = User::find(Auth::id());

        if($user->isAdmin == 1){
            return view("admin.add-nft", ["cssLink" => "css/nftForm.css"]);
        }
        return redirect("/");
    }

    //Add a new NFT to the database
    public function addNft(Request $request){
        csrf_token();

        $user = User::find(Auth::id());

        
        if($user->isAdmin == 1){
            $file = $request->file("image");
            $fileName = $file->getClientOriginalName();
            while(file_exists("../public/images/$fileName")){
                $filePartName = pathinfo($fileName, PATHINFO_FILENAME);
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                $fileName = "$filePartName-copy.$fileExtension";
            }
            $filePath = "/images/$fileName";
            $file->move("../public/images", $fileName);

            $nft = new Nft();

            $nft->title = $request->title;
            $nft->artist = $request->artist;
            $nft->adress = $request->adress;
            $nft->standard_token = $request->standard_token;
            $nft->price = $request->price;
            $nft->category = $request->category;
            $nft->description = $request->description;
            $nft->image = $filePath;

            $nft->save();

            return redirect("/admin/nfts");
        }
        return redirect("/");
    }
}
