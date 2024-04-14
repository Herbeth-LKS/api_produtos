<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function create(Request $request) {
        $product = new Product();
        $product->code = $request->input('code');
        $product->name = $request->input('name');
        $product->description =$request->input('description');
        $product->value = $request->input('value');
        $product->quantity = $request->input('quantity');
        $product->save();

        return response()->json($product);
    }

    public function index() {
        $product = Product::all();
        return response()->json($product);
    }

    public function update(Request $request,$code) {
        $product = Product::where('code', $code)->first();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->value = $request->input('value');
        $product->quantity = $request->input('quantity');
        $product->save();

        return response()->json($product);
    }

    public function delete($code) {
        $product = Product::where('code', $code)->first();
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function decrementStock(Request $request, $code) {
        $product = Product::where('code', $code)->first();
        $quantityToDecrement =  $request->input('quantity');

        if ($product->quantity >= $quantityToDecrement) {
            $product->quantity -= $quantityToDecrement;
            $product->save();
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Insufficient stock'], 400);
        }
    }

}