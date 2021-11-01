<?php

namespace App\Http\Controllers;

use App\Models\Apartement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class ApartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $is_login = $request->session()->has('is_login');
        if ($is_login != 1) {
            return redirect('/login');
        }
        $content = DB::table('apartement')->orderBy('id', 'desc')->get();
        return view('apartement.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $is_login = $request->session()->has('is_login');
        if ($is_login != 1) {
            return redirect('/login');
        }
        return view('apartement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'dateTo' => 'required',
                'dateFrom' => 'required',
                'apartement_name' => 'required'
            ],
            [
                'apartement_name.required' => 'Apartement belum dipilih',
                'name.required' => 'Nama harus diisi',
                'dateTo.required' => 'Tanggal Checkout tidak boleh kosong',
                'dateFrom.required' => 'Tanggal Checkin tidak boleh kosong'
            ]
        );

        try {
            $data = [
                'apartement_name' => $request->apartement_name,
                'dateTo' => $request->dateTo,
                'dateFrom' => $request->dateFrom,
                'name' => $request->name,
                'uniq_id' => Uuid::uuid4()
            ];

            $sv = DB::table('apartement')->insert($data);
            if ($sv) {
                Alert::success('Success', 'Booking berhasil');
                return redirect('/apartement');
            } else {
                Alert::error('Oops', 'Terjadi suatu kesalahan');
                return redirect('/apartement/book');
            }
        } catch (Exception $e) {
            return redirect('/apartement/book');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartement  $apartement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $uniq_id)
    {
        $is_login = $request->session()->has('is_login');
        if ($is_login != 1) {
            return redirect('/login');
        }
        $content = DB::table('apartement')->where('uniq_id', $uniq_id)->first();
        return view('apartement.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartement  $apartement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniq_id)
    {
        $request->validate(
            [
                'name' => 'required',
                'dateTo' => 'required',
                'dateFrom' => 'required',
                'apartement_name' => 'required'
            ],
            [
                'apartement_name.required' => 'Apartement belum dipilih',
                'name.required' => 'Nama harus diisi',
                'dateTo.required' => 'Tanggal Checkout tidak boleh kosong',
                'dateFrom.required' => 'Tanggal Checkin tidak boleh kosong'
            ]
        );

        try {


            $data = [
                'name' => $request->name,
                'apartement_name' => $request->apartement_name,
                'dateFrom' => $request->dateFrom,
                'dateTo' => $request->dateTo,
            ];

            $update = DB::table('apartement')->where('uniq_id', $uniq_id)->update($data);
            if ($update) {
                Alert::success('Success', 'Data berhasil diupdate');
                return redirect('/apartement');
            } else {
                Alert::error('Oops', 'Terjadi suatu kesalahan dalam mengupdate data');
                return redirect('/apartement/edit/' . $uniq_id);
            }
        } catch (Exception $e) {
            Alert::warning('Oops', $e);
            return redirect('/apartement/edit/' . $uniq_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartement  $apartement
     * @return \Illuminate\Http\Response
     */
    public function destroy($uniq_id)
    {
        try {
            $dlt = DB::table('apartement')->where('uniq_id', $uniq_id)->delete();
            if ($dlt) {
                Alert::success('Success', 'Data sudah terhapus');
                return redirect('/apartement');
            } else {
                Alert::error('Oops', 'Terjadi suatu kesalahan');
            }
        } catch (Exception $e) {
            Alert::warning('Oops', $e);
            return redirect('/apartement');
        }
    }
}
