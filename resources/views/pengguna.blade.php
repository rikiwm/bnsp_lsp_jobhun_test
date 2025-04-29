<x-layouts.app :title="__('Pengguna')">
    @props(['showTable' => false])
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- <livewire:pinjam.pinjam-count /> --}}
        
        <div class=" rounded-lg ">
            <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-end">
                <livewire:penggunas.pengguna-create />
              
            </div>
        </div>

          <div class="relative h-full flex-1 overflow-hidden rounded-lg border border-neutral-200 dark:border-zinc-700">
            <div class="overflow-hidden w-full overflow-x-auto rounded-lg">
               <livewire:penggunas.pengguna-table />
            </div>
        </div>
        @if (session('error'))
        @include('components.toats', ['title' => 'Error', 'message' => 'Error', 'variant' => 'success'])
    @else
        @include('components.toats', ['title' => 'Success', 'message' => 'Data Berhasil Dihapus', 'variant' => 'success'])
    @endif
    
    </div>
</x-layouts.app>
