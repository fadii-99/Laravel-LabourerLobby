<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\UserPass;
use App\Models\Hirer;
use App\Models\Hired;
use App\Models\HireHistory;
use App\Models\Worker;
// use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\billMail;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use function GuzzleHttp\describe_type;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Team;
use App\Club;

class HirerController extends Controller
{
    public function AddDetails(Request $req)
    {
        $f = file::where('email', $req->email)->first();

        $hirer = new Hirer();

        $hirer->name = $req->name;
        $hirer->cnic = $req->cnic;
        $hirer->dob = $req->dob;
        $hirer->gender = $req->gender;
        $hirer->city_id = $req->city;
        $hirer->address = $req->address;
        $hirer->phone_no = $req->phone;
        $hirer->email = $req->email;
        $hirer->dp = $f->file_name;

        $hirer->save();

        session()->put('hirer', $hirer);
        $hired = null;
        return view('Hirer/hirerProfile', ['userD' => $hirer, 'hired' => $hired]);
    }


    public function Delete($email)
    {
        $h = Hirer::where('email', $email)->first();
        $a = UserPass::where('email', $h->email)->first();

        Hirer::destroy($h->email);
        UserPass::destroy($a->email);
        return view('Main/index');
    }


    public function HISTORY()
    {
        // $HireHistory = HireHistory::where('hirer_id',session('hirer')['id'])->all();
        $HireHistory = HireHistory::where('hirer_id', session('hirer')['id'])->get();
        // dd($HireHistory->worker->name);
        return view('Hirer/history', ["HH" => $HireHistory]);
    }
    public function DELETEHISTORY($id)
    {
        HireHistory::destroy($id);
        $HireHistory = HireHistory::all();
        return redirect('history');
    }




    public function Uploadfile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,tmp|max:12048',
        ]);
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move('uploads', $fileName);

        // $fileWriter = new File;

        // $fileWriter->file_name = $fileName;
        // $file_path = public_path('uploads\\' . $fileName);
        // $fileWriter->file_path = $file_path;
        // $fileWriter->email = $request->te;
        // $fileWriter->save();

        $city = City::all();
        return view('Hirer/OT', ['hirer' => $request->te, 'city' => $city]);
    }


    public function COMPLETED()
    {
        $tohistory = Hired::where('hirer_id', session('hirer')['id'])->first();

        $hh = new HireHistory();
        $hh->hirer_id = $tohistory->hirer_id;
        $hh->worker_id = $tohistory->worker_id;
        $hh->date = $tohistory->date;
        $hh->hired_time = $tohistory->hired_time;
        $date = Carbon::now();
        $d = $date->toArray();
        $hh->completed_time = $d['minute'];
        $b = $d['minute'] - $tohistory->hired_time;
        $Bill = $b*250;
        $hh->bill = $Bill;
        $hh->save();


        $h = Hired::where('hirer_id', session('hirer')['id'])->first();

        $worker = Worker::where('id', $h->worker_id)->first();
        $worker->status = 0;
        $worker->save();

        $hirer = Hirer::where('id', $h->hirer_id)->first();
        $hirer->status = 0;
        $hirer->save();

        Hired::destroy($tohistory->id);


        Mail::to($tohistory->hirer->email)->send(new billMAil($hirer,$worker,$Bill,$b));
        Mail::to($tohistory->worker->email)->send(new billMAil($hirer,$worker,$Bill,$b));
        // $data = [
        //     'hirer' => $hirer->name,
        //     'worker' => $worker->name,
        //     'time' => $b,
        //     'bill' => $Bill,
        // ];
        session()->pull('hwr');
        return redirect('lobby');
    }

    public function EXPORT($id)
    {
        $userD = Hirer::find($id);
        view()->share('Hirer',$userD);
        $pdf = PDF::loadView('pdf_view', $userD);
        return $pdf->download('personalInfo.pdf');
        // dd('ok');
    }

    public function profileh()
    {
        $hirer = session('hirer');
        $hired = Hired::where('hirer_id', session('hirer')['id'])->first();
        if ($hired == null) {
            session()->put('hired', false);
            return view('Hirer/hirerProfile', ['userD' => $hirer, 'hired' => $hired]);
        } else {
            $h = true;
            $ht = collect($h);
            session()->put('hired', true);
            return view('Hirer/hirerProfile', ['userD' => $hirer, 'hired' => $hired]);
        }
    }
}
