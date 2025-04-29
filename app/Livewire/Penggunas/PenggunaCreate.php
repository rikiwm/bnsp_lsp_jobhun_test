<?php

namespace App\Livewire\Penggunas;

use Livewire\Component;
use App\Models\Pengguna;

class PenggunaCreate extends Component
{

    public $nama, $jenis_pengguna, $alamat, $no_telepon;

    /**
     * Store a new Pengguna record.
     *
     * @return void
     * @throws \Exception if creation fails
     */
    public function store()
    {
        try {
            $this->validate([
                'nama' => 'required',
                'jenis_pengguna' => 'required',
                'alamat' => 'required',
                'no_telepon' => 'required',
            ]);
            Pengguna::create([
                'nama' => $this->nama,
                'jenis_pengguna' => $this->jenis_pengguna,
                'alamat' => $this->alamat,
                'no_telepon' => $this->no_telepon,
            ]);

            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Disimpan']);
            return $this->redirectIntended(route('costumer.pengguna-tabel', absolute: true), navigate: true);

        } catch (\Exception $th) {
            $this->dispatch('notify', ['variant' => 'danger', 'title' => 'Error!', 'message' => 'Data gagal disimpan']);
            return redirect('/penggunas')->with('error', 'Data gagal disimpan');
        }

    }
    public function render()
    {
        return view('livewire.penggunas.pengguna-create');
    }
}
