<?php

namespace App\Http\Controllers;
use Cart;
use Mail;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->name , 'qty' => 1, 'price' => $product->price, 'options' => ['img' => $product->img]]);
        return redirect('cart/show');
    }

    public function getShowCart(){
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        return view('frontend.cart', $data);
    }

    public function getDeleteCart($id){
        if($id == 'all'){
            Cart::destroy();
        }
        else{
            Cart::remove($id);
        }
        return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);

    }

    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total();
        $email = $request->email;
        Mail::send('frontend.email', $data, function ($message) use($email) {
            $message->from('itlaptophn@gmail.com', 'IT Laptop');

            $message->to($email, $email);

            $message->cc('tuananhthemen391997@gmail.com', 'TuanAnh');

            $message->subject('Xác nhận hóa đơn mua hàng IT Laptop');
        });

        Cart::destroy();
        return redirect('complete');
    }

    public function getComplete(){
        return view('frontend.complete');
    }
}
