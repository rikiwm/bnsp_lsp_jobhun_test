<x-layouts.app :title="__('Book')">
    @props(['showTable' => false])
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <livewire:pinjam.pinjam-count />
        
        <div class=" rounded-lg ">
            <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-end">
                <a wire:navigate href="{{ route('pinjam.peminjaman-create') }}" class="flex items-center justify-center gap-2 whitespace-nowrap bg-primary px-4 py-2 text-center text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 dark:bg-zinc-950 dark:text-on-primary-dark dark:focus-visible:outline-primary-dark rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-3.5">
                        <path fill-rule="evenodd" d="M5 4a3 3 0 0 1 6 0v1h.643a1.5 1.5 0 0 1 1.492 1.35l.7 7A1.5 1.5 0 0 1 12.342 15H3.657a1.5 1.5 0 0 1-1.492-1.65l.7-7A1.5 1.5 0 0 1 4.357 5H5V4Zm4.5 0v1h-3V4a1.5 1.5 0 0 1 3 0Zm-3 3.75a.75.75 0 0 0-1.5 0v1a3 3 0 1 0 6 0v-1a.75.75 0 0 0-1.5 0v1a1.5 1.5 0 1 1-3 0v-1Z" clip-rule="evenodd" />
                    </svg>
                    Tambah Data
                </a>
            </div>
        </div>

          <div class="relative h-full flex-1 overflow-hidden rounded-lg border border-neutral-200 dark:border-zinc-700">
            <div class="overflow-hidden w-full overflow-x-auto rounded-lg ">
                @if ($showTable == true)
                <livewire:pinjam.pinjam-tabel />
                @else
                <livewire:pinjam.pinjam-create />
                @endif
             
            </div>
        </div>
    </div>
</x-layouts.app>
