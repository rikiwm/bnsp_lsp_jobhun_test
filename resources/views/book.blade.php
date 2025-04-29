<x-layouts.app :title="__('Book')">
 

    @props(['showTable' => false])
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- @include('livewire.books.book-count') --}}
<livewire:books.book-count :counts="$counts ?? 1" />
        
        <div class=" rounded-lg ">
            <div class="flex flex-col md:flex-row gap-4 md:gap-12 justify-end">
                <flux:button
                wire:navigate href="{{ route('books.book-create') }}" 
                icon:trailing="arrow-up-right"
            >
            Tambah Book
            </flux:button>
            </div>
            {{-- <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun">{{ __('Light') }}</flux:radio>
                <flux:radio value="dark" icon="moon">{{ __('Dark') }}</flux:radio>
                <flux:radio value="system" icon="computer-desktop">{{ __('System') }}</flux:radio>
            </flux:radio.group> --}}

        </div>

          <div class="relative h-full flex-1 overflow-hidden rounded-lg border border-neutral-200 dark:border-zinc-700">
            <div class="overflow-hidden w-full overflow-x-auto rounded-lg ">
                @if ($showTable == true)
                <livewire:books.book-tabel />
                @else
                <livewire:books.book-create />
                @endif
             
            </div>
        </div>
    </div>

</x-layouts.app>
