<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addTocart($id){
        $item=Item::find($id);
        // dd($item);
        if(!$item)
        {
            return redirect()->back()->with('error','No item found.');;
        }
        $cartExist=session()->get('cart');
        
        
        if(!$cartExist) {
            //case 01: cart is empty.
            //  action: add product to cart
            $cartData = [
                $id => [
                    'item_id'=>$item->id,
                    'no_of_item'=> request()->quantity,
                    'name' => $item->name,
                    'price' => $item->price,
                    'product_qty' => 1,
                    'total_price' =>$item->price*1,
                    
                ]
            ];
            session()->put('cart', $cartData);
            return redirect()->back()->with('message', 'Item Added to Cart.');
        }
        //case 02: cart is not empty. but product does not exist into the cart
        //action: add different product with quantity 1
//        dd(isset($cartExist[$id]));

        if(!isset($cartExist[$id]))
        {
            $cartExist[$id] = [
                'item_id'=>$item->id,
                 'no_of_item'=> request()->quantity,
                'name' => $item->name,
                'price' => $item->price,
                'product_qty' => 1,
                'total_price' =>$item->price*1,
            ];

            session()->put('cart', $cartExist);

            return redirect()->back()->with('message', 'Item Added to Cart.');
        }


        //case 03: product exist into cart
        //action: increase product quantity (quantity+1)

        $cartExist[$id]['product_qty']++;
        $cartExist[$id]['total_price'] = $cartExist[$id]['price']*$cartExist[$id]['product_qty'] ;

      session()->put('cart', $cartExist);

      return redirect()->back()->with('message', 'Item Added to Cart.');

    }
     
    public function updateCart(Request $request){
        // dd($request->all());    
        $id= $request->input('cart_id');
        // dd($id);
        $cart = session('cart');
        
        $product_quantity = Stock::where('stock_item',$id)->first();
        // dd($product_quantity);
        if ($request->qty > $product_quantity->stock_quantity) {
            return redirect()->route('admin.pos')->with('error', 'Out of Stock...Sorry!!');
        }
        else {
            $cart[$id]['product_qty'] = $request->input('qty');
            $cart[$id]['no_of_item'] = $request->input('no_of_item');
            $cart[$id]['total_price'] = $request->input('qty')*$cart[$id]['price'];
            session()->put('cart', $cart);
            $product_quantity->update([
                'stock_quantity'=>$product_quantity->stock_quantity - $request->no_of_item
            ]);
            return redirect()->back();

        }

    }

    public function getCart()
    {
        
       $carts= session()->get('cart');
        return view('admin.pages.pos',compact('carts'));
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('message','Cart cleared successfully.');

    }
    public function updatequantity(Request $request)
    {
        $id= $request->input('cart_id');
        $cart = session('cart');
        $quantity = Item::find($id);
        if ($request->quantity) {
            return redirect()->route('product.cart');
        }
        else {
            $cart[$id]['quantity'] = $request->input('quantity');
            // $cart[$id]['total_price'] = $request->input('qty')*$cart[$id]['price'];
            session()->put('cart', $cart);
            return redirect()->back();
        }
        

    }
    
    
}
