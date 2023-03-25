@extends('layouts/base_admin')

@include('includes/success_alert')
@include('includes/errors_alert')



@section('head')
    <th>Name</th>
    <th>Username</th>
    @if(!View::hasSection( 'Password')) <th>Password</th> @endif
    <th>role</th>
    <th>Email</th>
    <th>&nbsp;</th>
@endsection

@section('content')
    <form action="@yield('action', route('admin.users.store'))" method="POST" target="_self">
        @csrf
        @yield('method')
        <tr class="alert" role="alert">
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="name"></label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Name"  value="@yield('name')" required>
                </div>
            </td>
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="username"></label>
                    <input id="username" type="text" name="username" class="form-control" placeholder="Username" value="@yield('username')" required>
                </div>
            </td>
            @if(!View::hasSection( 'excludePassword'))
                <td>
                <div class="form-group mb-3">
                    <label class="label" for="password"></label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" >
                </div>
                </td>
            @endif
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="role"></label>
                    <select id="role" name="role">
                        <option value='user'>user</option>
                        <option value='admin'>admin</option>
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group mb-3">
                    <label class="label" for="email"></label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="@yield('email')" required >
                </div>
            </td>
        </tr>
        <div class="form-group">
            <button style="background-color: #99b19c;" type="submit"
                    class="form-control btn btn-primary rounded submit px-3">@yield('submit_name','Register')
            </button>
        </div>
    </form>
    <button style="background-color: #99b19c; margin-left: 10px; color: white; border-radius: 5px;" onclick="location.href='{{ route('admin.users.index') }}'">Back</button>

@endsection
