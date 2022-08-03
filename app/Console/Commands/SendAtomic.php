<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendAtomic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make artisan command send a simple POST request to https://atomic.incfile.com/fakepost';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        #NOTE: Simulación de 100k solicitudes
        for($i = 1; $i <= 100000; $i++){
            try {
                $response = Http::post('https://atomic.incfile.com/fakepost', [
                    'name' => 'Juan',
                    'lastName' => 'Isidoro',
                ]);
                return $response;
            } catch (Exception $e) {
                #NOTE: Capturo los errores en dado caso de que uno solicitud o más de una falle, se tiene que disparar una alarma vía email o bien una notificación en alguna interfaz de usuario.
                // Método que dispare una alarma del error.
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            }
        }
        
    }
}
