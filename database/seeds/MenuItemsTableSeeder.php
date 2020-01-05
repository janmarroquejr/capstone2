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
                'id' => 29,
                'name' => 'Lobster Bisque',
                'price' => 365,
                'description' => 'Poached lobster, shellfish oil, tomato herb crouton, and emmental herb brioche',
                'image_path' => 'images/bisque.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 06:12:27',
                'updated_at' => '2020-01-05 06:12:27',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 30,
                'name' => 'Mushroom Cappuccino',
                'price' => 290,
                'description' => 'Grilled brioche, truffle oil, and chives.',
                'image_path' => 'images/mush.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 06:13:31',
                'updated_at' => '2020-01-05 06:13:31',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 31,
                'name' => 'French Onion Soup',
                'price' => 230,
                'description' => 'Gratinated gruyere cheese and herb crostini.',
                'image_path' => 'images/frenchonion.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 06:42:00',
                'updated_at' => '2020-01-05 06:42:00',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 42,
                'name' => 'Seafood Soup',
                'price' => 320,
                'description' => 'With fennel tomato broth, lemon, basil oil, and toasted croutons.',
                'image_path' => 'images/seafoodsoup.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 07:44:12',
                'updated_at' => '2020-01-05 07:44:12',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 44,
                'name' => 'Smoked Tomato Soup',
                'price' => 285,
                'description' => 'With cheese bread.',
                'image_path' => 'images/smoked.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 07:49:40',
                'updated_at' => '2020-01-05 07:49:40',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 45,
                'name' => 'Chilled Jumbo Prawns',
                'price' => 650,
                'description' => 'Sun-dried tomato pesto, chili, and avocado puree.',
                'image_path' => 'images/chilledprawns.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 07:51:44',
                'updated_at' => '2020-01-05 07:51:44',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 46,
                'name' => 'Broiled Oyster Thermidor',
                'price' => 495,
                'description' => 'With garlic parmesan butter, fresh lemons, and fleur de sel.',
                'image_path' => 'images/oyster.jfif',
                'category_id' => 1,
                'created_at' => '2020-01-05 07:52:51',
                'updated_at' => '2020-01-05 07:52:51',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 51,
                'name' => 'Signature Tomahawk',
                'price' => 7500,
                'description' => 'USDA Prime Angus Bone-in Rib, grilled asparagus, mushroom, tomato parmesan and truffle potato gratin, served with signature sauces.',
                'image_path' => 'images/tomahawk.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:02:52',
                'updated_at' => '2020-01-05 08:02:52',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 52,
                'name' => 'Signature Steak Platter',
                'price' => 4600,
                'description' => 'USDA Angus Prime Ribeye, wagyu hanger and striploin with spinach potato gratin and souteed haricot vert and mushroom served with signature sou ces',
                'image_path' => 'images/angusprime.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:04:06',
                'updated_at' => '2020-01-05 08:04:06',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 53,
                'name' => 'Herb Garlic Grilled Chicken',
                'price' => 2500,
                'description' => 'Served with bacon fried rice.',
                'image_path' => 'images/herbchicken.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:07:01',
                'updated_at' => '2020-01-05 08:07:01',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 54,
                'name' => 'Grilled Mixed Seafood',
                'price' => 3250,
                'description' => 'Grilled prawns, salmon, tuna, mahi-mahi, squid, and mussels, served with corn, vegetables, rice and sauces.',
                'image_path' => 'images/grilledseafood.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:08:31',
                'updated_at' => '2020-01-05 08:08:31',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 55,
                'name' => 'Wagyu Hanger Steak',
                'price' => 1300,
                'description' => '200g Snake River Farms Hanger Steak',
                'image_path' => 'images/wagyuhanger.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:11:07',
                'updated_at' => '2020-01-05 08:11:16',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 56,
                'name' => 'USDA New York Striploin',
                'price' => 1350,
                'description' => '200g USDA Angus Striploin Steak',
                'image_path' => 'images/newyork.jfif',
                'category_id' => 2,
                'created_at' => '2020-01-05 08:11:54',
                'updated_at' => '2020-01-05 08:11:54',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 61,
                'name' => 'Mashed Potatoes',
                'price' => 185,
                'description' => 'Mashed potatoes',
                'image_path' => 'images/mashed.jfif',
                'category_id' => 3,
                'created_at' => '2020-01-05 08:40:34',
                'updated_at' => '2020-01-05 08:40:34',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 62,
                'name' => 'Grilled Vegetables',
                'price' => 190,
                'description' => 'Mixed grilled vegetables.',
                'image_path' => 'images/grilledveggies.jfif',
                'category_id' => 3,
                'created_at' => '2020-01-05 08:43:48',
                'updated_at' => '2020-01-05 08:43:48',
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 63,
                'name' => 'Truffle Mac & Cheese',
                'price' => 230,
                'description' => 'Truffle mac and cheese.',
                'image_path' => 'images/macandcheese.jfif',
                'category_id' => 3,
                'created_at' => '2020-01-05 08:44:14',
                'updated_at' => '2020-01-05 08:44:14',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 64,
                'name' => 'Short Rib Fried Rice',
                'price' => 230,
                'description' => 'Short rib fried rice.',
                'image_path' => 'images/ribfriedrices.jfif',
                'category_id' => 3,
                'created_at' => '2020-01-05 08:45:36',
                'updated_at' => '2020-01-05 08:45:36',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 65,
                'name' => 'Plain White Rice',
                'price' => 85,
                'description' => 'Plain rice.',
                'image_path' => 'images/plainrice.jfif',
                'category_id' => 3,
                'created_at' => '2020-01-05 08:46:28',
                'updated_at' => '2020-01-05 08:46:28',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 66,
                'name' => 'Chocolate Marquise',
                'price' => 375,
                'description' => 'Soft chocolate mousse with vanilla english cream and pistachio bits.',
                'image_path' => 'images/chocolatemarquis.jfif',
                'category_id' => 4,
                'created_at' => '2020-01-05 08:49:27',
                'updated_at' => '2020-01-05 08:49:27',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 67,
                'name' => 'Espresso Creme Brulee',
                'price' => 225,
                'description' => 'With pistachio financier',
                'image_path' => 'images/cremebrulee.jfif',
                'category_id' => 4,
                'created_at' => '2020-01-05 08:50:00',
                'updated_at' => '2020-01-05 08:50:00',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 68,
                'name' => 'Assorted Pralines',
                'price' => 340,
                'description' => 'Chocolates',
                'image_path' => 'images/assortedpralines.jfif',
                'category_id' => 4,
                'created_at' => '2020-01-05 08:50:34',
                'updated_at' => '2020-01-05 08:50:34',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 69,
                'name' => 'Fresh Fruit Plate',
                'price' => 195,
                'description' => 'Mixed fruits.',
                'image_path' => 'images/freshfruitplate.jfif',
                'category_id' => 4,
                'created_at' => '2020-01-05 08:51:04',
                'updated_at' => '2020-01-05 08:51:04',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 70,
                'name' => 'Cline Pinot Noir',
                'price' => 5625,
                'description' => 'Sonoma Coast, California, USA',
                'image_path' => 'images/cline.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:55:28',
                'updated_at' => '2020-01-05 08:55:28',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 71,
                'name' => 'Calera Pinot Noir',
                'price' => 7300,
                'description' => 'Centra Coast, California, USA',
                'image_path' => 'images/calera.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:55:57',
                'updated_at' => '2020-01-05 08:55:57',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 72,
                'name' => 'Bread And Butter Pinot Noir',
                'price' => 4645,
                'description' => 'Napa Valley, California, USA',
                'image_path' => 'images/breadandbutter.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:56:37',
                'updated_at' => '2020-01-05 08:56:37',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 73,
                'name' => 'Altos Las Hormigas Melbec',
                'price' => 3430,
                'description' => 'Mendoza, Argentina',
                'image_path' => 'images/altos.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:58:04',
                'updated_at' => '2020-01-05 08:58:04',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 74,
                'name' => 'Callaway Merlot',
                'price' => 2983,
                'description' => 'Napa Valley, California, USA',
                'image_path' => 'images/callaway.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:58:43',
                'updated_at' => '2020-01-05 08:58:43',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 75,
                'name' => 'Softdrink In Can',
                'price' => 75,
                'description' => 'Softdrinks',
                'image_path' => 'images/softdrinks.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:59:14',
                'updated_at' => '2020-01-05 08:59:14',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 76,
                'name' => 'Bottled Water',
                'price' => 30,
                'description' => 'Water',
                'image_path' => 'images/bottledwater.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:59:31',
                'updated_at' => '2020-01-05 08:59:31',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 77,
                'name' => 'Moet And Chandon',
                'price' => 7500,
                'description' => 'Moet and Chandon',
                'image_path' => 'images/moetandchandon.jfif',
                'category_id' => 5,
                'created_at' => '2020-01-05 08:59:59',
                'updated_at' => '2020-01-05 08:59:59',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}