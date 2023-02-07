<?php

namespace App\Http\Controllers;

use App\Mail\cancelReqMail;
use App\Mail\confirmHire;
use Illuminate\Support\Facades\Mail;
use App\Mail\billMail;
use App\Mail\HiredMail;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\UserPass;
use App\Models\File;
use App\Models\Profession;
use App\Models\City;
use App\Models\Hired;
use App\Models\Hirer;
use App\Models\HireRequest;
use App\Models\HireHistory;
use Session;
use Carbon\Carbon;
use SerializesModels;
use PDF;

class WorkerController extends Controller
{
    public function AddDetails(Request $req)
    {
        $f = File::where('email', $req->email)->first();

        $worker = new Worker();

        $worker->name = $req->name;
        $worker->cnic = $req->cnic;
        $worker->dob = $req->dob;
        $worker->gender = $req->gender;
        $worker->city_id = $req->city;
        $worker->address = $req->address;
        $worker->phone_no = $req->phone_no;
        $worker->email = $req->email;
        $worker->work_address = $req->work_area;
        $worker->work_time = $req->work_time;
        $worker->work_exp = $req->work_exp;
        $worker->profession_id = $req->profession;
        $worker->dp = $f->file_name;

        $worker->save();
       

        $hrw = null;
        $hired= null;
        return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
    }
    public function Delete($email)
    {
        $h = Worker::where('email', $email)->first();
        $a = UserPass::where('email', $h->email)->first();

        Worker::destroy($h->id);
        UserPass::destroy($a->id);
        return view('Main/index');
    }

    public function Uploadfile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,tmp|max:12048',
        ]);
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move('uploads', $fileName);

        // Save File path in the Database
        // ---------------------------------
        $fileWriter = new File;

        $fileWriter->file_name = $fileName;
        $file_path = public_path('uploads\\'.$fileName);
        $fileWriter->file_path = $file_path;
        $fileWriter->email = $request->te;

        $fileWriter->save();
        // ---------------------------------

        $city = City::all();
        $prof = Profession::all();

        return view('Worker/OT', ['worker' => $request->te, 'city' => $city, 'prof' => $prof]);
    }



    public function HISTORY()
    {
        // dd(session('worker')['id']);
        // $HireHistory = HireHistory::where('hirer_id',session('hirer')['id'])->all();
        // dd(session('worker')['id']);
        $HireHistory = HireHistory::where('worker_id', session('worker')['id'])->get();
        // dd($HireHistory->worker->name);
        return view('Worker/history', ["HH" => $HireHistory]);
    }


    public function EXPORT($id)
    {
        $userD = Hirer::find($id);
        // $pdf = PDF::loadView('Hirer/export',compact('userD'));
        // $content = $pdf->download()->getOriginalContent();
        // Storage::put('personalInfo.pdf',$pdf->output());
        // return $pdf->download('personalInfo.pdf');
        // dd('ok');
    }





    public function Lobby()
    {
        $workers = Worker::all();
        return view('Worker/lobby', ['workers' => $workers]);
    }

    public function carpenter()
    {
        $workers = Worker::where('profession_id', 3)->get();
        return view('Worker/lobby', ['workers' => $workers]);
    }
    public function electrician()
    {
        $workers = Worker::where('profession_id', 2)->get();
        return view('Worker/lobby', ['workers' => $workers]);
    }
    public function plumber()
    {
        $workers = Worker::where('profession_id', 1)->get();
        return view('Worker/lobby', ['workers' => $workers]);
    }


    public function Hired($email)
    {
        if (session()->has('hirer') == true) {
            if (Hired::where('hirer_id', session('hirer')['id'])->first() == true) {
                $ah = Hired::where('hirer_id', session('hirer')['id'])->first();
                return view('Hirer/alreadyhired', ['worker' => $ah]);
            } else {
                $worker = Worker::where('email', $email)->first();

                return view('Worker/confirmhire', ['worker' => $worker]);
            }
        } else {
            return redirect('login');
        }
    }

    public function HREQUEST($email)
    {

        $hr = new HireRequest();
        $hr->hirer_id = session('hirer')['id'];
        $wid = Worker::where('email', $email)->first();
        $hr->worker_id = $wid->id;
        $hr->save();

        
        Mail::to($email)->send(new HiredMail($wid,session('hirer')));
        


        return redirect('lobby');
    }

    public function CONFIRMED($email){
        
        $worker = Worker::where('email', $email)->first();
        $worker->status = 1;
        $worker->save();
        
        $hr = HireRequest::where('worker_id',$worker->id)->first();
        $hirer = Hirer::where('id', $hr->hirer_id)->first();
        $hirer->status = 1;
        $hirer->save();

        $h =  new Hired();
        $h->hirer_id = $hirer->id;
        $h->worker_id = $worker->id;
        
        $h->date = Carbon::now()->format('Y-m-d');
        // $h->hired_time = Carbon::now()->format('H:i:m');
        $date = Carbon::now();
        $d = $date->toArray();
        $h->hired_time = $d['minute'];
        $h->save();

        Mail::to($hirer->email)->send(new confirmHire($worker, $hirer));
        HireRequest::destroy($hr->id);
        session()->put('hwr', $worker);

        return redirect('profilew');
    }



    public function REJECT($email){
        $w = Worker::where('email',$email)->first();
        $h = HireRequest::where('worker_id',$w->id)->first();
        // dd($h->hrq->ema);
        Mail::to($h->hrq->email)->send(new cancelReqMail($w, $h->hrq->name));
        HireRequest::destroy($h->id);

        return redirect('profilew');

    }

    public function COMPLETED()
    {
        $tohistory = Hired::where('worker_id', session('worker')['id'])->first();

        $hh = new HireHistory();
        $hh->hirer_id = $tohistory->hirer_id;
        $hh->worker_id = $tohistory->worker_id;
        $hh->date = $tohistory->date;
        $hh->hired_time = $tohistory->hired_time;
        // $hh->completed_time = Carbon::now()->format('H:i:m');
        $date = Carbon::now();
        $d = $date->toArray();
        $hh->completed_time = $d['minute'];
        $b = $d['minute'] - $tohistory->hired_time;
        $Bill = $b*250;
        $hh->bill = $Bill;
        $hh->save();



        // dd('ok');
        $worker = Worker::where('id', $tohistory->worker_id)->first();
        $worker->status = 0;
        $worker->save();

        $hirer = Hirer::where('id', $tohistory->hirer_id)->first();
        $hirer->status = 0;
        $hirer->save();

        Hired::destroy($tohistory->id);


        Mail::to($tohistory->hirer->email)->send(new billMAil($hirer,$worker,$Bill,$b));
        Mail::to($tohistory->worker->email)->send(new billMAil($hirer,$worker,$Bill,$b));
        session()->pull('hwr');
        return redirect('profilew');
    }










    public function profilew()
    {
        $worker = session('worker');
        $hired = Hired::where('worker_id', session('worker')['id'])->first();
        if ($hired != null) 
        {
            $hrw = null;
            
            return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
        } 
        else {
            if(HireRequest::where('worker_id',$worker->id)->first() == true)
            {
                // dd('ok');
                $hrw = HireRequest::where('worker_id',$worker->id)->first();
                $hired = null;
                return view('Worker/workerProfile', ['userD' => $worker, 'hrw' =>$hrw, 'hired' => $hired]);
            }
            else{
                $hrw = null;
                return view('Worker/workerProfile', ['userD' => $worker, 'hired' => $hired, 'hrw' => $hrw]);
            }
        }
    }

    
}
