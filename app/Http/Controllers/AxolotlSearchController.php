<?php

namespace App\Http\Controllers;

use App\Models\Axolotl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AxolotlSearchController extends Controller
{
    public function index(): View
    {
        return view('axolotls.search');
    }

    public function autocomplete(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:60'],
        ]);

        $query = trim($validated['q'] ?? '');

        if ($query === '') {
            return response()->json([]);
        }

        $axolotls = Axolotl::query()
            ->where('name', 'like', '%' . $query . '%')
            ->orderBy('name')
            ->limit(8)
            ->get(['id', 'name', 'colour', 'age']);

        return response()->json($axolotls);
    }
}
