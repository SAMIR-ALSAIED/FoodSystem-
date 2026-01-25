<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
  public function index() {
        $reservations = Reservation::with('table')->latest()->get();
        return view('dashbord.reservations.index', compact('reservations'));
    }

    public function create() {
        $tables = Table::where('status', 'متاحة')->get();
        return view('dashbord.reservations.create', compact('tables'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'guest_count' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
            'status' => 'required',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'تم إضافة الحجز بنجاح');
    }

    public function edit(Reservation $reservation) {

        $tables = Table::where('status', 'متاحة')->orWhere('id', $reservation->table_id)->get();
        return view('dashbord.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(Request $request, Reservation $reservation) {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'guest_count' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
            'status' => 'required',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'تم تعديل الحجز بنجاح');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('error', 'تم حذف الحجز بنجاح');
    }
}
