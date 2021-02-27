<?php

namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Provinsi;
use DB;
use App\Models\Kasus;




use Illuminate\Support\Facades\Http;



class ReportController extends Controller

{
  public function index()
  {
      $positif = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
          ->join ('kasuses','rws.id','=','kasuses.id_rw')
          ->sum('kasuses.jumlah_positif');
         
         
          $sembuh = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
          ->join ('kasuses','rws.id','=','kasuses.id_rw')
          ->sum('kasuses.jumlah_sembuh');

          $meninggal = DB::table('rws')->select('kasuses.jumlah_positif','kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
          ->join ('kasuses','rws.id','=','kasuses.id_rw')
          ->sum('kasuses.jumlah_meninggal');

          $lokal = DB::table('provinsis')
          ->join('kotas','kotas.id_provinsi','=','provinsis.id')
          ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
          ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
          ->join('rws','rws.id_kelurahan','=','kelurahans.id')
          ->join('kasuses','kasuses.id_rw','=','rws.id')
          ->select('nama_provinsi',
                  DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                  DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                  DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
          ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
          ->get();

          $global = file_get_contents('https://api.kawalcorona.com/positif');
          $getglobal = json_decode($global, TRUE);

           // Table Global
      $dataglobal= file_get_contents("https://api.kawalcorona.com/");
      $globall = json_decode($dataglobal, TRUE);

      return view('frontend.index', compact('positif','sembuh','meninggal','lokal','getglobal','globall'));
  }
}