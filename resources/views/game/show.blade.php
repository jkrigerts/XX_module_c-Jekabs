@extends('admin.dashboard.layout')

@section('content')
  <h1>{{$game["title"]}}</h1>
  <form action="/XX_module_c/gamea" method="POST">
    @csrf
    <label for="deleted">Is the Game deleted?</label>
    <input type="checkbox" name="deleted" id="deleted" value="{{$game['deleted']}}" {{$game['deleted'] == 1 ? 'checked' : ''}} onchange="this.form.submit()"/>
    <input type="hidden" name="id" value="{{$game['id']}}" />
    <input type="hidden" name="slug" value="{{$game['slug']}}" />
  </form>
@endsection