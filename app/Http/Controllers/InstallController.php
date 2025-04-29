<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class InstallController extends Controller
{
    public function index()
    {
        // Optional: skip jika sudah terinstall
        if (env('DB_DATABASE')) return redirect('/');

        return view('install');
    }

    public function save(Request $request)
    {
        $request->validate([
            'app_name'      => 'required',
            'db_connection' => 'required',
            'db_host'       => 'required',
            'db_port'       => 'required',
            'db_name'       => 'required',
            'db_user'       => 'required',
            'db_password'   => 'nullable',
        ]);

        $envPath = base_path('.env');

        if (!File::exists($envPath)) {
            File::copy(base_path('.env.example'), $envPath);
        }
        try {
            $this->updateEnv([
                'APP_NAME'       => $request->app_name,
                'DB_CONNECTION'  => $request->db_connection,
                'DB_HOST'        => $request->db_host,
                'DB_PORT'        => $request->db_port,
                'DB_DATABASE'    => $request->db_name,
                'DB_USERNAME'    => $request->db_user,
                'DB_PASSWORD'    => $request->db_password,
            ]);
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
        }catch (\Exception $e) {
            dd($e);
        }

    $mg = Artisan::call('migrate');
    if ($mg->isSuccessful()) {
        return redirect('/')->with('success', 'Aplikasi berhasil diinstall!');
    } 
    else {
        dd($mg);
    }
    }

    private function updateEnv(array $data): void
    {
        $envPath = base_path('.env');
        $envContent = File::get($envPath);

        foreach ($data as $key => $value) {
            $pattern = "/^#?\s*{$key}=.*/m";
            $replacement = $key . '=' . $this->escapeEnvValue($value);
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, $replacement, $envContent);
            } else {
                $envContent .= PHP_EOL . $replacement;
            }
        }

        File::put($envPath, $envContent);
    }

    private function escapeEnvValue($value)
    {
        // Kasih quote kalau ada spasi atau simbol aneh
        if (preg_match('/\s|["]/', $value)) {
            $value = '"' . addslashes($value) . '"';
        }
        return $value;
    }
}
