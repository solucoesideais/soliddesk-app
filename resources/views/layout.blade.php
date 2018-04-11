@extends('base') @section('page')
<style type=text/css>
  .mt-15 {
    margin-top: 15px;
  }
</style>

<div class="app header-fixed sidebar-fixed pace-done">
  <div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
      <div class="pace-progress-inner">
      </div>
    </div>
    <div class="pace-activity">
    </div>
  </div>
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button" onclick="toggleMenuMobile()">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" onclick="toggleMenu()">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto mr-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('images/avatar.png') }}" class="img-avatar">
          <span class="name d-md-down-none">{{ auth()->user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#">
            <i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>

  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item open">
            <a class="nav-link @route(['/', 'home']) active @endroute" href="/home">
              <i class="icon-speedometer"></i> Dashboard</a>
          </li>
          <li class="nav-title">
            Gerenciar
          </li>
          <li class="nav-item">
            <a href="/administrators" class="nav-link @route('administrators') active @endroute">
              <i class="icon-wrench"></i> Administradores</a>
          </li>
          <li class="nav-item">
            <a href="/specialists" class="nav-link @route('specialists') active @endroute">
              <i class="icon-earphones-alt"></i> Técnicos</a>
          </li>
          <li class="nav-item">
            <a href="/companies" class="nav-link @route('companies') active @endroute">
              <i class="icon-briefcase"></i> Empresas</a>
          </li>
          <li class="nav-item">
            <a href="/users" class="nav-link @route('users') active @endroute">
              <i class="icon-people"></i> Usuários</a>
          </li>
          <li class="nav-item">
            <a href="/departments" class="nav-link @route('departments') active @endroute">
              <i class="icon-organization"></i> Departamentos</a>
          </li>
          <li class="divider"></li>
          <li class="nav-title">
            Relatórios de Chamados
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/especialists.html">
              <i class="icon-earphones-alt"></i> Técnicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/companies.html">
              <i class="icon-briefcase"></i> Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/managers.html">
              <i class="icon-people"></i> Gestores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reports/closetheloop.html">
              <i class="icon-graph"></i> Tempo fechamento</a>
          </li>
        </ul>
      </nav>
    </div>

    <main class="main">
      <div class="container-fluid mt-15">
        <div id="ui-view" style="opacity: 1;">
          <div class="animated fadeIn">
            @if(session('success'))
            <div class="row col">
              <div class="alert alert-success">
                <i class="fa fa-check"></i>
                {{ session('success') }}
              </div>
            </div>
            @endif @yield('content')
          </div>
        </div>
      </div>
    </main>
  </div>
  @endsection
