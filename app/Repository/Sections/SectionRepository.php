<?php

namespace App\Repository\Sections;

use App\Models\Section;
use App\Interface\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();
        return view('dashboard.sections.index',compact('sections'));
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->input('name'),
        ]);
        session()->flash('add');
        return redirect()->route('section.index');
    }

    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
        return redirect()->route('section.index');
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('section.index');
    }



}
