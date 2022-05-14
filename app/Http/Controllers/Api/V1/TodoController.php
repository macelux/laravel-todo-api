<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct(protected TodoService $todoService)
    {

    }

    public function index(): JsonResponse
    {
        $todos = $this->todoService->getTodos();

        return $this->responseJson(true, 200, 'All todos fetched',$todos);
    }

    public function store(Request $request): JsonResponse
    {
        $validated_request = $request->validate([
            'title' => 'required'
        ]);

        $todos = $this->todoService->createTodo($validated_request);

        return $this->responseJson(true, 201,'Todo created',  $todos);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $validated_request = $request->validate([
            'title' => 'required'
        ]);

        $todos = $this->todoService->updateTodo($validated_request, $id);

        return $this->responseJson(true, 200, 'Todo updated'  , $todos);
    }

    public function destroy($id): JsonResponse
    {
        $todos = $this->todoService->deleteTodo($id);

        return $this->responseJson(true, 200, 'Todo deleted',  $todos);
    }
}
