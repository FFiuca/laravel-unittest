<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    //

    function testResponse(){
        return response()->json([
            'status' => 200
        ], 200);
    }

    function testResponse2(){
        return response()->json([
            'status' => 200,
            'data' => User::factory(1)->create()[0]
        ], 200);
    }
}
