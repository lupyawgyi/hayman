<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffInsertFormRequest;
use App\Position;
use App\Staff;
use Yajra\DataTables\DataTables;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.staff.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $staff = Staff::query('position_id','position_id')->get();
        return DataTables::of($staff)
            ->addColumn('action', function ($staff) {
                return '<a href= "' . $staff->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->editColumn('position_id',function ($staff){
                return $staff->position->name;
            })
            ->editColumn('branch_id',function ($staff){
                return $staff->branch->name;
            })
            ->rawColumns(['action','position_id','position_id'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        $branches = Branch::all();
        return view('backend.staff.create', compact('positions','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffInsertFormRequest $request)
    {
        $staff = new Staff();
        $staff->fullName = $request->get('fullName');
        $staff->position_id = $request->get('position_id');
        $staff->branch_id = $request->get('branch_id');
        $staff->save();
        return redirect('backend/staff/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('backend/staff/show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::all();
        $branches = Branch::all();
        $staff = Staff::find($id);
//
        return view('/backend/staff/edit', compact('branches','positions','staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffInsertFormRequest $request, $id)
    {
        $staff = Staff::find($id);
        $staff->fullName = $request->get('fullName');
        $staff->position_id = $request->get('position_id');
        $staff->branch_id = $request->get('branch_id');
        if ($staff->update()) {
            return redirect('backend/staff/index')->with('success', 'Successfully updated Data!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $user = User::where('email', '=', Input::get('email'))->first();
        $staff = Staff::find($id);
        $staff->Delete();
        return redirect('/backend/staff/index')->with('success', 'Successfully Deleted Data!');
    }
}
