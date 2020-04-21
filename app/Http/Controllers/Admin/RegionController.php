<?php

namespace App\Http\Controllers\Admin;

use App\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionInsertFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.dropDowns.regions.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $regions = Region::query('branch');
        return DataTables::of($regions)
            ->addColumn('branch', function ($regions) {
//                return '<a href= "#" class="btn btn-primary btn-sm text-white role">'.json_encode($regions->branches->pluck('name')).'</a>';
//                    return json_encode($regions->branches->pluck('name')->toArray());
                return $regions->branches->pluck('name')->toArray();
            })
            ->addColumn('action', function ($regions) {
                return '<a href= "' . $regions->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->rawColumns(['action','branch'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dropdowns.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionInsertFormRequest $request)
    {
        $region = new Region();
        $region->name = $request->get('name');
        $region->description = $request->get('description');
        $region->save();
        return redirect('backend/dropDowns/regions/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);
        return view('backend/dropDowns/regions/show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
//
        return view('/backend/dropDowns/regions/edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionInsertFormRequest $request, $id)
    {
        $region = Region::find($id);
        $region->name = $request->get('name');
        $region->description = $request->get('description');
        if ($region->update()) {
            return redirect('backend/dropDowns/regions/index')->with('success', 'Successfully updated Data!');

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
        $region = Region::find($id);

        $branch = DB::table('branches')->pluck('region_id')->toArray();

        if (in_array($id, $branch, false))
            return redirect('/backend/dropDowns/regions/index')->with('status', 'Cannot delete.This data is using');
        else
        $region->Delete();
        return redirect('/backend/dropDowns/regions/index')->with('success', 'Successfully Deleted Data!');
    }
}
