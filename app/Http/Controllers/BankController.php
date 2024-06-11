<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $banks = Bank::where('level', 'admin')->get();
            return view('bank.bank', compact('banks'));
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Bank::find($id);
            $banks = Bank::where('level', 'admin')->get();
            return view('bank.bank', compact('bank', 'banks'));
        } else {
            abort(404);
        }
    }

    public function create(Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = new Bank();
            if ($request->hasFile('file')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('file'), 'r');
                $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $bank->icon = $response['Images'];
            }
            $bank->nama_bank = $request->nama_bank;
            $bank->nomor_rekening = $request->nomor_rekening;
            $bank->nama_pemilik = $request->nama_pemilik;
            $bank->id_user = auth()->guard('admin')->user()->id;
            $bank->level = 'admin';
            $bank->save();

            return back()->with('success', 'Bank Successfully added');
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Bank::find($id);
            if ($request->hasFile('file')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('file'), 'r');
                $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://cdn.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $bank->icon = $response['Images'];
            }
            $bank->nama_bank = $request->nama_bank;
            $bank->nomor_rekening = $request->nomor_rekening;
            $bank->nama_pemilik = $request->nama_pemilik;
            $bank->id_user = auth()->guard('admin')->user()->id;
            $bank->level = 'admin';
            $bank->save();

            return redirect()->route('bank.list')->with('success', 'Bank Successfully update');
        } else {
            abort(404);
        }
    }

    public function delete($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Bank::find($id);
            $bank->delete();

            return back()->with('success', 'Bank Successfully deleted');
        } else {
            abort(404);
        }
    }
}
