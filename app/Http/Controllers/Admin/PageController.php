<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(Page $page)
    {
        return view('admin.pages.edit',compact('page'));
    }


    public function update(EditPageRequest $request, Page $page)
    {
        $page->update($request->validated());
        Session::flash('Success', "Updated Successfully");
        return redirect()->route('admin.pages.edit',$page);
    }


    public function destroy($id)
    {
        //
    }
}
