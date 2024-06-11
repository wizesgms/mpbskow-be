<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Bonus;
use App\Models\Bank;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('transaksi','Top Up')->with('BankUser')->orderBy('created_at','desc')->where('status','Pending')->get();
        return view('deposit.pending',compact('transaction'));
    }

    public function list()
    {
        $transaction = Transaction::where('transaksi','Top Up')->orderBy('created_at','desc')->with('BankUser')->get();
        return view('deposit.list',compact('transaction'));
    }

    public function approve($id)
    {
        $transaction = Transaction::find($id);
        $bonus = Bonus::find($transaction->bonus);
        $user = User::find($transaction->id_user);
        $bank = Bank::where('nama_bank',$transaction->metode)->where('level','admin')->first();

        $transaction->transaction_by = auth()->guard('admin')->user()->username;
        $transaction->status = 'Sukses';
        $transaction->save();

        $bank->amount_trx = $bank->amount_trx + $transaction->total;
        $bank->save();

        if(!empty($bonus)) {
            $bonust =  $transaction->total * $bonus->bonus / 100;
            $totals =  $transaction->total + $bonust;
        } else {
            $totals =  $transaction->total;
        }

        $api = DB::table('api_providers')->first();
        $this->curl_postc("{$api->url}Transfer?apikey={$api->apikey}&signature={$api->secretkey}&username={$user->extplayer}&amount={$totals}");

        $user->balance = $user->balance + $totals;
        $user->save();

        return back()->with('success','Deposit Sucesssfully approved');
    }

    public function reject($id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'Ditolak';
        $transaction->transaction_by = auth()->guard('admin')->user()->username;
        $transaction->save();

        return back()->with('success','Deposit Sucesssfully rejected');
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
