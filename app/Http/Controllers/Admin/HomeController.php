<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
class HomeController extends Controller
{
    //

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d  ');
    }
    
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d  ');
    }

    public function index(){
        
        $lastpost = Post::where('user_id', '=', auth()->user()->id)
        ->latest('id')
        ->first();
      
        if(!empty($lastpost)){

            $fecha = $this->getCreatedAtAttribute($lastpost->created_at);
            return view('admin.index', compact('lastpost' ,'fecha'));
        }else{
            return view('admin.index');
        }

      
            
        
   
        // $userlastpost = User::where('id' , '=' , $lastpost->user_id);
       
       
        // return $user;
        

      
       
    }
}
