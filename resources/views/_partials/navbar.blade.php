<nav class="navbar bg-primary p-0">
    <div class="container ">
        <a class="navbar-brand uz-logo-bg p-1 " href="#">
            <img src="{{ asset("assets/images/logo.png")}}" class="img-fluid" width=70 height=70 />
            <span class="text-light"><strong>UNIZAMBEZE</strong></span>
        </a>

       

          <div class="d-flex align-items-center">

            <div class="dropdown">
                <button style="border: none" class="d-flex align-items-center btn text-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <strong class="text-light mr-auto">
                    
                            @if(session("dep"))
                                {{session("dep")->nome_usuario_departamento}}
                            @elseif (session("teacher"))
                                {{session("teacher")->nome_docente}}
                            @elseif(session("student"))
                                {{session("student")->nome_estudante}}
                            @endif
                    </strong>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="{{ route("logout")}}" class="text-light" style="text-decoration:none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                      </svg>
                      <span class="ms-1">
                          Logout
                      </span>
                        </a>
                    </li>

                    @if (session("dep"))
                    <li>
                        <a class="dropdown-item d-flex align-items-center" data-bs-target="#holiday" data-bs-toggle="modal" class="text-light" style="text-decoration:none">
                          <span class="fa fa-check"></span>
                        <span class="ms-1">
                            Marcar feriado
                        </span>
                          </a>
                      </li>
                    @endif

                    {{-- <li data-bs-toggle="modal" data-bs-target="#studentinfo">
                      <a class="dropdown-item d-flex align-items-center" href="#" class="text-light" style="text-decoration:none" onclick="showInfo()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                        <span class="ms-1">
                            Minha conta
                        </span>
                        </a>
                    </li>
                  

                    <li >
                        <a class="dropdown-item d-flex align-items-center" href="/messages" class="text-light" style="text-decoration:none">
                         <span class="fa fa-envelope"></span>
                          <span class="ms-1">
                              Mensagens
                          </span>
                          </a>
                      </li> --}}
                </ul>
              </div>
   
          </div>
    </div>
</nav>

<x-holiday-modal></x-holiday-modal>