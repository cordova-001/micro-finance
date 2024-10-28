<?php

namespace App\Console\Commands;

use App\Models\Branch;
use Illuminate\Console\Command;

class SmartMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:smartMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tryig out this functionality';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $branch = Branch::all();
        foreach($branch as $branches){
            $branch_name = $branches->branch_name;
            $branch_phone = $branches->phone;
            $branch_address = $branches->address;
            $branch_email = $branches->email;

            echo $branch_name . '' . 'This is the name of our branch bank \n';
        }



    }
}
