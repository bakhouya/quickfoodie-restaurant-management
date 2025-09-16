<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class roleSeederTable extends Seeder{

    public function run(): void
    {
        Role::create([
            'name' => 'fondateur',
            'description' => 'il posséde des droits compts sur le systéme, notamment la gestion des utilsateurs, la définition des autorisations, la gestion des menus, la gestion des commande, etc',
        ]);
        Role::create([
            'name' => 'directeur de restaurant',
            'description' => 'il est responsable de la gestion quotidienne de restaurant, notamment la gestion de personnel, la planification des horaires, la gestion des stocks, etc']);
        Role::create([
            'name' => 'comptable',
            'description' =>'il est responsable de la gestion financiére de restaurant , notamment la gestion des comptes, l enregistrement des dépences, la gestion revenus, etc']);

    }
}
