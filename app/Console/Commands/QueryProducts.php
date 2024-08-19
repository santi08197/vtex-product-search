<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class QueryProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:query-products {query}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Queries products from the VTEX API and stores the results in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = $this->argument('query');

        $response = Http::get("https://newsport.vtexcommercestable.com.br/api/catalog_system/pub/products/search/$query", [
            /* '_from' => 1,
            '_to' => 3, */
        ]);
      
        if ($response->successful()) {
            $products = $response->json();
            $resultCount = count($products);
            $this->info($resultCount);
            
            //TODO: create model

            $this->info("Query saved: {$query} - {$resultCount} results");
        } else {
            $this->error('Error querying the API');
        }

        //TODO: display queries
    }
}
