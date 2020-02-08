<?php

namespace App\Http\Controllers;
use App\Mlote;
class HomeController extends Controller {

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    $mlotexxx = new Mlote;
    $mlotexxx->inactivarvencidos();
    return view('home');
  }

}
