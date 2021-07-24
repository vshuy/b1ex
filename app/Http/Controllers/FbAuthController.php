<?php

namespace App\Http\Controllers;

use App\fbaccess;
use Dotenv\Result\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FbAuthController extends Controller
{
    public function handleRequest(Request $request)
    {
        // $tmp = [
        //     $request->id_user,
        //     $request->access_token
        //     // $request->$request->expiresIn
        // ];

        // return $tmp;

        if (DB::table('fbaccesses')->where('user_id', $request->id_user)->exists()) {
            DB::table('fbaccesses')
                ->where('user_id', $request->id_user)
                ->update(['access_token' => $request->access_token, 'expiresIn' => $request->expiresIn]);

            $resultQuery  = DB::table('fbaccesses')
                ->select('user_id', 'name', 'part1', 'part2', 'part3d1', 'part3d2', 'part4', 'part5', 'part6', 'part7', 'part8', 'part9', 'part10', 'part11', 'part12', 'part13')
                ->where('user_id', $request->id_user)
                ->get();

            $tokenvalue = csrf_token();
            $result_tmp = [
                "csrf_token" => $tokenvalue,
                "user_infor" => $resultQuery,
            ];
            return $result_tmp;
        } else {
            $aUser = new fbaccess();
            $aUser->name = 'ictu';
            $aUser->url_avatar = 'none';
            $aUser->user_id = $request->id_user;
            $aUser->access_token = $request->access_token;
            $aUser->expiresIn = $request->expiresIn;
            $aUser->part1 = 0.0;
            $aUser->part2 = 0.0;
            $aUser->part3d1 = 0.0;
            $aUser->part3d2 = 0.0;
            $aUser->part4 = 0.0;
            $aUser->part5 = 0.0;
            $aUser->part6 = 0.0;
            $aUser->part7 = 0.0;
            $aUser->part8 = 0.0;
            $aUser->part9 = 0.0;
            $aUser->part10 = 0.0;
            $aUser->part11 = 0.0;
            $aUser->part12 = 0.0;
            $aUser->part13 = 0.0;
            $aUser->save();
            $resultQuery  = DB::table('fbaccesses')
                ->select('user_id', 'name', 'part1', 'part2', 'part3d1', 'part3d2', 'part4', 'part5', 'part6', 'part7', 'part8', 'part9', 'part10', 'part11', 'part12', 'part13')
                ->where('user_id', $request->id_user)
                ->get();

            $token_value = csrf_token();
            $result_tmp = [
                "csrf_token" => $token_value,
                "user_infor" => $resultQuery,
            ];
            return $result_tmp;
        }
    }
    public function updateScore(Request $request)
    {
        DB::table('fbaccesses')
            ->where('user_id', $request->id_user)
            ->update(['part1' => $request->part1, 'part2' => $request->part2, 'part3d1' => $request->part3d1, 'part3d2' => $request->part3d2, 'part4' => $request->part4, 'part5' => $request->part5, 'part6' => $request->part6, 'part7' => $request->part7, 'part8' => $request->part8, 'part9' => $request->part9, 'part10' => $request->part10, 'part11' => $request->part11, 'part12' => $request->part12, 'part13' => $request->part13]);
    }
    public function testLog()
    {
        return "Hello usert from laravel serve";
    }
    public function deleteUserbyId()
    {
    }
}
