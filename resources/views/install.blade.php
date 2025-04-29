
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white antialiased dark:bg-linear-to-b dark:from-neutral-950 dark:to-neutral-900">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    <div class="flex flex-col gap-6">
                        <form action="{{ url('/install') }}" class="flex flex-col gap-6" method="POST">
                            @csrf
                            @method('POST')
                            <flux:input
                                name="app_name"
                                :label="__('App_Name')"
                                type="text"
                                required
                                autofocus
                                autocomplete="name"
                                :placeholder="__('APP name')"
                            />
                    
                            <!--  Address -->
                            <flux:input
                                name="db_connection"
                                :label="__('Connection')"
                                type=""
                                required
                                autocomplete=""
                                placeholder=""
                            />        
                             <flux:input
                                name="db_host"
                                :label="__(' Host')"
                                type=""
                                required
                                autocomplete=""
                                placeholder=""
                            />
                            <flux:input
                            name="db_name"
                            :label="__(' Database Name')"
                            type="text"
                            required
                            autocomplete=""
                            placeholder=""
                        />
                        <flux:input
                        name="db_port"
                        :label="__(' Port')"
                        type=""
                        required
                        autocomplete=""
                        placeholder=""
                    />
                    <flux:input
                    name="db_user"
                    :label="__(' Username')"
                    type=""
                    required
                    autocomplete=""
                    placeholder=""
                />
                            
                            <!-- Password -->
                            <flux:input
                                name="db_password"
                                :label="__('Password')"
                                type="password"
                                autocomplete="new-password"
                                :placeholder="__('Password')"
                            />
                    
                   
                    
                            <div class="flex items-center justify-end">
                                <flux:button type="submit" variant="primary" class="w-full">
                                    {{ __('Save') }}
                                </flux:button>
                            </div>
                        </form>
                    
                       
                    </div>
                    
                    {{-- <form action="/installstore" method="POST">
                        @csrf
                        <input type="text" name="app_name" placeholder="App Name" required><br><br>
                        <input type="text" name="db_connection" placeholder="DB Connection" required><br><br>
                        <input type="text" name="db_host" placeholder="DB Host" value="127.0.0.1" required><br><br>
                        <input type="text" name="db_name" placeholder="DB Name" required><br><br>
                        <input type="text" name="db_port" placeholder="DB Port" required><br><br>
                        <input type="text" name="db_user" placeholder="DB User" required><br><br>
                        <input type="password" name="db_password" placeholder="DB Password"><br><br>
                        <button type="submit">Install</button>
                    </form> --}}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
