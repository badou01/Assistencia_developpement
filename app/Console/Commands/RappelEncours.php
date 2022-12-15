<?php

namespace App\Console\Commands;

use App\Mail\SendRappelMail;
use App\Mail\SendTraitementEncoursMail;
use App\Models\Demande;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RappelEncours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rappel:encours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jour=Carbon::now()->subDays(2);
        $demandes=Demande::all()->where('statut','en cours de traitement')->where('created_at','>',$jour);
        $admins=User::where('role','1')->get();
        foreach ($demandes as $demande) {
            # code...
            Mail::to($admins)->send(new SendTraitementEncoursMail($demande));
        }
    }
}
