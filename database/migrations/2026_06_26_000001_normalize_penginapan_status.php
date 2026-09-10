<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Memaksa komparasi dilakukan sebagai STRING (VARCHAR)
        DB::table('penginapan')
            ->whereRaw("CAST(status AS CHAR) IN ('aktif', 'on', 'true', '1')")
            ->update(['status' => 1]);
    }

    public function down()
    {
        // intentionally left blank
    }
};