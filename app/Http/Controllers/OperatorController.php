<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Auth;
use App\Operator;
use App\User;
use Validator;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.operator.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.operator.create");
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
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'roles' => "operator",
        ]);

        $driver = Operator::create([
            "user_id" => $user->id,
            "name" => $request->name,
        ]);

        return response()->json(["msg" => "Operator Berhasil Ditambahkan"], 200);
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
        $data = Operator::findOrFail($id);
        return view("pages.operator.edit", compact('data'));
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
        $messages = [
            'name.required' => 'Nama Harus diisi',
            'name.min' => 'Nama Minimal 2 karakter',
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username Sudah Ada',
            'password.confirmed' => 'Kata Sandi Tidak Sesuai',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'username' => 'required',
            'password' => 'confirmed'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $data = Operator::findOrFail($id);

        if ($request->password) {
            $data->user->update([
                'password' => $request->password
            ]);
        }

        $data->update(['name' => $request->name]);
        $data->user->update([
            'username' => $request->username
        ]);

        return response()->json(["msg" => "Operator Berhasil Diubah"], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Operator::findOrFail($id);
        $data->user->delete();
        $data->delete();
        return response()->json(["msg" => "Operator Berhasil Dihapus"], 200);
    }

    public function datatables()
    {
        $operator = Operator::query()->orderby('created_at', 'DESC')->with('user');

        return DataTables::of($operator)
            ->addColumn('action', function($operator){
                return view('pages.operator.action', [
                    'model' => $operator,
                    'url_show' => route('operator.show', $operator->id),
                    'url_edit' => route('operator.edit', $operator->id),
                    'url_delete' => route('operator.destroy', $operator->id),
                ]);
            })->rawColumns(['action'])->addIndexColumn()->make(true);
    }
}
