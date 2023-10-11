<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $connection = 'mysql';

    protected string $table = 'contacts';

    public function __construct()
    {
        $this->connection = config('brucelwayne-contact.database','mysql');
        $this->table = config('brucelwayne-contact.table','contacts');
    }

    public function up(): void
    {
        Schema::create($this->table, function ($table) {
            /**
             * @var Illuminate\Database\Schema\Blueprint|MongoDB\Laravel\Schema\Blueprint $table
             */
            $table->increments('id');
            $table->integer('team_id')->default(0)->index();
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->string('token',21)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists($this->table);
    }
};
