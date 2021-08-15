<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CashRequest;

class CashController extends Controller
{
    public function index()
    {
        $debit = auth()->user()->cashes()
            ->whereBetween('when', [now()->firstOfMonth(), now()])
            ->where('amount', '>=', 0)
            ->get()->sum('amount');

        $credit = auth()->user()->cashes()
            ->whereBetween('when', [now()->firstOfMonth(), now()])
            ->where('amount', '<', 0)
            ->get()->sum('amount');

        $balances = $debit + $credit;
        return response()->json([
            'debit' => $debit,
            'credit' => $credit,
            'balances' => $balances,
        ]);
    }
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
