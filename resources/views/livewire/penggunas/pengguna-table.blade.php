<div>
 
    <table class="w-full max-w-screen-2xl px-4 text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline zinc-100 text-sm text-on-surface-strong dark:border-zinc-500 dark:bg-zinc-900/50 dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">User</th>
                <th scope="col" class="p-4">Role</th>
                <th scope="col" class="p-4">Phone</th>
                <th scope="col" class="p-4 text-center">Act</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 dark:divide-zinc-600">
            @isset($data)
              @foreach ($data as $d)
                        <tr>
                            <td class="p-4">{{ $d->id }}</td>
                            <td class="p-4">{{ $d->nama }}</td>
                            <td class="p-4">{{ $d->jenis_pengguna }}</td>
                            <td class="p-4">{{ $d->no_telepon }}</td>
                            {{-- <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <img class="size-10 rounded-full object-cover" src="https://penguinui.s3.amazonaws.com/component-assets/avatar-8.webp" alt="user avatar" />
                                    <div class="flex flex-col">
                                        <span class="text-neutral-900 dark:text-white"> {{ $d->user->name }}</span>
                                        <span class="text-sm text-neutral-600 opacity-85 dark:text-neutral-300"> {{ $d->user->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">{{ count($d->detailPeminjam) }}</td>
                            <td class="p-4">{{ $d->tanggal_kembali }}</td>
                    
                            <td class="p-4 text-center">
                                <flux:dropdown>
                                    <flux:button size="sm" icon="bars-3">
                                    </flux:button>
                                    <flux:menu>
                                        <flux:menu.item icon="pencil-square" kbd="âS" href="{{ route('pinjam.peminjaman-show',$d->id) }}" wire:navigate>Show</flux:menu.item>
                                    </flux:menu>
                               
                            </flux:dropdown>
                            </td> --}}
                            <td class="p-4 text-center">
                                <flux:dropdown>
                                    <flux:button size="sm" icon="bars-3">
                                    </flux:button>
                                    <flux:menu>
                                        <flux:modal.trigger name="edit-pengguna{{ $d->id }}">
                                            <flux:menu.item icon="pencil-square">Edit</flux:menu.item>
                                        </flux:modal.trigger>
                                      
                                        {{-- <flux:menu.item icon="pencil-square" kbd="" href="{{ route('books.book-edit',$d->id) }}" wire:navigate>Edit</flux:menu.item> --}}
                                        <flux:menu.item icon="trash" variant="danger" kbd="" x-on:click="$wire.destroy({{ $d->id }});" wire:confirm="Are you sure you want to delete this post?">Delete</flux:menu.item>
                                    </flux:menu>
                               
                            </flux:dropdown>
                            </td>
                        </tr>
                        <flux:modal name="edit-pengguna{{ $d->id }}" variant="flyout" >
                            <form >
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Create Pengguna</flux:heading>
                                    <flux:text class="mt-2">Make sure your profile is up to your personal.</flux:text>
                                </div>
                        
                                <flux:input :label="__('Name')" placeholder="Your name" wire:model="nama" value="{{ $d->alamat }}" required type="text"/>
                                <flux:radio.group wire:model="jenis_pengguna" variant="segmented" required :label="__('Role')">
                                    <flux:radio label="Dosen" icon="user" value="{{ $d->jenis_pengguna }}" />
                                    <flux:radio label="Student" icon="user" value="{{ $d->jenis_pengguna }}" />
                                </flux:radio.group>
                                {{-- <flux:input label="Name" placeholder="Your name" wire:model="jenis_pengguna" /> --}}
                                <flux:textarea :label="__('Alamat')" placeholder="Your Alamat" wire:model="alamat" type="text">{{ $d->alamat }}</flux:textarea>
                                <flux:input :label="__('No Telepon')" placeholder="Your Telepon" wire:model="no_telepon" value="{{ $d->no_telepon }}" type="number" />
                                <div class="flex">
                                    <flux:spacer />
                                    <flux:button type="submit" x-on:click="$wire.updated({{ $d->id }})" variant="primary">Save changes</flux:button>
                                </div>
                                
                            </div>
                        </form>
                        </flux:modal>
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
 {{-- @include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Disimpan', 'variant' => 'success']) --}}

 
</div>
