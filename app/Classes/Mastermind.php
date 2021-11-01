<?php

namespace App\Classes;

use Illuminate\Http\Request;

class Mastermind
{

    public $code = [];

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function GetWhites($code)
    {

        $whites = 0;
        foreach($code as $key => $val){

            if(in_array($val, $this->code)){
                if ($val != $this->code[$key])
                    $whites++;
            }

        }

        return $whites;

    }

    public function GetHints($code)
    {
        // dd(array_intersect_assoc($code, $this->code));
        return array_intersect_assoc($code, $this->code);
    }
}
