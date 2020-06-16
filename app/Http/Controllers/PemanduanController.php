<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendakian;
use App\Models\Pemanduan;
use App\Models\Gunung;


class PemanduanController extends Controller
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

    public function index(){
        $pemanduan = Pemanduan::
        where('pemandu', session()->get('id'))
        ->with('pendakian.gunung')
        ->with('pendakian.pendaki')
        ->orderBy('id', 'desc')
        ->get();

        $pemanduan = json_encode($pemanduan);

        return view('pemandu/pemanduan', ['pemanduan'=>json_decode($pemanduan)]);
    }

    public function store(){
        $data = new Pemanduan;
        $data->pemandu = $this->request->session()->get('id');
        $data->pendakian = $this->request->pendakian;
        $data->harga = $this->request->harga;
        $data->catatan = $this->request->catatan;

        if($data->save()){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function approve(){

        $pemanduan = Pemanduan::find($this->request->id);
        $pemanduan->approved = 'Y';
        if($pemanduan->save()){
            $pendakian = Pendakian::find($pemanduan->pendakian);
            $pendakian->status = 'menunggu pembayaran pendaki';

            if($pendakian->save()){
                return redirect('pendakian/'.$pemanduan->pendakian.'/bayar');
            }else{
                return redirect()->back()->with('errors', ["Gagal menyimpan status pendakian"]);
            }
        }else{
            return redirect()->back()->with('errors', ["Gagal menerima pemanduan"]);
        }
    }

    public function payconfirmation(){
        $pendakian = Pendakian::find($this->request->id);
        $pendakian->status = 'proses';

        if($pendakian->save()){
            return redirect('pemanduan');
        }else{
            return redirect()->back()->with('errors', ["Gagal mengkonfirmasi pembayaran"]);
        }
    }

}
