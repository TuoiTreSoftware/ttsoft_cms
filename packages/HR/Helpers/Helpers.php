<?php 

function getStaffsInfo() {
	$data = TTSoft\HR\Entities\Staffs::all();
	foreach ($data as $key => $e) {
		echo '<option value="'.$e->id.'">'.$e->getTitle().'</option>';
	}
}

/*Lấy tỷ lệ hoa hồng chiết khấu theo nhân viên - danh mục sản phẩm*/
function getCommissionByStaff_ProductCategory($staff_id, $product_cate)
{
	$data = TTSoft\HR\Entities\Hoa_Hong_San_Pham::where('staffs_id', $staff_id)->where('product_cate_id',$product_cate)->select('tyle_hoahong')->first();
	if (!empty($data)) {
		echo $data['tyle_hoahong'];
	}
	echo '';
}
function getTientuaByStaff_ProductCategory($staff_id, $product_cate)
{
	$data = TTSoft\HR\Entities\Hoa_Hong_San_Pham::where('staffs_id', $staff_id)->where('product_cate_id',$product_cate)->select('tien_tua')->first();
	if (!empty($data)) {
		echo $data['tien_tua'];
	}
	echo '';
}

function getStaffsIn($id) {
	$to_day = Carbon\Carbon::parse(today())->format('Y-m-d');
	$data = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)
										->orderBy('created_at','ASC')
										->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"),$to_day)
										->first();
	return $data['created_at'];
}

function getStaffsOut($id) {
	$to_day = Carbon\Carbon::parse(today())->format('Y-m-d');
	$data = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)
										->orderBy('created_at','DESC')
										->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"),$to_day)
										->first();
	$countdata = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)->orderBy('created_at','DESC')->count();
	if ($countdata > 1) {
		return $data['created_at'];
	}
	return false;
}

function getStaffsWorkingHour($id, $date = '') {
	$data = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)->orderBy('created_at','DESC')->first();
	return $data['created_at'];
}
//lap ngay
function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d' ) {
                $dates = array();
                $current = strtotime($first);
                $last = strtotime($last);
                while( $current <= $last ) {    
                    $dates[] = date($format, $current);
                    $current = strtotime($step, $current);
                }
                return $dates;
        }
//lọc giờ vào
function getTimeIn($id,$date) {
	$date = Carbon\Carbon::parse($date)->format('Y-m-d');
	$data = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)
										->orderBy('created_at','ASC')
										->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"),$date)
										->first();
	return $data['created_at'];
}
//lọc giờ ra
function getTimeOut($id,$date) {
	$date = Carbon\Carbon::parse($date)->format('Y-m-d');
	$data = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)
										->orderBy('created_at','DESC')
										->where(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"),$date)
										->first();
	$countdata = TTSoft\HR\Entities\StaffsInOut::where('staffs_id',$id)->orderBy('created_at','DESC')->count();
	if ($countdata > 1) {
		return $data['created_at'];
	}
	return false;
}