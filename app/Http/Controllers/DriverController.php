<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Driver;
use App\User;
use Validator;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.driver.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.driver.create2");
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
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username Sudah Ada',
            'password.required' => 'Kata Sandi harus diisi',
            'password.confirmed' => 'Kata Sandi Tidak Sesuai',
            'NIK.required' => 'NIK harus diisi',
            'NIK.unique' => 'NIK Sudah ada',
            'foto.required' => 'foto harus diisi',
            'foto.mimes' => 'foto hanya di isi jpeg,png,jpg,svg',
            'gender.required' => 'Jenis Kelamin harus diisi',
            'birth.required' => 'Tanggal lahir harus diisi',
            'alamat.required' => 'alamat harus diisi',
        ];
        $rules=  [
            'NIK' => 'required|unique:drivers',
            'foto' => 'image|mimes:jpeg,png,jpg,svg',
            'gender' => 'required',
            'birth' => 'required',
            'alamat' => 'required',
            'name' => 'required|min:2',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed'
        ];

        // if ($validator->fails()) {
        //     return response()->json(["errors" => $validator->errors()], 422);
        // }
        $this->validate($request, $rules, $messages);

        $image = $request->foto;
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // dd($new_name);
        $image->move(public_path('foto'), $new_name);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'roles' => "driver",
        ]);

        $driver = Driver::create([
            "user_id" => $user->id,
            "name" => $request->name,
            "NIK" => $request->NIK,
            "birth" => $request->birth,
            "foto" =>  $new_name,
            "gender" => $request->gender,
            "alamat" => $request->alamat,
            "status" => "Calon",
        ]);

        return redirect()->route('driver.index')->with('msgSuccess', "Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Driver::findOrFail($id);
        return view('pages.driver.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Driver::findOrFail($id);
        return view('pages.driver.edit', compact('data'));
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
        $old_foto = $request->hidden_foto;
        $data = Driver::findOrFail($id);
        if ($request->foto) {
            if ($data->foto != null) {
                unlink(public_path('foto/' . $data->foto));
            }
            $images = $request->file('foto');
            $new_name_edit = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('foto'), $new_name_edit);
        } else {
            $new_name_edit = $data->foto;
        }

        $messages = [
            'name.required' => 'Nama Harus diisi',
            'name.min' => 'Nama Minimal 2 karakter',
            'username.required' => 'Username harus diisi',
            'password.required' => 'Kata Sandi harus diisi',
            'password.confirmed' => 'Kata Sandi Tidak Sesuai',
            'NIK.required' => 'NIK harus diisi',
            'foto.required' => 'foto harus diisi',
            'foto.mimes' => 'foto hanya di isi jpeg,png,jpg,svg',
            'gender.required' => 'Jenis Kelamin harus diisi',
            'birth.required' => 'Tanggal lahir harus diisi',
            'alamat.required' => 'alamat harus diisi',
        ];
        $rules=  [
            'NIK' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,svg',
            'gender' => 'required',
            'birth' => 'required',
            'alamat' => 'required',
            'name' => 'required|min:2',
            'username' => 'required',
            'password' => 'nullable|confirmed'
        ];

        $data->update([
            "name" => $request->name,
            "NIK" => $request->NIK,
            "birth" => $request->birth,
            "foto" =>  $new_name_edit,
            "gender" => $request->gender,
            "alamat" => $request->alamat,
        ]);

        if ($request->password) {
            $data->user->update([
                'password' => $request->password
            ]);
        }
        $data->user->update([
            'username' => $request->username
        ]);

        return redirect()->route('driver.index')->with('msgSuccess', "Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Driver::findOrFail($id);
        unlink(public_path('foto/' . $data->foto));
        $data->user->delete();
        $data->delete();
        return response()->json(["msg" => "Sopit Berhasil Dihapus"], 200);
    }

    public function datatables()
    {
        $driver = Driver::query()->orderby('created_at', 'DESC')->with('user');

        return DataTables::of($driver)
            ->addColumn('action', function($driver){
                return view('pages.driver.action', [
                    'model' => $driver,
                    'url_show' => route('driver.show', $driver->id),
                    'url_edit' => route('driver.edit', $driver->id),
                    'url_delete' => route('driver.destroy', $driver->id),
                ]);
            })->rawColumns(['action'])->addIndexColumn()->make(true);
    }
}
