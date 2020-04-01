<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Branch;
use App\Http\Requests\BranchInsertFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.branches.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $branches = Branch::query();
        return DataTables::of($branches)
            ->addColumn('action', function ($branches) {
                return '<a href= "' . $branches->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
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
        return view('backend.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchInsertFormRequest $request)
    {
        $branch = new Branch();
        $branch->name = $request->get('name');
        $branch->openingDate = $request->get('openingDate');
        $branch->address = $request->get('address');
        $branch->city = $request->get('city');
        $branch->phone = $request->get('phone');
        $branch->manager = $request->get('manager');
        $branch->save();
        return redirect('backend/branches/index')->with('status', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::find($id);
        return view('backend/branches/show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
//
        return view('/backend/branches/edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BranchInsertFormRequest $request, $id)
    {
        $branch = Branch::find($id);
        $branch->name = $request->get('name');
        $branch->openingDate = $request->get('openingDate');
        $branch->address = $request->get('address');
        $branch->city = $request->get('city');
        $branch->phone = $request->get('phone');
        $branch->manager = $request->get('manager');
        if ($branch->update()) {
            return redirect('backend/branches/index')->with('status', 'Successfully updated Data!');

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
        $branch = Branch::find($id);

        $user = DB::table('users')->pluck('office_id')->toArray();

//        dd($user);
        if (in_array($id, $user, false))
            return redirect('/backend/branches/index')->with('status', 'This Branch is using');
        else
            $branch->Delete();
        return redirect('/backend/branches/index')->with('status', 'Successfully Deleted Data!');
    }
}
