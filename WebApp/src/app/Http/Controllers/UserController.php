<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wordofday;
use App\Models\ai;
use App\Models\technews;
use App\Models\astronomy;
use App\Models\bigdata;
use App\Models\crypto;
use App\Models\cv;
use App\Models\digitaltech;
use App\Models\healthcare;
use App\Models\machinelearning;
use App\Models\spadmin;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function showword()
    {
         $scrapedata = technews::all();
         $dictionary = wordofday::latest()->first();
         $ent = "Technews";
         return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata ,"entity"=>$ent]);
    }
    public function technewsfetch()
    {
        $scrapedata = technews::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Technews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);
    }
    public function aifuncfetch()
    {
        $scrapedata = ai::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function mlfuncfetch()
    {
        $scrapedata = machinelearning::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function astronomyfuncfetch()
    {
        $scrapedata = astronomy::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function bigdatafuncfetch()
    {
        $scrapedata = bigdata::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function cvfuncfetch()
    {
        $scrapedata = cv::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function cryptofuncfetch()
    {
        $scrapedata = crypto::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function dtfuncfetch()
    {
        $scrapedata = digitaltech::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function healthfuncfetch()
    {
        $scrapedata = healthcare::all();
        $dictionary = wordofday::latest()->first();
        $ent = "Ainews";
        return view('dashboard', ["dict"=>$dictionary,"scrape"=>$scrapedata , "entity"=>$ent]);    
    }
    public function getaccessfunc(Request $req)
    {
        $entity = spadmin::find(2);
       if($req->user == $entity->name && Hash::check($req->password, $entity->password))
       {
        return view('sendFCM');
       }
       else
       {
        return redirect('/admin');
       }
    }
}
