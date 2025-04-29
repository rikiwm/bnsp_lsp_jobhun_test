<div>
<div class="space-y-4">

    <div class="group flex rounded-lg max-w-screen flex-col overflow-hidden 
    border border-neutral-200 dark:border-neutral-700  dark:bg-zinc-900 bg-zinc-100/20 text-on-surface  
    dark:text-on-surface-dark">
        <div class="flex flex-col gap-4 py-2">
            <!-- Header -->
            <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-between items-center px-2">
                <!-- Title & Rating -->
                <div class="flex flex-col ">
                    <h3 class="px-4 text-lg lg:text-lg font-semibold uppercase" aria-describedby="productDescription">Pinjam - {{ $pinjam->id }} </h3>
                </div>
                <div class="rounded-lg border border-neutral-200 dark:border-neutral-700 h-full flex flex-col gap-1 p-2 text-end">
                    <span class="text-xs">Tanggal Pengembalian</span> 
                    <span class="text-md"> {{ $pinjam->tanggal_kembali }}</span>
                </div>
            </div>
        </div>
    </div>

    <fluc:container>
        <div class="group flex rounded-lg max-w-screen flex-col overflow-hidden 
        border border-neutral-200 dark:border-neutral-700  dark:bg-zinc-900 bg-zinc-100/20 text-on-surface  
        dark:text-on-surface-dark">
            <div class="flex flex-col gap-4 p-6 ">
                <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-between ">
                    <div class="flex flex-col ">
                        <h3 class="text-lg lg:text-lg font-semibold uppercase" aria-describedby="productDescription">Detail Pinjam - {{ count($pinjam->detailPeminjam) }} - Book </h3>
                        <span class="text-xs">Di Pinjam : {{ $pinjam->tanggal_pinjam }}</span>
                    </div>
                    <div class="flex flex-row gap-2 ">
                        <flux:button size="sm" href="#" variant="ghost" class="w-full">
                        <flux:icon.printer class="w-4 h-4" />
                        </flux:button>
                   
                            <flux:modal.trigger name="edit-profile" size="sm" variant="danger">
                                <flux:button  size="sm" variant="danger" class="w-full">
                                    <flux:icon.check-circle class="w-4 h-4" />
                                    </flux:button>
                            </flux:modal.trigger>
                            
                            <flux:modal name="edit-profile" class="md:w-110">
                                <form wire:submit="returnBook()">

                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Pengembalian</flux:heading>
                                        <flux:text class="mt-2">Make changes to your retrun book.</flux:text>
                                    </div>
                                    <flux:separator/>
                                    <flux:input label="Date return" type="date" wire:model="tanggal_pinjam" value="{{ $pinjam->tanggal_pinjam }}" disabled />
                                    <flux:separator/>
                                    <div class="flex flex-row justify-around gap-2 w-full max-w-full">
                                    <flux:input label="Date return" type="date" wire:model="tanggal_pengembalian" />
                                    {{-- <flux:input label="Quantity return" type="number" value="{{ $pinjam->detailPeminjam->jumlah }}" /> --}}
                                        <flux:input label="Denda" type="number" wire:model="denda" class="w-full"/>
                                    </div>

                                    <flux:input label="Condition return" type="text" />
                                    <div class="flex">
                                        <flux:spacer />
                                        <flux:button type="submit" variant="primary">Save changes</flux:button>
                                    </div>
                                </div>
                            </form>
                            </flux:modal>
                    </div>
                </div>
            </div>
            
            <div class="grid gap-2 md:grid-cols-2 p-4">
                <div class="col-span-1">
                    <div class="mx-auto group flex rounded-lg max-w-screen-lg flex-col overflow-hidden border border-neutral-200 dark:border-neutral-700 bg-surface-alt text-on-surface  dark:text-on-surface-dark">
                    @foreach ($pinjam->detailPeminjam as $detail)
                        <div class="flex flex-row gap-2 p-2 justify-between items-center">
                            <div class="flex flex-col gap-2 p-2">
                              
                                <flux:text variant="muted" class="text-xs">{{ $detail->buku->id ?? 'Data Terhapus' }}</flux:text>
                                <flux:text variant="strong" class="text-md uppercase">{{ $detail->buku->judul ?? 'Data Terhapus' }}</flux:text>
                                <flux:badge variant="primary" class="text-xs w-fit space-x-2" >
                                <flux:icon.user-circle class="w-4 h-4 "/>
                                {{ $detail->buku->penerbit ?? 'Data Terhapus' }}</flux:badge>
                            </div>
                            <div class="rounded-lg border border-neutral-200 dark:border-neutral-700 h-full flex flex-col gap-1 p-2 text-center">
                                <span class="text-xs">Unit </span> 
                                <span class="text-3xl"> {{ $detail->jumlah }}</span>
                            </div>
                        </div>
                        <flux:separator class=""/>

                        @endforeach
                    </div>
                </div>
               
                <div class="col-span-1 ">
                    <div class="p-4  group flex rounded-lg max-w-screen-lg flex-col overflow-hidden border border-neutral-200 dark:border-neutral-700 bg-surface-alt text-on-surface  dark:text-on-surface-dark">
                        <flux:heading size="lg" class="mb-6">Timeline</flux:heading>
                        <ol class="flex w-min flex-col gap-10 justify-end" aria-label="registration progress">
                            <li class="text-sm" aria-label="create an account">
                                <div class="flex items-center gap-2">
                                    <span class="flex size-6 items-center justify-center rounded-full border border-primary bg-primary text-on-primary dark:border-primary-dark dark:bg-primary-dark dark:text-on-primary-dark">
                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                        </svg>
                                        <span class="sr-only">completed</span>
                                    </span>
                                    <span class="hidden w-max text-primary dark:text-primary-dark sm:inline">Create</span>
                                </div>
                            </li>
                            <!-- current step -->
                            <li class="flex w-full items-center text-sm" aria-current="step" aria-label="choose a plan">
                                <div class="flex items-center gap-2">
                                    <div class="relative">
                                        <div class="absolute bottom-8 left-3 h-10 w-0.5 bg-primary dark:bg-primary-dark"></div>
                                        <span class="flex size-6 shrink-0 items-center justify-center rounded-full border border-primary bg-primary font-bold text-on-primary outline outline-2 outline-offset-2 outline-primary dark:border-primary-dark dark:bg-primary-dark dark:text-on-primary-dark dark:outline-primary-dark">2</span>
                                    </div>
                                    <span class="hidden w-max font-bold text-primary dark:text-primary-dark sm:inline">Proses</span>
                                </div>
                            </li>
                       
                        </ol>
                        
                    </div>
                 
                </div>
            </div>
        </div>
    </fluc:container>
</div>
@include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Disimpan', 'variant' => 'success'])
</div>
