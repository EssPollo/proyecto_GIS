<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;



class DoctorController extends Controller
{
    public function index(User $user)
    {
        $doctores = User::role('Doctor')->get();
        $doctor = User::role('Doctor')->first();
       //$is_disabled = false;

        return view('doctor.index', compact('doctores','doctor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('farmaceutico.create');
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
