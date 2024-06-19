<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Villages;

class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $desa = Villages::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Data desa berhasil diambil',
                'data' => $desa,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve books.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $desa = new Villages;
            $desa->code = $request->code;
            $desa->district_code = $request->district_code;
            $desa->name = $request->name;
            $desa->meta = $request->meta;
    
            $result = $desa->save();
    
            if ($result) {
                return response()->json(['result' => 'Data saved!'], 200);
            } else {
                return response()->json(['result' => 'Failed to save!'], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'result' => 'Failed to save!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $desa = Villages::findOrFail($id);
            return response()->json(['result' => 'success', 'data' => $desa], 200);
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Villages not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Failed to retrieve villages.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $desa = Villages::findOrFail($request->id);
            $desa->code = $request->code;
            $desa->district_code = $request->district_code;
            $desa->name = $request->name;
            $desa->meta = $request->meta;
    
            $result = $desa->save();
    
            if ($result) {
                return response()->json(['result' => 'Data Updated!'], 200);
            } else {
                return response()->json(['result' => 'Failed to update data.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Village not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Failed to update Village.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $desa = Villages::findOrFail($id);
            $result = $desa->delete();
    
            if ($result) {
                return response()->json(['result' => 'Delete Success'], 200);
            } else {
                return response()->json(['result' => 'Failed to delete.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Village not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['result' => 'error', 'message' => 'Failed to delete Village.', 'error' => $e->getMessage()], 500);
        }
    }
}
