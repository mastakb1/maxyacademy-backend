<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseClass;
use App\CoursePrice;
use App\Member;
use App\OrderConfirm;
use App\TransOrder;
use App\TransOrderConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function order_report()
    {
        if (!check_user_access(Session::get('user_access'), 'trans_order_report_manage')) {
            return redirect('/');
        }

        $data['course'] = Course::all();
        $data['member'] = Member::all();
        return view('report.order', compact('data'));
    }

    public function generate_order_report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $summary = json_decode($request->summary);

        $course = count($summary->selectedCourse) > 0 ? $summary->selectedCourse : CourseClass::all()->pluck('id');
        $member = count($summary->selectedMember) > 0 ? $summary->selectedMember : Member::all()->pluck('id');
        $course_price = count($summary->selectedCoursePrice) > 0 ? $summary->selectedCoursePrice : CoursePrice::all()->pluck('id');
        $order_status = json_decode($request->status) ?? ["0", "1", "2", "4"];
        $order_number = $summary->order_number != '' ? $summary->order_number : NULL;

        $status = true;
        $message = '';
        $data = null;

        $order = TransOrder::select('trans_order.id', 'trans_order.date', 'trans_order.order_number', 'member.name as member', 'trans_order.total_after_discount as total', 'trans_order.status', 'course.name as course', 'course_price.name as course_price')
            ->join('course', 'course.id', 'trans_order.id_course')
            ->join('course_class', 'course_class.id', 'trans_order.id_course_class')
            ->join('member', 'member.id', 'trans_order.id_member')
            ->join('course_price', 'course_price.id', 'trans_order.id_course_price')
            ->whereIn('trans_order.id_course_class', $course)
            ->whereIn('trans_order.status', $order_status)
            ->whereIn('trans_order.id_member', $member)
            ->whereIn('trans_order.id_course_price', $course_price)
            ->whereDate('trans_order.date', '>=', $start_date)
            ->whereDate('trans_order.date', '<=', $end_date);

        if ($order_number != NULL) {
            $order->where('trans_order.order_number', 'LIKE', "%{$order_number}%");
        }

        $data['order'] = $order->get();

        $data['total_payment'] = $order->sum('total_after_discount');

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
        if (!check_user_access(Session::get('user_access'), 'trans_order_confirm_manage')) {
            return redirect('/');
        }

        $data['course'] = Course::all();
        $data['member'] = Member::all();
        return view('report.confirm_order', compact('data'));
    }

    public function generate_confirm_order_report(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $summary = json_decode($request->summary);

        $course = count($summary->selectedCourse) > 0 ? $summary->selectedCourse : CourseClass::all()->pluck('id');
        $member = count($summary->selectedMember) > 0 ? $summary->selectedMember : Member::all()->pluck('id');
        $course_price = count($summary->selectedCoursePrice) > 0 ? $summary->selectedCoursePrice : CoursePrice::all()->pluck('id');
        $order_status = json_decode($request->status) ?? ["0", "1", "2", "4"];
        $confirm_order_number = $summary->confirm_order_number != '' ? $summary->confirm_order_number : NULL;

        $status = true;
        $message = '';
        $data = null;
        
        $order = TransOrderConfirm::select('trans_order_confirm.id', 'trans_order_confirm.date', 'trans_order.order_number', 'trans_order_confirm.order_confirm_number', 'member.name as member', 'trans_order.total_after_discount as total', 'trans_order_confirm.status', 'course.name as course', 'course_price.name as course_price')
            ->join('trans_order', 'trans_order.id', 'trans_order_confirm.id_trans_order')
            ->join('course', 'course.id', 'trans_order.id_course')
            ->join('course_class', 'course_class.id', 'trans_order.id_course_class')
            ->join('member', 'member.id', 'trans_order.id_member')
            ->join('course_price', 'course_price.id', 'trans_order.id_course_price')
            ->whereIn('trans_order_confirm.id_course_class', $course)
            ->whereIn('trans_order_confirm.status', $order_status)
            ->whereIn('trans_order.id_member', $member)
            ->whereIn('trans_order.id_course_price', $course_price)
            ->whereDate('trans_order_confirm.date', '>=', $start_date)
            ->whereDate('trans_order_confirm.date', '<=', $end_date);

        if ($confirm_order_number != NULL) {
            $order->where('trans_order_confirm.order_confirm_number', 'LIKE', "%{$confirm_order_number}%");
        }

        $data['order'] = $order->get();

        $data['total_payment'] = $order->sum('total_after_discount');

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
