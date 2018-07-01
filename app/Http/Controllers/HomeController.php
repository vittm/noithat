<?php
namespace App\Http\Controllers;
use App\User;
use App\Contact;
use DB;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $info_one = DB::table('sliders')->first();
        $info_two = DB::table('infos')->first();
        $process = DB::table('processes')->get();
        $videos = DB::table('clips')->first();
        $types = DB::table('categories')->where('hot','=',1)->get();
        $projects = DB::table('projects')->where('hot','=',1)->get();
        return view('welcome',['info_one'=>$info_one,'info_two'=> $info_two,'process'=>$process,'videos'=>$videos,'types'=>$types,'projects'=>$projects]);            
    }
    public function contact(Request $request){
        $data= ([
            'phone'=> $request->phone,
            'email' => $request->email,
            'name' => $request->name,
            'content' => $request->content,
        ]);
            
        Contact::insert($data);
        return view('thanks');
    }
}