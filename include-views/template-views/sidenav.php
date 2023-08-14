<div class="sidenav boxShadow">
  <div class="logo_content">
    <div class="logo">
      <i class="fal fa-bars"></i>
      <div class="logo_name">g.SYSTEMS</div>
    </div>
    <i class="fal fa-bars" id="burgerBtn"></i>
  </div>
  <ul class="nav_list">
    <li>
      <i class="fas fa-search bx-search"></i>
      <input type="text" class="control-form">
      <!-- <span class="tooltip">Agendar cita</span> -->
    </li>
    <li>
      <a href="">
        <i class="fas fa-calendar-plus blackTx"></i>
        <span class="links_name blackTx">Agendar cita</span>
      </a>
      <!-- <span class="tooltip">Agendar cita</span> -->
    </li>
    <li>
      <a href="">
      <i class="fas fa-clipboard-list"></i>
        <span class="links_name blackTx">Historial de citas</span>
      </a>
      <!-- <span class="tooltip">Historial de citas</span> -->
    </li>
  </ul>
  <div class="profile_content">
    <div class="profile">
      <div class="profile_details">
        <img src="" alt="">
        <div class="name_job">
          <div class="name"><?php echo $user['name_medico']?></div>
          <div class="job">Doctor</div>
        </div>
      </div>
      <a href="../php/logout.php" id="logout"></a><i class="fas fa-power-off"></i>
    </div>
  </div>
</div>