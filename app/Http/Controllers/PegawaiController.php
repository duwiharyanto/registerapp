<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai;
use Session;

class PegawaiController extends Controller
{

    public function config(){
        $data=[
            'headline'=>'daftar user',
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
            'pegawai'=>Pegawai::all()->sortByDesc('id'),
        ];        
    	return view('pegawai', $data);
    }

    public function tambah()
    {
    	$data=[
            'config'=>$this->config(),
        ];
        return view('pegawai_tambah',$data);
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);

    	$insert=Pegawai::create([
    		'nama' => $request->nama,
    		'alamat' => $request->alamat
    	]);
        if($insert){
            $msg="Simpan berhasil";
        }else{
            $msg="Data gagal disimpan";
        }
        $this->notifikasi($insert,$msg);  
    	return redirect('/pegawai');
    }

    public function edit($id)
    {
        $data=[
            'config'=>$this->config(),
            'pegawai'=>Pegawai::find($id),
        ];         
        if($data['pegawai']){
            return view('pegawai_edit', $data);
        }else{
           return abort(404);
        }		
    }
     public function update($id, Request $request)
    {
		$this->validate($request,[
    		'nama' => 'required',
    		'alamat' => 'required'
    	]);

		$pegawai = Pegawai::find($id);
		$pegawai->nama = $request->nama;
		$pegawai->alamat = $request->alamat;
		$action=$pegawai->save();
        if($action){
            $msg="Update data berhasil";
        }else{
            $msg="Data gagal di update";
        }
        $this->notifikasi($action,$msg);    		
        return redirect('/pegawai');
    }

     public function delete($id)
    {
		$pegawai = Pegawai::find($id);
		$action=$pegawai->delete();
        if($action){
            $msg="Hapus berhasil";
        }else{
            $msg="Data gagal dihapus";
        }
        $this->notifikasi($action,$msg);   		
        return redirect('/pegawai');
    }

}
