<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $slides = DB::table('sliders')->get();
        $specials = DB::table('specials')->get();
        $products = DB::table('posts')->orderBy('id','desc')->limit('8')->get();
        $categories = DB::table('categories')->where('parent_id','2')->get();
        return view('welcome',['slides'=>$slides,'specials'=> $specials,'products'=>$products,'categories'=>$categories]);            
    }
}