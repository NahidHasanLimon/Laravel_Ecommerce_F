<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify ($token)
    {
      $user=User::where('remember_token',$token)->first();
      if (!is_null($user)){
        $user->status=1;
        $user->remember_token=null;
        $user->save();
        session()->flash('success','Registration Procedure Successfully Completed');
        return redirect('login');
      }
      else {
          session()->flash('errors','Token Not Matched!Failed To Regestration');
      }

    }
}
