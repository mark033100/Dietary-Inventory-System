<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_categories')->insert([
            // 1. Food Ingredients
            ['name' => 'Vegetables', 'description' => 'Fresh or frozen vegetables (e.g. carrots, cabbage, lettuce)'],
            ['name' => 'Fruits', 'description' => 'Fresh or preserved fruits'],
            ['name' => 'Meat', 'description' => 'Beef, pork, chicken, etc.'],
            ['name' => 'Fish & Seafood', 'description' => 'Fish, shrimp, squid, etc.'],
            ['name' => 'Eggs', 'description' => 'Chicken, quail, duck eggs, etc.'],
            ['name' => 'Dairy Products', 'description' => 'Milk, cheese, butter, cream, etc.'],
            ['name' => 'Grains & Cereals', 'description' => 'Rice, oats, corn, barley, etc.'],
            ['name' => 'Pasta & Noodles', 'description' => 'Spaghetti, macaroni, instant noodles, etc.'],
            ['name' => 'Legumes & Beans', 'description' => 'Mung beans, kidney beans, chickpeas, etc.'],
            ['name' => 'Nuts & Seeds', 'description' => 'Peanuts, cashews, sesame seeds, etc.'],

            // 2. Condiments, Seasonings, and Additives
            ['name' => 'Condiments', 'description' => 'Ketchup, mayonnaise, soy sauce, vinegar'],
            ['name' => 'Spices & Herbs', 'description' => 'Pepper, basil, oregano, garlic powder, etc.'],
            ['name' => 'Sauces', 'description' => 'Oyster sauce, chili sauce, fish sauce, etc.'],
            ['name' => 'Sweeteners', 'description' => 'Sugar, honey, syrup, artificial sweeteners'],
            ['name' => 'Salt & Seasoning Mix', 'description' => 'Table salt, iodized salt, MSG, etc.'],

            // 3. Beverages
            ['name' => 'Water', 'description' => 'Bottled, distilled, mineral'],
            ['name' => 'Juices', 'description' => 'Fruit juices, concentrates'],
            ['name' => 'Soft Drinks', 'description' => 'Carbonated beverages'],
            ['name' => 'Coffee & Tea', 'description' => 'Beans, grounds, instant coffee, tea bags'],
            ['name' => 'Milk Drinks', 'description' => 'Flavored milk, milk teas, etc.'],

            // 4. Bakery & Ready-to-Eat Foods
            ['name' => 'Bread & Pastries', 'description' => 'Loaf bread, pandesal, cakes'],
            ['name' => 'Snacks', 'description' => 'Chips, biscuits, crackers'],
            ['name' => 'Ready-to-Eat Meals', 'description' => 'Canned meals, instant soups'],
            ['name' => 'Desserts', 'description' => 'Pudding, jellies, etc.'],

            // 5. Non-Food Supplies
            ['name' => 'Cleaning Supplies', 'description' => 'Soap, detergent, disinfectants'],
            ['name' => 'Packaging Materials', 'description' => 'Plastic containers, cling wrap'],
            ['name' => 'Kitchen Utensils', 'description' => 'Knives, cutting boards, etc.'],
            ['name' => 'Disposables', 'description' => 'Cups, spoons, forks, plates'],
            ['name' => 'Gas & Fuel', 'description' => 'LPG tanks, charcoal, etc.'],

            // 6. Storage & Miscellaneous
            ['name' => 'Frozen Items', 'description' => 'Frozen meats, vegetables, or fruits'],
            ['name' => 'Canned Goods', 'description' => 'Canned sardines, corn, meatloaf, etc.'],
            ['name' => 'Dry Goods', 'description' => 'Flour, cornstarch, sugar'],
            ['name' => 'Health Supplements', 'description' => 'Vitamins, protein powder'],
            ['name' => 'Miscellaneous', 'description' => 'Items not classified elsewhere'],
        ]);
    }
}
