<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author_id = DB::table('admins')->insertGetId([
            'first_name' => 'Dat',
            'last_name' => 'Nguyen',
            'email' => 'nguyentandat43@gmail.com',
            'password' => bcrypt('demo'),
            'phone_number' => '01688912317',
        ]);
        $categorySeeder = [
            [
                'name' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'slug' => str_slug('Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)'),
                'meta_title' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'meta_keyworks' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'meta_description' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Chương trình Interactive English (từ 18 đến 22 tuổi)',
                'slug' => str_slug('Chương trình Interactive English (từ 18 đến 22 tuổi)'),
                'meta_title' => 'Chương trình Interactive English (từ 18 đến 22 tuổi)',
                'meta_keyworks' => 'Chương trình Interactive English (từ 18 đến 22 tuổi)',
                'meta_description' => 'Chương trình Interactive English (từ 18 đến 22 tuổi)',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'slug' => str_slug('Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)'),
                'meta_title' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'meta_keyworks' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'meta_description' => 'Luyện thi chứng chỉ quốc tế IELTS, TOEFL iBT (từ 15 tuổi)',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'ANH NGỮ CẤP TỐC DÀNH CHO NGƯỜI “MẤT GỐC”',
                'slug' => str_slug('ANH NGỮ CẤP TỐC DÀNH CHO NGƯỜI “MẤT GỐC”'),
                'meta_title' => 'ANH NGỮ CẤP TỐC DÀNH CHO NGƯỜI “MẤT GỐC”',
                'meta_keyworks' => 'ANH NGỮ CẤP TỐC DÀNH CHO NGƯỜI “MẤT GỐC”',
                'meta_description' => 'ANH NGỮ CẤP TỐC DÀNH CHO NGƯỜI “MẤT GỐC”',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Anh văn giao tiếp ứng dụng dành riêng cho người lớn iTalk',
                'slug' => str_slug('Anh văn giao tiếp ứng dụng dành riêng cho người lớn iTalk'),
                'meta_title' => 'Anh văn giao tiếp ứng dụng dành riêng cho người lớn iTalk',
                'meta_keyworks' => 'Anh văn giao tiếp ứng dụng dành riêng cho người lớn iTalk',
                'meta_description' => 'Anh văn giao tiếp ứng dụng dành riêng cho người lớn iTalk',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Anh ngữ dành cho doanh nghiệp Corporate Training (dành cho doanh nghiệp)',
                'slug' => str_slug('Anh ngữ dành cho doanh nghiệp Corporate Training (dành cho doanh nghiệp)'),
                'meta_title' => 'Anh ngữ dành cho doanh nghiệp Corporate Training (dành cho doanh nghiệp)',
                'meta_keyworks' => 'Anh ngữ dành cho doanh nghiệp Corporate Training (dành cho doanh nghiệp)',
                'meta_description' => 'Anh ngữ dành cho doanh nghiệp Corporate Training (dành cho doanh nghiệp)',
                'author_id' => $author_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($categorySeeder as $key => $value) {
        	DB::table('categories')->insert($value);
        }
    }
}
