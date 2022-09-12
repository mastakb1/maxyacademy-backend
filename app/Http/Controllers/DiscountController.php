<?php

namespace App\Http\Controllers;

use App\MCourse;
use App\MDiscount;
use App\MPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DiscountController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'm_discount_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'm_discount_manage')) {
            return redirect('/');
        }

        return view('discount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'm_discount_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['course'] = MCourse::all();
        $data['package'] = MPackage::all();
        return view('discount.discount', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'm_discount_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $discount = new MDiscount();
        $discount->name = $summary->name;
        $discount->code = $summary->code;
        $discount->description = $summary->description;
        $discount->start_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[0]));
        $discount->end_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[1]));
        $discount->discount_type = $summary->discount_type;
        $discount->discount = $summary->discount;
        $discount->is_auto_apply = $summary->is_auto_apply;
        $discount->status = $summary->status;
        $discount->created_id = Auth::id();
        $discount->updated_id = Auth::id();
        $discount->save();

        foreach ($summary->id_m_course as $course) {
            foreach ($summary->id_m_package as $package) {
                DB::table('course_discount')->insert(['id_m_course' => $course, 'id_m_package' => $package, 'id_m_discount' => $discount->id]);
            }
        }

        return redirect()->route('discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_discount_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['discount'] = MDiscount::find($id);
        return view('discount.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_discount_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['discount'] = MDiscount::find($id);
        $data['course'] = MCourse::all();
        $data['package'] = MPackage::all();
        $data['course_discount'] = MCourse::join('course_discount', 'id', 'id_m_course')->where('id_m_discount', $id)->pluck('id_m_course');
        $data['package_discount'] = MPackage::join('course_discount', 'id', 'id_m_package')->where('id_m_discount', $id)->pluck('id_m_package');
        return view('discount.discount', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'm_discount_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $discount = MDiscount::find($id);
        $discount->name = $summary->name;
        $discount->code = $summary->code;
        $discount->description = $summary->description;
        $discount->start_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[0]));
        $discount->end_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[1]));
        $discount->discount_type = $summary->discount_type;
        $discount->discount = $summary->discount;
        $discount->is_auto_apply = $summary->is_auto_apply;
        $discount->status = $summary->status;
        $discount->updated_at = Auth::id();
        $discount->save();

        $delete_old_course_discount = DB::table('course_discount')->where('id_m_discount', $id)->delete();

        foreach ($summary->id_m_course as $course) {
            foreach ($summary->id_m_package as $package) {
                DB::table('course_discount')->insert(['id_m_course' => $course, 'id_m_package' => $package, 'id_m_discount' => $id]);
            }
        }

        return redirect()->route('discounts.index');
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

        $discount = new MDiscount();

        $sql_total = $discount->count();
        $sql_filter = $discount->filter(
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
            if (check_user_access(Session::get('user_access'), 'm_discount_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('discounts.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_discount_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('discounts.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
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
}
