<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Bonus;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('transaksi','Withdraw')->with('BankUser')->where('status','Pending')->orderBy('created_at','desc')->get();
        return view('withdraw.pending',compact('transaction'));
    }

    public function list()
    {
        $transaction = Transaction::where('transaksi','Withdraw')->with('BankUser')->orderBy('created_at','desc')->get();
        return view('withdraw.list',compact('transaction'));
    }

    public function approve($id)
    {
        $transaction = Transaction::find($id);

        $transaction->transaction_by = auth()->guard('admin')->user()->username;
        $transaction->status = 'Sukses';
        $transaction->save();

        return back()->with('success','Withdraw Sucesssfully approved');
    }

    public function reject($id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'Ditolak';
        $transaction->transaction_by = auth()->guard('admin')->user()->username;
        $transaction->save();

        $user = User::find($transaction->id_user);

        $api = DB::table('api_providers')->first();

        $this->curl_postc("{$api->url}Transfer?apikey={$api->apikey}&signature={$api->secretkey}&username={$user->extplayer}&amount={$transaction->total}");

        $user->balance = $user->balance + $transaction->total;
        $user->save();

        return back()->with('success','Withdraw Sucesssfully rejected');
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
