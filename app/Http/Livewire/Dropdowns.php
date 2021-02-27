<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Kasus;
class Dropdowns extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $idK;
    public $idRw;

    public $pprovinsi = NULL;
    public $pkota = NULL;
    public $pkecamatan = NULL;
    public $pkelurahan = NULL;
    public $prw = NULL;


    public function mount($idk = NULL,$idrw = NULL){
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();

        if(!is_null($idk)){
            $tracking = Kasus::findOrFail($idk);
        }
        if (!is_null($idrw)){
            $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($idrw);

            if($rw){
                $this->rw = Rw::where('id_kelurahan',$rw->id_kelurahan)->get();
                $this->kelurahan = kelurahan::where('id_kecamatan',$rw->kelurahan->id_kecamatan)->get();
                $this->kecamatan = kecamatan::where('id_kota',$rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = kota::where('id_provinsi',$rw->kelurahan->kecamatan->kota->id_provinsi)->get();

                $this->pprovinsi = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->pkota = $rw->kelurahan->kecamatan->id_kota;
                $this->pkecamatan = $rw->kelurahan->id_kecamatan;
                $this->pkelurahan = $rw->id_kelurahan;
                $this->pkelurahan = $rw->id_kelurahan;
                $this->prw = $rw->id;
            }
        }

    }

    public function render()
    {
        return view('livewire.dropdowns');
    }
    public function updatedpprovinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->pkota = NULL;
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }

    public function updatedpkota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->pkecamatan = NULL;
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }
    public function updatedpkecamatan($kecamatan)
    {
        $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        $this->pkelurahan = NULL;
        $this->prw = NULL;
    }
    public function updatedpkelurahan($kelurahan)
    {
        $this->rw = Rw::where('id_kelurahan', $kelurahan)->get();
        $this->prw = NULL;
    }    
}