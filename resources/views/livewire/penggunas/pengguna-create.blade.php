<div>
    {{-- The whole world belongs to you. --}}
    <flux:modal.trigger name="create-pengguna">
        <flux:button>Create Pengguna</flux:button>
    </flux:modal.trigger>
    <flux:modal name="create-pengguna" variant="flyout">
        <form wire:submit="store">
            @csrf
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Pengguna</flux:heading>
                <flux:text class="mt-2">Make sure your profile is up to your personal.</flux:text>
            </div>
    
            <flux:input :label="__('Name')" placeholder="Your name" wire:model="nama" required type="text"/>
            <flux:radio.group wire:model="jenis_pengguna" variant="segmented" required :label="__('Role')">
                <flux:radio label="Dosen" icon="user" value="dosen" />
                <flux:radio label="Student" icon="user" value="siswa" />
            </flux:radio.group>
            {{-- <flux:input label="Name" placeholder="Your name" wire:model="jenis_pengguna" /> --}}
            <flux:textarea :label="__('Alamat')" placeholder="Your Alamat" wire:model="alamat" type="text" required/>
            <flux:input :label="__('No Telepon')" placeholder="Your Telepon" wire:model="no_telepon" type="number" required />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save changes</flux:button>
            </div>
            
        </div>
    </form>
    </flux:modal>
 

    {{-- @include('components.toats',['title' => 'Success', 'message' => 'Data Berhasil Disimpan', 'variant' => 'success']) --}}
</div>
