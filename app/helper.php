<?php

use App\Models\Category;
use App\Models\Product;

 if(!function_exists('formatProductDescription')) {
    function formatProductDescription($description)
    {
        return strlen($description) > 50 ? substr($description, 0, 50) . '...' : $description;
    }
}

if(!function_exists('formatProductPrice')) {
    function formatProductPrice($price)
    {
        return number_format($price, 2, ',', ' ');
    }
}

if(!function_exists('getCategoryProductNumber')) {
    function getCategoryProductNumber($category)
    {
       $number = Product::where('category_id', $category)->count();
       return $number;
    }
}

if(!function_exists('getCategoryProductPrice')) {
    function getCategoryProductPrice($category)
    {
        $products = Product::where('category_id', $category)->get();
        $total = 0;
        foreach ($products as $product) {
          //convertir en entier
            $total += (int) $product->prix;
        }
        return $total;

    }
}

if(!function_exists('getCategoryType')) {
    function getCategoryType($category)
    {
        $category = Category::where('id', $category)->first();
        $data = $category?->type;
        return $data;
    }
}

if(!function_exists('getFilesPath')) {
    function getFilesPath($path)
    {
        $public_path = 'public/';
        $storage_path = 'storage/';
        $path = str_replace($public_path, $storage_path, $path);
        return $path;
    }

}

if(!function_exists('getUserConnected')) {
    function getUserConnected()
    {
        return auth()->user();
    }
}

if(!function_exists('formatProductName')) {
    function formatProductName($name)
    {
        return strlen($name) > 20 ? substr($name, 0, 20) . '...' : $name;
    }
}
