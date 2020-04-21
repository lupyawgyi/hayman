<?php

namespace App\Http\Controllers\Admin;
use App\Company;
use App\Computer;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionInsertFormRequest;
use App\Phone;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\URL;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return DataTables::of(Role::query())->make(true);
        return view('backend.dropDowns.computers.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $computers = Computer::query();
        return DataTables::of($computers)
            ->editColumn('company_id',function ($computers) {
                $url = URL::to('/pages/companies/'. $computers->company->id . '/show');
                return '<a href= "'. $url. '"><span class="badge badge-primary">' .$computers->company->name. '</span></a>';

                //return '<a href= "' . $phones->company->id . '/show" "><span class="badge badge-primary">' .$phones->company->name. '</span></a>';
            })
            ->addColumn('action', function ($computers) {
                return '<a href= "' . $computers->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
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
        $lastID = DB::table('computers')
            ->orderBy('id', 'desc')
            ->first();
        $LastID = $lastID->id + 1 ;


        return view('backend.dropDowns.computers.create',compact('companies','LastID'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $computer = new Computer();
        $computer->local_id = $request->get('local_id');
        $computer->brand =$request->get('brand');
        $computer->model_or_serial = $request->get('model_or_serial');
        $computer->specification = $request->get('specification');
        $computer->price = $request->get('price');
        if ($request->get('ip_address')) {
            $computer->ip_address = $request->get('ip_address');
        }else {$computer->ip_address = "not need";}
        if ($request->get('user_name')) {
            $computer->user_name = $request->get('user_name');
        }else{$computer->user_name = "not need";}
        if ($request->get('password')) {
            $computer->password = $request->get('password');
        }else{$computer->password = "not need";}
        $computer->companyName = $request->get('companyName');
        $computer->bought_date = $request->get('bought_date');
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid()."_". $image->getClientOriginalName();
            $image_path = $_SERVER['DOCUMENT_ROOT']. "/device_image";
            $image->move($image_path,$image_name);
        }else {$image_name = "noimage.gif";}
        if ($request->file('warranty_card')) {
            $warranty_card = $request->file('warranty_card');
            $warranty_card_name = uniqid() . "_" . $warranty_card->getClientOriginalName();
            $warranty_card_path = $_SERVER['DOCUMENT_ROOT'] . "/warranty_card";
            $warranty_card->move($warranty_card_path, $warranty_card_name);
        }else $warranty_card_name = "noimage.gif";
        $computer->image = $image_name;
        $computer->warranty_card = $warranty_card_name;
        $computer->save();
        return redirect('/device/index')->with('status','Successfully Inserted Data!');

//        $region = new Region();
//        $region->name = $request->get('name');
//        $region->description = $request->get('description');
//        $region->save();
//        return redirect('backend/dropDowns/regions/index')->with('success', 'Successfully Inserted Data!');
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
