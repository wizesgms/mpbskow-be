<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Floating;
use App\Models\Popup;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PromotionController extends Controller
{
    public function index()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $promotion = Bonus::where('type',1)->get();
            return view('promotion.promotion', compact('promotion'));
        } else {
            abort(404);
        }
    }

    public function deposit()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $promotion = Bonus::where('type',2)->get();
            return view('promotion.deposit', compact('promotion'));
        } else {
            abort(404);
        }
    }

    public function editd($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $edb = Bonus::find($id);
            $promotion = Bonus::where('type',2)->get();
            return view('promotion.deposit', compact('promotion','edb'));
        } else {
            abort(404);
        }
    }

    public function edit($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $edb = Bonus::find($id);
            $promotion = Bonus::where('type',1  )->get();
            return view('promotion.promotion', compact('promotion','edb'));
        } else {
            abort(404);
        }
    }

    public function create(Request $request)
    {
        $promotion = new Bonus();
        $promotion->slug = Str::slug($request->judul);
        if ($request->hasFile('file')) {
            $path = 'ImageFile';
            $contents = fopen($request->file('file'), 'r');
            $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                'path' => $path
            ]);

            $promotion->gambar = $response['Images'];
        }

        $promotion->judul = $request->judul;
        $promotion->text = $request->deskripsi;
        $promotion->minimal_deposit = $request->minimal_depo;
        $promotion->bonus = $request->bonus;
        $promotion->turnover = $request->to;
        $promotion->status = $request->status;
        $promotion->type = $request->type;
        $promotion->save();

        return back()->with('success', 'Promotion Successfully added');
    }

    public function update($id,Request $request)
    {
        $promotion = Bonus::find($id);
        $promotion->slug = Str::slug($request->judul);

        if ($request->hasFile('file')) {
            $path = 'ImageFile';
            $contents = fopen($request->file('file'), 'r');
            $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                'path' => $path
            ]);

            $promotion->gambar = $response['Images'];
        }

        $promotion->judul = $request->judul;
        $promotion->text = $request->deskripsi;
        $promotion->minimal_deposit = $request->minimal_depo;
        $promotion->bonus = $request->bonus;
        $promotion->turnover = $request->to;
        $promotion->status = $request->status;
        $promotion->save();

        return back()->with('success', 'Promotion Successfully updated');
    }

    public function delete($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Bonus::find($id);
            $bank->delete();

            return back()->with('success', 'Promotion Successfully deleted');
        } else {
            abort(404);
        }
    }

    public function banner()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $banner = Banner::all();
            return view('promotion.banner', compact('banner'));
        } else {
            abort(404);
        }
    }

    public function bcreate(Request $request)
    {
        $banner = new Banner();
        if ($request->hasFile('file')) {
            $path = 'ImageFile';
            $contents = fopen($request->file('file'), 'r');
            $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                'path' => $path
            ]);

            $banner->gambar = $response['Images'];
        }
        $banner->status = 'active';
        $banner->save();

        return back()->with('success', 'Banner Successfully added');
    }

    public function bdelete($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Banner::find($id);
            $bank->delete();

            return back()->with('success', 'Banner Successfully deleted');
        } else {
            abort(404);
        }
    }

    public function popup(Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $popup = Popup::first();
            if ($request->hasFile('file')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('file'), 'r');
                $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $popup->gambar = $response['Images'];
            }
            $popup->status = $request->status;
            $popup->save();
            return back()->with('success', 'Popup Successfully Updated');
        } else {
            abort(404);
        }
    }

    public function float()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $floating = Floating::all();
            $popup = Popup::first();
            return view('floating.floating', compact('floating','popup'));
        } else {
            abort(404);
        }
    }


    public function floatedit($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $floating = Floating::all();
            $floats = Floating::find($id);
            $popup = Popup::first();
            return view('floating.floating', compact('floating','floats','popup'));
        } else {
            abort(404);
        }
    }

    public function floatcreate(Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $floating = new Floating();
            if ($request->hasFile('file')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('file'), 'r');
                $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $floating->image = $response['Images'];
            }
            $floating->url = $request->url;
            $floating->save();
            return back()->with('success', 'Floating Successfully Updated');
        } else {
            abort(404);
        }
    }

    public function floatupdate($id, Request $request)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $floating = Floating::find($id);
            if ($request->hasFile('file')) {
                $path = 'ImageFile';
                $contents = fopen($request->file('file'), 'r');
                $response = Http::attach('file', $contents, $request->file('file')->getClientOriginalName())->post('https://files.wizestatic.cloud/api_upload', [
                    'accesskey' => 'WZG00DURSDRSKNYVNFSF',
                    'secretkey' => '7qOoZCSrLNyeTJYc3o2VeaxVzMVR',
                    'path' => $path
                ]);

                $floating->image = $response['Images'];
            }
            $floating->url = $request->url;
            $floating->save();
            return back()->with('success', 'Floating Successfully Updated');
        } else {
            abort(404);
        }
    }

    public function floatdelete($id)
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $bank = Floating::find($id);
            $bank->delete();

            return back()->with('success', 'Floating Successfully deleted');
        } else {
            abort(404);
        }
    }
}
