<aside>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <div class="profile_template">
        <i class="fa fa-user-circle"></i>
        <div class="profile">
            <h3>Bappaditya Mandal</h3>
            <p>INT220 CA-3</p>
        </div>
</div>
    <div class="nav">
        <a href={{ route("home") }} class="my_day">
            <i class="fas fa-cloud "></i>
            <h4>Today</h4>
        </a>
        <a href={{ route("important") }} class="important">
            <i class="far fa-star"></i>
            <h4>Important</h4>
        </a>
        <a href={{ route("planned") }} class="planned">
            <i class="fas fa-book"></i>
            <h4>Planned</h4>
        </a>
        <a href={{ route("assigned_to_me") }} class="assigned_to_me">
            <i class="fas fa-user-alt"></i>
            <h4>Assigned to me</h4>
        </a>
        <a href={{ route("tasks") }} class="task">
            <i class="fas fa-home"></i>
            <h4>Tasks</h4>
        </a>
    </div>
</aside>