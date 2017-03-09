<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Products;
use Session;
use Schema;
class ProductsController extends Controller
{
    public function getAllProduct(){
    	$products = Products::all();
    	return view('pages.detail',compact('products'));
    }


    public function getXinchao(){
      echo 'Xin chào các bạn';
    }


    public function getRoute(){
    //tra ve url
      return route('route1');

      //tra ve dulieu
      return redirect()->route('route1');
    }


    ////////////use Illuminate\Http\Request;

    public function getData(Request $req){
      //1
    //  echo $req->path();
    //2
    //  echo $req->url();
    //3
      // if($req->isMethod('post')){
      //   echo 'Phương thức post';
      // }
      // else {
      //   echo 'ko phải phương thức post';
      // }
      //4
      if($req->is('goi*')){
        echo 'có goi';
      }
      else {
        echo 'ko có goi';
      }
    }

    public function getForm(){
      return view('php1-11.welcome');
    }

    public function postForm(Request $req){
      echo $req->hoten;
      echo '<br>';
      if($req->has('tuoi')){
        echo 'có gửi biến tuoi, tuoi la: '.$req->tuoi;
      }
      else {
        echo 'ko có gửi biến tuoi';
      }
    }
    //App\Http\Controllers\Response
     public function setCookie(){
        $response = new Response;
        $response->withCookie('hoten', 'Laravel Khoa Pham',0.1);
        return $response;
      }
     public function getCookie(Request $request){
       return $request->cookie('hoten');
     }

    public function getJson(){
      $array = ['PHP','Android','iOS'];
      return response()->json($array);
    }



    //upload File
    public function getUpload(){
      return view('php1-11.uploadfile');
    }

    public function postUpload(Request $req){
      if($req->hasFile('file')){
      //  echo 'đã chọn file';
        $image = $req->file;
        if($image->getSize() > 3000000){
            echo 'file quá lớn';
        }
        else{
          $fileType = array('png','jpg');
          $flag = 1;
          $check = 1;
          $ex = $image->getClientOriginalExtension();
          foreach($fileType as $type){
            if($type==$ex){
              $flag = $flag+1;
            }
          }
          if($flag == $check){
            echo 'file ko đúng dịnh dạng';
          }
          else{
            $filename  =  $image->getClientOriginalName().'-'.time() . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/img',$filename);
            echo 'upload thành công';
          }
        }
      }
      else{
        echo 'Chưa chọn file';
      }

    }

    public function getDieuKien(){
      $mon_hoc = array('php', 'ios', 'Android');
      $so_a = 1;
      return view('php1-11.caudieukien',['mon_hoc'=>$mon_hoc,'so_a'=>$so_a]);
    }

    public function getKiemtra(){
      return view('php1-11.middleware');
    }

    public function postKiemtra(Request $req){
      echo $req->tuoi;

    }

    public function setSession(){
      Session::put(['khoahoc'=>'Laravel','giangvien'=>'KhoaPham']);
      echo 'đã có session';
      if(Session::has('khoahoc')){
        echo Session::get('khoahoc');
      }
      if(Session::has('giangvien')){
        echo Session::get('giangvien');
      }
    }
    public function forgetSession(){
      if(Session::has('khoahoc')){
        Session::forget('khoahoc');
        echo 'đã xóa session khoahoc';
        echo Session::get('khoahoc');
        echo Session::get('giangvien');
      }
    }

    public function createTable(){
      Schema::create('loaisanpham', function ($table) {
        $table->increments('id');
        $table->string('ten')->nullable();
        $table->string('nhasanxuat', 45)->default('Sony');
      });
    }
    public function lienketTable(){
      Schema::create('sanpham', function ($table) {
        $table->increments('id');
        $table->integer('ten')->nullable();
        $table->float('gia')->default('0');
        $table->integer('id_loai')->unsigned();
        $table->foreign('id_loai')->references('id')->on('loaisanpham');
      });
    }

    //Schema::create tạo bảng
    //Schema::table: sửa bàng
    //Schema::rename: đổi tên Schema::rename('tengoc','tencandoi')
}
