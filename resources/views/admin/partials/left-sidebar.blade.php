  @php
  $current_route=request()->route()->getName();
  @endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('images/logo/logo.png') }}"style="height: 80px; " alt="ADCL Logo">
      <span class="brand-text font-weight-light" style="font-family: oswald; font-size:20px;">ADCL Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div> --}}

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<br>
           <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{$current_route=='dashboard'?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="font-family: oswald; font-size:20px;">
                Dashboard
              </p>
            </a>
          </li>
          <br>


<!-- Main Nav Item -->
{{-- users --}}
@if(auth()->check() && auth()->user()->role == 1)
<li class="nav-item">
    <a href="{{ route('users') }}" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p style="font-family: oswald; font-size:18px;">
            Users
        </p>
    </a>
</li>
@endif

<ul class="nav">
    <!--Player Info-->
    <li class="nav-item">
        <a href="{{ route('players.search') }}" class="nav-link" id="playerInfoBtn">
           &nbsp; <i class="nav-icon fas fa-user"></i>
            <p style="font-family: oswald; font-size:18px;">
                &nbsp; ADCL Player Info
            </p>
            &nbsp;  <i class="fas fa-arrow-circle-down" ></i>
        </a>
    </li>
</ul>

<!-- Links to Search and Add Players Pages (Initially Hidden) -->
<li class="nav-item" id="searchBtnContainer" style="display: none;">
    <a href="{{ route('players.search') }}" class="nav-link">
        <i class="nav-icon fas fa-search"></i>
        <p style="font-family: oswald; font-size:16px;">
            Search Player
        </p>
    </a>
</li>

<li class="nav-item" id="addBtnContainer" style="display: none;">
    <a href="{{ route('players.create') }}" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p style="font-family: oswald; font-size:16px;">
            Add Player
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" id="teamInfoBtn">
        <i class="nav-icon fas fa-users" ></i>
        <p style="font-family: oswald; font-size:18px;">
            ADCL Team Info
        </p>
        <i class="fas fa-arrow-circle-down"  style="margin-left: 10px;"></i>
    </a>
</li>
<!-- Links to Search and Add Teams Pages (Initially Hidden) -->
<li class="nav-item" id="searchTeamBtnContainer" style="display: none;">
    <a href="{{ route('admin.teams.search') }}" class="nav-link">
        <i class="nav-icon fas fa-search"></i>
        <p style="font-family: oswald; font-size:16px;">
            Search Team
        </p>
    </a>
</li>
<li class="nav-item" id="addTeamBtnContainer" style="display: none;">
    <a href="{{ route('admin.teams.create') }}" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p style="font-family: oswald; font-size:16px;">
            Add Team
        </p>
    </a>
</li>

<!-- Tournaments -->
<li class="nav-item">
    <a href="#" class="nav-link" id="tournamentInfoBtn">
        <i class="nav-icon fas fa-trophy"></i>
        <p style="font-family: oswald; font-size:18px;">
            Tournaments
        </p>
        <i class="fas fa-arrow-circle-down" style="margin-left: 42px;"></i>
    </a>
</li>


<!-- Links to Search and Add Tournaments Pages (Initially Hidden) -->
<li class="nav-item" id="searchTournamentBtnContainer" style="display: none;">
    <a href="{{ route('admin.tournaments.search') }}" class="nav-link">
        <i class="nav-icon fas fa-search"></i>
        <p style="font-family: oswald; font-size:16px;">
            Search Tournament
        </p>
    </a>
</li>
<li class="nav-item" id="addTournamentBtnContainer" style="display: none;">
    <a href="{{ route('admin.tournaments.create') }}" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p style="font-family: oswald; font-size:16px;">
            Add Tournament
        </p>
    </a>
</li>

 </ul>

</nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <script>
    // JavaScript to toggle the visibility of the buttons and switch active state

    document.getElementById("playerInfoBtn").addEventListener("click", function () {
        toggleButtonVisibility("player");
    });

    document.getElementById("teamInfoBtn").addEventListener("click", function () {
        toggleButtonVisibility("team");
    });

    document.getElementById("tournamentInfoBtn").addEventListener("click", function () {
        toggleButtonVisibility("tournament");
    });

    function toggleButtonVisibility(type) {
        var playerInfoBtn = document.getElementById("playerInfoBtn");
        var teamInfoBtn = document.getElementById("teamInfoBtn");
        var tournamentInfoBtn = document.getElementById("tournamentInfoBtn");
        var searchBtnContainer = type === "player" ? document.getElementById("searchBtnContainer") :
            type === "team" ? document.getElementById("searchTeamBtnContainer") :
            type === "tournament" ? document.getElementById("searchTournamentBtnContainer") : null;
        var addBtnContainer = type === "player" ? document.getElementById("addBtnContainer") :
            type === "team" ? document.getElementById("addTeamBtnContainer") :
            type === "tournament" ? document.getElementById("addTournamentBtnContainer") : null;

        // Toggle search and add buttons
        if (searchBtnContainer.style.display === "none") {
            searchBtnContainer.style.display = "block";
            addBtnContainer.style.display = "block";
        } else {
            searchBtnContainer.style.display = "none";
            addBtnContainer.style.display = "none";
        }

        // Toggle active state
        if (type === "player") {
            playerInfoBtn.classList.add("active");
            teamInfoBtn.classList.remove("active");
            tournamentInfoBtn.classList.remove("active");
        } else if (type === "team") {
            teamInfoBtn.classList.add("active");
            playerInfoBtn.classList.remove("active");
            tournamentInfoBtn.classList.remove("active");
        } else if (type === "tournament") {
            tournamentInfoBtn.classList.add("active");
            playerInfoBtn.classList.remove("active");
            teamInfoBtn.classList.remove("active");
        }
    }
</script>

<style>
    /* Add styles for the active button (optional) */
.nav-item.active .nav-link {
  background-color: #007bff;
  color: #fff;
  border-radius: 5px;
}
</style>
<style>
    /* Add styles for the active button (optional) */
    .nav-item.active .nav-link {
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
    }

    /* Adjust icon position for small screens */
    @media (max-width: 767px) {
        .nav-item .nav-link i.fas {
            margin-left: 5px;
            margin-right: 10px;
        }
        .nav-item .nav-link .fas.fa-arrow-circle-down {
            margin-left: 5px;
        }
    }
</style>
