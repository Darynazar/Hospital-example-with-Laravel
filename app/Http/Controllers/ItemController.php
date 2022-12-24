<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $input = [
            'title' => 'Demo Title',
            'data' => [
                '1' => 'One',
                '2' => 'Two',
                '3' => 'Three'
            ]
        ];
  
        //$item = Item::create($input);
        $item = Item::all();
        dd($item[1]->title);
  
    }
}
