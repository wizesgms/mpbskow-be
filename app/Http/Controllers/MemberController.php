<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

use DataTables;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        if ($request->ajax()) {
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $statusbtn = '<span class="badge bg-label-success rounded-pill">Active</span>';
                    } else {
                        $statusbtn = '<span class="badge bg-label-danger rounded-pill">Suspend</span>';
                    }

                    return $statusbtn;
                })
                ->addColumn('action', function ($row) {
                    $action = '<a href="'. route('members.list.details',$row->extplayer) .'"
                    class="btn rounded-pill btn-sm btn-icon btn-primary btn-fab demo waves-effect waves-light"><i
                        class="tf-icons mdi mdi-eye-outline"></i></a>';
                    return $action;
                })
                ->addColumn('created_at', function ($row) {
                    $cbtrn = $row->created_at;
                    return $cbtrn;
                })
                ->addColumn('balance', function ($row) {
                    $amounts = 'Rp.' . number_format($row->balance);
                    return $amounts;
                })
                ->rawColumns(['status', 'action', 'created_at', 'balance'])
                ->make(true);
        }
        return view('member.list', compact('user'));
    }

    public function balance()
    {
        $user = User::all();
        return view('member.balance', compact('user'));
    }

    public function details($extplayer)
    {
        $user = User::where('extplayer', $extplayer)->first();
        $transaction = Transaction::where('id_user', $user->id)->get();
        $bank = Bank::where('id_user', $user->id)->first();
        return view('member.details', compact('user', 'transaction', 'bank'));
    }

    public function balanceup(Request $request)
    {
        $user = User::where('extplayer', $request->extplayer)->first();
        $api = DB::table('api_providers')->first();

        if ($request->action == 1) {
            $user->balance = $user->balance + $request->amount;
            $this->curl_postc("{$api->url}Transfer?apikey={$api->apikey}&signature={$api->secretkey}&username={$user->extplayer}&amount={$request->amount}");
        } else {
            if ($user->balance < $request->amount) {
                return back()->with('error', 'Insufficient Balance');
            }
            $user->balance = $user->balance - $request->amount;
            $this->curl_postc("{$api->url}Withdraw?apikey={$api->apikey}&signature={$api->secretkey}&username={$user->extplayer}&amount={$request->amount}");
        }

        $user->save();

        return back()->with('success', 'Balance Successfully update');
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->nama_lengkap = $request->fullname;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'User Successfully update');
    }

    public function banks($id, Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $user = Bank::find($id);
            $user->nama_bank = $request->bankname;
            $user->nomor_rekening = $request->accno;
            $user->nama_pemilik = $request->accname;
            $user->save();

            return back()->with('success', 'Bank Successfully update');
        } else {
            abort(404);
        }
    }

    function curl_postc($endpoint)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
