<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    public function store(Request $request)
    {
        $v = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
        ]);

        $s = Student::create($v);

        return response()->json([
            'message' => 'Student created successfully',
            'data' => $s
        ], 201);
    }

    public function show(string $id)
    {
        $s = Student::find($id);

        if (!$s) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        return response()->json($s, 200);
    }

    public function update(Request $request, string $id)
    {
        $s = Student::find($id);

        if (!$s) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $v = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'course' => 'required|string|max:255',
        ]);

        $s->update($v);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $s
        ], 200);
    }

    public function destroy(string $id)
    {
        $s = Student::find($id);

        if (!$s) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $s->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    }
}