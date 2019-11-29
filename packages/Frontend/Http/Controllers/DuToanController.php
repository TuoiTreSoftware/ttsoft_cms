<?php

namespace TTSoft\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TTSoft\Products\Entities\TSDT;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use TTSoft\Frontend\Events\NotifyFormContact;

class DuToanController extends Controller
{

	public function getDuToan(Request $request){
		return view('frontend::du_toan.dutoan');
	}

	public function postDuToan(Request $request){
    	//Tham số đầu vào từ khách hàng*/
		$dienTichLapDat = $request->dientich;

		//Hệ số tính toán
		$heSoMaiNha = getHeSoTinhToan($request->mainha);
		$heSoMatTienNha = getHeSoTinhToan($request->mattiennha);
		$heSoGocNghieng = getHeSoTinhToan($request->gocnghieng);
		$heSoChung = getHeSoTinhToan(1);

		//Tìm tham số dienTichTinhToan
		//So sánh khi có giới hạn đầu tư
		if($request->gioihan !== null){
			$gioiHanDauTu = $request->gioihan;

    		//Tính diện tích quy đổi từ giới hạn đầu tư
			$dienTichQuyDoi = $gioiHanDauTu/$heSoChung*7;

    		//So sánh diện tích quy đổi với diện tích lắp đặt không bị phủ bóng

			if($dienTichQuyDoi < $dienTichLapDat) {
				$dienTichTinhToan = $dienTichQuyDoi;
			} else {
				$dienTichTinhToan = $dienTichLapDat;
			}
		} else {
			// trường hợp không có giới hạn đầu tư
			$dienTichTinhToan = $dienTichLapDat;
		} //End tìm tham số dienTichTinhToan

		//Hệ số mức độ đầu tư
		$mucDoDauTu = mucDoDauTu($dienTichTinhToan);
		//dd($mucDoDauTu);
		

		//Giá trị chuẩn :     Phí chuẩn = 23,000,000 x (diện tích lắp đặt / 7)
		$phiChuan = $dienTichTinhToan/7*$heSoChung;

		//Tính Giá Trị Đầu Tư
		$giaTriDauTu = $phiChuan*$heSoMaiNha*$heSoMatTienNha*$heSoGocNghieng*$mucDoDauTu;

		//Công Suất hệ thống
		$congSuatHeThong = $dienTichTinhToan/7;

		return view('frontend::du_toan.dutoan', compact('giaTriDauTu','congSuatHeThong','dienTichTinhToan'));
	}

}
