<?php

namespace App\Http\Controllers;
use View;

class SPAController extends Controller
{
    function __construct()
    {
        // tells the view finder to look for `.html` files and run
        // them through the normal PHP `include` process
        View::addExtension('html', 'php');
    }

    public function index()
    {
        return \File::get(public_path(). '/spa_entry.php');
    }
}
