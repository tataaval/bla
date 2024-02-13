<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = User::all();
        if ($students->count() > 0) {
            $data = [
                'status' => 200,
                'students' => $students
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'students' => $students
            ];
            return response()->json($data, 404);
        }
    }

    public function store(Request $request)
    {
        $path = $request->file('file')->storePublicly('products');
        // return response()->json([
        //     'path' => "https://example1app.s3.amazonaws.com/$path",
        //     'msg' => 'success'
        // ]);
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|max:191',
            // 'cource' => 'required|string|max:191',
            // 'email' => 'required|email|max:191',
            // 'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'name' => $request->name,
                'cource' => "https://example1app.s3.amazonaws.com/$path",
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'student added successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            $data = [
                'status' => 200,
                'students' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'students' => "No Student Found"
            ];
            return response()->json($data, 404);
        }
    }


    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            $data = [
                'status' => 200,
                'students' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 404,
                'students' => "No Student Found"
            ];
            return response()->json($data, 404);
        }
    }


    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'cource' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {

            $student = Student::find($id);

            if ($student) {
                $student->update([
                    'name' => $request->name,
                    'cource' => $request->cource,
                    'email' => $request->email,
                    'phone' => $request->phone
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'student added successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No student found'
                ], 404);
            }
        }
    }
}
