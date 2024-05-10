<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {
        return view('/admin/dashboard');
      }

      public function users(){
        $users = User::all();
        return view('/admin/staffs', compact('users'));
      }

      public function viewstaff($id){
        $users = User::find($id);
        return view('/admin/view-profile', compact('users'));
      }

      public function addstaff(){
        return view('/admin/add-staff');
      }

      public function store(Request $request){
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'role' => 'required|max:255',
            'position' => 'required|max:255',
            'office' => 'required|max:255',
            'age' => 'required|max:255',
            'startdate' => 'required|max:255',
            'salary' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $addstaff = new User();
        $addstaff->name = $request->input('fname'). ' ' . $request->input('lname');
        $addstaff->role = $request->input('role');
        $addstaff->position = $request->input('position');
        $addstaff->office = $request->input('office');
        $addstaff->age = $request->input('age');
        $addstaff->startdate = $request->input('startdate');
        $addstaff->salary = $request->input('salary');
        $addstaff->email = $request->input('email');
        $addstaff->password = Hash::make($request->input('lname'));
        $addstaff->save();

        return redirect()->back()->with('success', 'Staff added successfully!');
      }
}
