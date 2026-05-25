<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $funFact = Landmark::whereNotNull('fun_fact')
                        ->inRandomOrder()
                        ->first();

    // ✅ Exactly 5 from Cambodia + 5 from Philippines
    $cambodiaFeatured    = Landmark::where('country', 'cambodia')
                                   ->where('featured', true)
                                   ->take(5)
                                   ->get();

    $philippinesFeatured = Landmark::where('country', 'philippines')
                                   ->where('featured', true)
                                   ->take(5)
                                   ->get();

    // ✅ Merge alternating KH, PH, KH, PH...
    $featured = $cambodiaFeatured->zip($philippinesFeatured)->flatten()->filter();

    return view('home', compact('funFact', 'featured'));
}

    public function search(Request $request)
    {
        $term     = $request->input('q', '');
        $category = $request->input('category', '');
        $country  = $request->input('country', '');

        $query = Landmark::query();

        if ($term)     $query->search($term);
        if ($category) $query->byCategory($category);
        if ($country)  $query->byCountry($country);

        $results = $query->paginate(12)->withQueryString();

        return view('search', compact('results', 'term', 'category', 'country'));
    }
}