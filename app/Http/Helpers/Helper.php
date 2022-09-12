<?php

use App\OrderTicketDetail;
use App\UserLog;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

if (!function_exists('check_user_access')) {
	function check_user_access($access_list, $access, $separator = ";;")
	{
		$user_access = explode($separator, $access_list);
		return in_array($access, $user_access);
	}
}

if(!function_exists('format_date')){
	function format_date($start, $end)
	{
		$start_date = ($start != NULL && $start != '') ? date_format(new DateTime($start), 'd F Y') : NULL;
		$end_date = ($end != NULL && $end != '') ? date_format(new DateTime($end), 'd F Y') : NULL;

		return $start_date != $end_date ? $start_date . ' - ' . $end_date : $start_date;
	}
}

if(!function_exists('stringify_date')){
	function stringify_date($num_date){
		if($num_date == 0) return 'sunday';
		if($num_date == 1) return 'monday';
		if($num_date == 2) return 'tuesday';
		if($num_date == 3) return 'wednesday';
		if($num_date == 4) return 'thursday';
		if($num_date == 5) return 'friday';
		if($num_date == 6) return 'saturday';
	}
}

if (!function_exists('stringify_week')) {
	function stringify_week($num_week)
	{
		if ($num_week == 1) return 'first';
		if ($num_week == 2) return 'second';
		if ($num_week == 3) return 'third';
		if ($num_week == 4) return 'fourth';
		if ($num_week == 5) return 'fifth';
		if ($num_week == 6) return 'sixth';
	}
}

if(!function_exists('getAllDaysInAMonth')){
	function getAllDaysInAMonth($year, $month, $day, $daysError = 3)
	{
		$dateString = 'first ' . $day . ' of ' . $year . '-' . $month;
		if (!strtotime($dateString)) {
			throw new \Exception('"' . $dateString . '" is not a valid strtotime');
		}
		$startDay = new \DateTime($dateString);
		$days = array();
		while ($startDay->format('Y-m') <= $year . '-' . str_pad($month, 2, 0, STR_PAD_LEFT)) {
			$days[] = ['date' => date_format($startDay, 'Y-m-d')];
			$startDay->modify('+ 7 days');
		}
		return $days;
	}
}

if (!function_exists('generate_qr')) {
	function generate_qr($string)
	{
		$code = sha1($string);
		$qrcode = substr($code, 0, 10);

		$check = OrderTicketDetail::where('qrcode', $qrcode)->first();

		while ($check != NULL) {
			$code = sha1($string);
			$qrcode = substr($code, 0, 10);
			$check = OrderTicketDetail::where('qrcode', $qrcode)->first();
		}

		return $qrcode;
	}
}

if(!function_exists('save_log')){
	function save_log($ip, $type, $table, $id){
		$keterangan = '';
		
		if($type == 'create'){
			$keterangan = 'User ' . Auth::user()->name . ' created ' . $table . ' id ' . $id; 
		}else if($type == 'edit'){
			$keterangan = 'User ' . Auth::user()->name . ' edited ' . $table . ' id ' . $id;
		}else{
			$keterangan = 'User ' . Auth::user()->name . $type . $table . ' id ' . $id;
		}

		$log = new UserLog();
		$log->id_user = Auth::user()->id;
		$log->ip = $ip;
		$log->keterangan = $keterangan;
		$log->created_at = date('Y-m-d H:i:s', strtotime('now'));
		$log->save();
	}
}

if ( ! function_exists('get_data'))
{
    function get_data($table, $where='id', $id, $return)
    {
		$res = DB::table($table)->where($where, $id)->first();
		return $res->{$return};
    }
}

if ( ! function_exists('get_between'))
{
    function get_between($text, $start, $end) {
		$pos_start = strpos($text, $start);
		$pos_end = strpos($text, $end);
		$len_start = strlen($start);
		$len_end = strlen($end);
		if ($pos_start != false && $pos_end != false)
			return substr($text, ($pos_start+$len_start), ($pos_end-$pos_start-$len_start));
		else
			return '';
	}
}

if ( ! function_exists('get_between_from'))
{
    function get_between_from($text, $start, $end) {
		$pos_start = strpos($text, $start);
		$pos_end = strpos($text, $end);
		$len_start = strlen($start);
		$len_end = strlen($end);
		if ($pos_start != false && $pos_end != false)
			return substr($text, ($pos_start), ($pos_end-$pos_start));
		else
			return '';
	}
}

if ( ! function_exists('get_between_from_to'))
{
	function get_between_from_to($text, $start, $end) {
		$pos_start = strpos($text, $start);
		$pos_end = strpos($text, $end);
		$len_start = strlen($start);
		$len_end = strlen($end);
		if ($pos_start != false && $pos_end != false)
			return substr($text, ($pos_start), ($pos_end-$pos_start+$len_end));
		else
			return '';
	}
}

if ( ! function_exists('get_between_to'))
{
	function get_between_to($text, $start, $end) {
		$pos_start = strpos($text, $start);
		$pos_end = strpos($text, $end);
		$len_start = strlen($start);
		$len_end = strlen($end);
		if ($pos_start != false && $pos_end != false)
			return substr($text, ($pos_start+$len_start), ($pos_end-$pos_start+$len_end-$len_start));
		else
			return '';
	}
}

if ( ! function_exists('followLocation'))
{
    function followLocation($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$html = curl_exec($ch);
		curl_close($ch);
		
		$location = "";
		if (preg_match('~Location: (.*)~i', $html, $match)) {
			$location = trim($match[1]);
		}
		return $location;
	}
}
