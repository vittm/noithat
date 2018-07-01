<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class DetailController extends Controller
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
    public function listing_style_detail(Request $rq)
    {
        $id= DB::table('categories')->where('slug','=',$rq->slug)->first();
        $detail= DB::table('types')->where('category_id','=',$id->id)->get();  
        return view('style.detail',['detail'=>$detail]);
    }
    public function blog(Request $rq)
    {
        $detail= DB::table('posts')->where('slug','=',$rq->slug)->first();  
        return view('blog.detail',['detail'=>$detail]);
    }
}