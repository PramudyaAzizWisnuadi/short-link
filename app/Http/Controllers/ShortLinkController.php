<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        // Don't show history on landing page
        return view('welcome');
    }

    public function dashboard()
    {
        $shortLinks = ShortLink::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('shortLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'short_code' => 'nullable|string|unique:short_links,short_code|max:20|alpha_dash'
        ], [
            'short_code.unique' => 'Custom link ini sudah digunakan, silakan pilih yang lain.',
            'original_url.url' => 'Format URL tidak valid.',
            'original_url.required' => 'URL harus diisi.',
        ]);

        $shortCode = $request->short_code ?: Str::random(6);

        if (!$request->short_code) {
            while (ShortLink::where('short_code', $shortCode)->exists()) {
                $shortCode = Str::random(6);
            }
        }

        $link = ShortLink::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Link berhasil dibuat!')->with('new_link', url($shortCode));
    }

    public function redirect($code)
    {
        $link = ShortLink::where('short_code', $code)->firstOrFail();
        $link->increment('clicks');

        return redirect($link->original_url);
    }
}
