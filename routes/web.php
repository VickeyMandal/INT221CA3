<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

//Start Lessons
Route::get('user/{id1}/delete/{id2}', function ($id1, $id2) {
    return "user $id1, delete $id2";
}) -> whereAlpha("id1") -> whereNumber('id2');

//This is Prefix
Route::prefix("todo")->group(function(){
    Route::get('edit/{id}', function ($id) {
        return "edit $id";
    }) -> name('edit_todo');
    
    Route::get('auth/delete/{id}', function ($id) {
        return "Delete id $id";
    }) -> name("delete_todo") -> where(["id" => "[a-zA-Z0-9]{2, 3}+"]);
    
    Route::get('create', function () {
        return "Create";
    });
});

Route::get("/index", [DepartmentController::class, "index"]);
Route::post("/create", [DepartmentController::class, 'create']);
Route::post("/store", [DepartmentController::class, 'store']);
Route::put("/update", [DepartmentController::class, 'update']);
Route::put("/edit", [DepartmentController::class, 'edit']);
Route::get("/show", [DepartmentController::class, 'show']);
Route::delete("/destroy", [DepartmentController::class, 'destroy']);

Route::get("/test", [FriendsController::class, 'test']);

//This is Resource
Route::resource("friends", FriendsController::class);
//End Lessons

//Start Project
//My Day
Route::get("/", [TodoController::class, "Home"]) -> name("home");
Route::get("/my-day/{id}", [TodoController::class, "ExactMyDay"]) -> name("exact-my-day");
Route::put("/done-my-day/{id}", [TodoController::class, "DoneMyDay"]) -> name("done-my-day");
Route::put("/undone-my-day/{id}", [TodoController::class, "UndoneMyDay"]) -> name("undone-my-day");
Route::put("/update-my-day/{id}", [TodoController::class, "UpdateMyDay"]) -> name("update-my-day");
Route::post("/", [TodoController::class, "CreateMyDay"]) -> name("create-my-day");
Route::get("/delete-my-day/{id}", [TodoController::class, "DeleteMyDay"]) -> name("delete-my-day");

//Important
Route::get("/important", [TodoController::class, "Important"]) -> name("important");
Route::get("/important/{id}", [TodoController::class, "ExactImportant"]) -> name("exact-important");
Route::put("/done-important/{id}", [TodoController::class, "DoneImportant"]) -> name("done-important");
Route::put("/undone-important/{id}", [TodoController::class, "UndoneImportant"]) -> name("undone-important");
Route::put("/update-important/{id}", [TodoController::class, "UpdateImportant"]) -> name("update-important");
Route::post("/important", [TodoController::class, "CreateImportant"]) -> name("create-important");
Route::get("/delete-important/{id}", [TodoController::class, "DeleteImportant"]) -> name("delete-important");

//Planned
Route::get("/planned", [TodoController::class, "Planned"]) -> name('planned');
Route::get("/planned/{id}", [TodoController::class, "ExactPlanned"]) -> name("exact-planned");
Route::put("/done-planned/{id}", [TodoController::class, "DonePlanned"]) -> name("done-planned");
Route::put("/undone-planned/{id}", [TodoController::class, "UndonePlanned"]) -> name("undone-planned");
Route::put("/update-planned/{id}", [TodoController::class, "UpdatePlanned"]) -> name("update-planned");
Route::post("/planned", [TodoController::class, "CreatePlanned"]) -> name("create-planned");
Route::get("/delete-planned/{id}", [TodoController::class, "DeletePlanned"]) -> name("delete-planned");

//Assign to me
Route::get("/assign-to-me", [TodoController::class, "AssignedToMe"]) -> name("assigned_to_me");
Route::get("/assign-to-me/{id}", [TodoController::class, "ExactAssignedToMe"]) -> name("exact_assigned_to_me");
Route::put("/done-assign-to-me/{id}", [TodoController::class, "DoneAssignedToMe"]) -> name("done_assigned_to_me");
Route::put("/undone-assign-to-me/{id}", [TodoController::class, "UndoneAssignedToMe"]) -> name("undone_assigned_to_me");
Route::put("/update-assign-to-me/{id}", [TodoController::class, "UpdateAssignedToMe"]) -> name("update_assigned_to_me");
Route::post("/assign-to-me", [TodoController::class, "CreateAssignedToMe"]) -> name("create_assigned_to_me");
Route::get("/delete-assign-to-me/{id}", [TodoController::class, "DeleteAssignedToMe"]) -> name("delete_assigned_to_me");

//Tasks
Route::get("/tasks", [TodoController::class, "Tasks"]) -> name('tasks');
Route::get("/tasks/{id}", [TodoController::class, "ExactTasks"]) -> name("exact-tasks");
Route::put("/done-tasks/{id}", [TodoController::class, "DoneTasks"]) -> name("done-tasks");
Route::put("/undone-tasks/{id}", [TodoController::class, "UndoneTasks"]) -> name("undone-tasks");
Route::put("/update-tasks/{id}", [TodoController::class, "UpdateTasks"]) -> name("update-tasks");
Route::post("/tasks", [TodoController::class, "CreateTasks"]) -> name("create-tasks");
Route::get("/delete-tasks/{id}", [TodoController::class, "DeleteTasks"]) -> name("delete-tasks");

//End Project