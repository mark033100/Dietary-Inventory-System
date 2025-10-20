<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $groceryProducts = [
            // 🥛 Dairy & Drinks
            'Fresh Milk 1L',
            'Chocolate Milk 250ml',
            'Soy Milk 1L',
            'Yogurt Drink 200ml',
            'Bottled Water 500ml',
            'Sparkling Water 1L',
            'Orange Juice 1L',
            'Apple Juice 1L',
            'Iced Tea 500ml',
            'Coffee Drink 240ml',

            // 🍞 Bread & Bakery
            'Whole Wheat Bread',
            'Pandesal 10pcs',
            'Loaf Bread',
            'Butter Croissant',
            'Cheese Bread',
            'Sugar Donuts 6pcs',
            'Banana Cake Slice',
            'Ensaymada',

            // 🌾 Rice, Grains & Pasta
            'White Rice 5kg',
            'Brown Rice 2kg',
            'Jasmine Rice 10kg',
            'Spaghetti Pasta 1kg',
            'Macaroni Pasta 500g',
            'Instant Noodles Chicken',
            'Instant Noodles Beef',
            'Canton Noodles Pack',

            // 🥫 Canned & Packaged Goods
            'Canned Tuna 155g',
            'Canned Corned Beef 150g',
            'Canned Sardines 155g',
            'Canned Green Peas 400g',
            'Canned Fruit Cocktail 850g',
            'Evaporated Milk 370ml',
            'Condensed Milk 300ml',
            'Canned Mushroom 400g',
            'Canned Pineapple Slices 432g',

            // 🍖 Meat & Frozen
            'Hotdog Pack 1kg',
            'Chicken Nuggets 500g',
            'Frozen Tilapia 1kg',
            'Pork Longganisa 250g',
            'Beef Tapa 500g',
            'Fish Balls 250g',
            'Frozen French Fries 1kg',

            // 🍅 Condiments & Sauces
            'Soy Sauce 500ml',
            'Vinegar 1L',
            'Cooking Oil 1L',
            'Banana Ketchup 320g',
            'Tomato Ketchup 320g',
            'Mayonnaise 470ml',
            'Oyster Sauce 350ml',
            'Fish Sauce 500ml',
            'Hot Sauce 150ml',
            'Peanut Butter 500g',
            'Jam Strawberry 250g',

            // 🍚 Spices & Seasonings
            'Rock Salt 1kg',
            'Iodized Salt 500g',
            'Brown Sugar 1kg',
            'White Sugar 2kg',
            'Black Pepper 100g',
            'Seasoning Granules 250g',
            'Vetsin MSG 250g',

            // 🍪 Snacks
            'Potato Chips 100g',
            'Corn Chips 120g',
            'Chocolate Bar 50g',
            'Wafer Stick 200g',
            'Biscuit Pack 300g',
            'Crackers 200g',
            'Popcorn 100g',
            'Cup Noodles 60g',

            // 🍫 Sweets & Baking
            'All-purpose Flour 1kg',
            'Baking Powder 100g',
            'Cocoa Powder 250g',
            'White Bread Flour 2kg',
            'Sugar Sprinkles 100g',

            // 🧼 Household & Cleaning
            'Laundry Detergent 2kg',
            'Fabric Conditioner 1L',
            'Dishwashing Liquid 500ml',
            'Bath Soap 135g',
            'Shampoo 200ml',
            'Toothpaste 100ml',
            'Toilet Cleaner 500ml',
            'Multi-purpose Cleaner 1L',
            'Air Freshener 300ml',

            // 🧻 Paper & Hygiene
            'Toilet Tissue 6 Rolls',
            'Facial Tissue Box',
            'Paper Towel 2 Rolls',
            'Sanitary Napkin Pack',
            'Cotton Buds 200pcs',
            'Rubbing Alcohol 500ml',

            // 🧃 Other Essentials
            'Instant Coffee 200g',
            'Tea Bags 25s',
            'Sugar-Free Coffee Mix 10s',
            'Energy Drink 350ml',
            'Cooking Oil Refill 1L',
            'Distilled Water 1 Gallon',
        ];

        return [
            'sku' => strtoupper($this->faker->bothify('SKU-#####')), // e.g., SKU-12345
            'barcode' => $this->faker->unique()->numberBetween(1000000, 9999999), // 10-digit barcode
            'name' => $this->faker->randomElement($groceryProducts), // sample product names
            'category' => $this->faker->numberBetween(1, 5), // sample category IDs 1–5
            'unit_qty' => $this->faker->numberBetween(1, 100),
            'unit_id' => $this->faker->randomElement(['pcs', 'box', 'pack', 'bottle']),
            'description' => $this->faker->sentence(10),
            'created_by' => $this->faker->name(),
            'updated_by' => $this->faker->name(),
        ];
    }
}
