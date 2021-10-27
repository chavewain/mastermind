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

    public function GetHints($code)
    {
        return array_diff_assoc($code, $this->code) ?? true;
    }
}
