<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
   * Массово присваиваемые атрибуты.
   *
   * @var array
   */
    protected $fillable = ['name'];

    $user = App\User::find(1);

    foreach ($user->tasks as $task) {
    echo $task->name;
    }

	/**
	* Получить пользователя - владельца данной задачи
	*/
	public function user()
	{
	return $this->belongsTo(User::class);
	}

}
