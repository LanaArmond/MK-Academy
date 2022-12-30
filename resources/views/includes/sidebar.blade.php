<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item hidden sm:flex sm:items-center sm:ml-6">
          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                  <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                      <div>{{ Auth::user()->getDecrypted(Auth::user()->name) }}</div>

                      <div class="ml-1">
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                      </div>
                  </button>
              </x-slot>

              <x-slot name="content">
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf

                      <x-dropdown-link :href="route('logout')"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                      </x-dropdown-link>
                  </form>
              </x-slot>
          </x-dropdown>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="{{ asset('img/MediumLogo.png') }}" alt="Mk Academy Logo" class="" style="opacity: .8">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style="height: 40px;width:40px" src="{{ asset("img/profilePic/" . $admin->picture ) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info text-white">
                {{ Auth::user()->getDecrypted(Auth::user()->name) }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                  <a class="nav-link {{ Route::is('clients.index') ? 'active' : '' }}"  
                    {{-- href="{{ route('clients.index') }}" --}}
                  >
                      <i class="fas fa-fw fa-users "></i>
                      <p> Alunos </p>
                  </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{ Route::is('teachers.index') ? 'active' : '' }}"
                      {{-- href="{{ route('teachers.index') }}" --}}
                    >
                        <i class="fas fa-fw far fa-chalkboard-teacher "></i>
                        <p> Professores </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}" 
                      href="{{route('admin.index')}}"
                    >
                        <i class="fas fa-fw fas fa-user-cog "></i>
                        <p> Administradores </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{ Route::is('equipaments.index') ? 'active' : '' }}" 
                    {{-- href="{{route('equipaments.index')}}" --}}
                    >
                        <i class="fas fa-fw fal fa-dumbbell "></i>
                        <p> Equipamentos </p>
                    </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link  {{ Route::is('exercises.index') ? 'active' : '' }}" 
                  href="{{route('exercises.index')}}"
                  >
                      <i class="fas fa-fw fal fa-solid fa-person-running"></i>
                      <p> Exercícios </p>
                  </a>
              </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
