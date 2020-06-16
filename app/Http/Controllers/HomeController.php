<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gunung;
use App\Models\Pendakian;
use App\Models\User;
use DB;

class HomeController extends Controller
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
        return view('signin');
    }

    public function signup(){
        return view('signup');
    }

    public function signupPendaki(){
        return view('pendaki/signup');
    }

    public function signupPemandu(){
        return view('pemandu/signup');
    }

    public function dashboard(){




        $gunung = Gunung::get();
        if (session()->get('role') === "pemandu") {

            $pendakian = Pendakian::
            where('status','mencari pemandu')
            ->where('tanggal_keberangkatan', '>=', date('Y-m-d'))
            ->with('pemanduans')
            ->with('pendaki')
            ->with('gunung')
            ->orderBy('id', 'desc');

            if ($this->request->has('gunung') && $this->request->input('gunung')!="") {
                $pendakian = $pendakian->where('gunung', $this->request->input('gunung'));
            }

            if ($this->request->has('jumlah_orang') && $this->request->input('jumlah_orang')!=""){
                $pendakian = $pendakian->where('jumlah_orang', $this->request->input('jumlah_orang'));
            }

            if ($this->request->has('tanggal_keberangkatan') && $this->request->input('tanggal_keberangkatan')!=""){
                $pendakian = $pendakian->where('tanggal_keberangkatan', $this->request->input('tanggal_keberangkatan'));
            }

            if ($this->request->has('hari') && $this->request->input('hari')!=""){
                $pendakian = $pendakian->where('hari', $this->request->input('hari'));
            }

            $pendakian = $pendakian->get();

            foreach ($pendakian as $key => $value) {
                foreach ($value->pemanduans as $key2 => $value2){
                    if($value2->pemandu===session()->get('id')){
                        unset($pendakian[$key]);
                        break;
                    }
                }
            }


            $pendakian = json_encode($pendakian);

            return view('pemandu/dashboard', ['gunung'=>$gunung, 'pendakian'=>json_decode($pendakian)]);
        }elseif (session()->get('role') === "pendaki") {

            $top_id_pemandu = DB::select("SELECT pemandu, count(pemandu) as 'score' FROM pemanduan WHERE approved = 'Y' GROUP BY pemandu LIMIT 5");
            $list_id_pemandu = [];
            foreach ($top_id_pemandu as $key => $value) {
                array_push($list_id_pemandu, $value->pemandu);
            }

            $top_pemandu = User::whereIn('id', $list_id_pemandu)->get();

            $top_id_gunung = DB::select("SELECT gunung, count(gunung) as 'score' FROM pendakian WHERE status = 'selesai' GROUP BY gunung LIMIT 5");
            $list_id_gunung = [];
            foreach ($top_id_gunung as $key => $value) {
                array_push($list_id_gunung, $value->gunung);
            }

            $top_gunung = Gunung::whereIn('id', $list_id_gunung)->get();

            return view('pendaki/dashboard', ['gunung'=>$gunung, 'top_pemandu'=>$top_pemandu, 'top_gunung'=>$top_gunung]);
        }
    }

}

