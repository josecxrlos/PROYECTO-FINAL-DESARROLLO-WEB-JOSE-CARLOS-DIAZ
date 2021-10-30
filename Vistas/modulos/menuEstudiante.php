<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li>
      <a href="http://localhost/universidad/">
        <i class="fa fa-home"></i>
        <span>Inicio</span>
      </a>
      </li>
      <li>
      <a href="http://localhost/universidad/Plan-de-Estudios">
        <i class="fa fa-book"></i>
        <span>Plan de Estudios</span>
      </a>
      </li>
      <li>
      <a href="http://localhost/universidad/Cursos">
        <i class="fa fa-list"></i>
        <span>Inscripciones a cursos</span>
      </a>
      </li>
      <li>

       <?php

       echo '<a href="http://localhost/universidad/Ver-Examenes/'.$_SESSION["id_carrera"].'">
       ';


        ?>
       <i class="fa fa-check-square"></i>
        <span>Exámenes</span>
      </a>
      </li>
      <li class="treeview">
          <a href="#">
              <i class="fa fa-list-ul"></i>
              <span>Certificados</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
              </span>
          </a>

          <ul class="treeview-menu">
              <li>
                  <a href="http://localhost/universidad/Constancia-Alumno">
                    <span>Constancia de alumno</span>
                  </a>
              </li>
              <li>
                  <a href="http://localhost/universidad/Constancia-Cursos">
                    <span>Constancia de cursos</span>
                  </a>
              </li>
          </ul>
      </li>
    </ul>
  </section>
</aside>