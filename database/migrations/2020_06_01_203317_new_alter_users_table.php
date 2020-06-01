<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewAlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('datanascimento') // Nome da coluna
                    ->nullable() // Preenchimento não obrigatório
                    ->after('password'); // Ordenado após a coluna "password"

            $table->string('sexo') // Nome da coluna
                    ->nullable() // Preenchimento não obrigatório
                    ->after('datanascimento'); // Ordenado após a coluna "password"
                    
            $table->string('telefone') // Nome da coluna
                    ->nullable() // Preenchimento não obrigatório
                    ->after('sexo'); // Ordenado após a coluna "password"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sexo');
            $table->dropColumn('datanascimento');
            $table->dropColumn('telefone');
        });
    }
}
