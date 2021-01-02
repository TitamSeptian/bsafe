<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\MaterialAttachment;
use App\Attachment;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Material::all();
        return view('pages.material.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Nama Harus diisi',
            'name.min' => 'Nama Minimal 2 karakter',
        ];
        $rules=  [
            'name' => 'required|min:2',
        ];

        $this->validate($request, $rules, $messages);
        // dd(Str::slug($request->name, "-"). date('hms'));
        $material = Material::create([
            "slug" => Str::slug($request->name, "-"). date('hms'),
            "name" => $request->name,
            "description" => $request->description,
            "user_id" => Auth::user()->id,
        ]);
        if ($request->type) {
            foreach ($request->type as $key => $value) {
                $file = $request->attachment[$key];
                $new_name_file = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('attachment'), $new_name_file);

                $attachment_data = [
                    'type' => $request->type[$key],
                    'attachment' => $new_name_file,
                ];
                $attachment = Attachment::create($attachment_data);
                $material_attachment = MaterialAttachment::create([
                    "material_id" => $material->id,
                    "attachment_id" => $attachment->id,
                ]);
            }
        }

        return redirect()->route('material.index')->with('msgSuccess', "Berhasil Ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = MaterialAttachment::where('material_id', $id);
        $data = Material::findOrFail($id);
        return view('pages.material.show', compact('data'));
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
        $data = Material::findOrFail($id);
        foreach($data->material_attachment as $q){
            unlink(public_path('attachment/'.$q->attachment->attachment));
            $q->attachment->delete();
            $q->delete();
        }
        $data->delete();

        return redirect()->back()->with('msgSuccess', "Berhasil di hapus");
    }

    public function driverMaterialIndex()
    {
        $data = Material::all();
        return view('pages.material.driver.index', compact('data'));
    }

}
