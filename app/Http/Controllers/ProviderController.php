<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiActive;
use App\Models\ApiProvider;

class ProviderController extends Controller
{
    public function index()
    {
        if (auth()->guard('admin')->user()->level == 'master') {
            $apiss = ApiProvider::all();
            $api = ApiActive::first();

            return view('api', compact('apiss', 'api'));
        } else {
            abort(404);
        }
    }

    public function edit($id, Request $request)
    {
        $apiss = ApiProvider::find($id);
        $apiss->apikey = $request->apikey;
        $apiss->secretkey = $request->secretkey;
        $apiss->url = $request->endpoint;
        $apiss->save();

        return back()->with('success', 'API Successfully update');
    }

    public function use($id)
    {
        $apiss = ApiProvider::find($id);

        $api = ApiActive::first();
        $api->provider_id = $apiss->id;
        $api->title = $apiss->provider;
        $api->save();

        return back()->with('success', 'API Successfully update');
    }
}
