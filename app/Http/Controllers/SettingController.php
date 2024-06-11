<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Http;
use App\Models\Contact;

class SettingController extends Controller
{
    public function index()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $web = Settings::first();
            $contact = Contact::first();
            return view('settings', compact('web','contact'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $web = Settings::first();
            $contact = Contact::first();
            if ($request->hasFile('logo')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('logo'), 'r');
                $response = Http::attach('file', $contents, $request->file('logo')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $web->logo = $response['Images'];
            }
            $web->min_depo = $request->min_depo;
            $web->min_wd = $request->min_wd;
            $web->title = $request->title;
            $web->judul = $request->judul;
            $web->deskripsi = $request->deskripsi;
            $web->keyword = $request->keyword;
            $web->warna = $request->warna;
            if ($request->hasFile('icon_web')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('icon_web'), 'r');
                $response = Http::attach('file', $contents, $request->file('icon_web')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $web->icon_web = $response['Images'];
            }

            $contact->id_livechat = $request->livechat;
            $contact->no_whatsapp = $request->wa;
            $contact->save();

            $web->save();

            return back()->with('success', 'Website Successfully updated');
        } else {
            abort(404);
        }
    }
}
