<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Cargo;
use App\Models\Driver;
use App\Models\Sender;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function home()
    {
        $senders = Sender::count();
        $drivers = Driver::count();
        $cars = Car::count();
        $cargos = Cargo::count();
        return view('admin.home', compact('senders', 'drivers', 'cars', 'cargos'));
    }
}
