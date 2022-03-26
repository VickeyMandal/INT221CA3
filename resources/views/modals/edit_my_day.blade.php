<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do App</title>
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://kit.fontawesome.com/d58652f74d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    @include('layouts.navigation')
    <section>
        <div>
            <h1 class="category_title"><i class="fas fa-sun"></i> My Day</h1>
            @if (count($my_days) > 0)    
                @foreach ($my_days as $my_day)
                    <div class="todo_wrapper">
                        <div style="display: flex; align-items: center; padding: 15px 10px;">
                            <form action="{{ route("done-my-day", $my_day->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <button type="submit" style="background: none; border: none;"><i class="far fa-circle" style="color: white; margin: 0 10px 0 0;"></i></button>
                            </form>
                            <p>{{ $my_day->description }}</p>
                        </div>
                        <div style="margin-right: 10px; display: flex; align-items: center;">
                            <a style="background: none; border: none; cursor: pointer;" href="{{ route("exact-my-day", $my_day -> id) }}"><i class="far fa-edit" style="color: #2a9d8f; font-size: 18px; margin: 0 10px 0 0;"></i></a>
                            <form action="{{ route("delete-my-day", $my_day->id) }}" method="get">
                                @csrf
                                <button class="show_confirm" type="submit" style="background: none; border: none; cursor: pointer;"><i class="fas fa-trash-alt" style="color: tomato; font-size: 18px;"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
            @endif

            @if (count($done_my_days) > 0)
                <div>
                    <div style="display: flex; padding: 5px; width: 115px; cursor: pointer; border-radius: 5px; background: #212529; margin: 0 0 10px 0;" class="Done_Myday_Controller">
                        <i class="fas fa-chevron-down" style="color: white"></i>
                        <p style="margin: 0 0 0 5px; color: white;">Completed {{ count($done_my_days) }}</p>
                    </div>
                    <div id="Done_Myday" style="display: flex; flex-direction: column;">
                        @foreach ($done_my_days as $done_my_day)
                            <div class="todo_wrapper">
                                <div style="display: flex; align-items: center; padding: 15px 10px;">
                                    <form action="{{ route("undone-my-day", $done_my_day->id) }}" method="POST">
                                        @csrf
                                        @method("PUT")
                                        <button type="submit" style="background: none; border: none;"><i class="far fa-check-circle" style="color: white; margin: 0 10px 0 0;"></i></button>
                                    </form>
                                    <p style="text-decoration: line-through; color: #ced4da;">{{ $done_my_day->description }}</p>
                                </div>
                                <div style="margin-right: 10px; display: flex; align-items: center;">
                                    <a style="background: none; border: none; cursor: pointer;" href="{{ route("exact-my-day", $done_my_day -> id) }}"><i class="far fa-edit" style="color: #2a9d8f; font-size: 18px; margin: 0 10px 0 0;"></i></a>
                                    <form action="{{ route("delete-my-day", $done_my_day->id) }}" method="get">
                                        @csrf
                                        <button class="show_confirm" type="submit" style="background: none; border: none; cursor: pointer;"><i class="fas fa-trash-alt" style="color: tomato; font-size: 18px;"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
            @endif
        </div>
        <div>
            <div class="todo_wrapper">
                <form action="{{ route("create-my-day") }}" method="post" class="todos">
                    @csrf
                    <div class="todo">
                        <input type="text" placeholder="Add a task" name="description">
                        <input type="text" hidden name="isCompleted" value="0">
                        <button type="submit" style="background: none; border: none;"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="edit_modal_wrapper">
        <div class="edit_modal">
            <form action="{{ route("update-my-day", $exact_my_day->id) }}" method="POST">
                <div class="description_block">
                    <input type="text" value="{{ $exact_my_day->description }}" name="description">
                </div>
                <div class="button_block">
                    @method("PUT")
                    @csrf
                    <input type="submit" value="Update">
                    <a href="/">Close</a>
                </div>
            </form>
        </div>
        <div class="created_date">
            <p>Create on {{ $exact_my_day -> created_at }}</p>
            <form action="{{ route("delete-my-day", $exact_my_day->id) }}" method="GET">
                <button class="show_confirm" id="delete_button" type="submit" style="background: none; border: none; cursor: pointer;"><i class="fas fa-trash-alt" style="color: tomato; font-size: 18px;"></i></button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });

        const Done_Myday_Controller = document.querySelector(".Done_Myday_Controller")
        const Done_Myday = document.querySelector("#Done_Myday")
        Done_Myday_Controller.addEventListener("click", () => {
            if(Done_Myday.style.display == "flex"){
                Done_Myday.style.display = "none"
            }else{
                Done_Myday.style.display = "flex"
            }
        })
    </script>
</body>
</html>