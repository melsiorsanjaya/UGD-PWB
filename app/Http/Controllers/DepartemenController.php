<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;


class DepartemenController extends Controller
{
   /**
* index
*
* @return void
*/
public function index()
{
 $departemen = Departemen::get();

 return view('departemen.index', compact('departemen'));
 }
}

