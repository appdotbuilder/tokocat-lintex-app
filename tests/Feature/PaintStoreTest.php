<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\RawMaterial;

test('welcome page loads successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('dashboard requires authentication', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});

test('authenticated user can access dashboard', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
});

test('models can be created', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->create(['category_id' => $category->id]);
    $customer = Customer::factory()->create();
    $user = User::factory()->create();
    
    $sale = Sale::factory()->create([
        'customer_id' => $customer->id,
        'user_id' => $user->id,
    ]);

    expect($category)->toBeInstanceOf(Category::class);
    expect($product)->toBeInstanceOf(Product::class);
    expect($customer)->toBeInstanceOf(Customer::class);
    expect($sale)->toBeInstanceOf(Sale::class);
    
    $this->assertDatabaseHas('categories', ['id' => $category->id]);
    $this->assertDatabaseHas('products', ['id' => $product->id]);
    $this->assertDatabaseHas('customers', ['id' => $customer->id]);
    $this->assertDatabaseHas('sales', ['id' => $sale->id]);
});

test('low stock scopes work correctly', function () {
    $category = Category::factory()->create();
    
    $lowStockProduct = Product::factory()->create([
        'stock_current' => 5,
        'stock_minimum' => 10,
        'category_id' => $category->id,
    ]);
    
    $normalStockProduct = Product::factory()->create([
        'stock_current' => 20,
        'stock_minimum' => 10,
        'category_id' => $category->id,
    ]);

    $lowStockMaterial = RawMaterial::factory()->create([
        'stock_current' => 5,
        'stock_minimum' => 20,
    ]);

    $lowStockProducts = Product::lowStock()->get();
    $lowStockMaterials = RawMaterial::lowStock()->get();

    expect($lowStockProducts->contains($lowStockProduct))->toBeTrue();
    expect($lowStockProducts->contains($normalStockProduct))->toBeFalse();
    expect($lowStockMaterials->contains($lowStockMaterial))->toBeTrue();
});

test('dashboard controller returns correct data structure', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    
    // Check that Inertia props contain expected keys
    $page = $response->viewData('page');
    expect($page['props'])->toHaveKeys([
        'stats',
        'lowStockProducts', 
        'lowStockRawMaterials',
        'recentSales'
    ]);
});

test('product model relationships work', function () {
    $category = Category::factory()->create();
    $product = Product::factory()->create(['category_id' => $category->id]);

    expect($product->category)->toBeInstanceOf(Category::class);
    expect($category->products->contains($product))->toBeTrue();
});

test('customer model relationships work', function () {
    $customer = Customer::factory()->create();
    $user = User::factory()->create();
    $sale = Sale::factory()->create([
        'customer_id' => $customer->id,
        'user_id' => $user->id,
    ]);

    expect($sale->customer)->toBeInstanceOf(Customer::class);
    expect($sale->user)->toBeInstanceOf(User::class);
    expect($customer->sales->contains($sale))->toBeTrue();
    expect($user->sales->contains($sale))->toBeTrue();
});