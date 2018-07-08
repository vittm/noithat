<?php
namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class ListingsController extends Controller
{
    // public function index(Request $rq)
    // {
    //     $banner = DB::table('categories')->where('id',$rq->id)->first();
    //     $product = DB::table('posts')->where('category_id',$banner->id)->get();   
    //     if($banner->parent_id != null) {
    //         $categoryParent = DB::table('categories')->where('id',$banner->id)->first(); 
    //         $category = DB::table('categories')->where('parent_id',$banner->id)->get(); 
    //     }else {
    //         $category = DB::table('categories')->where('parent_id',$banner->id)->get();
    //     }
    //     return view('listing',['banner'=>$banner,'category'=>$category,'product'=>$product]);            
    // }
    public function listing_style()
    {
        $id= DB::table('categories')->where('slug','=','phong-cach')->first();
        $listings = DB::table('categories')->where('parent_id','=',$id->id)->get();  
        return view('style.listing',['listings'=>$listings]);
    }
    public function listing_project()
    {
        $listings = DB::table('projects')->get();  
        return view('project',['listings'=>$listings]);
    }
    public function listing_product()
    {
        $listings = DB::table('categories')->where('parent_id','=',25)->get();  
        return view('product.project',['listings'=>$listings]);
    }
    public function listing_blog()
    {
        $id= DB::table('categories')->where('slug','=','tin-tuc')->first();
        $listingsHot = DB::table('posts')->where([['status','=','PUBLISHED'],['hot','=','1'],['category_id','=',$id->id]])->first();  
        if(isset($listingsHot)){
        $listings = DB::table('posts')->where([['status','=','PUBLISHED'],['id','!=',$listingsHot->id],['category_id','=',$id->id]])->get(); 
        }else {
            $listings = DB::table('posts')->where([['status','=','PUBLISHED'],['category_id','=',$id->id]])->get(); 
        } 
        return view('blog.listing',['listingsHot'=>$listingsHot,'listings'=>$listings]);
    }
    public function listing_rec()
    {
        $id= DB::table('categories')->where('slug','=','tuyen-dung')->first();
        $listingsHot = DB::table('posts')->where([['status','=','PUBLISHED'],['hot','=','1'],['category_id','=',$id->id]])->first();
        if(isset($listingsHot)){
            $listings = DB::table('posts')->where([['status','=','PUBLISHED'],['id','!=',$listingsHot->id],['category_id','=',$id->id]])->get();  
        }else {
            $listings = DB::table('posts')->where([['status','=','PUBLISHED'],['category_id','=',$id->id]])->get();  
        }
        return view('blog.listing',['listingsHot'=>$listingsHot,'listings'=>$listings]);
    }
}