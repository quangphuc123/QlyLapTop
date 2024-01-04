<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /*public function addToCart(Request $request){
        $input=$request->all();
        $cart=Cart::create($input);
        return redirect()->route('cart-view');
    }

    public function view(Cart $cart){
        return view('cart',compact('cart'));
    }*/
    public function addToCart($id){
        //session()->flush('cart');
        $product=Product::find($id);
        $cart=session()->get(key:'cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity']=$cart[$id]['quantity']+1;
        } else {
            $cart[$id]=[
                'name'=>$product->name,
                'image'=>$product->image,
                'price'=>$product->price,
                'quantity'=>1
            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code'=>200,
            'message'=>'success',
        ],status:200);
        //echo"<pre>";
        //print_r(session()->get(key:'cart'));
    }

    public function showCart(){
        $carts=session()->get(key:'cart');
        return view('user.cart.cart',compact('carts'));
    }

    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $carts=session()->get(key:'cart');
            $carts[$request->id]['quantity']=$request->quantity;
            session()->put('cart',$carts);
            $carts=session()->get(key:'cart');
            $cartComponent=view('cart',compact('carts'))->render();
            return response()->json(['cart'=>$cartComponent,'code'=>200],status:200);
        }
    }

    public function deleteCart(Request $request){
        if($request->id){
            $carts=session()->get(key:'cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            $carts=session()->get(key:'cart');
            $cartComponent=view('cart',compact('carts'))->render();
            return response()->json(['cart'=>$cartComponent,'code'=>200],status:200);
        }
    }

    public function deleteCartAll(){
        session()->flush('cart');
        $carts=session()->get(key:'cart');
        return redirect()->route('cart-view',compact('carts'))->with('success', 'Xóa giỏ hàng thành công');
    }

    public function checkOut(){
        $carts = session()->get(key:'cart');
        if(!is_null($carts)){
        return view('user.auth.check-out',compact('carts'));
        } else {
            return back()->with('error', 'Giỏ hàng của bạn đang trống');
        }
    }

    public function post_checkOut(Request $req){
        $carts = session()->get(key:'cart');
        $req->validate([
            'name',
            'email',
            'phone',
            'address',
        ]);
        $data = $req->only(
            'name',
            'email',
            'phone',
            'address',
            'order_id'
        );
        $data['user_id'] = Auth::user()->id;
        if($order = Order::create($data)){
            foreach($carts as $id => $car){
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'price' => $car['price'],
                    'name' => $car['name'],
                    'quantity' => $car['quantity'],
                ];
                OrderDetail::create($data1);
            }
            session()->flush('cart');
            $carts=session()->get(key:'cart');
        }
    }
}
