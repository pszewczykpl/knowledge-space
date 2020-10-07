<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'code' => 'departments-create',
            'name' => 'Może dodawać departamenty',
            'description' => 'Użytkownik może dodawać departamenty oraz edytować i usuwać utworzone przez siebie departamenty',
        ]);
        Permission::create([
            'code' => 'departments-update',
            'name' => 'Może edytować wszystkie departamenty',
            'description' => 'Użytkownik może edytować wszystkie departamenty',
        ]);
        Permission::create([
            'code' => 'departments-delete',
            'name' => 'Może usuwać wszystkie departamenty',
            'description' => 'Użytkownik może usuwać wszystkie departamenty',
        ]);
        Permission::create([
            'code' => 'departments-view',
            'name' => 'Może przeglądać szczegóły departamentu',
            'description' => 'Użytkownik może przeglądać szczegóły departamentu',
        ]);
        Permission::create([
            'code' => 'departments-viewany',
            'name' => 'Może przeglądać listę wszystkich departamentów',
            'description' => 'Użytkownik może przeglądać listę wszystkich departamentów (Zakładka HR -> Departamenty)',
        ]);
        Permission::create([
            'code' => 'employees-create',
            'name' => 'Może dodawać produkty pracownicze',
            'description' => 'Użytkownik może dodawać produkty pracownicze oraz edytować i usuwać utworzone przez siebie produkty pracownicze',
        ]);
        Permission::create([
            'code' => 'employees-update',
            'name' => 'Może edytować wszystkie produkty pracownicze',
            'description' => 'Użytkownik może edytować wszystkie produkty pracownicze',
        ]);
        Permission::create([
            'code' => 'employees-delete',
            'name' => 'Może usuwać wszystkie produkty pracownicze',
            'description' => 'Użytkownik może usuwać wszystkie produkty pracownicze',
        ]);
        Permission::create([
            'code' => 'file-categories-create',
            'name' => 'Może dodawać kategorie dokumentów',
            'description' => 'Użytkownik może dodawać kategorie dokumentów oraz edytować i usuwać utworzone przez siebie kategorie dokumentów',
        ]);
        Permission::create([
            'code' => 'file-categories-update',
            'name' => 'Może edytować wszystkie kategorie dokumentów',
            'description' => 'Użytkownik może edytować wszystkie kategorie dokumentów',
        ]);
        Permission::create([
            'code' => 'file-categories-delete',
            'name' => 'Może usuwać wszystkie kategorie dokumentów',
            'description' => 'Użytkownik może usuwać wszystkie kategorie dokumentów',
        ]);
        Permission::create([
            'code' => 'file-categories-view',
            'name' => 'Może przeglądać szczegóły kategorii dokumentów',
            'description' => 'Użytkownik może przeglądać szczegóły kategorii dokumentów',
        ]);
        Permission::create([
            'code' => 'file-categories-viewany',
            'name' => 'Może przeglądać listę wszystkich kategorii dokumentów',
            'description' => 'Użytkownik może przeglądać listę wszystkich kategorii dokumentów w zakładce Administracja',
        ]);
        Permission::create([
            'code' => 'files-create',
            'name' => 'Może dodawać dokumenty',
            'description' => 'Użytkownik może dodawać dokumenty oraz edytować i usuwać utworzone przez siebie dokumenty',
        ]);
        Permission::create([
            'code' => 'files-update',
            'name' => 'Może edytować wszystkie dokumenty',
            'description' => 'Użytkownik może edytować wszystkie dokumenty',
        ]);
        Permission::create([
            'code' => 'files-delete',
            'name' => 'Może usuwać wszystkie dokumenty',
            'description' => 'Użytkownik może usuwać wszystkie dokumenty',
        ]);
        Permission::create([
            'code' => 'files-viewany',
            'name' => 'Może przeglądać listę wszystkich dokumentów',
            'description' => 'Użytkownik może przeglądać listę wszystkich dokumentów w zakładce Administracja',
        ]);
        Permission::create([
            'code' => 'funds-create',
            'name' => 'Może dodawać fundusze',
            'description' => 'Użytkownik może dodawać fundusze oraz edytować i usuwać utworzone przez siebie fundusze',
        ]);
        Permission::create([
            'code' => 'funds-update',
            'name' => 'Może edytować wszystkie fundusze',
            'description' => 'Użytkownik może edytować wszystkie fundusze',
        ]);
        Permission::create([
            'code' => 'funds-delete',
            'name' => 'Może usuwać wszystkie fundusze',
            'description' => 'Użytkownik może usuwać wszystkie fundusze',
        ]);
        Permission::create([
            'code' => 'investments-create',
            'name' => 'Może dodawać produkty inwestycyjne',
            'description' => 'Użytkownik może dodawać produkty inwestycyjne oraz edytować i usuwać utworzone przez siebie produkty inwestycyjne',
        ]);
        Permission::create([
            'code' => 'investments-update',
            'name' => 'Może edytować wszystkie produkty inwestycyjne',
            'description' => 'Użytkownik może edytować wszystkie produkty inwestycyjne',
        ]);
        Permission::create([
            'code' => 'investments-delete',
            'name' => 'Może usuwać wszystkie produkty inwestycyjne',
            'description' => 'Użytkownik może usuwać wszystkie produkty inwestycyjne',
        ]);
        Permission::create([
            'code' => 'news-create',
            'name' => 'Może dodawać aktualności',
            'description' => 'Użytkownik może dodawać aktualności oraz edytować i usuwać utworzone przez siebie aktualności',
        ]);
        Permission::create([
            'code' => 'news-update',
            'name' => 'Może edytować wszystkie aktualności',
            'description' => 'Użytkownik może edytować wszystkie aktualności',
        ]);
        Permission::create([
            'code' => 'news-delete',
            'name' => 'Może usuwać wszystkie aktualności',
            'description' => 'Użytkownik może usuwać wszystkie aktualności',
        ]);
        Permission::create([
            'code' => 'news-view',
            'name' => 'Może przeglądać szczegóły aktualności',
            'description' => 'Użytkownik może przeglądać szczegóły aktualności',
        ]);
        Permission::create([
            'code' => 'news-viewany',
            'name' => 'Może przeglądać listę wszystkich aktualności',
            'description' => 'Użytkownik może przeglądać listę wszystkich aktualności w zakładce Aktualności',
    
        ]);
        Permission::create([
            'code' => 'notes-create',
            'name' => 'Może dodawać notatki',
            'description' => 'Użytkownik może dodawać notatki oraz edytować i usuwać utworzone przez siebie notatki',
        ]);
        Permission::create([
            'code' => 'notes-update',
            'name' => 'Może edytować wszystkie notatki',
            'description' => 'Użytkownik może edytować wszystkie notatki',
        ]);
        Permission::create([
            'code' => 'notes-delete',
            'name' => 'Może usuwać wszystkie notatki',
            'description' => 'Użytkownik może usuwać wszystkie notatki',
        ]);
        Permission::create([
            'code' => 'notes-viewany',
            'name' => 'Może przeglądać listę wszystkich notatek',
            'description' => 'Użytkownik może przeglądać listę wszystkich notatek w zakładce Administracja',
        ]);
        Permission::create([
            'code' => 'partners-create',
            'name' => 'Może dodawać dystrybutorów',
            'description' => 'Użytkownik może dodawać dystrybutorów oraz edytować i usuwać utworzonych przez siebie dystrybutorów',
        ]);
        Permission::create([
            'code' => 'partners-update',
            'name' => 'Może edytować wszystkich dystrybutorów',
            'description' => 'Użytkownik może edytować wszystkich dystrybutorów',
        ]);
        Permission::create([
            'code' => 'partners-delete',
            'name' => 'Może usuwać wszystkich dystrybutorów',
            'description' => 'Użytkownik może usuwać wszystkich dystrybutorów',
        ]);
        Permission::create([
            'code' => 'permissions-viewany',
            'name' => 'Może przeglądać listę wszystkich uprawnień',
            'description' => 'Użytkownik może przeglądać listę wszystkich uprawnień w zakładce Administracja',
        ]);
        Permission::create([
            'code' => 'permissions-update',
            'name' => 'Może edytować uprawnienia wszystkim pracownikom',
            'description' => 'Użytkownik może edytować uprawnienia wszystkim pracownikom',
        ]);
        Permission::create([
            'code' => 'protectives-create',
            'name' => 'Może dodawać produkty ochronne',
            'description' => 'Użytkownik może dodawać produkty ochronne oraz edytować i usuwać utworzone przez siebie produkty ochronne',
        ]);
        Permission::create([
            'code' => 'protectives-update',
            'name' => 'Może edytować wszystkie produkty ochronne',
            'description' => 'Użytkownik może edytować wszystkie produkty ochronne',
        ]);
        Permission::create([
            'code' => 'protectives-delete',
            'name' => 'Może usuwać wszystkie produkty ochronne',
            'description' => 'Użytkownik może usuwać wszystkie produkty ochronne',
        ]);
        Permission::create([
            'code' => 'replies-create',
            'name' => 'Może dodawać odpowiedzi do aktualności',
            'description' => 'Użytkownik może dodawać odpowiedzi do aktulności oraz edytować i usuwać utworzone przez siebie odpowiedzi do aktulności',
        ]);
        Permission::create([
            'code' => 'replies-delete',
            'name' => 'Może usuwać wszystkie odpowiedzi do aktualności',
            'description' => 'Użytkownik może usuwać wszystkie odpowiedzi do aktualności',
        ]);
        Permission::create([
            'code' => 'risks-create',
            'name' => 'Może dodawać ryzyka ubezpieczeniowe',
            'description' => 'Użytkownik może dodawać ryzyka ubezpieczeniowe oraz edytować i usuwać utworzone przez siebie ryzyka ubezpieczeniowe',
        ]);
        Permission::create([
            'code' => 'risks-update',
            'name' => 'Może edytować wszystkie ryzyka ubezpieczeniowe',
            'description' => 'Użytkownik może edytować wszystkie ryzyka ubezpieczeniowe',
        ]);
        Permission::create([
            'code' => 'risks-delete',
            'name' => 'Może usuwać wszystkie ryzyka ubezpieczeniowe',
            'description' => 'Użytkownik może usuwać wszystkie ryzyka ubezpieczeniowe',
        ]);
        Permission::create([
            'code' => 'users-create',
            'name' => 'Może dodawać pracowników',
            'description' => 'Użytkownik może dodawać pracowników oraz edytować utworzonych przez siebie pracowników',
        ]);
        Permission::create([
            'code' => 'users-update',
            'name' => 'Może edytować wszystkich pracowników',
            'description' => 'Użytkownik może edytować wszystkich pracowników',
        ]);
        Permission::create([
            'code' => 'users-delete',
            'name' => 'Może usuwać wszystkich pracowników',
            'description' => 'Użytkownik może usuwać wszystkich pracowników',
        ]);
        Permission::create([
            'code' => 'users-viewany',
            'name' => 'Może przeglądać listę wszystkich pracowników',
            'description' => 'Użytkownik może przeglądać listę wszystkich pracowników (Zakładka HR -> Pracownicy)',
        ]);
        Permission::create([
            'code' => 'systems-create',
            'name' => 'Może dodawać systemy TU',
            'description' => 'Użytkownik może dodawać systemy TU oraz edytować i usuwać utworzone przez siebie systemy TU',
        ]);
        Permission::create([
            'code' => 'systems-update',
            'name' => 'Może edytować wszystkie systemy TU',
            'description' => 'Użytkownik może edytować wszystkie systemy TU',
        ]);
        Permission::create([
            'code' => 'systems-delete',
            'name' => 'Może usuwać wszystkie systemy TU',
            'description' => 'Użytkownik może usuwać wszystkie systemy TU',
        ]);
        Permission::create([
            'code' => 'restore',
            'name' => 'Może przywracać usunięte obiekty w systemie',
            'description' => 'Użytkownik może przywracać usunięte obiekty w systemie',
        ]);
        Permission::create([
            'code' => 'force-delete',
            'name' => 'Może trwale usuwać obiekty w systemie',
            'description' => 'Użytkownik może trwale usuwać obiekty w systemie',
        ]);
    }
}
