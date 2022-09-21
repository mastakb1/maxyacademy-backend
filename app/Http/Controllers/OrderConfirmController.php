<?php

namespace App\Http\Controllers;

use App\Course;
use App\MBank;
use App\MBankAccount;
use App\MPaymentType;
use App\TransOrder;
use App\TransOrderConfirm;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OrderConfirmController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_manage')) {
            return redirect('/');
        }

        return view('order_confirm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['payment_type'] = MPaymentType::all();
        $data['bank'] = MBank::all();
        $data['bank_account'] = MBankAccount::with('bank')->get();
        return view('order_confirm.order_confirm', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $date = new DateTime($summary->date);

        $order_confirm = new TransOrderConfirm();
        $order_confirm->order_confirm_number = $this->generateNo('CONFIRM');
        $order_confirm->date = date_format(Carbon::createFromDate($date->format('Y-m-d H:i:s'), 'UTC')->tz('Asia/Jakarta'), 'Y-m-d H:i:s');
        $order_confirm->id_m_payment_type = $summary->id_m_payment_type;
        $order_confirm->id_m_bank_account = $summary->bank;
        $order_confirm->sender_bank = $summary->sender_bank;
        $order_confirm->sender_account_name = $summary->sender_account_name;
        $order_confirm->sender_account_number = $summary->sender_account_number;
        $order_confirm->amount = $summary->amount;
        $order_confirm->id_trans_order = $request->id_trans_order;
        $order_confirm->id_course = $request->id_course;
        $order_confirm->id_course_class = $request->id_course_class;
        $order_confirm->status = 0;
        $order_confirm->created_id = Auth::id();
        $order_confirm->updated_id = Auth::id();
        $order_confirm->save();

        return redirect()->route('order_confirms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['order_confirm'] = TransOrderConfirm::find($id);
        return view('order_confirm.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_create')) {
            return redirect('/');
        }

        $id = base64_decode($id);

        $data['actions'] = 'update';
        $data['payment_type'] = MPaymentType::all();
        $data['bank'] = MBank::all();
        $data['bank_account'] = MBankAccount::with('bank')->get();
        $data['order_confirm'] = TransOrderConfirm::find($id);
        $data['selected_course'] = Course::find($data['order_confirm']->id_course);
        $data['selected_order'] = TransOrder::find($data['order_confirm']->id_trans_order);
        return view('order_confirm.order_confirm', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);
        $date = new DateTime($summary->date);
        $id = base64_decode($id);

        $order_confirm = TransOrderConfirm::find($id);
        $order_confirm->date = date_format(Carbon::createFromDate($date->format('Y-m-d H:i:s'), 'UTC')->tz('Asia/Jakarta'), 'Y-m-d H:i:s');
        $order_confirm->id_m_payment_type = $summary->id_m_payment_type;
        $order_confirm->id_m_bank_account = $summary->bank;
        $order_confirm->sender_bank = $summary->sender_bank;
        $order_confirm->sender_account_name = $summary->sender_account_name;
        $order_confirm->sender_account_number = $summary->sender_account_number;
        $order_confirm->amount = $summary->amount;
        $order_confirm->id_trans_order = $request->id_trans_order;
        $order_confirm->id_course = $request->id_course;
        $order_confirm->id_course_class = $request->id_course_class;
        $order_confirm->updated_id = Auth::id();
        $order_confirm->save();

        return redirect()->route('order_confirms.index');
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
            "order_confirm_number" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "date" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "sender_account_name" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "sender_account_number" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "sender_bank" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "account_name" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "bank" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "amount" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
            "member" => (isset($columns[11]['search']['value'])) ? $columns[11]['search']['value'] : "",
            "status" => (isset($columns[12]['search']['value'])) ? $columns[12]['search']['value'] : "",
            "verified_at" => (isset($columns[13]['search']['value'])) ? $columns[13]['search']['value'] : "",
            "user_verified" => (isset($columns[14]['search']['value'])) ? $columns[14]['search']['value'] : "",
            "verified_comment" => (isset($columns[15]['search']['value'])) ? $columns[15]['search']['value'] : "",
            "created_at" => (isset($columns[16]['search']['value'])) ? $columns[16]['search']['value'] : "",
            "user_create" => (isset($columns[17]['search']['value'])) ? $columns[17]['search']['value'] : "",
            "updated_at" => (isset($columns[18]['search']['value'])) ? $columns[18]['search']['value'] : "",
            "user_update" => (isset($columns[19]['search']['value'])) ? $columns[19]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'order_number';
        else if ($order_index == 3)
            $order_field = 'order_confirm_number';
        else if ($order_index == 4)
            $order_field = 'date';
        else if ($order_index == 5)
            $order_field = 'sender_account_name';
        else if ($order_index == 6)
            $order_field = 'sender_account_number';
        else if ($order_index == 7)
            $order_field = 'sender_bank';
        else if ($order_index == 8)
            $order_field = 'account_name';
        else if ($order_index == 9)
            $order_field = 'bank';
        else if ($order_index == 10)
            $order_field = 'amount';
        else if ($order_index == 11)
            $order_field = 'member';
        else if ($order_index == 12)
            $order_field = 'status';
        else if ($order_index == 13)
            $order_field = 'verified_at';
        else if ($order_index == 14)
            $order_field = 'user_verified_name';
        else if ($order_index == 15)
            $order_field = 'verified_comment';
        else if ($order_index == 16)
            $order_field = 'created_at';
        else if ($order_index == 17)
            $order_field = 'user_create_name';
        else if ($order_index == 18)
            $order_field = 'updated_at';
        else if ($order_index == 19)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $order_confirm = new TransOrderConfirm();

        $sql_total = $order_confirm->count();
        $sql_filter = $order_confirm->filter(
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
            if (check_user_access(Session::get('user_access'), 'trans_order_confirm_update') && $value->status != 1 && $value->status != 4) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('order_confirms.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'trans_order_confirm_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('order_confirms.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            if ($value->status != 1 && $value->status != 4) {
                $action .= "<a id='modal_complete' href='' class='btn btn-success btn-xl' data-order='" . $value->id . "' data-toggle='modal' data-target='#modalcomplete'><i class='fa fa-fw fa-check'></i> Verified Complete</a>";
                $action .= "<a id='modal_cancel' href='' class='btn btn-danger btn-xl' data-order='" . $value->id . "' data-toggle='modal' data-target='#modalcancel'><i class='fa fa-fw fa-times'></i> Verified Cancel</a>";
            }

            switch ($value->status) {
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
            $row[] = $value->order_confirm_number;
            $row[] = $value->date;
            $row[] = $value->sender_account_name;
            $row[] = $value->sender_account_number;
            $row[] = $value->sender_bank;
            $row[] = $value->account_name;
            $row[] = $value->bank;
            $row[] = $value->amount;
            $row[] = $value->member;
            $row[] = $value->status;
            $row[] = date('d-m-Y H:i:s', strtotime($value->verified_at));
            $row[] = $value->user_verified_name;
            $row[] = $value->verified_comment;
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

    public function verified(Request $request)
    {
        $id = base64_decode($request->id);
        $action = $request->action;
        $comment = $request->verified_comment;

        if (Hash::check($request->password, Auth::user()->password)) {
            $order_confirm = TransOrderConfirm::find($id);
            $order_confirm->status = $action == 'COMPLETE' ? 1 : 4;
            $order_confirm->verified_at = date('Y-m-d H:i:s', strtotime('now'));
            $order_confirm->verified_id = Auth::id();
            $order_confirm->verified_comment = $comment;
            $order_confirm->save();

            if($action == 'COMPLETE')
            {
                $order = TransOrder::find($order_confirm->id_trans_order);
                $order->status = 1;
                $order->save();
            }

            return redirect()->route('order_confirms.index');
        }

        return redirect('order_confirms')->with('alert', 'Tidak dapat melakukan verifikasi konfirmasi order, password salah !');
    }
}
