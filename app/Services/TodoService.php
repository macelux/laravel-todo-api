<?php
namespace App\Services;

use App\Models\Todo;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class TodoService
{
    public function __construct(protected Todo $todo)
    {  }

    public function getTodos(): Collection|array
    {
        return $this->todo->query()->get();
    }

    public function createTodo(array $param): Builder|Model
    {
        return $this->todo->query()->create($param);
    }

    public function updateTodo(array $param, int $id): int
    {
        return $this->todo->query()
            ->where('id', $id)
            ->update($param);
    }

    public function deleteTodo(int $id): int
    {
        return $this->todo->query()
            ->where('id', $id)
            ->delete();
    }
}
