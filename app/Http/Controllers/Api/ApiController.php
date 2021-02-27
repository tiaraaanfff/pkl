<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provinsi;
use App\Models\Kasus;

class ApiController extends Controller
{
    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
        $raw = $val['attributes'];
        $res = [
            'Negara' => $raw['Country_Region'],
            'Positif' => $raw['Confirmed'],
            'Sembuh' => $raw['Recovered'],
            'Meninggal' => $raw['Deaths']
        ];
        array_push($this->data, $res);
    }
    $data = [
        'Succes' => true,
        'Data' => $this->data,
        'Message' => 'Berhasil'
    ];
    return response()->json($data,200);
    }
    public function Indonesia(){
        $positif = DB::table('kasuses')
                        ->sum('kasuses.positif');

        $sembuh = DB::table('kasuses')
                        ->sum('kasuses.sembuh');

        $meninggal = DB::table('kasuses')
                        ->sum('kasuses.meninggal');

        return response([
                    'Success' => true,
                    'Data' => [
                    'Name' => 'Indonesia',
                    'Positif'=> $positif,
                    'Sembuh'=> $sembuh,
                    'Meninggal'=> $meninggal,
                            ],
                                    'Message' => ' Berhasil!',


                        ]);
    }
   
    public function index()
    {
        $positif = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
                ->join('kasuses','rws.id','=','kasuses.id_rw')
                ->sum('kasuses.jumlah_positif');
        $sembuh = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
                ->join('kasuses','rws.id','=','kasuses.id_rw')
                ->sum('kasuses.jumlah_positif');
        $meninggal = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
                ->join('kasuses','rws.id','=','kasuses.id_rw')
                ->sum('kasuses.jumlah_positif');

        $res= [
            'success' => true,
            'Data' => 'Data Kasus Indonesia',
            'jumlah positif' => $positif,
            'jumlah sembuh' => $sembuh,
            'jumlah meninggal' => $meninggal,
            'message' => 'Data Kasus Ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function provinsi($id)
    {

        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_provinsi')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);
    }

    public function indonesia2()
    {

        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_provinsi',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_provinsi')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kota()
    {

        $tampil = DB::table('kotas')
       
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kota',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kota')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kota Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kecamatan()
    {

        $tampil = DB::table('kecamatans')
       
       
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kecamatan',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kecamatan')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kecamatan Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kelurahan()
    {

        $tampil = DB::table('kelurahans')
       
       
        
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kelurahan',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kelurahan')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kelurahan Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function hari(){
        $kasus = kasus::get('created_at')->last();
        $jumlah_positif = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_positif');
        $jumlah_sembuh = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_sembuh');
        $jumlah_meninggal = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_meninggal');

        $join = DB::table('kasuses')
                        ->select('jumlah_positif','jumlah_sembuh','jumlah_meninggal')
                        ->join('rws','kasuses.id_rw','=','id_rw')
                        ->get();
        $arr1 =[
            'Data'=>'Data kasus seluruh indonesia',
            'jumlah_positif'=>$join->sum('jumlah_positif'),
            'jumlah_sembuh'=>$join->sum('jumlah_sembuh'),
            'jumlah_meninggal'=>$join->sum('jumlah_meninggal'),
        ];
        $arr2 =[
            'Data'=>'DATA KASUS HARI INI',
            'jumlah_positif'=>$jumlah_positif,
            'jumlah_sembuh'=>$jumlah_sembuh,
            'jumlah_meninggal'=>$jumlah_meninggal,
        ];
        $arr=[
            'status'=> 200,
            'data'=>[
                'hari ini'=>$arr2,
                'total'=>$arr1
            ],
            'message'=>'berhasil'
        ];
        return response()->json($arr,200);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}