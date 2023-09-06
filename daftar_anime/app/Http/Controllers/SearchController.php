<?php

use Illuminate\Http\Request;
use App\Models\Item; // Ubah sesuai model Anda

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = anime::where('name', 'like', '%' . $query . '%')->get(); // Ubah sesuai model Anda
        return view('anime.index', compact('anime'));
    }
}
