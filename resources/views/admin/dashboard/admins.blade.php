@extends('admin.dashboard.layout')

@section('content')
    <h1>Admin Users</h1>
    <table>
      <thead>
          <tr>
              <th>Username</th>
              <th>Created At</th>
              <th>Last Login At</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($admins as $admin)
              <tr>
                  <td>{{ $admin['username'] }}</td>
                  <td>{{ $admin['created_at'] }}</td>
                  <td>{{ $admin['last_login'] }}</td>
              </tr> 
          @endforeach 
      </tbody>
  </table>
@endsection