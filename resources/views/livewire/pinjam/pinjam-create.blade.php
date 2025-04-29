<div>

    <div class=" h-full  rounded-xl border border-neutral-200 dark:border-zinc-700 py-6 mb-4  ">
        <flux:container>
        <div class="px-4 flex flex-col items-center text-start justify-start py-2 mb-8">
            <x-auth-header class="text-start" :title="__('Confirm Peminjaman')" :description="__('This is a secure area of the application. Please confirm your book before continuing.')" />
        </div>
        <flux:separator/>
        {{-- <div class="w-full mx-auto px-4 py-6 rounded-xl border border-neutral-200 dark:border-zinc-700 mb-6">
         
            
        </div> --}}
        <div class="grid lg:grid-cols-2 gap-4 mx-auto px-4 mt-4">
            <div class="col-span-1">
                <div class="flex flex-col gap-6">
                    <flux:select size="sm"
                        wire:model="users_id" :label="__('Pilih User ')" required >
                            @foreach ($user as $name)
                            <option value="{{ $name->id }}">{{ $name->nama }}</option>
                            @endforeach
                    </flux:select>
   
                        {{-- <flux:input
                            wire:model="users_id"
                            :label="__('User')"
                            type="text"
                            size="sm"
                            required
                            autocomplete="new-password"
                            :placeholder="__('User')"
                        /> --}}
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col gap-6">
                        <flux:select size="sm"
                            wire:change="addBook($event.target.value)" :label="__('Book Available')" required >
                                @foreach ($books as $name)
                                <option value="{{ $name->id }}">{{ $name->judul }}</option>
                                @endforeach
                        </flux:select>
                        <div class="grid grid-cols-2 gap-2 w-full max-w-xl">
                            <div class="col-span-1">
                                <flux:input
                                class="w-full max-w-screen-sm"
                                wire:model="tanggal_pinjam"
                                :label="__('Start Date')"
                                type="date"
                                size="sm"
                                required
                                />
                            </div>
                            <div class="col-span-1">
                                <flux:input
                                size="sm"
                                class="w-full max-w-screen-sm"
                                wire:model="tanggal_kembali"
                                :label="__('End Date')"
                                type="date"
                                required
                                />
                            </div>
                        </div>
                </div>
            </div>
        </div>


    </flux:container>
    </div>
    <flux:container>

<div class="px-4 py-12 mb-4 w-full max-w-screen-xl">
@if($selectedBooks != null)
<div class="relative overflow-hidden w-full overflow-x-auto rounded-lg border border-neutral-200 dark:border-zinc-700">
    <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
        <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
            <tr>
                <th scope="col" class="p-4">ID</th>
                <th scope="col" class="p-4">Book</th>
                <th scope="col" class="p-4">Stock Available</th>
                <th scope="col" class="p-4">Qty</th>
                <th scope="col" class="p-4">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline dark:divide-outline-dark">
            @foreach ($selectedBooks as $id => $item)
            <tr>
                <td class="p-4">{{ $item['buku_id'] }}</td>
                <td class="p-4">{{ $item['judul'] }}</td>
                <td class="p-4"> {{ $item['stok'] }} / Pcs</td>
                <td class="p-4">
                    <flux:input.group>
                        <flux:select size="sm" wire:model="selectedBooks.{{ $id }}.jumlah" required class="px-4 w-full sm:w-auto">
                            @for ($i = 1; $i <= $item['stok']; $i++)
                            <option value="{{ $i ?? 1 }}">{{ $i }}</option>
                            @endfor
                    </flux:select>
                </flux:input.group>
                    {{-- <flux:input wire:model="selectedBooks.{{ $id }}.jumlah" type="number" max="{{ $item['stok'] }} ?? 1" class="px-4 w-full sm:w-auto" /> --}}
                </td>
                <td class="p-4">
                    <flux:button wire:click="removeBook({{ $id }})" type="button" variant="danger" class="w-full sm:w-auto justify-end">
                        {{ __('Hapus Book') }}
                    </flux:button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
<div class="flex  justify-end mt-4 w-full max-w-screen-xl">
        <flux:button wire:click="storeAction()" type="submit"  variant="primary" class="w-full sm:w-auto " >
            {{ __('Save Book') }}
        </flux:button>
    </div>
</div>
</flux:container>

@include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Disimpan', 'variant' => 'success'])
  
</div>
