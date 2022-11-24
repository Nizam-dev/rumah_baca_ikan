<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',30);
            $table->string('username',15);
            $table->string('email',50)->unique();
            $table->string('password');
            $table->string('role',15);
            $table->string('no_hp',14);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });

        User::create([

            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'username'=>'admin',
            'password'=>bcrypt(123),
            'role'=>'admin',
            'no_hp'=>'081123'
        ]);

        User::create([

            'name'=>'user',
            'username'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt(123),
            'role'=>'user',
            'no_hp'=>'0821123'
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
