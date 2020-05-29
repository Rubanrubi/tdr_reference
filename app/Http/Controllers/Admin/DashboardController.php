<?php

namespace App\Http\Controllers\admin;

use App\Model\Creditor;
use App\Model\User;
use App\Model\Subadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DashboardController extends Controller
{

    public function index()
    {
        $totalCreditors = Creditor::count();
        $totalActiveCreditors = Creditor::where('status',1)->count();
        $totalUsers = User::where('status','!=',0)->count();
        $totalActiveUsers = User::where('status',1)->count();
        $totalAdmins = Subadmin::where('status','!=',0)->count();
        $totalActiveAdmins = Subadmin::where('status',1)->count();

        $recentNotifierList = User::where('status','!=',0)->latest()->get();
        return view('admin.dashboard',['totalCreditors'=>$totalCreditors, 'totalActiveCreditors'=>$totalActiveCreditors, 'totalUsers'=>$totalUsers, 'totalActiveUsers'=>$totalActiveUsers, 'recentNotifierList'=>$recentNotifierList, 'totalAdmins'=>$totalAdmins, 'totalActiveAdmins'=>$totalActiveAdmins]);
    }
}
