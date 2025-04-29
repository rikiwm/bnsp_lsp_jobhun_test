<div>    
    {{-- @include('livewire.books.book-count') --}}
<livewire:books.book-count :counts="$counts ?? 1" />
    <div
        class="relative h-full  rounded-lg border border-neutral-200 dark:border-zinc-700 py-12 mt-4">
        <div class="absolute top-2 right-4 flex gap-2 rounded-lg py-2">
            <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-end">
                <flux:button
                {{-- wire:navigate href="{{ route('books.book-create') }}"  --}}
                icon:trailing="book-open"
            >
            Daft Book
            </flux:button>
              
            </div>
        </div>
        <div class="overflow-hidden w-full rounded-lg ">
            <flux:container>
            <form class="max-w-screen-lg mx-auto w-full py-4 px-6 " wire:submit="store">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model="judul" type="text" name="floating_title" id="floating_title"
                        class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-zinc-400 appearance-none rounded-md dark:text-white dark:border-zinc-700  dark:focus:border-zinc-600 focus:outline-none focus:ring-0 focus:border-zinc-700 peer"
                        placeholder=" " required />
                        <label for="floating_title"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-zinc-700 peer-focus:dark:text-zinc-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                        Judul Buku
                        </label>
                </div>
             
              
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input  wire:model="penulis" type="text" name="floating_first_name" id="floating_first_name"
                            class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 
                            border-gray-300 appearance-none rounded-md dark:text-white  dark:border-zinc-700 
                            dark:focus:border-zinc-600 focus:outline-none focus:ring-0 focus:border-zinc-700 peer"
                            placeholder=" " required />
                        <label for="floating_first_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                             scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-zinc-700 
                             peer-focus:dark:text-zinc-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75
                              peer-focus:-translate-y-8">
                            Penulis
                            </label>
                    </div>
                 
                    <div class="relative z-0 w-full mb-5 group">
                        <input  wire:model="penerbit" type="text" name="floating_last_name" id="floating_last_name"
                            class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none rounded-md dark:text-white  dark:border-zinc-700 dark:focus:border-zinc-600 focus:outline-none focus:ring-0 focus:border-zinc-700 peer"
                            placeholder=" " required />
                        <label for="floating_last_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-zinc-700 peer-focus:dark:text-zinc-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                            Penerbit
                            </label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <select  wire:model="tahun_terbit"  name="floating_phone" id="floating_phone"  class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none rounded-md dark:text-white  dark:border-zinc-700 dark:focus:border-zinc-600 focus:outline-none focus:ring-0 focus:border-zinc-700 peer"
                        placeholder=" " required>
                        @for ($i = date('Y'); $i >= 1900; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor

                        </select>
                      
                        <label for="floating_phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-zinc-700 peer-focus:dark:text-zinc-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                            Tahun Terbit
                            </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input  wire:model="stok" type="number" name="floating_company" id="floating_company"
                            class="block py-2.5 px-2 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none rounded-md dark:text-white  dark:border-zinc-700 dark:focus:border-zinc-600 focus:outline-none focus:ring-0 focus:border-zinc-700 peer"
                            placeholder=" " required />
                        <label for="floating_company"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-zinc-700 peer-focus:dark:text-zinc-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">stok
                            (Ex. 12)</label>
                    </div>
                </div>
               
                <div class="flex items-center justify-end">
                    <flux:button type="submit" variant="primary" class="w-full sm:w-auto ">
                        {{ __('Save Book') }}
                    </flux:button>
                </div>
            </form>
        </flux:container>

    @include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Disimpan', 'variant' => 'success'])

     

</div>
