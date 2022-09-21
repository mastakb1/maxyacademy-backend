<?php

namespace App\Http\Controllers;

use App\Course;
use App\CoursePrice;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PromotionController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'promotion_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'promotion_manage')) {
            return redirect('/');
        }

        return view('promotion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'promotion_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['course'] = Course::all();
        return view('promotion.promotion', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'promotion_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $promotion = new Promotion();
        $promotion->name = $summary->name;
        $promotion->code = $summary->code;
        $promotion->description = $summary->description;
        $promotion->start_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[0]));
        $promotion->end_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[1]));
        $promotion->discount_type = $summary->discount_type;
        $promotion->discount = $summary->discount;
        $promotion->max_discount = $summary->max_discount == '' ? NULL : $summary->max_discount;
        $promotion->status = $summary->status;
        $promotion->created_id = Auth::id();
        $promotion->updated_id = Auth::id();
        $promotion->save();

        foreach ($summary->id_course as $course) {
            DB::table('promotion_course')->insert(['id_course' => $course, 'id_promotion' => $promotion->id]);
        }

        return redirect()->route('promotions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'promotion_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['promotion'] = Promotion::find($id);
        return view('promotion.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'promotion_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['promotion'] = Promotion::find($id);
        $data['course'] = Course::all();
        $data['course_discount'] = DB::table('promotion_course')->where('promotion_course.id_promotion', $id)->pluck('promotion_course.id_course');
        return view('promotion.promotion', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'promotion_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $promotion = Promotion::find($id);
        $promotion->name = $summary->name;
        $promotion->code = $summary->code;
        $promotion->description = $summary->description;
        $promotion->start_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[0]));
        $promotion->end_date = date('Y-m-d H:i:s', strtotime(explode(' - ', $summary->date)[1]));
        $promotion->discount_type = $summary->discount_type;
        $promotion->discount = $summary->discount;
        $promotion->max_discount = $summary->max_discount == '' ? NULL : $summary->max_discount;
        $promotion->status = $summary->status;
        $promotion->updated_at = Auth::id();
        $promotion->save();

        $delete_old_promotion_course = DB::table('promotion_course')->where('id_promotion', $id)->delete();

        foreach ($summary->id_course as $course) {
            DB::table('promotion_course')->insert(['id_course' => $course, 'id_promotion' => $id]);
        }

        return redirect()->route('promotions.index');
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
            "code" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "description" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "start_date" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "end_date" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "discount_type" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "discount" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "max_discount" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "status" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
            "created_at" => (isset($columns[11]['search']['value'])) ? $columns[11]['search']['value'] : "",
            "user_create" => (isset($columns[12]['search']['value'])) ? $columns[12]['search']['value'] : "",
            "updated_at" => (isset($columns[13]['search']['value'])) ? $columns[13]['search']['value'] : "",
            "user_update" => (isset($columns[14]['search']['value'])) ? $columns[14]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'name';
        else if ($order_index == 3)
            $order_field = 'code';
        else if ($order_index == 4)
            $order_field = 'description';
        else if ($order_index == 5)
            $order_field = 'start_date';
        else if ($order_index == 6)
            $order_field = 'end_date';
        else if ($order_index == 7)
            $order_field = 'discount_type';
        else if ($order_index == 8)
            $order_field = 'discount';
        else if ($order_index == 9)
            $order_field = 'max_discount';
        else if ($order_index == 10)
            $order_field = 'status';
        else if ($order_index == 11)
            $order_field = 'created_at';
        else if ($order_index == 12)
            $order_field = 'user_create_name';
        else if ($order_index == 13)
            $order_field = 'updated_at';
        else if ($order_index == 14)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $promotion = new Promotion();

        $sql_total = $promotion->count();
        $sql_filter = $promotion->filter(
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
            if (check_user_access(Session::get('user_access'), 'promotion_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('promotions.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'promotion_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('promotions.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->name;
            $row[] = $value->code;
            $row[] = $value->description;
            $row[] = date('d-m-Y H:i:s', strtotime($value->start_date));
            $row[] = date('d-m-Y H:i:s', strtotime($value->end_date));
            $row[] = $value->discount_type;
            $row[] = $value->discount;
            $row[] = $value->max_discount;
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
        $id_promotion = base64_decode($request->id_promotion);
        $now = date('Y-m-d H:i:s', strtotime('now'));

        $promotion = Promotion::where('id', $id_promotion)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->first();
        return $promotion;
    }

    function filter($keyword)
    {
        $promotion = Promotion::select('id', 'code as label')
            ->where('code', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->get()->toArray();
        return json_encode($promotion);
    }
}
