  <!-- a variável $prefix pega todas as rotas definidas em
    Route::prefix('brand')->group(function(){
  -->
  <!-- a variável $route verifica qual usuario está usuando a rota atual
    (current)
  -->
  @php
      $prefix = Request::route()->getPrefix();
      $route = Route::current()->getName();
  @endphp


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar-->
      <section class="sidebar" style="height: 307px; overflow: hidden; width: auto;">

          <div class="user-profile">

              <div class="user-profile">
                  <div class="ulogo">
                      <a href="{{ url('admin/dashboard') }}">
                          <!-- logo para stado regular e aprelhos mobile -->
                          <div class="d-flex align-items-center justify-content-center">
                              <img src="{{ asset('backend/images/logo/logo.png') }}" width="100px" heigh="200px"
                                  alt="">
                          </div>
                      </a>
                  </div>
              </div>

              <!-- MENU SIDEBAR-->
              <ul class="sidebar-menu" data-widget="tree">

                  <!-- Condição redirecionamento: quando a rota for igual a 'dashboard'
                            então, a mesma será 'ativa'( terá cor mais clara), se não, ela será nula -->
                  <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                      <a href="{{ url('admin/dashboard') }}">
                          <i data-feather="pie-chart"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <!-- Condição redirecionamento: quando o prefixo for igual a 'brand, (marca)'
                            então, a mesma será 'ativa' (terá cor mais clara), se não, ela será nula -->
                  <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
                      <a href="#">
                          <i data-feather="message-circle"></i>
                          <span>Marcas</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <!-- Condição redirecionamento: quando o prefixo for igual a 'brand, (marca)'
                            então, a mesma será 'ativa' (terá cor mais clara), se não, ela será nula -->
                          <li class="{{ $route == 'all.brands' ? 'active' : '' }}"><a
                                  href="{{ route('all.brands') }}"><i class="ti-more"></i>Todas as Marcas</a></li>

                      </ul>
                  </li>

                  <!-- chamar o prefixo categoria e deixa-la como ativa ao clickar, caso contrário, continua nulo (apagado) -->
                  <li class="treeview {{ $prefix == '/category' ? 'active' : '' }} ">
                      <a href="#">
                          <i data-feather="mail"></i> <span>Categorias</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <!-- Rota criada p/ acessar todas as categorias -->
                          <li class="{{ $route == 'all.categories' ? 'active' : '' }}"><a
                                  href="{{ route('all.categories') }}"><i class="ti-more"></i>
                                  Todas as Categorias</a>
                          </li>                      
                          <!-- Rota criada p/ acessar todas as subcategorias -->
                          <li class="{{ $route == 'all.subcategories' ? 'active' : '' }}"><a
                                  href="{{ route('all.subcategories') }}"><i class="ti-more"></i>
                                  Todas as Sub-Categorias</a>
                          </li>
                      </ul>
                  </li>

                  <li class="treeview">
                      <a href="#">
                          <i data-feather="file"></i>
                          <span>Pages</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
                          <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
                          <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
                          <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
                          <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
                      </ul>
                  </li>

                  <li class="header nav-small-cap">User Interface</li>

                  <li class="treeview">
                      <a href="#">
                          <i data-feather="grid"></i>
                          <span>Components</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>

                      </ul>
                  </li>

                  <li class="treeview">
                      <a href="#">
                          <i data-feather="credit-card"></i>
                          <span>Cards</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                          <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                          <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                      </ul>
                  </li>
              </ul>
      </section>

      <div class="sidebar-footer">
          <!-- item-->
          <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
              data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
          <!-- item-->
          <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
              data-original-title="Email"><i class="ti-email"></i></a>
          <!-- item-->
          <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
              data-original-title="Logout"><i class="ti-lock"></i></a>
      </div>
  </aside>
