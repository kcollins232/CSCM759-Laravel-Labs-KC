<?php

namespace App\Http\Controllers;

use App\Models\Axolotl;
use Illuminate\View\View;

class AxolotlController extends Controller
{
    public function index(): View
    {
        $axolotls = Axolotl::orderBy('name')->get();

        return view('axolotls.index', compact('axolotls'));
    }

    public function show(Axolotl $axolotl): View
    {
        return view('axolotls.show', compact('axolotl'));
    }
}


