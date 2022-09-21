<?php

namespace App\Http\Controllers;

use App\MBank;
use App\MBankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BankAccountController extends Controller
{
    public function __construct()
    {
        if (!check_user_access(Session::get('user_access'), 'm_bank_account_manage')) {
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
        if (!check_user_access(Session::get('user_access'), 'm_bank_account_manage')) {
            return redirect('/');
        }

        return view('bank_account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!check_user_access(Session::get('user_access'), 'm_bank_account_create')) {
            return redirect('/');
        }

        $data['actions'] = 'store';
        $data['bank'] = MBank::all();
        return view('bank_account.bank_account', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!check_user_access(Session::get('user_access'), 'm_bank_account_create')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $bank_account = new MBankAccount();
        $bank_account->account_name = $summary->account_name;
        $bank_account->account_number = $summary->account_number;
        $bank_account->id_m_bank = $summary->id_m_bank;
        $bank_account->description = $summary->description;
        $bank_account->status = $summary->status;
        $bank_account->created_id = Auth::id();
        $bank_account->updated_id = Auth::id();
        $bank_account->save();

        return redirect()->route('bank_accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_bank_read')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['bank_account'] = MBankAccount::find($id);
        return view('bank_account.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!check_user_access(Session::get('user_access'), 'm_bank_update')) {
            return redirect('/');
        }

        $id = base64_decode($id);
        $data['actions'] = 'update';
        $data['bank_account'] = MBankAccount::find($id);
        $data['bank'] = MBank::all();
        return view('bank_account.bank_account', compact('data'));
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
        if (!check_user_access(Session::get('user_access'), 'm_bank_update')) {
            return redirect('/');
        }

        $summary = json_decode($request->summary);

        $id = base64_decode($id);

        $bank_account = MBankAccount::find($id);
        $bank_account->account_name = $summary->account_name;
        $bank_account->account_number = $summary->account_number;
        $bank_account->id_m_bank = $summary->id_m_bank;
        $bank_account->description = $summary->description;
        $bank_account->status = $summary->status;
        $bank_account->updated_at = Auth::id();
        $bank_account->save();

        return redirect()->route('bank_accounts.index');
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
            "account_name" => (isset($columns[2]['search']['value'])) ? $columns[2]['search']['value'] : "",
            "account_number" => (isset($columns[3]['search']['value'])) ? $columns[3]['search']['value'] : "",
            "bank" => (isset($columns[4]['search']['value'])) ? $columns[4]['search']['value'] : "",
            "description" => (isset($columns[5]['search']['value'])) ? $columns[5]['search']['value'] : "",
            "status" => (isset($columns[6]['search']['value'])) ? $columns[6]['search']['value'] : "",
            "created_at" => (isset($columns[7]['search']['value'])) ? $columns[7]['search']['value'] : "",
            "user_create" => (isset($columns[8]['search']['value'])) ? $columns[8]['search']['value'] : "",
            "updated_at" => (isset($columns[9]['search']['value'])) ? $columns[9]['search']['value'] : "",
            "user_update" => (isset($columns[10]['search']['value'])) ? $columns[10]['search']['value'] : "",
        );

        $limit = $request->input('length');
        $start = $request->input('start');
        $order_index = $_GET['order'][0]['column'];
        if ($order_index == 1)
            $order_field = 'id';
        else if ($order_index == 2)
            $order_field = 'account_name';
        else if ($order_index == 3)
            $order_field = 'account_number';
        else if ($order_index == 4)
            $order_field = 'bank';
        else if ($order_index == 5)
            $order_field = 'description';
        else if ($order_index == 6)
            $order_field = 'status';
        else if ($order_index == 7)
            $order_field = 'created_at';
        else if ($order_index == 8)
            $order_field = 'user_create_name';
        else if ($order_index == 9)
            $order_field = 'updated_at';
        else if ($order_index == 10)
            $order_field = 'user_update_name';
        else
            $order_field = 'id';

        $order_ascdesc = $_GET['order'][0]['dir'];

        $bank_account = new MBankAccount();

        $sql_total = $bank_account->count();
        $sql_filter = $bank_account->filter(
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
            if (check_user_access(Session::get('user_access'), 'm_bank_update')) {
                $action .= "<a class='btn btn-info btn-xl' href='" . route('bank_accounts.edit', base64_encode($value->id)) . "'><i class='fa fa-fw fa-pencil'></i> Edit</a>";
            }
            if (check_user_access(Session::get('user_access'), 'm_bank_read')) {
                $action .= "<a class='btn btn-success btn-xl' href='" . route('bank_accounts.show', base64_encode($value->id)) . "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }

            $row[] = $action;
            $row[] = $value->id;
            $row[] = $value->account_name;
            $row[] = $value->account_number;
            $row[] = $value->bank;
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
}
