<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\FileCategory;
use App\Models\File;
use App\Models\Fund;
use App\Models\Investment;
use App\Models\Note;
use App\Models\Partner;
use App\Models\Protective;
use App\Models\Risk;
use App\Models\User;
use App\Models\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class TrashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($model)
    {
        $this->authorize('viewAny', Trash::class);

        if(method_exists($this, str_replace('-', '_', $model))) {
            return $this->{str_replace('-', '_', $model)}();
        }

        return abort(404);
    }

    /**
     * Show the application dashboard.
     *
     * @return Department
     */
    public function departments()
    {
        return view('trash.departments', [
            'title' => 'Kosz',
            'departments' => Department::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Employee
     */
    public function employees()
    {
        return view('trash.employees', [
            'title' => 'Kosz',
            'employees' => Employee::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return FileCategory
     */
    public function file_categories()
    {
        return view('trash.file-categories', [
            'title' => 'Kosz',
            'fileCategories' => FileCategory::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return File
     */
    public function files()
    {
        return view('trash.files', [
            'title' => 'Kosz',
            'files' => File::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Fund
     */
    public function funds()
    {
        return view('trash.funds', [
            'title' => 'Kosz',
            'funds' => Fund::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Investment
     */
    public function investments()
    {
        return view('trash.investments', [
            'title' => 'Kosz',
            'investments' => Investment::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Note
     */
    public function notes()
    {
        return view('trash.notes', [
            'title' => 'Kosz',
            'notes' => Note::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Partner
     */
    public function partners()
    {
        return view('trash.partners', [
            'title' => 'Kosz',
            'partners' => Partner::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Protective
     */
    public function protectives()
    {
        return view('trash.protectives', [
            'title' => 'Kosz',
            'protectives' => Protective::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Risk
     */
    public function risks()
    {
        return view('trash.risks', [
            'title' => 'Kosz',
            'risks' => Risk::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return User
     */
    public function users()
    {
        return view('trash.users', [
            'title' => 'Kosz',
            'users' => User::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return System
     */
    public function systems()
    {
        return view('trash.systems', [
            'title' => 'Kosz',
            'systems' => System::onlyTrashed()->get(),
        ]);
    }
}
