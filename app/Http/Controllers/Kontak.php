<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelKontak;
use Session;

class Kontak extends Controller
{

    public function config(){
        $data=[
            'headline'=>'belajar laravel',
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ModelKontak::all();
        $data=[
            'config'=>$this->config(),
            'data'=>ModelKontak::all()->sortByDesc('id'),
        ];         
        return view('kontak.kontak',$data);        
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
        return view('kontak.kontak_add',$data);
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
            'nama' => 'required',
            'email' => 'required'
        ]);

        $insert=ModelKontak::create([
            'nama' => $request->nama,
            'email' => $request->email
        ]);
        if($insert){
            $msg="Simpan berhasil";
        }else{
            $msg="Data gagal disimpan";
        }
        $this->notifikasi($insert,$msg);  
        return redirect('/kontak');
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
        $data=[
            'config'=>$this->config(),
            'data'=>ModelKontak::find($id),
        ];         
        if($data['data']){
            return view('kontak.kontak_edit', $data);
        }else{
           return abort(404);
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
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'email'
        ]);

        $kontak = ModelKontak::find($id);
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $action=$kontak->save();
        if($action){
            $msg="Update data berhasil";
        }else{
            $msg="Data gagal di update";
        }
        $this->notifikasi($action,$msg);            
        return redirect('/kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = ModelKontak::find($id);
        $action=$kontak->delete();
        if($action){
            $msg="Hapus berhasil";
        }else{
            $msg="Data gagal dihapus";
        }
        $this->notifikasi($action,$msg);        
        return redirect('/kontak');
    }
}
