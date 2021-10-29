<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Mastermind as Game;

class Mastermind extends Controller
{
    public function index(Request $request){

        if(!$request->has('data')){
            return 'Data must be specified';
        }
        if (count(explode(",", $request->data)) != 4) {
            return 'Array must have 4 elemts';
        }


        $init = [1, 1, 3, 4];
        $play = explode(",", $request->data);
        $mastermind = new Game($init);
        $white = $mastermind->GetWhites($play);
        $result = $mastermind->GetHints($play);

        // return $mastermind->GetWhites($play);

        if(count($result)){

            $base = ['x', 'x', 'x', 'x'];
            foreach($result as $key => $val){
                $base[$key] = 'o';
            }

            return ['Graph' => $base, 'Black' => count($result), 'White' => $white];


        }else
            return 'You win!';


    }
}
