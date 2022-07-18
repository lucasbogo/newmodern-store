  {{-- a variável $prefix pega todas as rotas definidas em
    Route::prefix('brand')->group(function(){ --}}

  {{-- a variável $route verifica qual usuario está usuando a rota atual
    (current) --}}

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
                              <img src="{{ asset('backend/images/logo/logo.png') }}" width="150px" heigh="200px"
                                  alt="">
                          </div>
                      </a>
                  </div>
              </div>

              <!-- MENU SIDEBAR-->
              <ul class="sidebar-menu" data-widget="tree">

                  {{-- Condição redirecionamento: quando a rota for igual a 'dashboard'
                    então, a mesma será 'ativa'( terá cor mais clara), se não, ela será nula --}}
                  <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                      <a href="{{ url('admin/dashboard') }}">
                          <i data-feather="pie-chart"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  {{-- Condição redirecionamento: quando o prefixo for igual a 'brand, (marca)'
                  então, a mesma será 'ativa' (terá cor mais clara), se não, ela será nula --}}
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

                  <!-- chamar o prefixo categoria e deixa-la como ativa ("iluminada") ao clickar, caso contrário, continua nulo ("apagado") -->
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
                                  Categorias</a>
                          </li>

                          <!-- Rota criada p/ acessar todas as subcategorias -->
                          <li class="{{ $route == 'all.subcategories' ? 'active' : '' }}"><a
                                  href="{{ route('all.subcategories') }}"><i class="ti-more"></i>
                                  Sub-Categorias</a>
                          </li>

                          <!-- Rota criada p/ acessar todas as sub-subcategorias -->
                          <li class="{{ $route == 'all.subsubcategories' ? 'active' : '' }}"><a
                                  href="{{ route('all.subsubcategories') }}"><i class="ti-more"></i>
                                  Sub-Sub-Categorias</a>
                          </li>
                      </ul>
                  </li>

                  <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
                      <a href="#">
                          <i data-feather="file"></i>
                          <span>Produtos</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <!--chamar o prefixo Adicionar Produto e deixa-la como ativa ("iluminada") ao clickar, caso contrário, continua nulo ("apagado") -->
                          <!-- Rota para Adicionar Produto: href="product.add" -->
                          <li class="{{ $route == 'product.add' ? 'active' : '' }}"><a
                                  href="{{ route('product.add') }}"><i class="ti-more"></i>Adicionar Produtos</a>
                          </li>
                          <!--chamar o prefixo Gerenciar Produto e deixa-la como ativa ("iluminada") ao clickar, caso contrário, continua nulo ("apagado") -->
                          <!-- Rota para genrenciar Produto: href="'product.manage" -->
                          <li class="{{ $route == 'product.manage' ? 'active' : '' }}"><a
                                  href="{{ route('product.manage') }}"><i class="ti-more"></i>Gerenciar Produtos</a>
                          </li>
                      </ul>
                  </li>

                  <!-- Banner Sliders -->
                  <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}">
                      <a href="#">
                          <i data-feather="file"></i>
                          <span>Sliders</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>

                      <ul class="treeview-menu">
                          <li class="{{ $route == 'all.sliders' ? 'active' : '' }}"><a
                                  href="{{ route('all.sliders') }}"><i class="ti-more"></i>Gerenciar Sliders</a>
                          </li>
                      </ul>
                  </li>

                  <!-- Campo Envio/Shipping -->
                  <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}">
                      <a href="#">
                          <i data-feather="file"></i>
                          <span>Envio</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-right pull-right"></i>
                          </span>
                      </a>


                      <ul class="treeview-menu">
                          <!-- Sub Envio/shipping Bairro -->
                          <li class="{{ $route == 'division.manage' ? 'active' : '' }}"><a
                                  href="{{ route('division.manage') }}"><i class="ti-more"></i>Bairros</a>
                          </li>

                          <!-- Sub Envio/shipping Cidade -->
                          <li class="{{ $route == 'district.manage' ? 'active' : '' }}"><a
                                  href="{{ route('district.manage') }}"><i class="ti-more"></i>Cidades</a>
                          </li>

                          <!-- Sub Envio/shipping Estado -->
                          <li class="{{ $route == 'state.manage' ? 'active' : '' }}"><a
                                  href="{{ route('state.manage') }}"><i class="ti-more"></i>Estados</a>
                          </li>
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
