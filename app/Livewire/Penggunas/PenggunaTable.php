<?php

namespace App\Livewire\Penggunas;

use Livewire\Component;
use App\Models\Pengguna;

class PenggunaTable extends Component
{

    public $id, $nama, $jenis_pengguna, $alamat, $no_telepon;

    // public function mount()
    // {
 
    // }

    public function destroy($id): void
    {
        $pengguna = Pengguna::find($id);
        
        try {
            if (!$pengguna) {
            $this->dispatch('notify');
            }
            $pengguna->delete();
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Dihapus']);

        } catch (\Exception $e) {
            //  session()->flash('error',$e);
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'danger!', 'message' => '  success']);
        }
     
    }

    public function updated($id)
    {
        // dd('asd');
        // try {
        //     $pengguna = Pengguna::find($id);
        //     $pengguna->update([
        //         'nama' => $this->nama,
        //         'jenis_pengguna' => $this->jenis_pengguna,
        //         'alamat' => $this->alamat,
        //         'no_telepon' => $this->no_telepon,
        //     ]);
        //     $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Diupdate']);
        //     return redirect()->route('costumer.pengguna-tabel')->with('success', 'Data Berhasil Diupdate');
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
    }


    public function render()
    {
        return view('livewire.penggunas.pengguna-table',[
            'data' => \App\Models\Pengguna::orderBy('id','desc')->paginate(10),
        ]);
    }
}
