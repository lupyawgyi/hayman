<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\PhoneInsertformRequest;

use App\Phone;
use App\Position;

use App\Http\Controllers\Controller;
use http\Url;
use Yajra\DataTables\DataTables;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.dropDowns.phones.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $phones = Phone::query();
        return DataTables::of($phones)
            ->addColumn('action', function ($phones) {
                return '<a href= "' . $phones->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->editColumn('company_id',function ($phones) {
                $url = \Illuminate\Support\Facades\URL::to('/pages/companies/'. $phones->company->id . '/show');
                return '<a href= "'. $url. '"><span class="badge badge-primary">' .$phones->company->name. '</span></a>';

                //return '<a href= "' . $phones->company->id . '/show" "><span class="badge badge-primary">' .$phones->company->name. '</span></a>';
            })
            ->rawColumns(['action','company_id'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $companies = Company::all();
        return view('backend.dropdowns.phones.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneInsertformRequest $request)
    {
        $phone = new Phone();
        $phone->phoneNumber = $request->get('phoneNumber');
        $phone->company_id = $request->get('company_id');

        $phone->save();
        return redirect('backend/dropDowns/phones/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phone::find($id);
        return view('backend/dropDowns/phones/show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phone::find($id);
        $companies = Company::all();
//
        return view('/backend/dropDowns/phones/edit', compact('phone','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneInsertformRequest $request, $id)
    {
        $phone = Phone::find($id);
        $phone->phoneNumber = $request->get('phoneNumber');
        $phone->company_id = $request->get('company_id');
        if ($phone->update()) {
            return redirect('backend/dropDowns/phones/index')->with('success', 'Successfully updated Data!');

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
        $phone = Phone::find($id);

        $phone->Delete();
        return redirect('/backend/dropDowns/phones/index')->with('success', 'Successfully Deleted Data!');
    }
}
