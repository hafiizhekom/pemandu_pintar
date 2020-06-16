<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function signin(){
        $user = User::where('email',$this->request->input('email'))
        ->where('password', md5($this->request->input('password')));

        if($user->count()>0){
            $this->request->session()->put('email', $this->request->input('email'));
            $this->request->session()->put('id', $user->first()->id);
            $this->request->session()->put('role', $user->first()->role);
            return redirect('dashboard');
        }else{
            return redirect('signin');
        }
    }

    public function signout(){
        $this->request->session()->flush();
        return redirect('signin');
    }


    public function signup(){
        if ($this->request->file('image')->isValid()) {
            $file = $this->request->file('image');
            $extension = $this->request->file('image')->extension();
            $this->request->file('image')->move('upload/user', $this->request->id.".".$extension);

            $data = new User;
            $data->nama_lengkap = $this->request->nama_lengkap;
            $data->tanggal_lahir = $this->request->tanggal_lahir;
            $data->jenis_kelamin = $this->request->jenis_kelamin;
            $data->alamat = $this->request->alamat;
            $data->no_telepon = $this->request->no_telepon;
            $data->email = $this->request->email;
            $data->foto = $this->request->id.".".$extension;
            $data->password = md5($this->request->password);
            if($this->request->role==="pemandu"){
                $data->no_rekening = $this->request->no_rekening;
                $data->bank = $this->request->bank;
            }elseif($this->request->role==="pendaki"){
                $data->riwayat_penyakit = $this->request->riwayat_penyakit;
            }
            $data->role = $this->request->role;



            if($data->save()){
                return redirect("signin");
            }
        }

        if($this->request->role==="pemandu"){
            return redirect("signup/pemandu");
        }elseif($this->request->role==="pendaki"){
            return redirect("signup/pendaki");
        }
    }

    public function update(){

        $data = User::find($this->request->id);

        if($data){
            $data->nama_lengkap = $this->request->nama_lengkap;
            $data->tanggal_lahir = $this->request->tanggal_lahir;
            $data->jenis_kelamin = $this->request->jenis_kelamin;
            $data->alamat = $this->request->alamat;
            $data->no_telepon = $this->request->no_telepon;
            $data->email = $this->request->email;
            if ($this->request->hasFile('image')) {
                if ($this->request->file('image')->isValid()){
                    $file = $this->request->file('image');
                    $extension = $this->request->file('image')->extension();
                    $this->request->file('image')->move('upload/user', $this->request->id.".".$extension);
                    $data->foto = $this->request->id.".".$extension;
                }
            }
            if($this->request->role==="pemandu"){
                $data->no_rekening = $this->request->no_rekening;
                $data->bank = $this->request->bank;
            }elseif($this->request->role==="pendaki"){
                $data->riwayat_penyakit = $this->request->riwayat_penyakit;
            }
            $data->role = $this->request->role;



            if($data->save()){
                return redirect("profile");
            }
        }
        return redirect("profile/ubah");
    }

    public function update_password(){

        $data = User::find($this->request->id);

        if($data){
            if($data->password == md5($this->request->old_password)){
                $data->password = md5($this->request->password);

                if($data->save()){
                    return redirect("profile");
                }
            }

            return redirect()->back()->with('errors', ['Password lama anda salah']);

        }
        return redirect("profile/password/ubah");
    }

    public function update_keterangan(){

        $data = User::find($this->request->id);

        if($data){
            $data->keterangan = $this->request->keterangan;

            if($data->save()){
                return redirect("profile");
            }

        }
        return redirect("profile");
    }


}
