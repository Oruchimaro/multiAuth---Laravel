@if (Auth::guard('web')->check())
    <p class="text-success">
        You are loged in as a <strong>User</strong> !
    </p>
@else
    <p class="text-danger">
        You are logged Out as a <strong>User</strong>!!
    </p>
@endif


@if (Auth::guard('admin')->check())
    <p class="text-success">
        You are loged in as a <strong>ADMIN</strong> !
    </p>
@else
    <p class="text-danger">
        You are logged Out as a <strong>ADMIN</strong>!!
    </p>
@endif