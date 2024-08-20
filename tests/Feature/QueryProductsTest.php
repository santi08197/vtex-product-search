<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Models\ProductQuery;


class QueryProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_stores_results_in_database_when_api_call_is_successful()
    {
        Http::fake([
            'https://newsport.vtexcommercestable.com.br/api/catalog_system/pub/products/search/*' => Http::response(['product1', 'product2'], 200),
        ]);

        $this->artisan('app:query-products test-query')
            ->expectsOutput('Query saved: test-query - 2 results')
            ->assertExitCode(0);

        $this->assertDatabaseHas('consulta_productos', [
            'nombre' => 'test-query',
            'resultados' => 2,
        ]);
    }

    public function test_it_uses_the_provided_query_argument()
    {
        Http::fake([
            'https://newsport.vtexcommercestable.com.br/api/catalog_system/pub/products/search/test-query' => Http::response(['product1'], 200),
        ]);

        $this->artisan('app:query-products test-query')
            ->expectsOutput('Query saved: test-query - 1 results')
            ->assertExitCode(0);
    }
}
