<?php

namespace App\Http\Controllers;

use App\CoursePrice;
use App\CoursePriceBenefit;
use App\MDiscount;
use App\PackageBenefit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoursePriceController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'course_price_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'course_price_manage')) {
            return redirect('/');
        }

        return view('course_price.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'course_price_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('course_price.course_price', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'course_price_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $course_price = new CoursePrice();
        $course_price->name = $summary->name;
        $course_price->description = $summary->description;
        $course_price->price = $summary->price;
        $course_price->status = $summary->status;
        $course_price->created_id = Auth::id();
        $course_price->updated_id = Auth::id();
        $course_price->save();

        if(count($summary->benefits) > 0){
            foreach ($summary->benefits as $benefit) {
                $course_price_benefit = new CoursePriceBenefit();
                $course_price_benefit->name = $benefit->name;
                $course_price_benefit->description = $benefit->description;
                $course_price_benefit->status = $benefit->isChecked;
                $course_price_benefit->created_id = Auth::id();
                $course_price_benefit->updated_id = Auth::id();
                $course_price_benefit->id_course_price = $course_price->id;
                $course_price_benefit->save();
            }
        }

        return redirect()->route('course_prices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_price_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['course_price'] = CoursePrice::find($id);
        return view('course_price.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'course_price_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['course_price'] = CoursePrice::find($id);
        return view('course_price.course_price', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'course_price_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $course_price = CoursePrice::find($id);
        $course_price->name = $summary->name;
        $course_price->description = $summary->description;
        $course_price->price = $summary->price;
        $course_price->status = $summary->status;
        $course_price->updated_at = Auth::id();
        $course_price->save();

        $delete_old_benefits = CoursePriceBenefit::where('id_course_price', $id)->delete();

        if (count($summary->benefits) > 0) {
            foreach ($summary->benefits as $benefit) {
                $course_price_benefit = new CoursePriceBenefit();
                $course_price_benefit->name = $benefit->name;
                $course_price_benefit->description = $benefit->description;
                $course_price_benefit->status = $benefit->isChecked;
                $course_price_benefit->created_id = Auth::id();
                $course_price_benefit->updated_id = Auth::id();
                $course_price_benefit->id_course_price = $id;
                $course_price_benefit->save();
            }
        }

        return redirect()->route('course_prices.index');
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

        $course_price = new CoursePrice();

        $sql_total = $course_price->count();
        $sql_filter = $course_price->filter(
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
            if (check_user_access(Session::get('user_access'), 'course_price_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('course_prices.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'course_price_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('course_prices.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->description;
            $row[] = $value->status == 1 ? "<a class='ui green label' style='font-size: 10px;'>Aktif</a>" : "<a class='ui red label' style='font-size: 10px;'>Tidak Aktif</a>";
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
        $id_course_price = base64_decode($request->id_course_price);
        $course_price = CoursePrice::with('benefits')->find($id_course_price);
        return $course_price;
    }

    function filter($keyword)
    {
        $course_price = CoursePrice::select('id', 'name as label')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->get()->toArray();
        return json_encode($course_price);
    }
}
