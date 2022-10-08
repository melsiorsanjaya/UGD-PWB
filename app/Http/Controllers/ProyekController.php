<?php
namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
 /**
* index
*
* @return void
*/
public function index()
{


$proyek = Proyek::get();

return view('proyek.index', compact('proyek'));
}
}
