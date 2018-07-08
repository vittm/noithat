<?php
namespace App\Http\Controllers;
use App\User;
use App\Product;
use DB;
use Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Http\Request;
class WidgetController extends Controller
{
    public function updateImages($name,$request,$slug,$row,$type){
        $images=array();
        switch ($type) {
            case 'images':
                if ($request->hasFile($name)) {
                    $path = $slug.'/'.date('FY').'/';
                    $filename = Str::random(20);
                    $fullPath = $path.$filename.'.'.$row->getClientOriginalExtension();
                    $image = file_get_contents($row);
                    Storage::disk(config('voyager.storage.disk'))->put($fullPath, $image, 'public');
                    return $fullPath;
                }else{
                    return $fullPath=" ";
                }
                break;
            case 'multipleImages':
                if ($files=$request->file($name)) {
                    foreach($files as $row){
                        $path = $slug.'/'.date('FY').'/';
                        $filename = Str::random(20);
                        $fullPath = $path.$filename.'.'.$row->getClientOriginalExtension();
                        $image = file_get_contents($row);
                        Storage::disk(config('voyager.storage.disk'))->put($fullPath, $image, 'public');
                        $images[] = array('data' => $fullPath);
                    }
                    return json_encode($images);
                }else{
                    return $fullPath="";
                }
                break;
        }
    }
    public function updating(Request $request,$id)
    {
        $db = DB::table('products')->where('id','=',$id)->first();
        $db_productive = json_decode($db->productive,JSON_BIGINT_AS_STRING);
        if(!$db_productive){
            foreach ($request->productive_excerpt as $key => $value) {
                $data = array(
                    "price" => $request->productive_price[$key],
                    "description" => $request->productive_excerpt[$key],
                    "images" => $this->updateImages('productive_images_hidden',$request,'products',$request->productive_images[$key],'images'),
                    "contact" => $request->productive_contact[$key],
                    "color" => $request->productive_color[$key]
                );
                $array_productive[] = $data;
            }
        }
        if($db_productive && count($db_productive) > 0){
            if($request->productive_images){
                foreach ($request->productive_images as $keys => $values) {
                    for ($i=0; $i < $db_productive ; $i++) { 
                        $db_productive[$keys]['images'] = $this->updateImages('productive_images',$request,'products',$request->productive_images[$keys],'images'); 
                        break;       
                    }
                }
            }
            if($request->productive_excerpt){
                foreach ($request->productive_excerpt as $keys => $values) {
                    for ($i=0; $i < $db_productive ; $i++) { 
                        $db_productive[$keys]['description'] = $values;
                        break;
                    }
                }
            }
            if($request->productive_price){
                foreach ($request->productive_price as $keys => $values) {
                    for ($i=0; $i < $db_productive ; $i++) { 
                        $db_productive[$keys]['price'] = $values;
                        break;
                    }
                }
            }
            if($request->productive_contact){
                foreach ($request->productive_contact as $keys => $values) {
                    for ($i=0; $i < $db_productive ; $i++) { 
                        $db_productive[$keys]['contact'] = $values;
                        break;
                    }
                }
            }
            if($request->productive_color){
                foreach ($request->productive_color as $keys => $values) {
                    for ($i=0; $i < $db_productive ; $i++) { 
                        $db_productive[$keys]['color'] = $values;
                        break;
                    }
                }
            }
            $array_productive_change = json_encode($db_productive);
        }
        $data= ([
            'title'=> $request->header_title,
            'slug' => $request->header_slug,
            'productive'=> ($db_productive ? $array_productive_change : json_encode($array_productive)),
            'category_id'=> $request->category_id,
            'meta_description'=> $request->meta_description,
            'meta_keywords' => $request->meta_keywords
        ]);
        DB::table('products')->where('id', $id)->update($data);
        return redirect('admin/products');
    }
    public function addting(Request $request){
        foreach ($request->productive_images as $key => $value) {
            $data = array(
                "price" => $request->productive_price[$key],
                "description" => $request->productive_excerpt[$key],
                "images" => $this->updateImages('productive_images',$request,'products',$request->productive_images[$key],'images'),
                "contact" => $request->productive_contact[$key],
                "color" => $request->productive_color[$key]
            );
            $array_productive[] = $data;
        }
    $data= ([
        'title'=> $request->header_title,
        'slug' => $request->header_slug,
        'productive'=> json_encode($array_productive),
        'category_id'=> $request->category_id,
        'meta_description'=> $request->meta_description,
        'meta_keywords' => $request->meta_keywords
    ]);
        
    Product::insert($data);
    return redirect('admin/products');
    }
}