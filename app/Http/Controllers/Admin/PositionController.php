<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionInsertFormRequest;
use App\Position;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.dropDowns.positions.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $positions = Position::query();
        return DataTables::of($positions)
            ->addColumn('action', function ($positions) {
                return '<a href= "' . $positions->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionInsertFormRequest $request)
    {
        $position = new Position();
        $position->name = $request->get('name');
        $position->phoneBill = $request->get('phoneBill');
        $position->description = $request->get('description');
        $position->save();
        return redirect('backend/dropDowns/positions/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        return view('backend/dropDowns/positions/show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
//
        return view('/backend/dropDowns/positions/edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionInsertFormRequest $request, $id)
    {
        $position = Position::find($id);
        $position->name = $request->get('name');
        $position->phoneBill = $request->get('phoneBill');
        $position->description = $request->get('description');
        if ($position->update()) {
            return redirect('backend/dropDowns/positions/index')->with('success', 'Successfully updated Data!');

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
        $position = Position::find($id);

        $position->Delete();
        return redirect('/backend/dropDowns/positions/index')->with('success', 'Successfully Deleted Data!');
    }
}
