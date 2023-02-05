<nav class="sidebar" data-trigger="scrollbar">
   <!-- Sidebar Header -->
   <div class="sidebar-header d-none d-lg-block">
      <!-- Sidebar Toggle Pin Button -->
      <div class="sidebar-toogle-pin">
         <i class="icofont-tack-pin"></i>
      </div>
      <!-- End Sidebar Toggle Pin Button -->
   </div>
   <!-- End Sidebar Header -->

   <!-- Sidebar Body -->
   <div class="sidebar-body">
      <!-- Nav -->
      <ul class="nav">
         <li class="nav-category">Menú</li>
         <li class="active">
            <a href="{{ '/dashboard' }}">
               <i class="icofont-pie-chart"></i>
               <span class="link-title">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ '/dashboard' }}">
               <i class="icofont-exit"></i>
               <span class="link-title" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
            </form>
         </li>
         <!-- End Nav -->
   </div>
   <!-- End Sidebar Body -->
</nav>