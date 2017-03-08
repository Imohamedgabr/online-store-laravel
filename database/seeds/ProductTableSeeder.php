<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        		'imagePath'=>'http://prodimage.images-bn.com/pimages/9781338099133_p0_v5_s1200x630.jpg',
        		'title'=>'Harry Potter',
        		'description'=>'this is so wonderful as you really need to check it out',
        		'price'=>20
        	]);
        $product->save();

        $product = new \App\Product([
        		'imagePath'=>'http://www.livehappy.com/sites/default/files/happiness%20equation-250.jpg',
        		'title'=>'The happiness equation',
        		'description'=>'this is one of the best sales of 2016 books',
        		'price'=>30
        	]);
        $product->save(); 

        $product = new \App\Product([
        		'imagePath'=>'https://s1.nyt.com/du/books/images/9780062320247.jpg',
        		'title'=>'The black widow',
        		'description'=>'this book is so famous',
        		'price'=>20
        	]);
        $product->save();

        $product = new \App\Product([
        		'imagePath'=>'https://s-media-cache-ak0.pinimg.com/564x/65/11/ef/6511ef261ebf81426292309ae4f4707a.jpg',
        		'title'=>'Since she went away',
        		'description'=>'this book is so romantic',
        		'price'=>55
        	]);
        $product->save();

        $product = new \App\Product([
                'imagePath'=>'https://s1.nyt.com/du/books/images/9780062320247.jpg',
                'title'=>'The Awesome Challenger',
                'description'=>'this book is so wonderful',
                'price'=>45
            ]);
        $product->save();

        $product = new \App\Product([
                'imagePath'=>'http://www.livehappy.com/sites/default/files/happiness%20equation-250.jpg',
                'title'=>'The drama queen',
                'description'=>'this is one of my amazing books check it out',
                'price'=>19
            ]);
        $product->save(); 

        $product = new \App\Product([
                'imagePath'=>'http://prodimage.images-bn.com/pimages/9781338099133_p0_v5_s1200x630.jpg',
                'title'=>'The purpose',
                'description'=>'You really have to check this book out',
                'price'=>75
            ]);
        $product->save();

        $product = new \App\Product([
                'imagePath'=>'https://s-media-cache-ak0.pinimg.com/564x/65/11/ef/6511ef261ebf81426292309ae4f4707a.jpg',
                'title'=>'The journey',
                'description'=>'This is a magic book ',
                'price'=>90
            ]);
        $product->save();
    }
}
