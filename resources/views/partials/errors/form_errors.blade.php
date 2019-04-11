@if (count($errors) > 0)
  <ul>
    @foreach ($errors->all() as $e)
    <li>{{ $e }}</li>
    @endforeach
  </ul>
@endif
