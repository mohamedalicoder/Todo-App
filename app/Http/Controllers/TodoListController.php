<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = TodoList::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>'required|max:255',
            'description' =>'required|max:255',
            'due_date' =>'required',
        ]);

        TodoList::create($validatedData);

        return redirect()->route('todo.index')->with('success', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // Find the todo list by ID or fail if not found.
        $todoList = TodoList::findorfail($id);
        return view('todos.edit', compact('todoList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)

    {

        // Find the todo list by ID or fail if not found.
        $todoList = TodoList::findorfail($id);
        $validatedData = $request->validate([
            'title' =>'required|max:255',
            'description' =>'required|max:255',
            'due_date' =>'required|date',
        ]);

        $todoList->update($validatedData);

        return redirect()->route('todo.index')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the todo list by ID or fail if not found.
        $todoList = TodoList::findorfail($id);
        $todoList->delete();

        return redirect()->route('todo.index')->with('success', 'Todo deleted successfully');


    }
    public function deletedData()
    {
        $deletedData = TodoList::onlyTrashed()->get(); // Fetch soft-deleted data
        return view('todos.deleted', compact('deletedData')); // Pass it to the view
    }


    public function restore($id)
    {
        $todo = TodoList::withTrashed()->findOrFail($id);
        $todo->restore();
        return redirect()->route('todo.index')->with('success', 'Todo restored successfully');
    }

    public function forceDelete($id)
    {
        $todo = TodoList::withTrashed()->findOrFail($id);
        $todo->forceDelete();
        return redirect()->route('todo.index')->with('success', 'Todo permanently deleted');
    }

}
