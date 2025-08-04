 @extends('layouts.dashboard')

 @section('title', 'Tableau de bord')
 @section('menu')
 <li class="main_menu_item">
     <a href="{{route('admin.dashboard')}}" class="main_menu_links">Tableau de bord</a>
 </li>
 <li class="main_menu_item"><a href="{{ route('services.index')}}" class="main_menu_links">Planning</a></li>
 <li class="main_menu_item"><a href="{{ route('estates.index')}}" class="main_menu_links">Biens</a></li>
 <li class="main_menu_item"><a href="{{ route('owners.index')}}" class="main_menu_links">Propriétaires</a></li>
 <li class="main_menu_item"><a href="{{ route('agents.index')}}" class="main_menu_links">Agents</a></li>
 <li class="main_menu_item"><a href="{{ route('zones.index')}}" class="main_menu_links">Secteurs</a>
 </li>
 @endsection
 @section('main_title', 'Tableau de bord')

 @section('first-box')
 <div class="icon"></div>
 <div class="title">Total des biens</div>
 <div class="number">15</div>
 @endsection

 @section('second-box')
 <div class="icon"></div>
 <div class="title">Biens loués</div>
 <div class="number">12</div>
 @endsection

 @section('pie-chart')
 <div class="chart_title">
     <div class="icon"></div>
     <span>Biens gérés</span>
 </div>
 <div class="chart">
     <canvas id="pieChart"></canvas>
     <ul class="legend">
         <li>Légende 1</li>
         <li>Légende 2</li>
         <li>Légende 3</li>
         <li>Légende 4</li>
     </ul>
 </div>
 <div class="chart_buttons">
     <button>Cat</button>
     <button>Cat</button>
     <button>Cat</button>
     <button>Cat</button>
 </div>
 @endsection

 @section('coming-soon')
 <div class="icon"></div>
 <div class="title">A venir</div>
 <div class="sub_section">
     <h4>Ménage</h4>
     <p>BASE - PARVELMAR03 - Lina</p>
     <p>COMP - VILZEMLAU02 - Melvin</p>
     <p>SPE - COUBUYAUR01 - Sophia</p>
 </div>
 <div class="sub_section">
     <h4>Conciergerie</h4>
     <p>EDL E - PARVELMAR03 - Lina</p>
     <p>LINGE - VILZEMLAU02 - Melvin</p>
     <p>EDL S - COUBUYAUR01 - Sophia</p>
 </div>
 @endsection

 @section('bar-chart')
 <div class="icon"></div>
 <div class="chart_title">
     <div class="icon"></div>
     <span>Agent</span>
 </div>
 <div class="bar_chart_box">
     <canvas id="barChart"></canvas>
 </div>
 <div class="chart_buttons">
     <button>Cat</button><button>Cat</button><button>Cat</button>
     <button>Cat</button><button>Cat</button><button>Cat</button>
     <button>Cat</button><button>Cat</button><button>Cat</button>
 </div>
 @endsection