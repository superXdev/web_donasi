<x-guest-layout>
    <x-slot name="title">
        Login
    </x-slot>

    <x-auth-card>
    
        {{-- show alert if there is errors --}}
        <x-alert-error/>
        
        <x-slot name="title">
            <a href="" class="h1"><b>Admin</b>Panel</a>
        </x-slot>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <x-input-group type="text"  name="username" text="Username" icon="user" />

        <x-input-group type="password"  name="password" text="Password" icon="lock" />
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

    </x-auth-card>
</x-guest-layout>
