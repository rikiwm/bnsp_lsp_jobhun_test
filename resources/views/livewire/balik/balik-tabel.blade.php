<div>
    {{-- @dd($balik) --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <table class="w-full max-w-screen-2xl px-4 text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline zinc-100 text-sm text-on-surface-strong dark:border-outline-dark dark:bg-zinc-900 dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">Denda</th>
                <th scope="col" class="p-4">Tanggal Pengembalian</th>
                <th scope="col" class="p-4">Tanggal Pinjam</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @isset($balik)
                @foreach ($balik as $d)
                        <tr>
                            <td class="p-4">{{ $d->id }}</td>
                            <td class="p-4">{{ $d->denda }}</td>
                            <td class="p-4">{{ $d->tanggal_pengembalian }}</td>
                            <td class="p-4">
                                @isset($d->peminjam)
                                <flux:badge variant="primary" class="text-xs w-fit space-x-2" >
                                    {{ $d->peminjam->tanggal_pinjam }}
                                </flux:badge>
                                @endisset

                                {{-- <span class="inline-flex overflow-hidden rounded-radius border-success px-1 py-0.5 text-xs font-medium text-success bg-success/10">
                                    {{ $d->tanggal_pengembalian }}
                                </span> --}}
                            </td>
                       
                        </tr>

            @endforeach
            @endisset
    
        </tbody>
    </table>
 <div class="w-full py-6 px-4">
    <nav aria-label="  flex-col justify-center flex">
        <ul class="text-sm font-medium ">
               {{-- {{ $data->links() }} --}}
        </ul>
    </nav>
 </div>
</div>
