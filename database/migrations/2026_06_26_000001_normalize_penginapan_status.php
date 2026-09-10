<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        try {
            DB::table('penginapan')
                ->whereIn('status', ['aktif', 'on', 'true', '1'])
                ->update(['status' => 1]);
        } catch (\Throwable $e) {
            // Kolom status sudah integer / sudah ter-normalize sebelumnya, skip.
        }
    }

    public function down()
    {
        // intentionally left blank
    }
};