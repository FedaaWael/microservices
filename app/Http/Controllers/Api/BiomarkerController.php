<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Biomarker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiomarkerController extends Controller
{
    public function index()
    {
        $biomarkers = Biomarker::paginate(10);
        return response()->json($biomarkers);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'heart_rate' => 'nullable|integer|min:0|max:300',
            'calories_burned' => 'nullable|integer|min:0',
            'sleep_duration_minutes' => 'nullable|integer|min:0',
            'steps_count' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $biomarker = Biomarker::create($request->all());
        return response()->json($biomarker, 201);
    }

    public function show($id)
    {
        $biomarker = Biomarker::findOrFail($id);
        return response()->json($biomarker);
    }

    public function update(Request $request, $id)
    {
        $biomarker = Biomarker::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'heart_rate' => 'nullable|integer|min:0|max:300',
            'calories_burned' => 'nullable|integer|min:0',
            'sleep_duration_minutes' => 'nullable|integer|min:0',
            'steps_count' => 'nullable|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $biomarker->update($request->all());
        return response()->json($biomarker);
    }

    public function destroy($id)
    {
        $biomarker = Biomarker::findOrFail($id);
        $biomarker->delete();
        return response()->json(null, 204);
    }
}
