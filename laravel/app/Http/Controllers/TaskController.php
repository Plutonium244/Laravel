<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
	/**
   * Экземпляр TaskRepository.
   *
   * @var TaskRepository
   */
  protected $tasks;

  /**
   * Создание нового экземпляра контроллера.
   *
   * @param  TaskRepository  $tasks
   * @return void
   */
  public function __construct(TaskRepository $tasks)
  {
    $this->middleware('auth');

    $this->tasks = $tasks;
  }

  /**
   * Показать список всех задач пользователя.
   *
   * @param  Request  $request
   * @return Response
   */
  public function index(Request $request)
  {
    return view('tasks.index', [
      'tasks' => $this->tasks->forUser($request->user()),
    ]);
  }
		public function store(Request $request)
	{
	  $this->validate($request, [
	    'name' => 'required|max:255',
	  ]);

	  $request->user()->tasks()->create([
	    'name' => $request->name,
	  ]);

	  return redirect('/tasks');
	}

		/**
	 * Уничтожить заданную задачу.
	 *
	 * @param  Request  $request
	* @param  Task  $task
	* @return Response
	*/
	Route::delete('/task/{task}', 'TaskController@destroy');
	
	public function destroy(Request $request, Task $task)
	{
	    //
	}
}
