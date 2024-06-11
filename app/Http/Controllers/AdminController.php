<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::where('id', '!=', 1)->get();
        return view('admin.admin', compact('admins'));
    }

    public function edit($id)
    {
        $admins = Admin::where('id', '!=', 1)->get();
        $admin = Admin::find($id);
        return view('admin.admin', compact('admins', 'admin'));
    }

    public function create(Request $request)
    {
        $admin = Admin::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status' => 1,
        ]);

        return back()->with('success', 'Admin' . $admin->username . 'Sucesssfully created');
    }

    public function update($id, Request $request)
    {
        $admin = Admin::find($id);
        $admin->username = $request->username;
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->level = $request->level;
        $admin->save();
        return back()->with('success', 'Admin Sucesssfully update');
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return back()->with('success', 'Admin Sucesssfully delete');
    }

    public function getNotif()
    {
        $today = date('Y-m-d');

        $depos = Transaction::where('transaksi', 'Top Up')->whereDate('created_at', $today)->where('status', 'Pending')->limit(1)->get();

        foreach ($depos as $depo)

        if (!empty($depo)) {
            $notif = '<div class="alert alert-info alert-dismissible text-dark" role="alert">
            Permintaan Deposit dari ' . $depo->username . ' sebesar Rp. ' . number_format($depo->total, 2) . '<br>
            <a href="' . route('deposits.pending') . '">Klik Disini</a> untuk konfirmasi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup Navigasi"></button>
           </div><audio controls autoplay hidden="true"><source src="' . asset('assets/audio/alert.mp3') . '" type="audio/mp3">
           </audio>';
        }

        return $notif;
    }

    public function getNotifwd()
    {
        $today = date('Y-m-d');
        $wds = Transaction::where('transaksi', 'Withdraw')->whereDate('created_at', $today)->where('status', 'Pending')->limit(1)->get();

        foreach ($wds as $wd)

        if (!empty($wd)) {
            $notif = '<div class="mt-5 alert alert-danger alert-dismissible text-dark" role="alert">
            Permintaan withdraw dari ' . $wd->username . ' sebesar Rp. ' . number_format($wd->total, 2) . '<br>
            <a href="' . route('withdrawal.pending') . '">Klik Disini</a> untuk konfirmasi
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup Navigasi"></button>
        </div><audio controls autoplay hidden="true"><source src="' . asset('assets/audio/alert.mp3') . '" type="audio/mp3">
           </audio>';
        }

        return $notif;
    }
}
