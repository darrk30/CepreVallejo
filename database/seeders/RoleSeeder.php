<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrador = Role::create(['name' => 'Administrador']);
        $alumno = Role::create(['name' => 'Alumno']);
        $profesor = Role::create(['name' => 'Profesor']);
        $asistente = Role::create(['name' => 'Asistente Administrativo']);


         //permisos para administar los roles
         Permission::create(['name' => 'paginaInicio','description' => 'Pagina de Inicio'])->syncRoles([$alumno]);

         Permission::create(['name' => 'crearsemana','description' => 'Crear Semana, Contenido y Eliminar'])->syncRoles([$profesor]);

         Permission::create(['name' => 'biblioteca','description' => 'Biblioteca'])->syncRoles([$alumno]);
         Permission::create(['name' => 'biblioteca.show','description' => 'Ver Libros'])->syncRoles([$alumno]);

         Permission::create(['name' => 'videos','description' => 'Videos'])->syncRoles([$alumno]);
         Permission::create(['name' => 'video.show','description' => 'Ver Video'])->syncRoles([$alumno]);

         Permission::create(['name' => 'misCursos','description' => 'Mis Cursos'])->syncRoles([$alumno, $profesor]);
         Permission::create(['name' => 'misCursos.show','description' => 'Ver Curso'])->syncRoles([$alumno, $profesor]);

         //ADMINISTRADOR

         Permission::create(['name' => 'admin.cursos','description' => 'Cursos'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.cursos.create','description' => 'Crear Curso'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.cursos.update','description' => 'Editar Curso'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.ciclos','description' => 'Ciclos'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.ciclos.create','description' => 'Crear Ciclo'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.matriculas','description' => 'Matriculas'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.matriculas.create','description' => 'Crear Matricula'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.docentes','description' => 'Docentes'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.docentes.create','description' => 'Crear Docente'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.books','description' => 'Libros'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.books.create','description' => 'Crear Libros'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.videos','description' => 'Videos'])->syncRoles([$administrador]);
         Permission::create(['name' => 'admin.videos.create','description' => 'Crear Video'])->syncRoles([$administrador]);
    }
}
