<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // Tampilkan semua todo (halaman utama)
    public function index()
    {
        $todos = Todo::all(); // ambil semua data dari database
        return view('todo', compact('todos')); // tampilkan ke view todo.blade.php
    }

    // Simpan todo baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Todo::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    // Hapus todo berdasarkan ID
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
