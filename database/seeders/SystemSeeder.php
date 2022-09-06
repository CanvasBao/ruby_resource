<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //税率
        DB::table('mst_tax_rule')->updateOrInsert(['id' => 1], [
            'id' => 1,
            'tax_rate' => 10,
            'apply_date' => date("Y/m/d"),
            'deleted_at' => null
        ]);

        //受注状況
        $orderStatus = [
            ['id' => 1, 'status_name' => '新規受付', 'status_color' => '#437ec4', 'sort_no' => 1, 'deleted_at' => NULL],
            ['id' => 2, 'status_name' => 'キャンセル', 'status_color' => '#c04949', 'sort_no' => 2, 'deleted_at' => NULL],
            ['id' => 3, 'status_name' => '対応完了', 'status_color' => '#A3A3A3', 'sort_no' => 3, 'deleted_at' => NULL]
        ];
        foreach ($orderStatus as $status) {
            DB::table('mst_order_status')->updateOrInsert(['id' => $status['id']], $status);
        }
    }
}
