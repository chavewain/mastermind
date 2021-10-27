<?php

namespace App\Classes;

use Illuminate\Http\Request;

class Mastermind
{

    public $code = [];
    private $colors = [1,2,3,4];

    public function __construct($code)
    {
        $this->code = $code;

        // exit($this->code);

    }

    public function GetHints($code)
    {

        return array_diff_assoc($code, $this->code) ?? true;
    }
}
