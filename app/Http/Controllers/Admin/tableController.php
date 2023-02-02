<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class tableController extends Controller
{
    public function index()
    {
        return view('Admin.Table.index',[
            'tables' => Table::all()
        ]);
    }

    public function create()
    {
        return view('Admin.Table.create');
    }

    public function store(tableRequest $request)
    {
        Table::create([
            'name' => \request('name'),
            'capacity' => \request('capacity')
        ]);
        return redirect()->route('panel.tables');
    }

    public function edit(Table $table)
    {
        return view('Admin.Table.edit',[
            'table' => $table
        ]);
    }

    public function update(Request $request, Table $table)
    {
        $table->update([
           'name' => \request('name'),
           'capacity' => \request('capacity')
        ]);
        return redirect()->route('panel.tables');
    }

    public function destroy(Table $table)
    {
        $table->delete();
        return back();
    }


}
