<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categorie\StoreCategorieRequest;
use App\Http\Requests\Categorie\UpdateCategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CategorieController extends Controller
{

    public function index()
    {
        $user_id = Auth::user()->id;
        $categories = Categorie::where('user_id', $user_id)->get();
        return Inertia::render('Categories/Index', [
            'categories' => $categories,
        ]);
    }


    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function store(StoreCategorieRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $categorie = Categorie::create($request->all());

        return redirect()->route('categorie.index');
    }


    public function show(Categorie $categorie)
    {
        return Inertia::render('Categories/Show', [
            'categorie' => $categorie,
        ]);
    }

    public function edit(Categorie $categorie)
    {
        return Inertia::render('Categories/Edit', [
            'categorie' => $categorie,
        ]);
    }

    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {

        if ($categorie->user_id !== auth()->id()) {
            abort(403, 'Você não pode editar Categorias que não são suas.');
        }
        $categorie->update($request->all());
        return redirect()->route('categorie.index');
    }


    public function destroy(Categorie $categorie)
    {
        if ($categorie->user_id !== auth()->id()) {
            abort(403, 'Você não pode excluir categorias que não são suas.');
        }
        $categorie->delete();
        return redirect()->route('categorie.index');
    }
}
