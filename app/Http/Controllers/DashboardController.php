<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //START STATISTIC ALL
        $userall = User::whereYear('created_at',now()->year)->count();
        $useralldp = User::where('deposit',1)->whereYear('created_at',now()->year)->count();
        $userallxdp = User::where('deposit',0)->whereYear('created_at',now()->year)->count();
        $userallwd = User::where('withdraw',1)->whereYear('created_at',now()->year)->count();
        $dpsuccall = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereYear('created_at',now()->year)->sum('total');
        $dprejall = Transaction::where('transaksi', 'Top Up')->where('status','Ditolak')->whereYear('created_at',now()->year)->count();
        $wdsuccall = Transaction::where('transaksi', 'Withdraw')->where('status','Sukses')->whereYear('created_at',now()->year)->sum('total');
        $bonusall = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereYear('created_at',now()->year)->sum('bonus_amount');
        $profit = $dpsuccall - $wdsuccall - $bonusall;

        $useram = User::whereMonth('created_at',now()->month)->count();
        $useramdp = User::where('deposit',1)->whereMonth('created_at',now()->month)->count();
        $useramxdp = User::where('deposit',0)->whereMonth('created_at',now()->month)->count();
        $useramlwd = User::where('withdraw',1)->whereMonth('created_at',now()->month)->count();
        $dpsuccm = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereMonth('created_at',now()->month)->sum('total');
        $dprejm = Transaction::where('transaksi', 'Top Up')->where('status','Ditolak')->whereMonth('created_at',now()->month)->count();
        $wdsuccm = Transaction::where('transaksi', 'Withdraw')->where('status','Sukses')->whereMonth('created_at',now()->month)->sum('total');
        $bonusm = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereMonth('created_at',now()->month)->sum('bonus_amount');

        $userays = User::whereDate('created_at',now())->count();
        $useraysdp = User::where('deposit',1)->whereDate('created_at',now())->count();
        $useraysxdp = User::where('deposit',0)->whereDate('created_at',now())->count();
        $userayslwd = User::where('withdraw',1)->whereDate('created_at',now())->count();
        $dpsuccys = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereDate('created_at',now())->sum('total');
        $dprejys= Transaction::where('transaksi', 'Top Up')->where('status','Ditolak')->whereDate('created_at',now())->count();
        $wdsuccys = Transaction::where('transaksi', 'Withdraw')->where('status','Sukses')->whereDate('created_at',now())->sum('total');
        $bonusys = Transaction::where('transaksi', 'Top Up')->where('status','Sukses')->whereDate('created_at',now())->sum('bonus_amount');

        return view('dashboard',compact(
            'userall','useralldp','userallxdp','userallwd','dpsuccall','wdsuccall','bonusall','dprejall','profit',
            'useram','useramdp','useramxdp','useramlwd','dpsuccm','dprejm','wdsuccm','bonusm',
            'userays','useraysdp','useraysxdp','userayslwd','dpsuccys','dprejys','wdsuccys','bonusys'
        ));
    }

    public function balance()
    {
        $api = DB::table('api_actives')->find(1);
        $apis = DB::table('api_providers')->find($api->provider_id);

        if ($api->provider_id == 1){
            $endpoint = $apis->url;
            $postArray = [
                'method' => $apis->apikey,
                'agent_code' => $apis->apikey,
                'agent_token' => $apis->secretkey
            ];
        } else {
            $endpoint = $apis->url;
            $postArray = [
                'method' => 'money_info',
                'agent_code' => $apis->apikey,
                'agent_token' => $apis->secretkey
            ];
        }

        $jsonData = json_encode($postArray);

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
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);

        $balance = number_format($result->agent->balance,2);
        return response()->json(['balance' => $balance]);
    }
}
