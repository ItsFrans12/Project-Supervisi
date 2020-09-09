<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uploads;

class JadwalController extends Controller
{
       /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $uploads = Uploads::latest()->paginate(5);

  

        return view('uploads.index',compact('uploads'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

   

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $upload = Uploads::all();
        return view('jedit',compact('upload'));

    }

  

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $request->validate([

            'name' => 'required',

            'detail' => 'required',

        ]);

  

        Product::create($request->all());

   

        return redirect()->route('uploads.index')

                        ->with('success','Product created successfully.');

    }

   

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $uploads

     * @return \Illuminate\Http\Response

     */

    public function show(Product $uploads)

    {

        return view('uploads.show',compact('product'));

    }

   

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $uploads

     * @return \Illuminate\Http\Response

     */

    public function edit(Uploads $uploads)

    {

        return view('jedit',compact('Uploads'));

    }

  

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $uploads

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Uploads $uploads)

    {   
        $request->validate([
            'jadwal'=>'required',
            'pemeriksa'=>'required'
        ]);

        $id = $request->input('id');
        $data = request()->except(['_token','_method']);
        Uploads::whereId($id)->update($data);
       

        return redirect()->back()
                        ->with('success','Jadwal Telah Ditambahkan ');

                       

    }

  

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $uploads

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $uploads)

    {

    }

    public function UploadJadwal(Request $request, Uploads $uploads)
    {
        $request->validate([

            'jadwal' => 'required',
            'pemeriksa' => 'required',


        ]);



        return redirect()->route('dashboard')

                        ->with('sukses','Jadwal telah ter-update');
    }

     public function UploadStatus(Request $request, Uploads $uploads)
    {
        $request->validate([

            'jadwal' => 'required',
            'pemeriksa' => 'required',


        ]);

        $uploads->update($request->all());

        return redirect()->route('dashboard')

                        ->with('sukses','Jadwal telah ter-update');
    }

     public function update1(Request $request, Uploads $uploads)

    {   
        $request->validate([
            'status'=>'required',
        ]);

        $id = $request->input('id');
        $data = request()->except(['_token','_method']);
        Uploads::whereId($id)->update($data);
       

        return redirect()->back();

                       

    }
}
