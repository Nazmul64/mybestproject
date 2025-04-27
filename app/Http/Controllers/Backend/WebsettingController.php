<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Websetting;
use Illuminate\Http\Request;

class WebsettingController extends Controller
{
    public function index()
    {
        $websetting = Websetting::all();
        return view('Backend.Websetting.index', compact('websetting'));
    }

    public function create()
    {
        return view('Backend.Websetting.create');
    }

    public function store(Request $request)
    {
        $filename = null;
        $faviconname = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/websettings'), $filename);
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $faviconname = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/websettings'), $faviconname);
        }

        Websetting::create([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'offer_title' => $request->offer_title,
            'fixel_setup_text' => $request->fixel_setup_text,
            'sms_text' => $request->sms_text,
            'webtitle_text' => $request->webtitle_text,
            'status' => $request->status,
            'photo' => $filename,
            'favicon' => $faviconname,
        ]);

        return redirect()->route('websetting.index')->with('success', 'Websetting created successfully.');
    }

    public function edit($id)
    {
        $websetting = Websetting::findOrFail($id);
        return view('Backend.Websetting.edit', compact('websetting'));
    }

    public function update(Request $request, $id)
    {
        $websetting = Websetting::findOrFail($id);

        $filename = $websetting->photo;
        $faviconname = $websetting->favicon;

        // Handle photo upload
        if ($request->hasFile('new_photo')) {
            if (file_exists(public_path('uploads/websettings/' . $websetting->photo))) {
                unlink(public_path('uploads/websettings/' . $websetting->photo));
            }
            $file = $request->file('new_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/websettings'), $filename);
        }

        // Handle favicon upload
        if ($request->hasFile('new_favicon')) {
            if (file_exists(public_path('uploads/websettings/' . $websetting->favicon))) {
                unlink(public_path('uploads/websettings/' . $websetting->favicon));
            }
            $file = $request->file('new_favicon');
            $faviconname = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/websettings'), $faviconname);
        }

        $websetting->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'offer_title' => $request->offer_title,
            'fixel_setup_text' => $request->fixel_setup_text,
            'sms_text' => $request->sms_text,
            'webtitle_text' => $request->webtitle_text,
            'status' => $request->status,
            'photo' => $filename,
            'favicon' => $faviconname,
        ]);

        return redirect()->route('websetting.index')->with('success', 'Websetting updated successfully.');
    }

    public function destroy($id)
    {
        $websetting = Websetting::findOrFail($id);
        $websetting ->delete();
        return redirect()->route('websetting.index')->with('success', 'Websetting delete successfully.');
    }
}
