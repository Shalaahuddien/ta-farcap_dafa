<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    //
   public function index()
   {
    //data dari model food akan di simpan ke variavle data dgn method all akan mengembalikan seluruh data yang ada di dalam tabel food pada database.
    $data=food::all();

    // dd($data);

    // maka jalankan di views home dgn meyertakan data yg di simpan ke hal $data
    // kalo meyertakan data dalam tampilan menggunakan helper function compact akan membuat sebuah array asosiatif 
    //dan bisa di akses pada views dgn menggunakan variable sebagai kuncinya
    return view("home",compact("data"));
   }

   public function redirects()
   {

    $data=food::all();

    $usertype= Auth::user()->usertype;
    
    if($usertype==1)
    {
        return view('admin.adminhome');
    }

        else
        {
            $user_id = Auth::id();

            $count = cart::where('user_id',$user_id)->count();

            return view('home',compact('data','count'));
        }

   }

   public function addcart(Request $request,$id)
   {

    if(Auth::id())
    {
        $user_id = Auth::id();

        $foodid = $id;

        $quantity = $request->quantity;

        $cart = new cart;

        $cart->user_id=$user_id;

        $cart->food_id=$foodid;

        $cart->quantity=$quantity;

        $cart->save();

        // dd($user_id);

        return redirect()->back();
    }

    else
    {
        return redirect('/login');
    }

   }


   //buat function untuk melihat data di keranjang
   public function showcart(Request $request,$id)
   {
    //variable count akan di isi dgn sejumlah data yg ada di table cart pada db yg memiliki field user_id yg sama dgn $id
    //untuk get datanya dapat menggunakan metode $count 
    $count = cart::where('user_id',$id)->count();

    //variable data2 akan diisi dengan data yang ada di dalam tabel cart pada database yang memiliki kolom user_id yang sama dengan $id.
    //untuk mengambil datanya maka meggunakan method get 
    //methode where dan select untuk memfilter data yang diinginkan.
    $data2=cart::select('*')->where('user_id', '=',$id)->get();

    //$data  akan diisi dengan data yang ada di dalam tabel cart pada database yang memiliki kolom user_id yang sama dengan $id, dan juga data dari tabel food yang memiliki kolom id yang sama dengan kolom food_id pada tabel cart.
    $data = cart::where('user_id',$id)->join('food','carts.food_id', '=', 'food.id')->get();

    //views showcart  akan dikembalikan dengan menyertakan data yang disimpan dalam variabel $count, $data, dan $data2.
    //untuk menyertakan data ke dalam viewsnya menggunakan helpeer function helper 'compact'
    return view('showcart',compact('count','data','data2'));
   }


 //buat function untuk menghapus data cart
   public function remove($id)
   {
    //model yg ada di cart akan di simpan ke variable datadan menggunakan methode find
    //methodnya akan di kembalikan data yg memiliki id yg sama dgn parameter yg di berikan $id 
    $data=cart::find($id);

    //data yg di simpan di $data akan di delete meggunakan methode delete
    $data->delete();

    //ketika datanya sdh di hapus maka kembali ke halaman semula
    return redirect()->back();
   }


   public function orderconfirm(Request $request)
   {
       
    //    dd($request);

        if($request->foodname == null ){

                $message = "makanan masih kosong";

                 return redirect()->back();
        }

        foreach($request->foodname as $key =>$foodname)
    {

        $data=new order;

        $data->foodname=$foodname;

        $data->price=$request->price[$key];

        $data->quantity=$request->quantity[$key];

        $data->name=$request->name;

        $data->phone=$request->phone;

        $data->address=$request->address;

        $data->save();
    }

        return redirect()->back();

   }

}
