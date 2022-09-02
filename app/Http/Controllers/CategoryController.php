<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexcategory() {
        return view('admin.category');
    }


    public function store(Request $request) {

        $formFields = $request->validate([
            'category' => 'required',
            'status' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();

        Category::create($formFields);

        return redirect('/admin')->with('message', 'Category Created Successfully!');
    }

    // show thw edit page
    public function edit(Category $category) {
        return view('admin.edit-category', [
            'category' => $category
        ]);
    }


    // for updating of task
    public function update(Request $request, Category $category) {

        // make sure logged in user is owner


        if($category->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };

        $formFields = $request->validate([
            "category" => 'required',
            "status" => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        $category->update($formFields);

        return redirect('/admin')->with('message', 'Status Category Upadated Successfully!');

    }

    // for deleting a task
    public function destroy(Category $category, Task $task) {

        // make sure logged in user is owner
        if($category->user_id != auth()->id()) {
            abort(403, 'Unauthorizes Action');
        };

        $users = Task::where('category', $category->category)->delete();

    
        if($users) {
            
            $category->delete();
    
            return redirect('/admin')->with('message', 'Category deleted successfully');

        } else {
            
            $category->delete();
    
            return redirect('/admin')->with('message', 'Category deleted successfully');
            
        }

    

    }

    public function show() {
        
        return view('admin.user-category', [
            "categories" => Category::all()
        ]);
    }

}


