<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('phone')->unique();
            $table->string('alt_phone')->nullable();
            $table->string('email')->unique();
            $table->string('gender', 10);
            $table->date('dob');
            $table->string('address', 100);
            $table->string('origin',25);
            $table->string('lga_origin',30);
            $table->string('residence',25);
            $table->string('lga_residence',30);
            $table->string('marital_status',20);
            $table->string('bank_name',50)->nullable();
            $table->string('acct_number',10)->nullable();
            $table->string('type')->default('monitor')->nullable();
            $table->string('unique_id', 20)->nullable();
            $table->string('sponsor_fullname', 150)->nullable();
            $table->string('sponsor_designation',60)->nullable();
            $table->string('sponsor_address', 60)->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->mediumtext('bio')->nullable();
            $table->string('photo')->default('profile.png')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitors');
    }
}
