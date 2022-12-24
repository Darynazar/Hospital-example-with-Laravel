<?php

namespace App\Http\Controllers;

use App\Jobs\CustomerJob;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        dispatch(new CustomerJob())->delay(now()->addMinute(1));

        dd('email has been deliverd');

    }
}
