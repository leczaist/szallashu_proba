<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCreatedAtReadonlyTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
            CREATE TRIGGER `createdAtReadonly` BEFORE UPDATE ON `companies` FOR EACH ROW IF NEW.created_at != OLD.created_at THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'created_at column is readonly by createdAtReadonly trigger!';
            END IF;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER IF EXISTS `createdAtReadonly`");
    }
}
