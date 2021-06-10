<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateGetFullpathFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        DB::unprepared("
            CREATE FUNCTION getfullpath ( id  CHAR(4) )
            RETURNS VARCHAR(255)
            BEGIN
            DECLARE dir_name VARCHAR(255);
            DECLARE path_name VARCHAR(255);
            SET path_name = '';
            WHILE id <> '0000' DO 
                SET dir_name := (SELECT folder_name FROM folders WHERE folders.folder_id = id);
                SET id := (SELECT parent_folder_id FROM folders WHERE folders.folder_id = id);
                SET path_name = CONCAT(path_name, '/', dir_name);
            END WHILE;
            RETURN path_name;
            END; 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        DB::unprepared('DROP FUNCTION IF EXISTS getfullpath');
    }
}
