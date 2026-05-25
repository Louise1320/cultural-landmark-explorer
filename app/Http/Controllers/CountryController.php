<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function show(Request $request, string $country)
{
    $category = $request->input('category', '');
    $search   = $request->input('search', '');

    $query = Landmark::byCountry($country);

    if ($category) $query->byCategory($category);
    if ($search)   $query->search($search);

    $landmarks   = $query->paginate(9)->withQueryString();
    $categories  = ['Historical', 'Natural', 'Religious'];
    $countryName = ucfirst($country);
    $countryCode = $country === 'cambodia' ? 'KH' : 'PH';

    return view('country', compact(
        'landmarks', 'country', 'countryName',
        'countryCode', 'categories', 'category', 'search'
    ));
}
}