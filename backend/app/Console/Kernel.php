<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('Reservas::class) //Tarefa para verificar as reservas 17:30 e enviar um email para o restaurante
        // ->days(0,2,3,4,5,6)->at('17:30');
        // before(function(){
            //apagar as reservas passadas (dia anterior)
            //Reserva::table('data')->where('status','yesterday')->delete()
        //})
        //$ontem ('yesterday')

        //ou utilizando a classe e passando parâmetros
        // $schedule->command(EmailsCommand::class, ['Laraveling', '--force'])
        // ->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
