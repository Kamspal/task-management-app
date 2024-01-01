@extends('layouts.app')

@section('content')
<div id="app" class="container">
  <div class="row">
    <task-list :projects="{{ $projects }}"></task-list>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ mix('js/app.js') }}"></script>
@endsection