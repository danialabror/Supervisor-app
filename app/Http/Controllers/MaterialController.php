<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use Auth;
use Response;

class MaterialController extends Controller
{
    public function post(Request $request)
    {
        //TEACHER
        $material = new Material;

        $file = $request->file('docs');

        // dd($file->getClientOriginalName());
        
        $material->id_teacher = Auth::user()->id;
        $material->lesson = $request->lesson;
        $material->materials = $file->getClientOriginalName();
        $material->status = 'NOTAPPROVE';
        
        $file->move(public_path().'/file', $file->getClientOriginalName());
        $material->save();

        return redirect ('/home');
    }

    public function approve(Request $request, $id)
    {
        $material = Material::find($id);
        $material->update([
            'status' => 'APPROVED',
        ]);

        return redirect('/home');
    }

    public function download($name, $file)
    {
        $file= public_path(). "/file/". $file;

        return Response::download($file);
    }
}
