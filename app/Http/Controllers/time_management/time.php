<?php

namespace App\Http\Controllers\time_management;

use App\Http\Controllers\Controller;
use App\Models\admission_time;
use Illuminate\Http\Request;

class time extends Controller
{
    public function store(Request $request) // middlewere ل اضافة شرط انه موظف
    //time managment midllewere
    {
        $request->validate([
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $time = admission_time::create($request->only('start_date', 'end_date', 'is_active'));
        
        return response()->json(['message' => 'تم إنشاء الفترة بنجاح', 'data' => $time], 201);
    } 

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'date|before:end_date',
            'end_date' => 'date|after:start_date',
        ]);
    
        $time = admission_time::findOrFail($id);
      
        
        if ($request->filled('start_date')) {
            $time->start_date = $request->start_date;
        }
    
        if ($request->filled('end_date')) {
            $time->end_date = $request->end_date;
        }

        $time->save();
    
        return response()->json(['message' => 'تم تحديث الفترة بنجاح', 'data' => $time], 200);
    }
    
    

    public function destroy($id)
    {
        $time = admission_time::find($id);
        $time->delete();

        return response()->json(['message' => 'تم الحذف بنجاح']);
    }
    
    public function activate($id)
{
    admission_time::query()->update(['is_active' => false]); // إلغاء تفعيل كل الفترات

    $time = admission_time::find($id);
    $time->update(['is_active' => true]);

    return response()->json(['message' => 'تم تفعيل الفترة المحددة']);
}}
