<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Food;

use Illuminate\Support\Facades\Storage;

use App\Models\Critic;

use App\Models\Order;


class AdminController extends Controller
{
    //buat function user yg jadi usrtype = 1
    public function user()
    {
        // seluruh data yg ada di dalam table user pada db akan di simpan ke dalam variable
        //untuk get datanya dapat menggunakan methode all
        $data = user::all();

        //views yg ada di admin.user akan di back dengan menyertakan data yg di simpan dalam variable 
        //untuk bisa menampilkan data menggunakan function compact yang akan membuat array asosiatif dari variable2 yg di berikan sebagai parameter
        return view("admin.users",compact("data"));
    }

    //buat function untuk delete user customer 
     public function deleteuser($id)
    {
        // data yg ada di table user pada db yg memiliki id sama dgn $id akan di simpan ke variable $data
        $data = user::find($id);

        //data yg di simpan ke dlm variable akan di hapus di db dgn methods delete
        $data->delete();

        //sebuah response akan di kembalikan kepada pengguna yg mengarahkan pengguna yg akan mengarahkan pengguna ke hal sebelumnya dgn helper back
        return redirect()->back();
    }

    //buat function untuk delete foodmenu
    public function deletemenu($id)
    {
        //data yg ada di dalam tabel food pada db yg memiliki id  yg sama dgn variable id akan di simpan ke $data
        //untuk mengambil data menggunakan methode find
        $data = food::find($id);

        $data->delete();

        return redirect()->back();

    }

     public function foodmenu()
    {

        //seluruh data yg ada di dalam tabel food pada db akan di save ke dalam $data
        //untuk get data maka ada methode query membuat sebuah instance dari class builder Builder yang dapat digunakan untuk membangun query database. Kemudian, metode get akan mengeksekusi query tersebut dan mengembalikan seluruh hasilnya.
        $data = Food::query()->get();

        // dd($data[0]->title);
        
        // if (count($data) == 0)
        // {
        //     $data=[];
        // }else{
        //     $data=$data->get();
        // }
        
        //views yg ada di admin.foodmenu akan di kembalikan dengan meyertakan data yg di simpan dalam $data
        return view("admin.foodmenu", compact('data'));
    }

    //
    public function updateview($id)
    {
        $data = food::find($id);

        // helper function compact yang akan membuat sebuah array asosiatif dari variabel-variabel yang diberikan sebagai parameter. Array asosiatif tersebut kemudian dapat diakses pada tampilan dengan menggunakan nama variabel sebagai key.
        return view("admin.updateview",compact("data"));
    }

      public function upload(Request $request)
    {
        $data = new food;
        // dd($data);
        
        // $image = $request->image;

        // $imagename=time().'.'.$image->getClientOriginalExtension();

        // $request->image->move('foodimage',$image);

        // $data->image=$imagename;

        $data->image = $request->file('image')->store('foodimage', 'public');

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();

        return redirect()->back();

    }

    public function update(Request $request,$id)
    {
        $data = food::find($id);

        $data->image = $request->file('image')->store('foodimage', 'public');

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->save();

        return redirect()->back();

    }

     public function critic(Request $request)
    {
        
        $data = new critic;

        $data->name=$request->name;

        $data->email=$request->email;

        $data->message=$request->message;

        $data->save();

        return redirect()->back();

    }

    //buat function melihat critic customer
    public function viewcritic()
    {

        //seluruh data yang ada di dalam tabel critic pada db akan di simpan ke dalam $data
        //untuk get datanya memanggil query akan membuat sebuah instance dari class builder. 
        //kemudian method get akan mengeksekusi query tersebut akan mengembalikan seluruh hasilnya
        $data = Critic::query()->get();

        //sebuah views admin.admincritic akan di back dgn menyertakan data yg disimpan dalam variable data
        return view("admin.admincritic",compact("data"));
    }

    //buat function orders data
    public function orders()
    {
        //selurh data yg ada di dalam table order pada db akan di save ke dalam variable data
        $data=order::all();

        //maka jalankan views ke hal admin.orders akan di kembalikan dgn menyertakan data yg di simpan ke variable data
        return view('admin.orders', compact('data'));

    }

    public function search(Request $request)
    {

        $search=$request->search;
        
        $data=order::where('name','Like','%'.$search.'%')->orWhere('foodname','ilike','%'.$search.'%')
        ->get();
        // dd($data);
        return view('admin.orders', compact('data')); 

    }

}
