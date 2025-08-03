 @extends('layouts.admin_menu')

 @section('content')
 <div class="box">
     @yield('first-box')
 </div>
 <div class="box">
     @yield('second-box')
 </div>

 <div class="pie_chart">
     @yield('pie-chart')
 </div>

 <div class="section">
     @yield('coming-soon')
 </div>

 <div class="bar_chart">
     @yield('bar-chart')
 </div>
 @endsection