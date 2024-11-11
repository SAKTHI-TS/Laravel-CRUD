<?php

namespace App\Http\Controllers;
use App\Models\Crud;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        $data = Crud::all();
        return view('welcome',compact('data'));

    }
    public function adduser(Request $add)
    {
        try {
            $add->validate([
                'name' => 'required',
                'age'=>'required',
                'dept' => 'required'
            ]);

            // User::create([
            //     'name' => $request->name,
            //     'dept' => $request->dept
            // ]);

            Crud::create($add->all());

            return response()->json([
                'status' => 200,
                'message' => 'User added successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
    public function deluser($id)
    {
        try {
            $deluser = Crud::findOrFail($id);
            $deluser->delete();

            return response()->json([
                'status' => 200,
                'message' => 'User deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
    public function edituser($id)
    {
        try {
            $edituser = Crud::findOrFail($id);

            return response()->json([
                'status' => 200,
                'data' => [
                    'id' => $edituser->id,
                    'name' => $edituser->name,
                    'age' => $edituser->age,
                    'dept' => $edituser->dept
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found!'
            ]);
        }  
    }

    public function newedituser(Request $request, $id)
    {
        try {

            $edituser = Crud::findOrFail($id);


            // $user->update([
            //     'name' => $request->name,
            //     'dept' => $request->dept
            // ]);
            $edituser->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'User Updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ]);
        }
    }
}
