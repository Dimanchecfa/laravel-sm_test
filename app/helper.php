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

if(!function_exists('generateProductNames')) {
    function generateProductNames()
    {
        $names = [
            'Pomme',
            'Banane',
            'Orange',
            'Citron',
            'Poire',
            'Fraise',
            'Mangue',
            'Pamplemousse',
            'Melon',
            'Ananas',
            'Kiwi',
            'Pêche',
            'Abricot',
            'Figue',
            'Cerise',
            'Raisin',
            'Noix',
            'Noisette',
            'Amande',
            'Pistache',
            'Noix de coco',
        ];
        return $names;
    }
}

if(!function_exists('generateProductDescriptions')) {
    function generateProductDescriptions()
    {
        $descriptions = [
            'Produits de tres bonne qualite avec un vitaminage optimal pour la sante',
            'Produits de tres bonne qualite avec 40% de vitamines et 60% de mineraux',
            'Produits de tres bonne qualite avec 60% de vitamines et 40% de mineraux',
            'Produits de tres bonne qualite avec 80% de vitamines et 20% de mineraux et 10% de proteines',
            'Produits de tres bonne qualite avec 20% de vitamines et 80% de mineraux et 50% de proteines',
            'Produits de tres bonne qualite avec 10% de vitamines et 90% de mineraux et 50% de proteines',
            'Produits de tres bonne qualite avec 90% de vitamines et 10% de mineraux et qui soigne les maladies',
            'Produits de tres bonne qualite avec 50% de vitamines et 50% de mineraux et qui soigne les maladies',
        ];
        return $descriptions;
    }
}

if(!function_exists('generateProductPrices')) {
    function generateProductPrices()
    {
        $prices = [
            '1000',
            '2000',
            '3000',
            '4000',
            '5000',
            '6000',
            '7000',
            '8000',
            '9000',
            '10000',
            '11000',
            '12000',
            '13000',
            '14000',
            '15000',
        ];
        return $prices;
    }
}
