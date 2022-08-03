<?php

namespace App\Console\Commands;

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
        $response = Http::post('https://atomic.incfile.com/fakepost', [
            'name' => 'Juan',
            'lastName' => 'Isidoro',
        ]);

        return $response;
    }
}
