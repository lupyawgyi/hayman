<?php

namespace App\Http\Controllers\Admin;
use App\Company;
use App\Computer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ComputerInsertFormRequest;
use App\Http\Requests\RegionInsertFormRequest;
use App\Phone;
use App\Region;
use Carbon\Carbon;
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
            ->addColumn('current', function ($computers) {
                $orginals = $computers->price;

                $month = $computers->live_year;
                $boughtDate = $computers->bought_date;


                $datework = Carbon::createFromDate($boughtDate);
                $now = Carbon::now();
                $diff_in_months = $datework->diffInMonths($now);

                $depreciation = ($orginals/$month) * $diff_in_months ;
                $currentAmount = $orginals - $depreciation;
                if ($currentAmount < 0 )
                    return 0;
                else
                    return number_format($currentAmount) ;
            })
            ->editColumn('price', function ($computers) {
                return number_format($computers->price);
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
        //$now = Carbon::now();
        $companies = Company::all();
        $last = DB::table('computers')
            ->orderBy('id', 'desc')
            ->first();
        if ($last == null)
        $LastID =  1 ;
        else
            $LastID = $last-> id + 1;
        $exchange = json_decode(file_get_contents('http://forex.cbm.gov.mm/api/latest'));


        return view('backend.dropDowns.computers.create',compact('companies','LastID','exchange'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerInsertFormRequest $request)
    {

        $computer = new Computer();
        $computer->local_id = $request->get('local_id');
        $computer->brand =$request->get('brand');
        $computer->model_or_serial = $request->get('model_or_serial');
        $computer->specification = $request->get('specification');
        $computer->company_id = $request->get('company_id');
        $computer->ip_address = $request->get('ip_address');

        $live_year = $request->get('live_year');
        if ($request->get('active') == 'year')
            $active_live = $live_year * 12 ;
        else
            $active_live = $live_year;

        $computer->live_year =$active_live;

        $getprice = $request->get('price');
        $usa_rate =floatval(preg_replace('/[^\d.]/', '', $request->get('USA_rate')));
        $eur_rate =floatval(preg_replace('/[^\d.]/', '', $request->get('EUR_rate')));
        $sgd_rate =floatval(preg_replace('/[^\d.]/', '', $request->get('SGD_rate')));
        if ($request->get('country') == "USA" )
            $usa = $getprice * $usa_rate;
        elseif ($request->get('country') == "EUR" )
            $usa = $getprice * $eur_rate;
        elseif ($request->get('country') == "SGD" )
            $usa = $getprice * $sgd_rate;
        else
            $usa = $getprice;

        $computer->price = $usa;
        $computer->bought_date = $request->get('bought_date');

        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = date('YmdHis')."_". $image->getClientOriginalName();
            $image_path = $_SERVER['DOCUMENT_ROOT']. "/computers";
            $image->move($image_path,$image_name);
        }else {$image_name = "noimage.gif";}
        if ($request->file('warranty_card')) {
            $warranty_card = $request->file('warranty_card');
            $warranty_card_name = date('YmdHis') . "_" . $warranty_card->getClientOriginalName();
            $warranty_card_path = $_SERVER['DOCUMENT_ROOT'] . "/warrantyCards";
            $warranty_card->move($warranty_card_path, $warranty_card_name);
        }else $warranty_card_name = "noimage.gif";
        $computer->image = $image_name;
        $computer->warranty_card = $warranty_card_name;

        $computer->save();
        return redirect('backend/dropDowns/computers/index')->with('success','Successfully Inserted Data!');

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
