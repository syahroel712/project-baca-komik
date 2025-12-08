<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->decimal('rating', 3, 2)->default(0)->after('author');
            $table->string('type')->nullable()->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('comics', function (Blueprint $table) {
            $table->dropColumn(['rating', 'type']);
        });
    }
};
