<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class ListingsController extends Controller
{
    public function index(Request $rq)
    {
        $banner = DB::table('categories')->where('id',$rq->id)->first();
        $product = DB::table('posts')->where('category_id',$banner->id)->get();   
        if($banner->parent_id != null) {
            $categoryParent = DB::table('categories')->where('id',$banner->id)->first(); 
            $category = DB::table('categories')->where('parent_id',$banner->id)->get(); 
        }else {
            $category = DB::table('categories')->where('parent_id',$banner->id)->get();
        }
        return view('listing',['banner'=>$banner,'category'=>$category,'product'=>$product]);            
    }
    public function all()
    {
        $banner = DB::table('categories')->where('slug','san-pham')->first();
        $product = DB::table('posts')->get();   
        if($banner->parent_id != null) {
            $categoryParent = DB::table('categories')->where('id',$banner->id)->first(); 
            $category = DB::table('categories')->where('parent_id',$banner->id)->get(); 
        }else {
            $category = DB::table('categories')->where('parent_id',$banner->id)->get();
        }
        return view('listing',['banner'=>$banner,'category'=>$category,'product'=>$product]);            
    }
    public function detail(Request $rq)
    {
        $product = DB::table('posts')->where('slug',$rq->title)->first();  
        $random = DB::table('posts')->inRandomOrder()->limit('4')->get();   
        return view('detail',['product'=>$product,'random'=>$random]);
    }
}