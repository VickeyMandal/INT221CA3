<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //My Day
    public function Home(){
        $my_days = DB::table("my_days") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_my_days = DB::table("my_days") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();

        return view("home", compact("my_days", "done_my_days"));
    }

    public function ExactMyDay($id){
        $my_days = DB::table("my_days") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_my_days = DB::table("my_days") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();
        $exact_my_day = DB::table('my_days')->find($id);

        return view("modals.edit_my_day", compact("my_days", "done_my_days", "exact_my_day"));
    }

    public function DoneMyDay($id){
        if(DB::table("my_days") -> where("id", $id) -> update(["isCompleted" => 1])){
            return back();
        }
    }

    public function UndoneMyDay($id){
        if(DB::table("my_days") -> where("id", $id) -> update(["isCompleted" => 0])){
            return back();
        }
    }

    public function UpdateMyDay(Request $req, $id){
        $information = $req -> except(["_token", "_method"]);

        if(DB::table('my_days') -> where("id", $id) -> update($information)){
            return back();
        }
    }

    public function CreateMyDay(Request $req){
        $information = $req -> except("_token");

        if(DB::table("my_days")->insert($information)){
            return redirect('/')->with("message", "My Day Created!");
        }
    }

    public function DeleteMyDay($id){
        if(DB::table('my_days') -> where("id", $id) -> delete()){
            return redirect("/") -> with("message", "My Day Removed!");
        }
    }

    //Important
    public function Important(){
        $importants = DB::table("importants") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_importants = DB::table("importants") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();

        return view("important", compact("importants", "done_importants"));
    }

    public function ExactImportant($id){
        $importants = DB::table("importants") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_importants = DB::table("importants") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();
        $exact_important = DB::table('importants')->find($id);

        return view("modals.edit_important", compact("importants", "done_importants", "exact_important"));
    }

    public function DoneImportant($id){
        if(DB::table("importants") -> where("id", $id) -> update(["isCompleted" => 1])){
            return back();
        }
    }

    public function UndoneImportant($id){
        if(DB::table("importants") -> where("id", $id) -> update(["isCompleted" => 0])){
            return back();
        }
    }

    public function UpdateImportant(Request $req, $id){
        $information = $req -> except(["_token", "_method"]);

        if(DB::table('importants') -> where("id", $id) -> update($information)){
            return back();
        }
    }

    public function CreateImportant(Request $req){
        $information = $req -> except("_token");

        if(DB::table("importants")->insert($information)){
            return redirect('/important')->with("message", "My Day Created!");
        }
    }

    public function DeleteImportant($id){
        if(DB::table('importants') -> where("id", $id) -> delete()){
            return redirect("/important") -> with("message", "My Day Removed!");
        }
    }

    //Planned
    public function Planned(){
        $planneds = DB::table("planneds") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_planneds = DB::table("planneds") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();

        return view("planned", compact("planneds", "done_planneds"));
    }

    public function ExactPlanned($id){
        $planneds = DB::table("planneds") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_planneds = DB::table("planneds") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();
        $exact_planned = DB::table('planneds')->find($id);

        return view("modals.edit_planned", compact("planneds", "done_planneds", "exact_planned"));
    }

    public function DonePlanned($id){
        if(DB::table("planneds") -> where("id", $id) -> update(["isCompleted" => 1])){
            return back();
        }
    }

    public function UndonePlanned($id){
        if(DB::table("planneds") -> where("id", $id) -> update(["isCompleted" => 0])){
            return back();
        }
    }

    public function UpdatePlanned(Request $req, $id){
        $information = $req -> except(["_token", "_method"]);

        if(DB::table('planneds') -> where("id", $id) -> update($information)){
            return back();
        }
    }

    public function CreatePlanned(Request $req){
        $information = $req -> except("_token");

        if(DB::table("planneds")->insert($information)){
            return redirect('/planned')->with("message", "My Day Created!");
        }
    }

    public function DeletePlanned($id){
        if(DB::table('planneds') -> where("id", $id) -> delete()){
            return redirect("/planned") -> with("message", "My Day Removed!");
        }
    }

    //Assigned To Me
    public function AssignedToMe(){
        $assigned_to_mes = DB::table("assigned_to_mes") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_assigned_to_mes = DB::table("assigned_to_mes") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();

        return view("assignedToMe", compact("assigned_to_mes", "done_assigned_to_mes"));
    }

    public function ExactAssignedToMe($id){
        $assigned_to_mes = DB::table("assigned_to_mes") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_assigned_to_mes = DB::table("assigned_to_mes") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();
        $exact_assigned_to_me = DB::table('assigned_to_mes')->find($id);

        return view("modals.edit_assign_to_me", compact("assigned_to_mes", "done_assigned_to_mes", "exact_assigned_to_me"));
    }

    public function DoneAssignedToMe($id){
        if(DB::table("assigned_to_mes") -> where("id", $id) -> update(["isCompleted" => 1])){
            return back();
        }
    }

    public function UndoneAssignedToMe($id){
        if(DB::table("assigned_to_mes") -> where("id", $id) -> update(["isCompleted" => 0])){
            return back();
        }
    }

    public function UpdateAssignedToMe(Request $req, $id){
        $information = $req -> except(["_token", "_method"]);

        if(DB::table('assigned_to_mes') -> where("id", $id) -> update($information)){
            return back();
        }
    }

    public function CreateAssignedToMe(Request $req){
        $information = $req -> except("_token");

        if(DB::table("assigned_to_mes")->insert($information)){
            return redirect('/assign-to-me')->with("message", "My Day Created!");
        }
    }

    public function DeleteAssignedToMe($id){
        if(DB::table('assigned_to_mes') -> where("id", $id) -> delete()){
            return redirect("/assign-to-me") -> with("message", "My Day Removed!");
        }
    }

    //Tasks
    public function Tasks(){
        $tasks = DB::table("tasks") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_tasks = DB::table("tasks") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();

        return view("tasks", compact("tasks", "done_tasks"));
    }

    public function ExactTasks($id){
        $tasks = DB::table("tasks") -> orderBy("created_at", "desc") -> where("isCompleted", 0) -> get();
        $done_tasks = DB::table("tasks") -> orderBy("created_at", "desc") -> where("isCompleted", 1) -> get();
        $exact_task = DB::table('tasks')->find($id);

        return view("modals.edit_tasks", compact("tasks", "done_tasks", "exact_task"));
    }

    public function DoneTasks($id){
        if(DB::table("tasks") -> where("id", $id) -> update(["isCompleted" => 1])){
            return back();
        }
    }

    public function UndoneTasks($id){
        if(DB::table("tasks") -> where("id", $id) -> update(["isCompleted" => 0])){
            return back();
        }
    }

    public function UpdateTasks(Request $req, $id){
        $information = $req -> except(["_token", "_method"]);

        if(DB::table('tasks') -> where("id", $id) -> update($information)){
            return back();
        }
    }

    public function CreateTasks(Request $req){
        $information = $req -> except("_token");

        if(DB::table("tasks")->insert($information)){
            return redirect('/tasks')->with("message", "My Day Created!");
        }
    }

    public function DeleteTasks($id){
        if(DB::table('tasks') -> where("id", $id) -> delete()){
            return redirect("/tasks") -> with("message", "My Day Removed!");
        }
    }
}
