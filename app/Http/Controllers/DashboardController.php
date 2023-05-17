<?php

namespace App\Http\Controllers;

use App\AccessGroup;
use App\AccessMaster;
use App\Partner;
use App\Course;
use App\MContentCarousel;
use App\MContentPage;
use App\MContentProgramStep;
use App\CourseModule;
use App\CoursePrice;
use App\MDifficultyType;
use App\Member;
use App\MTutor;
use App\TransOrder;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['partner'] = Partner::where('status', 1)->count();
        $data['section'] = MContentPage::where('status', 1)->count();
        $data['program_step'] = MContentProgramStep::where('status', 1)->count();
        $data['course'] = Course::where('status', 1)->count();
        $data['difficulty'] = MDifficultyType::where('status', 1)->count();
        $data['course_module'] = CourseModule::where('status', 1)->whereNull('id_course_module_parent')->count();
        $data['course_price'] =  CoursePrice::where('status', 1)->count();
        $data['tutor'] = MTutor::where('status', 1)->count();
        $data['member'] = Member::where('status', 1)->count();
        $data['content_carousel'] = MContentCarousel::where('status', 1)->count();
        $data['transaction'] = TransOrder::sum('total_after_discount');
        return view('content.dashboard', compact('data'));
    }

    public function getReport(Request $request)
    {
        $filter = $request->filter;
        $type = $request->type;
        $model = NULL;

        switch ($type) {
            case 'member':
                $model = new Member();
                break;
        }

        $output = array();

        if ($filter == 'Daily') {
            $day = date('w');
            $week_start = date('d-m-Y', strtotime('-' . $day . ' days'));
            $week_end = date('d-m-Y', strtotime('+' . (6 - $day) . ' days'));
            $date_range = $this->getDatesFromRange($week_start, $week_end, 'd-m-Y');
            foreach ($date_range as $range) {
                $explode = explode('-', $range);
                $output[$range] = $model->whereDay('created_at', $explode[0])->whereMonth('created_at', $explode[1])->whereYear('created_at', $explode[2])->count();
            }
        }
        if ($filter == 'Weekly') {
            $start_date = date("Y-m-01", strtotime(date('Y-m-d')));
            $arr = $this->getAllFromFirstDateOfMonth($start_date);

            for ($i = 0; $i < count($arr); $i++) {
                $output[$arr[$i]['week']] = $model->whereBetween('created_at', [$arr[$i]['first_date'], $arr[$i]['last_date']])->count();
            }
        }
        if ($filter == 'Monthly') {
            $year = date('Y');
            for ($i = 1; $i <= 12; $i++) {
                $output[date('F', mktime(0, 0, 0, $i, 10))] = $model->whereMonth('created_at', '0' . $i)->whereYear('created_at', $year)->count();
            }
        }
        if ($filter == 'Yearly') {
            $this_year = (int)date('Y');
            $periode_y = 5;

            $year = $this_year - $periode_y + 1;

            for ($i = $year; $i <= $this_year; $i++) {
                $output[$i] = $model->whereYear('created_at', $i)->count();
            }
        }

        return $output;
    }

    function getDatesFromRange($start, $end, $format = 'Y-m-d')
    {
        $array = array();

        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $array[] = $date->format($format);
        }

        return $array;
    }

    public function weekOfMonth($date)
    {
        list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));
        $w = 1;
        for ($i = 1; $i < $d; ++$i) {
            if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
                ++$w;
            }
        }
        return $w;
    }


    function weekOfYear($date)
    {
        $weekOfYear = intval(date("W", $date));
        if (date('n', $date) == "1" && $weekOfYear > 51) {
            $weekOfYear = 0;
        }
        return $weekOfYear;
    }

    function getAllFromFirstDateOfMonth($start_date)
    {
        list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($start_date)));

        $last_date_of_the_month = date("Y-m-t", strtotime($start_date));
        $last_date = date('d', strtotime($last_date_of_the_month));

        $total_week_in_a_month = $this->weekOfMonth($last_date_of_the_month);

        $arr_temp2 = [];
        for ($i = 1; $i < $total_week_in_a_month + 1; $i++) {

            $arr_temp1 = [];
            for ($j = 0; $j < $last_date; $j++) {
                $date = date('Y-m-d', strtotime('+' . $j . ' day', strtotime($start_date)));

                if ($this->weekOfMonth($date) == $i) {
                    $arr_temp1[] = $date;
                }
            }

            $arr = array(
                "week" => $i,
                "first_date" => $arr_temp1[0],
                "last_date" => end($arr_temp1)
            );
            $arr_temp2[] = $arr;
        }
        return $arr_temp2;
    }
}
