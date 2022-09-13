<?php

namespace App\Http\Controllers;

use App\MCourse;
use App\Member;
use App\MPackage;
use App\OrderConfirm;
use App\OrderCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function order_report()
    {
        if (!check_user_access(Session::get('user_access'), 'report_order_manage')) {
            return redirect('/');
        }

        $data['course'] = MCourse::all();
        $data['member'] = Member::all();
        return view('report.order', compact('data'));
    }

    public function generate_order_report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $summary = json_decode($request->summary);

        $course = count($summary->selectedCourse) > 0 ? $summary->selectedCourse : MCourse::all()->pluck('id');
        $member = count($summary->selectedMember) > 0 ? $summary->selectedMember : Member::all()->pluck('id');
        $package = count($summary->selectedPackage) > 0 ? $summary->selectedPackage : MPackage::all()->pluck('id');
        $order_status = json_decode($request->status) ?? ["0", "1", "2", "4"];
        $order_number = $summary->order_number != '' ? $summary->order_number : NULL;

        $status = true;
        $message = '';
        $data = null;

        $order = OrderCourse::select('order_course.id', 'order_course.date', 'order_course.order_number', 'member.name as member', 'order_course.total_price', 'order_course.status', 'm_course.name as course', 'm_package.name as package')
            ->join('m_course', 'm_course.id', 'order_course.id_m_course')
            ->join('member', 'member.id', 'order_course.id_member')
            ->join('m_package', 'm_package.id', 'order_course.id_m_package')
            ->whereIn('order_course.id_m_course', $course)
            ->whereIn('order_course.status', $order_status)
            ->whereIn('order_course.id_member', $member)
            ->whereIn('order_course.id_m_package', $package)
            ->whereDate('order_course.date', '>=', $start_date)
            ->whereDate('order_course.date', '<=', $end_date);

        if ($order_number != NULL) {
            $order->where('order_course.order_number', 'LIKE', "%{$order_number}%");
        }

        $data['order'] = $order->get();

        $data['total_payment'] = $order->sum('total_price');

        if (count($data) <= 0) {
            $status = false;
            $message = 'No Data Found';
            $data = null;
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }

    public function confirm_order_report()
    {
        if (!check_user_access(Session::get('user_access'), 'report_confirm_order_manage')) {
            return redirect('/');
        }

        $data['course'] = MCourse::all();
        $data['member'] = Member::all();
        return view('report.confirm_order', compact('data'));
    }

    public function generate_confirm_order_report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $summary = json_decode($request->summary);

        $course = count($summary->selectedCourse) > 0 ? $summary->selectedCourse : MCourse::all()->pluck('id');
        $member = count($summary->selectedMember) > 0 ? $summary->selectedMember : Member::all()->pluck('id');
        $package = count($summary->selectedPackage) > 0 ? $summary->selectedPackage : MPackage::all()->pluck('id');
        $order_status = json_decode($request->status) ?? ["0", "1", "2", "4"];
        $confirm_order_number = $summary->confirm_order_number != '' ? $summary->confirm_order_number : NULL;

        $status = true;
        $message = '';
        $data = null;

        $order = OrderConfirm::select('order_confirm.id', 'order_confirm.date', 'order_course.order_number', 'order_confirm.order_confirm_number', 'member.name as member', 'order_course.total_price', 'order_confirm.status', 'm_course.name as course', 'm_package.name as package')
            ->join('order_course', 'order_course.id', 'order_confirm.id_order_course')
            ->join('m_course', 'm_course.id', 'order_course.id_m_course')
            ->join('member', 'member.id', 'order_course.id_member')
            ->join('m_package', 'm_package.id', 'order_course.id_m_package')
            ->whereIn('order_confirm.id_m_course', $course)
            ->whereIn('order_confirm.status', $order_status)
            ->whereIn('order_course.id_member', $member)
            ->whereIn('order_course.id_m_package', $package)
            ->whereDate('order_confirm.date', '>=', $start_date)
            ->whereDate('order_confirm.date', '<=', $end_date);

        if ($confirm_order_number != NULL) {
            $order->where('order_course.order_number', 'LIKE', "%{$confirm_order_number}%");
        }

        $data['order'] = $order->get();

        $data['total_payment'] = $order->sum('total_price');

        if (count($data) <= 0) {
            $status = false;
            $message = 'No Data Found';
            $data = null;
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
