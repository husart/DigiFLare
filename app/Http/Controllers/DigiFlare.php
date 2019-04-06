<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class DigiFlare extends Controller
{
    
   public function test(Request $request)
    {
       $text = $request->text;
       
    	Storage::append('test.txt', $text);
    	echo true;
    }
}
