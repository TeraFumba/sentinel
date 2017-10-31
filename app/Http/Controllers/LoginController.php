<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public  function  login()
    {
        return view('authentication.login');
    }
    public  function postLogin(Request $request)
    {
       try
       {
           if(Sentinel::authenticate($request->all()))
           {
               if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                   return redirect('/earnings');
               elseif(Sentinel::getUser()->roles()->first()->slug == 'manager')
                   return redirect('/tasks');
               //dd($request->all());
           }
           else{
               return redirect()->back()->with(['error'=> 'wrong credentials']);
           }
       }
       catch (ThrottlingException $e)
       {
            $delay = $e->getDelay();

           return redirect()->back()->with(['error'=> "You are Banned for $delay Seconds. "]);
       }
       catch (NotActivatedException $e)
       {
           return redirect()->back()->with(['error'=> 'Your account is not activated!']);
       }

    }


    public  function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
