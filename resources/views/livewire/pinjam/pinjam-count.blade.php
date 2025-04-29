<div>
    {{-- @props(['count'=> '']) --}}
    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
        <div class="group flex rounded-lg max-w-screen flex-col overflow-hidden border border-neutral-200 dark:border-neutral-700  dark:bg-zinc-900 bg-zinc-300/20 text-on-surface  dark:text-on-surface-dark">
            <div class="flex flex-col gap-4 p-6 ">
                <!-- Header -->
                <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-between ">
                    <!-- Title & Rating -->
                    <div class="flex flex-col ">
                        <h3 class="text-lg lg:text-lg font-semibold" aria-describedby="productDescription">PINJAM </h3>
                    </div>
                    {{-- <span class="text-md"><span class="sr-only">Book</span>{{ $counts }}</span> --}}
                </div>
            </div>
        </div>
        <div class="group flex rounded-lg max-w-screen flex-col overflow-hidden border border-neutral-200 dark:border-neutral-700 bg-surface-alt text-on-surface  dark:text-on-surface-dark">
            <div class="flex flex-col gap-4 p-6">
                <!-- Header -->
                <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-between">
                    <!-- Title & Rating -->
                    <div class="flex flex-col">
                        <h3 class="text-lg lg:text-lg font-semibold" aria-describedby="productDescription">PINJAM </h3>
                    </div>
                    <span class="text-md"><span class="sr-only">Book</span>12</span>
                </div>
            </div>
        </div>
 
    </div>

</div>
