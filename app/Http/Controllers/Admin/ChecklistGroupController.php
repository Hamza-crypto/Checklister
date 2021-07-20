<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGroupRequest;
use App\Http\Requests\EditChecklistGroupRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
{



    public function create()
    {
        return view('admin.checklist_group.create');
    }


    public function store(ChecklistGroupRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect()->route('home');

    }



    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_group.edit',compact('checklistGroup') );
    }

    public function update(EditChecklistGroupRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());
        return redirect()->route('home');
    }


    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        return redirect()->route('home');
    }
}
