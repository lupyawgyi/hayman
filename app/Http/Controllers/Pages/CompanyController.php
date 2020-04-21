<?php

namespace App\Http\Controllers\Pages;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyInsertFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use function foo\func;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.companies.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $companies = Company::query();
        return DataTables::of($companies)
            ->addColumn('action', function ($companies) {
                return '<a href= "' . $companies->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->editColumn('website',function($companies){
                return "<a target=\"_blank\" href='http://$companies->website'>$companies->website</a>";
//                return "<a [href^='http://'].attr('$companies->website')>$companies->website</a>";
//
            })
            ->rawColumns(['website','action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.companies.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyInsertFormRequest $request)
    {
        $company = new Company();
        $company->name = $request->get('name');
        $company->contactOne = $request->get('contactOne');
        $company->phoneOne = $request->get('phoneOne');
        $company->contactTwo = $request->get('contactTwo');
        $company->phoneTwo = $request->get('phoneTwo');
        $company->website = $request->get('website');
        $company->address = $request->get('address');
        $company->save();
        return redirect('pages/companies/index')->with('success', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('pages/companies/show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
//
        return view('/pages/companies/edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->contactOne = $request->get('contactOne');
        $company->phoneOne = $request->get('phoneOne');
        $company->contactTwo = $request->get('contactTwo');
        $company->phoneTwo = $request->get('phoneTwo');
        $company->website = $request->get('website');
        $company->address = $request->get('address');
        if ($company->update()) {
            return redirect('pages/companies/index')->with('success', 'Successfully updated Data!');

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
        $company = Company::find($id);

//        $user = DB::table('users')->pluck('office_id')->toArray();
//
////        dd($user);
//        if (in_array($id, $user, false))
//            return redirect('/backend/branches/index')->with('status', 'This Branch is using');
//        else
            $company->Delete();
        return redirect('/pages/companies/index')->with('success', 'Successfully Deleted Data!');
    }
}
