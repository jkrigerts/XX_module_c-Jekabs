@extends('admin.dashboard.layout')

@section('content')
    <h1>Users</h1>
    <table>
      <thead>
          <tr>
              <th>Username</th>
              <th>Registered At</th>
              <th>Last Login At</th>
              <th>Link to Profile</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
              <tr>
                  <td>{{ $user['username'] }}</td>
                  <td>{{ $user['created_at'] }}</td>
                  <td>{{ $user['last_login'] }}</td>
                  <td><a href="/XX_module_c/user/{{ $user['username'] }}">/XX_module_c/user/{{ $user['username'] }}</a></td>
                  <td>
                    <form action="/XX_module_c/user" method="POST">
                        @csrf
                        <select name="status_id" onchange="this.form.submit()">
                            @php
                                $statuses = \App\Models\Status::all();
                            @endphp

                            @foreach ($statuses as $status)
                              <option
                                  value="{{$status->id}}"
                                  {{$user['status_id'] == $status->id ? 'selected' : ''}}
                              >{{$status->status}}</opton>
                            @endforeach
                        </select>
                        <input type="hidden" name="user_id" value="{{$user['id']}}" />
                    </form>
                  </td>
              </tr> 
          @endforeach 
      </tbody>
  </table>
@endsection