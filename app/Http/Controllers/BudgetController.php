<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Budget\StoreBudgetRequest;
use App\Http\Requests\Budget\UpdateBudgetRequest;
use App\Models\Budget;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BudgetController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $budgets = Budget::where('user_id', $user_id)->get();
        return Inertia::render('Budgets/Index', [
            'budgets' => $budgets,
        ]);
    }


    public function create()
    {
        $categories = Categorie::where('user_id', Auth::user()->id)->get();

        return Inertia::render('Budgets/Create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreBudgetRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $budget = Budget::create($request->all());

        return redirect()->route('budget.index');
    }


    public function show(Budget $budget)
    {
        return Inertia::render('Budgets/Show', [
            'budget' => $budget,
        ]);
    }

    public function edit(Budget $budget)
    {
        $budget = Budget::with('categorie')->find($budget->id);
        return Inertia::render('Budgets/Edit', [
            'budget' => $budget,
        ]);
    }

    public function update(UpdateCategorieRequest $request, Budget $budget)
    {

        if ($budget->user_id !== auth()->id()) {
            abort(403, 'Você não pode editar Orçamento que não são suas.');
        }
        $budget->update($request->all());
        return redirect()->route('budget.index');
    }


    public function destroy(Budget $budget)
    {
        if ($budget->user_id !== auth()->id()) {
            abort(403, 'Você não pode excluir Orçamento que não são suas.');
        }
        $budget->delete();
        return redirect()->route('budget.index');
    }
}
