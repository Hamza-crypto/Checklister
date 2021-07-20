<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChecklistGroupRequest;
use App\Http\Requests\ChecklistRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Support\Facades\Session;

class ChecklistController extends Controller
{

    public function index()
    {
        //
    }


    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create',compact('checklistGroup'));
    }


    public function store(ChecklistRequest $request,ChecklistGroup $checklistGroup)
    {

        $checklistGroup->checklists()->create($request->validated());
        return redirect()->route('home');
    }


    public function show($id)
    {
        //
    }


    public function edit(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        return view('admin.checklists.edit',compact('checklistGroup','checklist') );
    }

    public function update(ChecklistRequest $request, ChecklistGroup $checklistGroup,Checklist $checklist)
    {
        $checklist->update($request->validated());
        Session::flash('success', "Updated Successfully");
        return redirect()->route('home');
    }


    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->route('home');
    }
}
