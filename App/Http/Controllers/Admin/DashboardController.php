<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $this->authorize('dashboard',Auth::user());
        $users = User::select(DB::raw("COUNT(*) as count"))->whereYear('created_at',date('Y'))->groupby(DB::raw("Month(created_at)"))->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupby(DB::raw("Month(created_at)"))->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index=>$month){
            $datas[$month] = $users[$index];
        }
        return view('admin.dashboard',compact('datas'));
    }
}
