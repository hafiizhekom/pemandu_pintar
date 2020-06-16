<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pemanduan;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(){
        $user = User::find(session()->get('id'));
        return view('profile', ['user'=>$user]);
    }

    public function pemandu($id_pemandu){

        $user = User::where('role', 'pemandu')->where('id', $id_pemandu)->first();
        if($user){

            $pemanduan = Pemanduan::where('pemandu', $user->id)
            ->where('approved', 'Y')
            ->whereHas('pendakian', function ($query) {
                return $query->where('status', '=', 'selesai');
            })
            ->with('pendakian.gunung')
            ->with('pendakian.pendaki')
            ->get();

            if($pemanduan){
                $pemanduan = json_encode($pemanduan);

                return view('profile', ['user'=>$user, 'pemanduan'=>json_decode($pemanduan)]);
            }


        }

        return redirect('dashboard');

    }

    public function pendaki($id_pendaki){

        $user = User::where('role', 'pendaki')->where('id', $id_pendaki)->first();
        if($user){
            return view('profile', ['user'=>$user]);
        }else{
            return redirect('dashboard');
        }
    }

    public function ubah(){
        $user = User::find(session()->get('id'));
        return view('update_profile', ['user'=>$user]);
    }

    public function ubah_password(){
        $user = User::find(session()->get('id'));
        return view('update_password', ['user'=>$user]);
    }

}

