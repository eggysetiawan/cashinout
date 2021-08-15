<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CashRequest;

class CashController extends Controller
{
    public function store(CashRequest $request)
    {
        $attr = $request->validated();

        $slug = $request->name . '-' . Str::random(6);
        $attr['slug'] = Str::slug($slug);

        $attr['when'] = request('when') ?? now();

        auth()->user()->cashes()->create($attr);

        return response()->json([
            'message' => 'Transaction has been saved.',
        ]);
    }
}
