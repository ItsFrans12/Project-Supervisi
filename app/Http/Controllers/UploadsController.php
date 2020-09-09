<?php

namespace App\Http\Controllers;

use App\Uploads;
use App\User;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
      /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUpload()

    {

        return view('login');

    }

  

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUploadPost(Request $request)

    {

        $request->validate([

            'file_nilai' => 'required|mimes:pdf,xlx,csv|max:1500',
            'file_absensi' => 'required|mimes:pdf,xlx,csv|max:1500',
            'file_RPP' => 'required|mimes:pdf,xlx,csv|max:1500',


        ]);

  
        $file_nilai = $request->file('file_nilai');
        $file_absensi = $request->file('file_absensi');
        $file_RPP = $request->file('file_RPP');

        $size_nilai=$request->file('file_nilai')->getSize();
        $size_absensi=$request->file('file_absensi')->getSize();
        $size_RPP=$request->file('file_RPP')->getSize();


        $nama_file_nilai = $file_nilai->extension();
        $nama_file_absensi = $file_absensi->extension();
        $nama_file_RPP = $file_RPP->extension();

        $tujuan = 'uploads';

        $jadwal = " ";

        $pdf=Uploads::create([
            'file_nilai' => $nama_file_nilai,
            'file_absensi' => $nama_file_absensi,
            'file_RPP' => $nama_file_RPP,
            'guru' => $request->guru,
            'jadwal' => $jadwal,
            'pemeriksa' => $jadwal,
            'status'=> $jadwal,
            'size_nilai'=>$size_nilai,
            'size_absensi'=>$size_absensi,
            'size_RPP'=>$size_RPP
        ]);

        if($request->hasFile('file_nilai'))
        {
        $request->file('file_nilai')->move($tujuan,$request->file('file_nilai')->getClientOriginalName());
        $pdf->file_nilai = $request->file('file_nilai')->getClientOriginalName();
        $nama_file_nilai = $file_nilai->getClientOriginalName();
        }

        if($request->hasFile('file_absensi'))
        {
        $request->file('file_absensi')->move($tujuan,$request->file('file_absensi')->getClientOriginalName());
        $nama_file_absensi = $file_absensi->getClientOriginalName();
        $pdf->file_absensi = $request->file('file_absensi')->getClientOriginalName();
        }

        if($request->hasFile('file_RPP'))
        {
        $request->file('file_RPP')->move($tujuan,$request->file('file_RPP')->getClientOriginalName());
        $nama_file_RPP = $file_RPP->getClientOriginalName();
        $pdf->file_RPP = $request->file('file_RPP')->getClientOriginalName();
        $pdf->save();
        }

        return redirect()->back()
                        ->with('success','Upload Berhasil.');
       }
  } 
        
