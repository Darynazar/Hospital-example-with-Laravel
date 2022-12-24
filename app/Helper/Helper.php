<?php
namespace App\Helper;

class Helper 
{   
    public static function success(string $message)
    {
        return redirect()->back()->with('success', ucfirst($message));
    }
}