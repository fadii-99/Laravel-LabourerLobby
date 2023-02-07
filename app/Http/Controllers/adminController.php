<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HireHistory;
use App\Models\Worker;
use App\Models\File;
use App\Models\Hirer;
use App\Models\UserPass;
use App\Models\complain;

class adminController extends Controller
{
    public function HIRER(){
        $data = Hirer::all();
        return view('Admin/hirer',['user' => $data]);
    }
    public function WORKER(){
        $data = Worker::all();
        return view('Admin/worker',['user' => $data]);
    }
    public function DELETEW($id){
        $h = Worker::find($id);
        $u = UserPass::where('email',$h->email)->first();
        UserPass::destroy($u->id);
        Worker::destroy($h->id);

        return redirect('adworker');
    }
    public function DELETEH($id){
        $h = Hirer::find($id);
        $u = UserPass::where('email',$h->email)->first();
        UserPass::destroy($u->id);
        Hirer::destroy($h->id);

        return redirect('adhirer');
    }
    public function COMPLAIN(){
        $data = complain::all();
        return view('Admin/complains',['user' => $data]);
    }
    public function COMPDEL($id){
        complain::destroy($id);
        return redirect('adcomplain');
    }
    public function HISTORY(){
        $data = HireHistory::all();
        return view('Admin/hiredhistory',['user' => $data]);
    }
    public function HISTDEL($id){
        HireHistory::destroy($id);
        return redirect('adhistory');
    }
    
}
