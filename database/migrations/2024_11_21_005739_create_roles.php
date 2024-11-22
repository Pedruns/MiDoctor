<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $role1 = Role::create(['name' => 'medico']);
        $role2 = Role::create(['name' => 'paciente']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
