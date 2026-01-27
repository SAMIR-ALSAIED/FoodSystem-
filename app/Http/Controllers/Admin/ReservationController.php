<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reservation\AddReservationRequest;
use App\Http\Requests\Admin\Reservation\UpdateReservationRequest;

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

    public function store(AddReservationRequest $request) {

        $data=$request->validated();

        Reservation::create( $data);

        return redirect()->route('reservations.index')->with('success', 'تم إضافة الحجز بنجاح');
    }

    public function edit(Reservation $reservation) {

        $tables = Table::where('status', 'متاحة')->orWhere('id', $reservation->table_id)->get();
        return view('dashbord.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation) {
       $data= $request->validated();

        $reservation->update($data);
        return redirect()->route('reservations.index')->with('success', 'تم تعديل الحجز بنجاح');
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('error', 'تم حذف الحجز بنجاح');
    }
}
