<?php namespace App\Controller;

use App\Models\Products;
use App\{View};

/**
 * Class Shop
 * @package App\Controller
 */
class Shop
{
    /**
     * @param $request
     */
    public function index($request)
    {
        $products = Products::connect()->all();
        View::render('shop', compact('products'));
    }

    /**
     * @param $request
     */
    public function productPage($request)
    {
        $id = $request->id;
        //
    }

    /**
     * @param $request
     */
    public function addToCart($request)
    {
        $id = $request->id;
        //
    }

    /**
     * @param $request
     */
    public function addNewProduct($request)
    {
        //
    }

    /**
     * @param $request
     */
    public function updateProduct($request)
    {
        //
    }
}