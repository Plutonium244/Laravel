@extends('layouts.app')

@section('content')
  <!-- Форма создания задачи... -->

  <!-- Текущие задачи -->
  @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Текущая задача
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Task</th>
            <th>&nbsp;</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($tasks as $task)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $task->name }}</div>
                </td>

                <td>
                  <tr>
                    <!-- Имя задачи -->
                      <td class="table-text">
                      <div>{{ $task->name }}</div>
                    </td>

                    <!-- Кнопка Удалить -->
                    <td>
                      <form action="{{ url('task/'.$task->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Удалить
                        </button>
                      </form>
                    </td>
                  </tr>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection