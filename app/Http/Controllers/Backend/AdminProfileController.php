<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function AdminProfile() 
    {
        // Access Admin model to get the admin pre-registered in DB (id 1)
        $adminData = Admin::find(1);
        // Then returns admin's editable profile 
        // Where compact() creates an array from existing variable.
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }
}
