<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

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

    function testResponse3(){
        return response()->json([
            'status' => 200,
            'data' => Room::factory(1)->create()[0]
        ], 200);
    }
}
