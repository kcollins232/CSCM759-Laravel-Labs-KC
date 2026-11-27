<?php

namespace App\Http\Controllers;

use App\Models\Axolotl;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StoryController extends Controller
{
    public function create(Axolotl $axolotl): View
    {
        return view('stories.create', compact('axolotl'));
    }

    public function store(Request $request, Axolotl $axolotl): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Story::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'axolotl_id' => $axolotl->id,
        ]);

        return redirect('/axolotls/' . $axolotl->id)
            ->with('success', 'Story saved successfully!');
    }
}
