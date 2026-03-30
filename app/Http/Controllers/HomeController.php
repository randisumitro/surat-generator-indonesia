<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DocumentType;

class HomeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::with('activeTemplates')
            ->whereHas('activeTemplates')
            ->get();

        return view('home', compact('documentTypes'));
    }
}
