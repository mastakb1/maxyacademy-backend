<?php

namespace App\Http\Controllers;

use App\MCourse;
use App\MDiscount;
use App\Member;
use App\MPackage;
use App\OrderCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrderCourseController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'order_course_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'order_course_manage')) {
            return redirect('/');
        }

        return view('order_course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'order_course_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['course'] = MCourse::select('id', 'name as label')->get();
        $data['member'] = Member::select('id', 'name as label')->get();
        $data['package'] = MPackage::select('id', 'name as label')->get();
        $data['discount'] = MDiscount::select('id', 'code as label')->get();
        return view('order_course.order_course', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'order_course_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $order_course = new OrderCourse();
        $order_course->order_number = $this->generateNo('ORDER');
        $order_course->date = date('Y-m-d H:i:s', strtotime('now'));
        $order_course->total_price = $request->total_price;
        $order_course->id_m_course = $request->id_m_course;
        $order_course->id_m_package = $request->id_m_package;
        $order_course->id_member = $request->id_member;
        $order_course->id_m_discount = $request->id_m_discount;
        $order_course->status = 0;
        $order_course->created_id = Auth::id();
        $order_course->updated_id = Auth::id();
        $order_course->save();

        return redirect()->route('order_courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'order_course_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['order_course'] = OrderCourse::find($id);
        return view('order_course.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'order_course_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['order_course'] = OrderCourse::find($id);
        $data['course'] = MCourse::all();
        $data['member'] = Member::all();
        $data['package'] = MPackage::all();
        $data['discount'] = MDiscount::all();
        $data['selected_course'] = MCourse::find($data['order_course']->id_m_course);
        $data['selected_member'] = Member::find($data['order_course']->id_member);
        $data['selected_package'] = MPackage::with('benefits')->where('id', $data['order_course']->id_m_package)->first();
        $data['selected_discount'] = MDiscount::find($data['order_course']->id_m_discount);

        return view('order_course.order_course', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'order_course_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $id = base64_decode($id);

        $order_course = OrderCourse::find($id);
        $order_course->date = date('Y-m-d H:i:s', strtotime('now'));
        $order_course->total_price = $request->total_price;
        $order_course->id_m_course = $request->id_m_course;
        $order_course->id_m_package = $request->id_m_package;
        $order_course->id_member = $request->id_member;
        $order_course->id_m_discount = $request->id_m_discount;
        $order_course->updated_id = Auth::id();
        $order_course->save();

        return redirect()->route('order_courses.index');
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
            "order_number" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "date" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "member" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "package" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "discount" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "total_price" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "status" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "forced_at" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "user_forced" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
            "forced_comment" => (isset($columns[11]['search']['value'])) ? $columns[11]['search']['value'] : "",
            "created_at" => (isset($columns[12]['search']['value'])) ? $columns[12]['search']['value'] : "",
            "user_create" => (isset($columns[13]['search']['value'])) ? $columns[13]['search']['value'] : "",
            "updated_at" => (isset($columns[14]['search']['value'])) ? $columns[14]['search']['value'] : "",
            "user_update" => (isset($columns[15]['search']['value'])) ? $columns[15]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'order_number';
        else if ($order_index == 3)
            $order_field = 'date';
        else if ($order_index == 4)
            $order_field = 'member';
        else if ($order_index == 5)
            $order_field = 'package';
        else if ($order_index == 6)
            $order_field = 'discount';
        else if ($order_index == 7)
            $order_field = 'total_price';
        else if ($order_index == 8)
            $order_field = 'status';
        else if ($order_index == 9)
            $order_field = 'forced_at';
        else if ($order_index == 10)
            $order_field = 'user_forced_name';
        else if ($order_index == 11)
            $order_field = 'forced_comment';
        else if ($order_index == 12)
            $order_field = 'created_at';
        else if ($order_index == 13)
            $order_field = 'user_create_name';
        else if ($order_index == 14)
            $order_field = 'updated_at';
        else if ($order_index == 15)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $order_course = new OrderCourse();

        $sql_total = $order_course->count();
        $sql_filter = $order_course->filter(
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
            if (check_user_access(Session::get('user_access'), 'order_course_update') && $value->status != 1 && $value->status != 4) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('order_courses.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'order_course_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('order_courses.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            if ($value->status != 1 && $value->status != 4) {
                $action .= "<a id='modal_complete' href='' class='btn btn-success btn-xl' data-order='" . $value->id . "' data-toggle='modal' data-target='#modalcomplete'><i class='fa fa-fw fa-check'></i> Force Complete</a>";
                $action .= "<a id='modal_cancel' href='' class='btn btn-danger btn-xl' data-order='" . $value->id . "' data-toggle='modal' data-target='#modalcancel'><i class='fa fa-fw fa-times'></i> Force Cancel</a>";
            }

            switch($value->status){
                case 0:
                    $value->status =  "<a class='ui red label' style='font-size: 10px;'>Not Completed</a>";
                    break;
                case 1:
                    $value->status = "<a class='ui green label' style='font-size: 10px;'>Completed</a>";
                    break;
                case 2:
                    $value->status = "<a class='ui yellow label' style='font-size: 10px;'>Partial</a>";
                    break;
                case 4:
                    $value->status = "<a class='ui red label' style='font-size: 10px;'>Cancelled</a>";
                    break;
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->order_number;
            $row[] = $value->date;
            $row[] = $value->member;
            $row[] = $value->package;
            $row[] = $value->discount;
            $row[] = $value->total_price;
            $row[] = $value->status;
            $row[] = date('d-m-Y H:i:s', strtotime($value->forced_at));
            $row[] = $value->user_forced_name;
            $row[] = $value->forced_comment;
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

    public function generateNo($type)
    {
        $month = date('n');
        $year = date('Y');

        $last_no = DB::table('no_generator')
        ->where('month', $month)
            ->where('year', $year)
            ->where('type', $type)
            ->first();

        if ($last_no == null) {
            $no = DB::table('no_generator')->insert(['month' => $month, 'year' => $year, 'value' => 1, 'type' => $type]);
            return $type . '/' . $year . '/' . sprintf("%02d", $month) . '/' . sprintf("%03d", 1);
        } else {
            $no = $last_no->value + 1;
            $update_no = DB::table('no_generator')->where('month', $month)->where('year', $year)->where('type', $type)->update(['value' => $no]);
            return $type . '/' . $year . '/' . sprintf("%02d", $month) . '/' . sprintf("%03d", $no);
        }
    }

    public function forced(Request $request)
    {
        $id = base64_decode($request->id);
        $action = $request->action;
        $comment = $request->forced_comment;

        if (Hash::check($request->password, Auth::user()->password)) {
            $order_course = OrderCourse::find($id);
            $order_course->status = $action == 'COMPLETE' ? 1 : 4;
            $order_course->forced_at = date('Y-m-d H:i:s', strtotime('now'));
            $order_course->forced_id = Auth::id();
            $order_course->forced_comment = $comment;
            $order_course->save();
            return redirect()->route('order_courses.index');
        }

        return redirect('order_courses')->with('alert', 'Tidak dapat melakukan cancel order, password salah !');
    }

    public function getById(Request $request)
    {
        $id_order_course = base64_decode($request->id_order_course);

        $order_course = OrderCourse::select('order_course.*', 'member.name as member', 'm_course.name as course', 'm_package.name as package')
            ->join('member', 'member.id', 'order_course.id_member')
            ->join('m_course', 'm_course.id', 'order_course.id_m_course')
            ->join('m_package', 'm_package.id', 'order_course.id_m_package')
            ->where('order_course.id', $id_order_course)
            ->first();
        return $order_course;
    }

    public function getByCourseId(Request $request)
    {
        $id_m_course = base64_decode($request->id_m_course);
        $search = $request->search;

        $order_course = OrderCourse::join('member', 'member.id', 'order_course.id_member')
            ->selectRaw('order_course.id, CONCAT(order_course.order_number, " - ", member.name) as label')
            ->where('order_course.id_m_course', $id_m_course)
            ->where(function($query) use ($search){
                $query->where('order_course.order_number', 'LIKE', "%{$search}%")
                    ->orwhere('member.name', 'LIKE', "%{$search}%");
            })
            ->get();

        return $order_course;
    }
}
