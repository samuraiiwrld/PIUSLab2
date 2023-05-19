<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class GetAddresses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addresses:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Number of customers addresses';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle(): void
    {
        $id = $this->argument('id');

        $customer = Customers::find($id);

        if (!$customer) {
            throw new \InvalidArgumentException("User with ID $id not found");
        }

        $count = $customer->addresess()->count();

        $this->info("User with ID $id has $count addresses.");
    }
}
