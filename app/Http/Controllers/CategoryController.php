<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blogs;
use App\Models\category;

class CategoryController extends Controller
{

   public function website(){
        $website = blogs::where('cate_id', 1)->orderBy('created_at', 'desc')->get();
        return view('category.website',compact('website'));
   }
   
   public function mobile(){
        $mobile = blogs::where('cate_id', 2)->orderBy('created_at', 'desc')->get();
        return view('category.mobile',compact('mobile'));
   }
   
   public function technology(){
        $technology = blogs::where('cate_id', 3)->orderBy('created_at', 'desc')->get();
        return view('category.technology',compact('technology'));
   }
   
   public function study(){
        $study = blogs::where('cate_id', 4)->orderBy('created_at', 'desc')->get();
        return view('category.study',compact('study'));
   }
   
   public function career(){
        $career = blogs::where('cate_id', 5)->orderBy('created_at', 'desc')->get();
        return view('category.career',compact('career'));
   }
   
   public function other(){
        $other = blogs::where('cate_id', 6)->orderBy('created_at', 'desc')->get();
        return view('category.other',compact('other'));
   }
   
}
