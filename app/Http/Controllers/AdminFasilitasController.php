<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;

class AdminFasilitasController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $fasilitas = Fasilitas::all();
            return view('admin.fasilitas.index', compact('fasilitas'));
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            return view('admin.fasilitas.create');
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $input = $request -> all();
            Fasilitas::create($input);
            return redirect()->route('dashboard.fasilitas.index')->withSuccess('saved');
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }



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
        $user = Auth::user();
        if ($user->role_name == 'Admin') {
            $fasilitas =Fasilitas::findOrFail($id);

            return view('admin.fasilitas.edit', compact('fasilitas'));
        }
        else {
            $user = Auth::user();
            $city = City::all();
            $wisata = Wisata::all();
            return view('user.CariHomeStay', compact('user' ,'city', 'wisata'));
        }


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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Fasilitas::findOrfail($id);
        $user->delete();

        return redirect()->route('dashboard.fasilitas.index')->withSuccess('saved');

    }
}
