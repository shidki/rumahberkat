<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company_user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function registerIndividu(Request $request){
        
        try {
            $request->validate([
                'name' => "required|max:255",
                'phone' => "required",
                'email' => "required|email",
                'password'=> "required",
                'password_confirmation'=> "required",
            ]);
            // dd($request->all());
            $user = User::where('email','=',$request->email)->first();
            $phone = User::where('phone','=',$request->phone)->first();
            
            if($user){
                return response()->json([
                    "success" => false,
                    'message' => "email tersedia"
                ],422);
            }
            if($phone){
                return response()->json([
                    "success" => false,
                    'message' => "No hp tersedia"
                ],422);
            }

            if($request->password_confirmation == $request->password){

                $insertUser = DB::table("users")->insert([
                    "name" => $request->name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "password" => Hash::make($request->password),
                ]);

                if($insertUser){
                    return response()->json([
                        "success" => true,
                        'message' => "Berhasil Mendaftar Akun",
                        'data' => [
                            'user' => $request->all(),
                        ]
                    ],201);
                }else{
                    return response()->json([
                        "success" => false,
                        'message' => "gagal mendaftar akun"
                    ],422);
                }
            }else{
                return response()->json([
                    "success" => false,
                    'message' => "password tidak sesuai"
                ],422);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "message" => $th->getMessage()
            ],422);
        }
    }
    public function registerCompany(Request $request){
        
        try {
            $request->validate([
                'nama_bisnis' => "required|max:255",
                'nama_pemilik' => "required|max:255",
                'phone' => "required",
                'email' => "required|email",
                'password'=> "required",
                'password_confirmation'=> "required",
            ]);
            // dd($request->all());
            $user = User::where('email','=',$request->email)->first();
            $phone = User::where('phone','=',$request->phone)->first();
            $userBisnis = company_user::where('email','=',$request->email)->first();
            $phoneBisnis = company_user::where('phone','=',$request->phone)->first();
            $bisnis = company_user::where('nama_bisnis','=',$request->nama_bisnis)->first();
            
            if($user || $userBisnis){
                return response()->json([
                    "success" => false,
                    'message' => "email tersedia"
                ],422);
            }
            if($bisnis){
                return response()->json([
                    "success" => false,
                    'message' => "nama bisnis tersedia"
                ],422);
            }
            if($phone || $phoneBisnis){
                return response()->json([
                    "success" => false,
                    'message' => "No hp tersedia"
                ],422);
            }

            if($request->password_confirmation == $request->password){

                $insertUser = DB::table("company_users")->insert([
                    "nama_bisnis" => $request->nama_bisnis,
                    "nama_pemilik" => $request->nama_pemilik,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "password" => Hash::make($request->password),
                ]);

                if($insertUser){
                    return response()->json([
                        "success" => true,
                        'message' => "Berhasil Mendaftar Akun",
                        'data' => [
                            'user' => $request->all(),
                        ]
                    ],201);
                }else{
                    return response()->json([
                        "success" => false,
                        'message' => "gagal mendaftar akun"
                    ],422);
                }
            }else{
                return response()->json([
                    "success" => false,
                    'message' => "password tidak sesuai"
                ],422);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                "message" => $th->getMessage()
            ],422);
        }
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }
}
