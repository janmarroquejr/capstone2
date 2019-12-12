<?php

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => 6,
                'name' => 'Seafood Platter',
                'price' => 3588,
                'description' => 'Assorted seafood.',
                'image_path' => 'images/seafood.jpeg',
                'category_id' => 1,
                'created_at' => '2019-12-11 00:01:38',
                'updated_at' => '2019-12-12 01:28:42',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'Steak Fries',
                'price' => 298,
                'description' => 'Steak fries!!',
                'image_path' => 'images/steakfries.jpeg',
                'category_id' => 3,
                'created_at' => '2019-12-11 00:03:13',
                'updated_at' => '2019-12-11 00:03:13',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'Jumbo Shrimp Cocktail',
                'price' => 878,
                'description' => 'BIG',
                'image_path' => 'images/shrimp.jpeg',
                'category_id' => 1,
                'created_at' => '2019-12-11 00:03:48',
                'updated_at' => '2019-12-11 00:03:48',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'Ribeye Steak',
                'price' => 6688,
                'description' => 'HEAVY',
                'image_path' => 'images/ribeye.jpeg',
                'category_id' => 2,
                'created_at' => '2019-12-11 00:04:09',
                'updated_at' => '2019-12-11 00:04:09',
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'Pecan Pie',
                'price' => 348,
                'description' => 'Light lang.',
                'image_path' => 'images/pecanpie.jpeg',
                'category_id' => 4,
                'created_at' => '2019-12-11 00:04:58',
                'updated_at' => '2019-12-11 00:04:58',
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'Onion Rings',
                'price' => 268,
                'description' => 'Nice pulutan',
                'image_path' => 'images/onionrings.jpeg',
                'category_id' => 3,
                'created_at' => '2019-12-11 00:05:25',
                'updated_at' => '2019-12-11 00:05:25',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'Filet Mignon',
                'price' => 3888,
                'description' => 'THICC',
                'image_path' => 'images/mignon.jpeg',
                'category_id' => 2,
                'created_at' => '2019-12-11 00:05:54',
                'updated_at' => '2019-12-11 00:05:54',
            ),
            7 => 
            array (
                'id' => 13,
                'name' => 'Mezcal Mule',
                'price' => 498,
                'description' => 'Take it easy.',
                'image_path' => 'images/mezcalmule.jpeg',
                'category_id' => 5,
                'created_at' => '2019-12-11 00:06:19',
                'updated_at' => '2019-12-11 00:06:28',
            ),
            8 => 
            array (
                'id' => 14,
                'name' => 'Mexican Sundae',
                'price' => 348,
                'description' => 'Take a guess why it\'s Mexican.',
                'image_path' => 'images/mexicansundae.jpeg',
                'category_id' => 4,
                'created_at' => '2019-12-11 00:07:23',
                'updated_at' => '2019-12-11 00:07:23',
            ),
            9 => 
            array (
                'id' => 15,
                'name' => 'Mashed Potato',
                'price' => 398,
                'description' => 'CHEESY',
                'image_path' => 'images/mashed.jpeg',
                'category_id' => 3,
                'created_at' => '2019-12-11 00:08:06',
                'updated_at' => '2019-12-11 00:08:06',
            ),
            10 => 
            array (
                'id' => 16,
                'name' => 'Lobster Mac & Cheese',
                'price' => 598,
                'description' => 'EXTRA CHEESY',
                'image_path' => 'images/lobstermac.jpeg',
                'category_id' => 3,
                'created_at' => '2019-12-11 00:08:27',
                'updated_at' => '2019-12-11 00:08:27',
            ),
            11 => 
            array (
                'id' => 17,
                'name' => 'Lemongrass Mojito',
                'price' => 500,
                'description' => 'Relax...',
                'image_path' => 'images/lemongrassmojito.jpeg',
                'category_id' => 5,
                'created_at' => '2019-12-11 00:08:54',
                'updated_at' => '2019-12-11 00:08:54',
            ),
            12 => 
            array (
                'id' => 18,
                'name' => 'Lamb Chops',
                'price' => 4088,
                'description' => 'CHOPS!',
                'image_path' => 'images/lamb.jpeg',
                'category_id' => 2,
                'created_at' => '2019-12-11 00:09:15',
                'updated_at' => '2019-12-11 00:09:15',
            ),
            13 => 
            array (
                'id' => 19,
                'name' => 'Seasonal Cobbler',
                'price' => 408,
                'description' => 'Idk what\'s in this',
                'image_path' => 'images/cobbler.jpeg',
                'category_id' => 4,
                'created_at' => '2019-12-11 00:09:37',
                'updated_at' => '2019-12-11 00:09:37',
            ),
            14 => 
            array (
                'id' => 20,
            'name' => 'Beluga Caviar (Russian)',
                'price' => 40000,
                'description' => 'Literally fish eggs....',
                'image_path' => 'images/caviar.jpeg',
                'category_id' => 1,
                'created_at' => '2019-12-11 00:10:11',
                'updated_at' => '2019-12-11 00:10:11',
            ),
            15 => 
            array (
                'id' => 25,
                'name' => 'test5',
                'price' => 123,
                'description' => 'dawdsdwd',
                'image_path' => 'images/10346197_301433440059397_4019397477820374782_n1.jpg',
                'category_id' => 1,
                'created_at' => '2019-12-12 05:18:56',
                'updated_at' => '2019-12-12 05:18:56',
            ),
        ));
        
        
    }
}