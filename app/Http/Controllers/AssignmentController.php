<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\AssignmentAttachment;
use App\Attachment;
use App\DriverAssignmentAttachment;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Assign;
use Validator;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Assignment::all();
        return view('pages.assignment.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.assignment.create');
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
            'due_date.required' => 'Nama Harus diisi',
        ];
        $rules=  [
            'name' => 'required|min:2',
            'due_date' => 'required',
        ];

        $this->validate($request, $rules, $messages);
        // dd(Str::slug($request->name, "-"). date('hms'));
        $assignment = Assignment::create([
            "slug" => Str::slug($request->name, "-"). date('hms'),
            "name" => $request->name,
            "due_date" => $request->due_date,
            "description" => $request->description,
            // "status" => "akses",
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
                $material_attachment = AssignmentAttachment::create([
                    "assignment_id" => $assignment->id,
                    "attachment_id" => $attachment->id,
                ]);
            }
        }

        return redirect()->route('assignment.index')->with('msgSuccess', "Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Assignment::findOrFail($id);
        return view('pages.assignment.show', compact('data'));
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

    public function driverAssignment(Request $request, $assignment_id)
    {
        // dd(Auth::user()->driver[0]->id);
        $file = $request->file;
        $new_name_file = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('attachment'), $new_name_file);

        $attachment = Attachment::create([
            "type" => "file",
            "attachment" => $new_name_file,
        ]);

        $data = DriverAssignmentAttachment::create([
            "assignment_id" => $assignment_id,
            "attachment_id" => $attachment->id,
            "driver_id" => Auth::user()->driver[0]->id,
            "status" => "selesai",
        ]);

        // $assignment = Assignment::findOrFail($assignment_id)->update(["status" => "selesa"])

        return redirect()->route("assignment.index")->with("msgSuccess", "Berhasil Dikirm");
    }

    public function driverAssignmentIndex()
    {
        return view("pages.assignment.driver-assignment");
    }

    public function driverAssignmentDatatables()
    {
        $data = DriverAssignmentAttachment::query()->orderby('created_at', 'DESC')->with(["assignment", "attachment", "driver"]);

        return DataTables::of($data)
            ->addColumn('action', function($data){
                return view('pages.assignment.action-driver-assignment', [
                    'model' => $data,
                    'url_show' => route('assignment.driver.show', $data->id),
                    // 'url_edit' => route('operator.edit', $data->id),
                    // 'url_delete' => route('operator.destroy', $data->id),
                ]);
            })->rawColumns(['action'])->addIndexColumn()->make(true);
    }

    public function driverAssignmentNilai($id)
    {
        $data = DriverAssignmentAttachment::findOrFail($id);
        return view("pages.assignment.driver-assignment-nilai", compact('data'));
    }

    public function driverAssignmentSetNilai(Request $request, $id)
    {
        $messages = [
            'score.required' => 'Nilai Harus diisi',
            'score.min' => 'Nilai Minimal 0',
            'score.max' => 'Nilai Maximal 100',
            'score.numeric' => 'Harus Angka',
        ];
        $validator = Validator::make($request->all(), [
            'score' => 'required|min:0|max:100|numeric',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $data = DriverAssignmentAttachment::findOrFail($id);
        $data->update(["score" => $request->score]);

        return response()->json(["msg" => "Berhasil Memberi Nilai"], 200);
    }
}
