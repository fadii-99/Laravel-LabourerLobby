<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPass;
use App\Models\Hirer;
use App\Models\Hired;
use App\Models\Worker;
use App\Models\City;
use App\Models\file;
use App\Models\Profession;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use App\Mail\OTPmail;
use App\Models\OTP;
use App\Models\HireRequest;
use App\Models\complain;
use session;

class AccountController extends Controller
{
    public function CreateAccount(Request $req)
    {

        $rndm = random_int(100000, 999999);

        $o = new OTP();
        $o->rndm = $rndm;
        $o->email = $req->email;
        $o->user_name = $req->user_name;
        $o->password = $req->password;
        $o->type = $req->type;
        $o->save();

        Mail::to($req->email)->send(new OTPmail($rndm));
      

        return view('Main/chkotp',['user'=>$req]);
    }


    public function AccountLogin(Request $req)
    {

        if ($user = UserPass::where('user_name', $req->user_name)->where('password', $req->pass)->first()) {

            if ($user->type == "hirer") {
                $hirer = Hirer::where('email', $user->email)->first();

                if ($hirer == null) {
                    $city = City::all();
                    session()->put('hirer', $hirer);
                    return view('Hirer/OT', ['hirer' => $user->email, 'city' => $city]);
                } else {
                    session()->put('hirer', $hirer);

                    $hired = Hired::where('hirer_id', $hirer->id)->first();
                    if ($hired == null) {
                        $hired = 0;
                        return view('Hirer/hirerProfile', ['userD' => $hirer, 'hired' => $hired]);
                    } else {
                        return view('Hirer/hirerProfile', ['userD' => $hirer, 'hired' => $hired]);
                    }
                }
            } else //worker
            {
                $worker = Worker::where('email', $user->email)->first();

                session()->put('worker', $worker);
                
                if ($worker == null) {
                    $city = City::all();
                    $prof = Profession::all();
                    return view('Worker/OT', ['worker' => $user->email, 'city' => $city, 'prof' => $prof]);
                } 
                else {
                    
                    $hired = Hired::where('worker_id', session('worker')['id'])->first();
                    if ($hired != null) {
                        $hrw = null;
                        return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
                    } 
                    else {
                        $hrw = HireRequest::all()->where('worker_id', $worker->id)->first();
                        if ($hrw != null) {
                            // $hrw = HireRequest::find($hrw1->worker_id);
                            

                            return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
                        }
                        else {
                            $hrw = null;
                            return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
                        }
                    }
                }
            }
        } else {
            echo "User Name or Password is wrong";
        }
    }



    public function chkOTP(Request $req)
    {
        if(OTP::where('email', $req->email)->where('rndm',$req->otp)->first())
        {
            $o = OTP::where('email',$req->email)->where('rndm',$req->otp)->first();
            $user = new UserPass();

            $user->email = $o->email;
            $user->user_name = $o->user_name;
            $user->password = $o->password;
            $user->type = $o->type;
    
            $user->save();
            Mail::to($req->email)->send(new ConfirmMail($req));
            OTP::destroy($o->id);

            return view('Main/index');
        }
        else
        {
            $o = OTP::where('email',$req->email)->where('otp',$req->otp)->first();
            OTP::destroy($o->id);
            return "OTP is wrong, please signup again";
        }
    }


    public function COMPLAIN(Request $req)
    {
        $cmp = new complain();

        $cmp->complainSubject = $req->complainSubject ;
        $cmp->complainBody = $req->complainBody ;
        if(session()->has('hirer') == true)
        {
            $cmp->email = session('hirer')['email'] ;
        }
        if(session()->has('worker') == true)
        {
            $cmp->email = session('worker')['email'] ;
        }
        $cmp->type = "user" ;
        $cmp->save();
        
        return redirect('index');
    }
    public function COMPLAINOUT(Request $req)
    {
        $cmp = new complain();
        
        $cmp->complainSubject = $req->complainSubject ;
        $cmp->complainBody = $req->complainBody ;
        $cmp->email = $req->email ;
        $cmp->type = "not-user" ;
        $cmp->save();
        
        return redirect('index');
    }









    public function Logout()
    {
        $flag = 0;
        session()->pull('hirer');
        session()->pull('worker');
        return redirect('login');
    }
}
