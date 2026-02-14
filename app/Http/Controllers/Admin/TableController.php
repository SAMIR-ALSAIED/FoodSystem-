<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Table\AddTableRequest;
use App\Http\Requests\Admin\Table\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tables = Table::all();
        return view('dashbord.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('dashbord.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTableRequest $request)
    {
            $data=$request->validated();

               Table::create($data);

        return redirect()->route('tables.index')->with('success', 'تم إضافة الطاولة بنجاح');
    }


    public function getReservations(Table $table)
{
    $reservations = $table->reservations()->get();
    return response()->json($reservations);
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table  $table)
    {
                return view('dashbord.tables.edit', compact('table'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table)
    {

      $data=$request->validated();

          $table->update($data);

        return redirect()->route('tables.index')->with('success', 'تم تعديل الطاولة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table  $table)
    {
                $table->delete();
        return redirect()->route('tables.index')->with('success', 'تم حذف الطاولة بنجاح');
    }
}
