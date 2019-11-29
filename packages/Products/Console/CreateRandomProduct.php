<?php

namespace TTSoft\Products\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use TTSoft\Products\Entities\Product;
use TTSoft\Products\Entities\ProductImage;
use Carbon\Carbon;
class CreateRandomProduct extends Command
{

    protected $_product;


    protected $_productImage;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:random';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The systems will setup create product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $array = [
            1 => 'Mặt Nạ Dưỡng Sáng Da Vitamin C',
            2 => 'Nước Hoa Hồng Giữ Ẩm Không Cồn - 250ml',
            3 => 'Mặt Nạ Ngủ Laneige Cung Cấp Nước Mini 15ml',
            4 => 'Xịt Khoáng Cung Cấp Nước -  400ml',
            5 => 'Serum Farmasi Dành Cho Da Mụn 10ml',
            6 => 'Miếng Dán Làm Giảm Mụn Mayancare 20 Miếng',
            7 => 'Tinh Chất Dưỡng Ẩm Cho Mọi Loại Da Mini - 10ml',
            8 => 'Sữa Rửa Mặt Dịu Nhẹ - 500ml',
            9 => 'Kem Dưỡng Secret Key Snow White Hỗ Trợ Làm Sáng Da 50g',
            10 => 'Giấy Thấm Dầu Mayan 100 Tờ/Gói',
            11 => 'Lotion Dưỡng Ẩm Dành Cho Da Khô Đến Rất Khô - 125ml',
            12 => 'Kem Dưỡng Da FAMARSI Kiểm Soát Dầu Và Giảm Vết Thâm Do Mụn 50ml',
            13 => 'Xịt Khoáng Làm Dịu Da, Chống Kích Ứng - 300ml',
            14 => 'Giấy Thấm Dầu Than Hoạt Tính 100 Tờ/Gói',
            15 => 'Sữa Rửa Mặt Ngăn Ngừa Mụn Perfect Purity 236ml',
            16 => 'Xịt Khoáng Cung Cấp Nước - 150ml',
            17 => 'Serum Dưỡng Ẩm, Làm Dịu Da, Se Khít Lỗ Chân Lông TimeLess',
            18 => 'Gel Tẩy Tế Bào Chết Da Mặt Và Toàn Thân 50ml',
            19 => 'Sữa Rửa Mặt Tạo Bọt SENKA Chiết Xuất Đất Sét Trắng 120g',
            20 => 'Xịt Khoáng Dưỡng Da VICHY 50ml',
        ];
        foreach (Product::all() as $k => $p) {
            $data = [
                'image' => '/uploads/images/products/product_image_'.$k++.'.jpg',
                'product_id' => $p->getId(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $product = ProductImage::create($data);
            $this->info("Create successful {$product->getId()}");
        }
    }
}
