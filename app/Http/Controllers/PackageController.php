<?php

namespace App\Http\Controllers;

use App\MDiscount;
use App\MPackage;
use App\PackageBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_manage')) {
            return redirect('/');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_manage')) {
            return redirect('/');
        }

        return view('package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('package.package', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $package = new MPackage();
        $package->name = $summary->name;
        $package->description = $summary->description;
        $package->price = $summary->price;
        $package->status = $summary->status;
        $package->created_id = Auth::id();
        $package->updated_id = Auth::id();
        $package->save();

        if(count($summary->benefits) > 0){
            foreach ($summary->benefits as $benefit) {
                $package_benefit = new PackageBenefit();
                $package_benefit->name = $benefit->name;
                $package_benefit->description = $benefit->description;
                $package_benefit->status = 1;
                $package_benefit->created_id = Auth::id();
                $package_benefit->updated_id = Auth::id();
                $package_benefit->id_m_package = $package->id;
                $package_benefit->save();
            }
        }

        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['package'] = MPackage::find($id);
        return view('package.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_package_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['package'] = MPackage::find($id);
        return view('package.package', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'm_package_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $package = MPackage::find($id);
        $package->name = $summary->name;
        $package->description = $summary->description;
        $package->price = $summary->price;
        $package->status = $summary->status;
        $package->updated_at = Auth::id();
        $package->save();

        $delete_old_benefits = PackageBenefit::where('id_package', $id)->delete();

        if (count($summary->benefits) > 0) {
            foreach ($summary->benefits as $benefit) {
                $package_benefit = new PackageBenefit();
                $package_benefit->name = $benefit->name;
                $package_benefit->description = $benefit->description;
                $package_benefit->status = 1;
                $package_benefit->created_id = Auth::id();
                $package_benefit->updated_id = Auth::id();
                $package_benefit->id_m_package = $id;
                $package_benefit->save();
            }
        }

        return redirect()->route('packages.index');
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

    public function datatable(Request $request)
    {
        $search  = $_GET['search']['value'];
        $columns = $request->input('columns');

        $search_column = array(
            "id" => (isset($columns[1]['search']['value'])) ? $columns[1]['search']['value'] : "",
            "name" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "description" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "status" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "created_at" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "user_create" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "updated_at" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "user_update" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'name';
        else if ($order_index == 3)
            $order_field = 'description';
        else if ($order_index == 4)
            $order_field = 'status';
        else if ($order_index == 5)
            $order_field = 'created_at';
        else if ($order_index == 6)
            $order_field = 'user_create_name';
        else if ($order_index == 7)
            $order_field = 'updated_at';
        else if ($order_index == 8)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $package = new MPackage();

        $sql_total = $package->count();
        $sql_filter = $package->filter(
            $order_field,
            $order_ascdesc,
            $search,
            $search_column,
            $limit,
            $start
        );

        $filter_count = $sql_filter['filter_count'];
        $filter_data = $sql_filter['filter_data'];

        foreach ($filter_data as $value) {
            $row = array();

            $action = '';
            if (check_user_access(Session::get('user_access'), 'm_package_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('packages.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_package_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('packages.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 13px;'>Tidak Aktif</a>";
            $row[] = date('d-m-Y H:i:s', strtotime($value->created_at));
            $row[] = $value->user_create_name;
            $row[] = date('d-m-Y H:i:s', strtotime($value->updated_at));
            $row[] = $value->user_update_name;

            $data[] = $row;
        }

        if ($filter_count == 0) {
            $data = 0;
        }

        $callback = array(
            'draw' => $_GET['draw'],
            'recordsTotal' => $sql_total,
            'recordsFiltered' => $filter_count,
            'data' => $data
        );
        header('Content-Type: application/json');
        return $callback;
    }

    public function getById(Request $request)
    {
        $id_m_package = base64_decode($request->id_m_package);
        $id_m_course = base64_decode($request->id_m_course);

        $package = MPackage::with('benefits')->find($id_m_package);

        if ($id_m_course != "") {
            $course_discount = DB::table('course_discount')
                ->where('id_m_course', $id_m_course)
                ->where('id_m_package', $id_m_package)
                ->pluck('id_m_discount');
            
            if(count($course_discount) > 0)
            {
                $now = date('now');
                $discount = MDiscount::whereIn('id', $course_discount)
                    ->where('is_auto_apply', 1)
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->first();
                if($discount != NULL)
                {
                    $total_discount = 0;
                    if($discount->discount_type == 'PERCENTAGE')
                    {
                        $total_discount = $package->price * ($discount->discount / 100);
                    }else{
                        $total_discount = $discount->discount;
                    }

                    if($total_discount > $discount->max_discount)
                    {
                        $total_discount = $discount->max_discount;
                    }

                    $package->price = $package->price - $total_discount;
                }
            }
        }

        return $package;
    }

    function filter($keyword)
    {
        $package = MPackage::select('id as value', 'name as label')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->get()->toArray();
        return json_encode($package);
    }
}
