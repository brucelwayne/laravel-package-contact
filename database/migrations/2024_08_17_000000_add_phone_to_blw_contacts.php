<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    protected $connection = 'mysql';
    protected string $table = 'blw_contacts';

    public function __construct()
    {
        $this->connection = config('brucelwayne-contact.database', 'mysql');
        $this->table = config('brucelwayne-contact.table', 'blw_contacts');
    }

    public function up(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('type')->nullable()->after('team_id')->index(); // 添加 type 列
        });
    }

    public function down(): void
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('type'); // 移除 type 列
        });
    }
};
