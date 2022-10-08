<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\DepartemenMail; 
use App\Models\Departemen; 
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
/**
* index
*
* @return void
*/
public function index()
{


$departemen = Departemen::latest()->paginate(5);

return view('departemen.index', compact('departemen'));
}
/**
* create
*
* @return void
*/
public function create()
{
return view('departemen.create');
}
/**
* store
*
* @param Request $request
* @return void
*/
public function store(Request $request)
{

$this->validate($request, [
'nama_departemen' => 'required',
'nama_manager' => 'required',
'jumlah_pegawai' => 'required'
]);

Departemen::create([
'nama_departemen' => $request->nama_departemen,
'nama_manager' => $request->nama_manager,
'jumlah_pegawai' => $request->jumlah_pegawai
]);
try{

$content = [
'body' => $request->nama_departemen,
];


Mail::to('emailtujuan@gmail.com')->send(new
DepartemenMail($content));

return redirect()->route('departemen.index')->with(['success'
=> 'Data Berhasil Disimpan, email telah terkirim!']);
}catch(Exception $e){

return redirect()->route('departemen.index')->with(['success'
=> 'Data Berhasil Disimpan, namun gagal mengirim email!']);
}
}
}
