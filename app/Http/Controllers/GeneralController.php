<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'general_manage')) {
            return redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!check_user_access(Session::get('user_access'), 'general_manage')) {
            return redirect('/');
        }

        $data['logo'] = General::where('name', 'logo')->first();
        $data['nama_lengkap'] = General::where('name', 'nama_lengkap')->first();
        $data['nama_singkat'] = General::where('name', 'nama_singkat')->first();
        $data['alamat_lengkap'] = General::where('name', 'alamat_lengkap')->first();
        $data['alamat'] = General::where('name', 'alamat')->first();
        $data['alamat2'] = General::where('name', 'alamat2')->first();
        $data['alamat3'] = General::where('name', 'alamat3')->first();
        $data['nama_contact'] = General::where('name', 'nama_contact')->first();
        $data['telepon'] = General::where('name', 'telepon')->first();
        $data['footer_text'] = General::where('name', 'footer_text')->first();
        $data['facebook'] = General::where('name', 'facebook')->first();
        $data['instagram'] = General::where('name', 'instagram')->first();
        $data['twitter'] = General::where('name', 'twitter')->first();

        return view('general.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'general_create')) {
            return redirect('/');
        }

        $summary = (array) json_decode($request->summary);

        foreach ($summary as $key => $value) {
            if ($value != "") {
                $general = General::where('name', $key)->first();
                if ($general == null) {
                    $general = new General();
                    $general->name = $key;
                    $general->value = $value;
                    $general->save();
                } else {
                    $general->value = $value;
                    $general->save();
                }
            }
        }

        if ($request->hasFile('logo')) {
            $general = General::where('name', 'logo')->first();
            if ($general != null) {
                $file = $request->file('logo');
                $filename = md5(strtotime('now')) . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/general/';

                if (File::exists($path . $general->value)) {
                    unlink($path . $general->value);
                }

                $file->move($path, $filename);

                $general->value = $path . $filename;
                $general->save();
            } else {
                $file = $request->file('logo');
                $filename = strtotime('now') . '.' . $file->getClientOriginalExtension();
                $path = 'uploads/logo/';
                $file->move($path, $filename);

                $general = new General();
                $general->name = 'logo';
                $general->value = $path . $filename;
                $general->save();
            }
        }

        return redirect()->route('generals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
