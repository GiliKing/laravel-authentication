<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Category $category) {
        return view('components.send-task', [
            'categories' => $category->all()
        ]);
    }

    public function store(Request $request) {

        $formFields = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'deadline' => 'required',
            'status' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['name'] = auth()->user()->name;
        $formFields['email'] = auth()->user()->email;

        Task::create($formFields);

        return redirect('/')->with('message', 'Task Created Successfully!');
    }

    public function edit(Task $task, Category $category) {
        return view('components.edit-task',  [
            'task' => $task,
            'categories' => $category->all()
        ]);
    }

    // for updating of task
    public function update(Request $request, Task $task) {

        // make sure logged in user is owner

        if($task->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };

        $formFields = $request->validate([
            "title" => 'required',
            "category" => 'required',
            "deadline" => 'required',
            "status" => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['name'] = auth()->user()->name;
        $formFields['email'] = auth()->user()->email;

        $task->update($formFields);

        return redirect('/')->with('message', 'Task Upadated Successfully!');

    }

    // for deleting a task
    public function destroy(Task $task) {

        // make sure logged in user is owner
        if($task->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };
    
        $task->delete();
    
        return redirect('/')->with('message', 'Task deleted successfully');

    }



    public function show() {
        return view('task.task', [
            "tasks" => Task::latest()->filter(request(['status']))->simplepaginate()
        ]);
    }

    public function showfive() {
        return view('task.task', [
            "tasks" => Task::latest()->filter(request(['status']))->simplepaginate(5)
        ]);
    }

    public function showadmin() {
        return view('admin.user-task', [
            "tasks" => Task::latest()->filter(request(['status']))->simplepaginate()
        ]);
    }

    public function showadminfive() {
        return view('admin.user-task', [
            "tasks" => Task::latest()->filter(request(['status']))->simplepaginate(5)
        ]);
    }

    public function edittaskadmin(Task $task, Category $category) {
        return view('components.edit-task',  [
            'task' => $task,
            'categories' => $category->all()
        ]);
    }

    // for updating of task
    public function updatetaskadmin(Request $request, Task $task) {

        $formFields = $request->validate([
            "title" => 'required',
            "category" => 'required',
            "deadline" => 'required',
            "status" => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['name'] = auth()->user()->name;
        $formFields['email'] = auth()->user()->email;

        $task->update($formFields);

        return redirect('/admin/task/all')->with('message', 'Task Upadated Successfully!');

    }

    // for deleting a task
    public function destroytaskadmin(Task $task) {


        $task->delete();
    
        return redirect('/admin/task/all')->with('message', 'Task deleted successfully');

    }
}
