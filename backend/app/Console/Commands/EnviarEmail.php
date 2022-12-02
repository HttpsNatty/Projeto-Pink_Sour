<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\ReservaController;

use Illuminate\Support\Facades\Http;

use App\Models\Reserva;

use Carbon\Carbon;

class EnviarEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clienteche {reserva}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'apagar itens antigos';

    public function __construct()
    {
        parent::__construct();
    }    
        
    
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "hello world";
    }
}
