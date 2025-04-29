<div>
 
    <table class="w-full max-w-screen-2xl px-4 text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline zinc-100 text-sm text-on-surface-strong dark:border-outline-dark dark:bg-zinc-900/50 dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">User</th>
                <th scope="col" class="p-4">Books</th>
                <th scope="col" class="p-4">End Date</th>
                <th scope="col" class="p-4 text-center">Act</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @isset($pinjam)
              @foreach ($pinjam as $d)
                        <tr>
                            <td class="p-4">{{ $d->id }}</td>
                            <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <img class="size-10 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="user avatar" />
                                    <div class="flex flex-col">
                                        <span class="text-neutral-900 dark:text-white"> {{ $d->user->nama }}</span>
                                        <span class="text-sm text-neutral-600 opacity-85 dark:text-neutral-300"> {{ $d->user->jenis_pengguna }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">{{ count($d->detailPeminjam) }}</td>
                            <td class="p-4">{{ $d->tanggal_kembali }}</td>
                            {{-- <td class="p-4">{{ $d }}</td>
                            <td class="p-4">
                                <span class="inline-flex overflow-hidden rounded-radius border-success px-1 py-0.5 text-xs font-medium text-success bg-success/10">
                                    {{ $d }}
                                </span>
                            </td> --}}
                            <td class="p-4 text-center">
                                <flux:dropdown>
                                    <flux:button size="sm" icon="bars-3">
                                    </flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="pencil-square" kbd="âS" href="{{ route('pinjam.peminjaman-show',$d->id) }}" wire:navigate>Show</flux:menu.item>
                                    </flux:menu>
                               
                            </flux:dropdown>
                            </td>
                        </tr>

            @endforeach
            @endisset
    
        </tbody>
    </table>
 <div class="w-full py-6 px-4">
    <nav aria-label="  flex-col justify-center flex">
        <ul class="text-sm font-medium ">
               {{ $pinjam->links() }}
        </ul>
    </nav>
 </div>

 
</div>
