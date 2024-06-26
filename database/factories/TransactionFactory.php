<?php

namespace Database\Factories;

use App\Models\Buyer;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seller = User::factory()->create();
        $seller = Seller::find($seller->id);

        Product::factory(10)->create([
            'seller_id' => $seller,
        ]);


        $buyer = User::all()->except($seller->id)->random();

        return [
            'quantity' => fake()->numberBetween(1, 3),
            'buyer_id' => $buyer->id,
            'product_id' => fake()->randomElement($seller->products)
        ];
    }
}
