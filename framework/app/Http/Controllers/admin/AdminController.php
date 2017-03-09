<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\admin\Sanpham;
use App\admin\ProductType;
use App\myfunction\unicode;


class AdminController extends Controller
{

    public function getDangki(){
        return view("admin.pages.user.signup");
    }
    public function postDangki(Request $request){
        
        $this->validate($request,
            [
                'email'=>'email|required|max:100|unique:users,email,',//users : tên table
                'password'=>'required|min:6|max:30'
            ],
            [
                'email.email'=>'Email chưa đúng định dạng',
                'email.required'=>'Nhập email'
            ]
        );
        $user = new User([
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        return redirect('.');

    }

    public function getDangnhap(){
        if(Auth::check()){
            return redirect('admin/trangchu');
        }
    	return view('admin.pages.user.signin');
    }
    public function postDangnhap(Request $request){
    	$this->validate($request,
    		[
    			'email'=>'email|required',
    			'password'=>'required|min:6|max:30'
    		],
    		[
    			'email.required'=>'Nhập email',
    			'email.email' => 'Email chưa đúng định dạng',
    			'email.min' => 'Email ít nhất 6 kí tự'
			]
		);
        //bien chung thuc nguoi dung
        $credentials = array('email'=> $request->input('email'), 
                            'password' => $request->input('password'));
      // dd($credentials);
		if(Auth::attempt($credentials)){ //kiem tra
			$remember = $request->input('remember');
            if(!empty($remember)){
                Auth::login(Auth::user(), true);
            }
			return redirect('admin/trangchu');
		}
		return redirect()->back();
    }

    public function getDangxuat(){
        Auth::logout();
        return redirect('.');
    }

    public function getProduct(){
        $sanpham = Sanpham::orderBy('id','ASC')->paginate(6);
   // dd($sanpham); exit;
        return view('admin.pages.sanpham.danhsach',['sanpham'=>$sanpham]);
    }

    public function getThemSP(){
        $loaisp = ProductType::all();
        //dd($loaisp);
        return view('admin.pages.sanpham.themsanpham',['loaisp'=>$loaisp]);
    }
    public function postThemSP(Request $req){
      $this->validate($req, 
                          [
                            'image' => 'mimes:jpg,jpeg,bmp,png',
                            'unit_price'=>'numeric'
                          ]);
      if(Input::hasFile('photo')){
          $file = Input::file('photo');
          $destinationPath = 'assets/dest/images/products/';
          $fileName = $file->getClientOriginalName();
          $file->move($destinationPath, $fileName);
      
      $product = new Sanpham(
                            ['name'=> $req->input('name'),
                             'id_type'=> $req->input('type'),
                             'description'=> $req->input('description'),
                             'unit_price'=> $req->input('price'),
                             'promotion_price'=> $req->input('promo_price'),
                             'promotion'=> $req->input('promo'),
                             'image'=> $fileName,
                             'unit'=> $req->input('dvt'),
                             'new_product'=> $req->input('new')?$req->input('new'):0
                             ]);
        $product->save();
        return redirect()->route('themsp');
      }
    }

    public function getUploadFile(){
        return view('admin.pages.uploadfile.');
    }


    public function postUploadFile(Request $req){
        if($req->hasFile('hinh')){
            $file = $req->file('hinh');
            $fileName = $file->getClientOriginalName();

            $hinh = str_random(4).'-'.$fileName;
            echo $hinh;

        }
    }
}
