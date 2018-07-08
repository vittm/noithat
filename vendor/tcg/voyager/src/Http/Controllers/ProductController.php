<?php

namespace TCG\Voyager\Http\Controllers;

use Auth;
use DB;
use Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller {

    public function indexProduct(){
        return Voyager::view('voyager::products.edit-add');     
    }
}