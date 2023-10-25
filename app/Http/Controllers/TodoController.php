<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\Todo as TodoCollection;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TodoCollection(Todo::paginate(20));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created todo item in storage.
     */
    public function store(CreateTodoRequest $request)
    {
        $todo = new Todo;
        $todo->fill($request->validated());
        $todo->save();

        return response()->json([
            'message' => 'Todo created successfully',
            'data'    => $todo,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        return response()->json($todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified todo record in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->fill($request->validated())->save();

        return response()->json([
            'message' => 'Todo updated successfully',
            'data'    => $todo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(null, 204);
    }
}
