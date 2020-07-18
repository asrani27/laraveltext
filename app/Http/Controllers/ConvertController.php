<?php

namespace App\Http\Controllers;

use Excel;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConvertController extends Controller
{
    public function index()
    {
        $data = null;
        return view('convert', compact('data'));
    }

    public function convert(Request $req)
    {
        $this->validate($req, [
            'file'  => 'required|mimes:xls,xlsx'
        ]);
        
        $path = $req->file('file');
        $getData = Excel::toCollection(new DataImport, $path)->first()->map(function($item){
            $item->status = $item[0] == null ? null : 1;
            return $item;
        })->where('status', '!=', null)->values();
        
        $data = $this->format($getData);
        
        Storage::put('hasilconvert.txt', $data);
        return back()->with(['info' => 'Berhasil Di Convert, Lokasi File Di Storage/App']);
    }

    public function format($collection)
    {
        
        return $collection->map(function($value){
            $data = $value[11].";;;".$value[6].";".$value[8].";".PHP_EOL;
            return $data;
        })->toArray();
        
    } 
}
