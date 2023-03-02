@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Peringatan:</strong> ada masalah dengan inputan anda.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif