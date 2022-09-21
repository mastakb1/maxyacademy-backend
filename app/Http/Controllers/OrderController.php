<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseClass;
use App\CoursePrice;
use App\Member;
use App\Promotion;
use App\TransOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'trans_order_manage')) {
            return redirect('/');
        }

        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        return view('order.order', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $order_course = new TransOrder();
        $order_course->order_number = $this->generateNo('ORDER');
        $order_course->date = date('Y-m-d H:i:s', strtotime('now'));
        $order_course->total = $request->total;
        $order_course->id_course = $request->id_course;
        $order_course->id_course_class = $request->id_course_class;
        $order_course->id_course_price = $request->id_course_price;
        $order_course->id_member = $request->id_member;
        $order_course->id_promotion = $request->id_promotion;

        if($request->id_promotion != NULL)
        {
            $discount = $request->discount;
            $order_course->discount = $discount;
            $order_course->total_after_discount = $order_course->total - $discount;
        }else{
            $discount = 0;
            $order_course->discount = $discount;
            $order_course->total_after_discount = $order_course->total - $discount;
        }

        $order_course->status = 0;
        $order_course->created_id = Auth::id();
        $order_course->updated_id = Auth::id();
        $order_course->save();

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['order'] = TransOrder::find($id);
        return view('order.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);

        $data['actions'] = 'update';
        $data['order'] = TransOrder::find($id);
        $data['selected_course'] = Course::find($data['order']->id_course);
        $data['selected_member'] = Member::find($data['order']->id_member);
        $data['selected_course_price'] = CoursePrice::with('benefits')->where('id', $data['order']->id_course_price)->first();
        $data['selected_promotion'] = Promotion::find($data['order']->id_promotion);

        return view('order.order', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'trans_order_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $id = base64_decode($id);

        $order_course = TransOrder::find($id);
        $order_course->total = $request->total;
        $order_course->id_course = $request->id_course;
        $order_course->id_course_class = $request->id_course_class;
        $order_course->id_course_price = $request->id_course_price;
        $order_course->id_member = $request->id_member;
        $order_course->id_promotion = $request->id_promotion;

        if ($request->id_promotion != NULL) {
            $discount = $request->discount;
            $order_course->discount = $discount;
            $order_course->total_after_discount = $order_course->total - $discount;
        } else {
            $discount = 0;
            $order_course->discount = $discount;
            $order_course->total_after_discount = $order_course->total - $discount;
        }

        $order_course->updated_id = Auth::id();
        $order_course->save();

        return redirect()->route('orders.index');
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
            "course_price" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "promotion" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "total" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "discount" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "total_after_discount" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "status" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
            "forced_at" => (isset($columns[11]['search']['value'])) ? $columns[11]['search']['value'] : "",
            "user_forced" => (isset($columns[12]['search']['value'])) ? $columns[12]['search']['value'] : "",
            "forced_comment" => (isset($columns[13]['search']['value'])) ? $columns[13]['search']['value'] : "",
            "created_at" => (isset($columns[14]['search']['value'])) ? $columns[14]['search']['value'] : "",
            "user_create" => (isset($columns[15]['search']['value'])) ? $columns[15]['search']['value'] : "",
            "updated_at" => (isset($columns[16]['search']['value'])) ? $columns[16]['search']['value'] : "",
            "user_update" => (isset($columns[17]['search']['value'])) ? $columns[17]['search']['value'] : "",
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
            $order_field = 'course_price';
        else if ($order_index == 6)
            $order_field = 'promotion';
        else if ($order_index == 7)
            $order_field = 'total';
        else if ($order_index == 8)
            $order_field = 'discount';
        else if ($order_index == 9)
            $order_field = 'total_after_discount';
        else if ($order_index == 10)
            $order_field = 'status';
        else if ($order_index == 11)
            $order_field = 'forced_at';
        else if ($order_index == 12)
            $order_field = 'user_forced_name';
        else if ($order_index == 13)
            $order_field = 'forced_comment';
        else if ($order_index == 14)
            $order_field = 'created_at';
        else if ($order_index == 15)
            $order_field = 'user_create_name';
        else if ($order_index == 16)
            $order_field = 'updated_at';
        else if ($order_index == 17)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $trans_order = new TransOrder();

        $sql_total = $trans_order->count();
        $sql_filter = $trans_order->filter(
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
            if (check_user_access(Session::get('user_access'), 'trans_order_update') && $value->status != 1 && $value->status != 4) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('orders.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'trans_order_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('orders.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
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
            $row[] = $value->course_price;
            $row[] = $value->promotion;
            $row[] = $value->total;
            $row[] = $value->discount;
            $row[] = $value->total_after_discount;
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
            $order_course = TransOrder::find($id);
            $order_course->status = $action == 'COMPLETE' ? 1 : 4;
            $order_course->forced_at = date('Y-m-d H:i:s', strtotime('now'));
            $order_course->forced_id = Auth::id();
            $order_course->forced_comment = $comment;
            $order_course->save();
            return redirect()->route('orders.index');
        }

        return redirect('orders')->with('alert', 'Tidak dapat melakukan cancel order, password salah !');
    }

    public function getById(Request $request)
    {
        $id_trans_order = base64_decode($request->id_trans_order);

        $order = TransOrder::select('trans_order.*', 'member.name as member', 'course.name as course', 'course_price.name as course_price')
            ->join('member', 'member.id', 'trans_order.id_member')
            ->join('course', 'course.id', 'trans_order.id_course')
            ->join('course_price', 'course_price.id', 'trans_order.id_course_price')
            ->where('trans_order.id', $id_trans_order)
            ->first();
        return $order;
    }

    public function getByCourseId(Request $request)
    {
        $id_course = base64_decode($request->id_course);
        $search = $request->search;

        $order = TransOrder::join('member', 'member.id', 'trans_order.id_member')
            ->selectRaw('trans_order.id, CONCAT(trans_order.order_number, " - ", member.name) as label')
            ->where('trans_order.id_course', $id_course)
            ->where(function($query) use ($search){
                $query->where('trans_order.order_number', 'LIKE', "%{$search}%")
                    ->orwhere('member.name', 'LIKE', "%{$search}%");
            })
            ->whereNotIn('trans_order.status', [1,4])
            ->get();

        return $order;
    }
}
