<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MDatadiri;
use Session;

class Datadiri extends Controller
{
    public function config(){
        $data=[
            'headline'=>'data diri',
            'title'=>'hello world',
        ];
        return (object)$data;
    }
    public function notifikasi($status,$msg){
        if($status){
           Session::flash('sukses',$msg); 
        }else{
            Session::flash('error',$msg);
        }
    }
    public function index()
    {
        $data=[
            'config'=>$this->config(),
            'data'=>MDatadiri::all()->sortByDesc('id'),
        ];
       // print_r($data['pegawai']);        
        return view('datadiri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            'config'=>$this->config(),
        ];
        return view('datadiri.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nohp' => 'required',
            'alamat' => 'required',
            'pegawai_id'=>'required',
        ]);

        $insert=MDatadiri::create([
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'pegawai_id' => $request->pegawai_id
        ]);
        if($insert){
            $msg="Simpan berhasil";
        }else{
            $msg="Data gagal disimpan";
        }
        $this->notifikasi($insert,$msg);  
        return redirect('/datadiri');
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
