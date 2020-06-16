<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendakian;
use App\Models\Pemanduan;
use App\Models\Gunung;


class PendakianController extends Controller
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

        $gunung = Gunung::get();
        $pendakian = Pendakian::
        whereHas('pendaki', function ($query) {
            return $query->where('id', '=', session()->get('id'));
        })
        ->with('pendaki')
        ->with('gunung')
        ->with('pemanduans')
        ->orderBy('id', 'desc')
        ->get();

        $pendakian->pemandu = null;

        foreach ($pendakian as $key => $value) {
            foreach ($value->pemanduans as $key2 => $value2) {
                if($value2->approved==="Y"){
                    $value->harga = $value2->harga;

                    $pemandu = User::find($value2->pemandu);
                    $value->pemandu = $pemandu->nama_lengkap;

                }
            }
        }

        $pendakian = json_encode($pendakian);

        return view('pendaki/pendakian', ['gunung' => $gunung, 'pendakian'=>json_decode($pendakian)]);
    }


    public function detail($id_pendakian){
        $pendakian = Pendakian::where('id', $id_pendakian)->with('gunung')->first();

        $pemandu = Pemanduan::
        where('pendakian', $id_pendakian)
        ->whereHas('pendakian', function ($query) {
            return $query->where('status', '=', 'mencari pemandu');
        })
        ->where('approved', 'N')
        ->with('pendakian')
        ->with('pemandu')
        ->orderBy('id', 'desc')
        ->get();


        $pendakian = json_encode($pendakian);
        $pemandu = json_encode($pemandu);


        return view('pendaki/pemandu', ['pendakian'=>json_decode($pendakian), 'pemandu'=>json_decode($pemandu)]);
    }

    public function bayar($id_pendakian){
        $pendakian = Pendakian::where('id', $id_pendakian)->with('gunung')->with('pendaki')->first();

        $pemanduan = Pemanduan::
        where('pendakian', $id_pendakian)
        ->whereHas('pendakian', function ($query) {
            return $query->where('status', '=', 'menunggu pembayaran pendaki');
        })
        ->where('approved', 'Y')
        ->with('pendakian')
        ->with('pemandu')
        ->orderBy('id', 'desc')
        ->first();

        $pendakian = json_encode($pendakian);
        $pemanduan = json_encode($pemanduan);

        return view('pendaki/bayar', ['pendakian'=>json_decode($pendakian), 'pemanduan'=>json_decode($pemanduan)]);
    }

    public function store(){
        $data = new Pendakian;
        $data->gunung = $this->request->gunung;
        $data->pendaki = $this->request->session()->get('id');
        $data->jumlah_orang = $this->request->jumlah_orang;
        $data->tanggal_keberangkatan = $this->request->tanggal_keberangkatan;
        $data->hari = $this->request->hari;
        $data->status = "mencari pemandu";
        if($data->save()){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function pay(){
        if ($this->request->file('image')->isValid()) {
            $file = $this->request->file('image');
            $extension = $this->request->file('image')->extension();
            $this->request->file('image')->move('upload/pembayaran', $this->request->id.".".$extension);

            $pendakian = Pendakian::find($this->request->id);
            $pendakian->status = 'menunggu konfirmasi pemandu';
            $pendakian->bukti_pembayaran = $this->request->id.".".$extension;
            $pendakian->pembayaran = 'Y';

            if($pendakian->save()){
                return redirect('pendakian');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function finish(){
        $pendakian = Pendakian::find($this->request->id);
        $pendakian->status = 'selesai';

        if($pendakian->save()){
            return redirect('pendakian');
        }else{
            return redirect()->back()->with('errors', ["Gagal menyelesaikan perjalan"]);
        }
    }

    public function list_pemandu(){
        $user = User::where('role', 'pemandu')->get();
        return view('pendaki/list_pemandu', ['user'=>$user]);
    }

    public function list_gunung(){
        $gunung = Gunung::get();
        return view('pendaki/list_gunung', ['gunung'=>$gunung]);
    }


    public function gunung($id_gunung){
        $gunung = Gunung::find($id_gunung);
        return view('pendaki/gunung', ['gunung'=>$gunung]);
    }



}
