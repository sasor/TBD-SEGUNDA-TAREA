<div class="navbar is-info">
  <div class="navbar-brand">
    <a class="navbar-item">
      <span><i class="fa fa-home fa-2x"></i><span>
    </a>
  </div>
  <div class="navbar-menu">
    <div class="navbar-start"></div>
    @if(Auth::check())
      <div class="navbar-end">
        <span class="navbar-item">{{Auth::User()->username}}</span>
        <a href="{{ route('logout') }}" class="navbar-item"><span><i class="fa fa-sign-out"></i></span></a>
      </div>
    @endif
  </div>
</div>
