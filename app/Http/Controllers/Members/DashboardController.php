<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Traits\Essentials;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Essentials;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('members.dashboard', ['greeting' => $this->greet()]);
    }
}
