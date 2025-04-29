<?php

namespace App\Livewire\Pinjam;

use Livewire\Component;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Support\Facades\DB;

class PinjamCreate extends Component
{

    public $tanggal_pinjam;
    public $tanggal_kembali;
    public $users_id;
    public $admin_id;
    public $aprroved_id;

    public $jumlah;
    public $price;
    public $status;

    public $count = 0;


    public $books = [];
    public $selectedBooks = [];

    public function mount()
    {
        $this->books = \App\Models\Buku::where('stok', '>', 0)->get();

        $this->admin_id = auth()->user()->id;
        $this->aprroved_id = auth()->user()->id;
    }


    public function addBook($bookId)
    {
        if (!array_key_exists($bookId, $this->selectedBooks)) {
            $book = Buku::find($bookId);
            // dd($book, $this->selectedBooks);
            $this->selectedBooks[$bookId] = [
                'buku_id' => $book->id,
                'judul' => $book->judul,
                'stok' => $book->stok,
            ];
        }
    }

    public function removeBook($bookId)
    {
        unset($this->selectedBooks[$bookId]);
    }


    public function storeAction()
    {
        $this->validate([
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
        ]);
        
        DB::beginTransaction();
        try {

            $trx = Peminjam::create([
                // 'uuid' => \fake()->uuid(),
                'penggunas_id' => $this->users_id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now(),
            ]);

            foreach ($this->selectedBooks as $bookId => $detail) {
            
                $trx->detailPeminjam()->create([
                    'buku_id' => $detail['buku_id'],
                    'status' => 'tersedia',
                    'jumlah' => $detail['jumlah'] ?? 1,
                    'peminjaman_id' =>$trx['uuid'],
                    // 'jumlah' => $detail['jumlah'],
                ]);

                $book = Buku::find($detail['buku_id']);
                $book->stok -= $detail['jumlah'];
                $book->save();

            }
    
            // dd($trx,$this->selectedBooks);
            DB::commit();
    
            session()->flash('success', 'Transaksi berhasil disimpan!');
            $this->dispatch('notify', ['variant' => 'success', 'title' => 'Success!', 'message' => 'Data Berhasil Disimpan']);
            $this->redirectIntended(default: route('pinjam.peminjaman-create', absolute: false), navigate: true);
            $this->reset(['selectedBooks']);
    
        } catch (\Throwable $th) {
            throw $th;
        }
        // $pinjam = new \App\Models\Peminjam();
        // $pinjam->buku_id = $this->buku_id;
        // $pinjam->jumlah = $this->jumlah;
        // $pinjam->tanggal_pinjam = $this->tanggal_pinjam;
        // $pinjam->tanggal_kembali = $this->tanggal_kembali;
        // $pinjam->users_id = $this->users_id;
        // $pinjam->admin_id = $this->admin_id;
        // $pinjam->aprroved_id = $this->aprroved_id;
        // $pinjam->save();
        // $this->reset();
        // $this->redirectIntended(default: route('pinjam.pinjam-tabel', absolute: false), navigate: true);
    }

    

    public function render()
    {
        $book = Buku::query()->where('status', 'tersedia')->paginate(20);
        $user = \App\Models\Pengguna::query()->select('id', 'nama')->get();

        return view('livewire.pinjam.pinjam-create',[
            'book' => $book,
            'user' => $user,
        ]);
    }
}
