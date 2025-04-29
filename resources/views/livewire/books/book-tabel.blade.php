<div>
 
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <table class="w-full max-w-screen-2xl px-4 text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline zinc-100 text-sm text-on-surface-strong dark:border-outline-dark dark:bg-zinc-900 dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">Penerbit</th>
                <th scope="col" class="p-4">Judul</th>
                <th scope="col" class="p-4">Member Since</th>
                <th scope="col" class="p-4">Stock</th>
                <th scope="col" class="p-4">Status</th>
                <th scope="col" class="p-4">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @isset($data)
                @foreach ($data as $d)
                    
            <tr>
                <td class="p-4">{{ $d->id }}</td>
                <td class="p-4">
                    <div class="flex w-max items-center gap-2">
                        <flux:icon.book-open-text class="w-8 h-8 rounded-full bg-black/20 p-1" />
                        <div class="flex flex-col">
                            <span class="text-neutral-900 dark:text-white">Alice Brown</span>
                            <span class="text-sm text-neutral-600 opacity-85 dark:text-neutral-300">alice.brown@gmail.com</span>
                        </div>
                    </div>
                </td>
                <td class="p-4">{{ $d->judul }}</td>
                <td class="p-4">{{ $d->penulis }}</td>
                <td class="p-4">{{ $d->stok }}</td>
                <td class="p-4">
                    <span class="inline-flex overflow-hidden rounded-radius border-success px-1 py-0.5 text-xs font-medium text-success bg-success/10">
                        {{ $d->tahun_terbit }}
                    </span>
                </td>
                <td class="p-2">
                    
                    
                    <flux:dropdown>
                        
                        <flux:button size="sm" icon="bars-3" type="button" >
                        </flux:button>
                        <!-- Dropdown Menu -->
                        <flux:menu>
                         <flux:menu.item icon="pencil-square" kbd="" href="{{ route('books.book-edit',$d->id) }}" wire:navigate>Edit</flux:menu.item>
                            <flux:menu.item icon="trash" variant="danger" kbd="" x-on:click="$wire.destroy({{ $d->id }});" wire:confirm="Are you sure you want to delete this post?">Delete</flux:menu.item>
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
               {{ $data->links() }}
        </ul>
    </nav>
 </div>
 @include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Dihapus', 'variant' => 'success'])


 
</div>
