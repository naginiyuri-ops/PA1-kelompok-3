<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Normalizes legacy status values to integer 1 where appropriate.
     */
    public function up()
    {
        DB::table('penginapan')
            ->whereIn('status', ['aktif', 'on', 'true', '1'])
            ->update(['status' => 1]);
    }

    /**
     * Reverse the migrations.
     * (No-op: we don't attempt to restore original string values.)
     */
    public function down()
    {
        // intentionally left blank
    }
};
