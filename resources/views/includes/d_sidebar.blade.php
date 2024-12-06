  <div class="sidebar col-md-3 col-lg-3 p-0">
    <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a wire:navigate class="nav-link d-flex align-items-center gap-2 {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" aria-current="page" href="/d/home">
              <span class="bi bi-layout-wtf"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link d-flex align-items-center gap-2 {{ Route::currentRouteName() === 'jobs' ? 'active' : '' }}" href="/d/jobs">
              <span class="bi bi-briefcase"></span>
              Jobs
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <b>SUPPORT</b>
        </h6>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Route::currentRouteName() === 'settings' ? 'active' : '' }}" href="#settings" data-bs-toggle="modal" data-bs-target="#settings_modal">
              <spn class="bi bi-gear"></spn>
              Settings
            </a>
          </li>
          <li class="nav-item">
            <a wire:navigate class="nav-link d-flex align-items-center gap-2 {{ Route::currentRouteName() === 'faq' ? 'active' : '' }}" href="/d/faq">
              <span class="bi bi-question-circle"></span>
              FAQ
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <b>USER</b>
        </h6>
        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Route::currentRouteName() === 'profile' ? 'active' : '' }}" href="/d/profile">
              <span class="bi bi-person-circle"></span>
              {{ auth()->user()->name }}
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link d-flex align-items-center gap-2" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
              <span class="bi bi-box-arrow-in-left"></span>
              Logout
            </a>
            <form id="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  {{-- settings modal --}}
  <div class="modal fade" id="settings_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-2 pe-2 ps-2">
          <h6 class="modal-title" style="font-family: Inter Bold">Settings</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="d-grid gap-3">
            <div>
              <h6><b>ACCOUNT</b></h6>
              <a href="/d/settings/acct/change_email_addr"><div>Change email address</div></a>
              <a href="/d/settings/acct/change_password"><div>Change password</div></a>
              <a href="/d/settings/acct/delete_acct"><div>Delete my account</div></a>
            </div>
            <div>
              <h6><b>JOBS</b></h6>
              <a href="/d/settings/jobs/change_job_posts_currency"><div>Change job posts currency</div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-9 ms-sm-auto col-lg-9 px-md-4">
    <div class="mt-4">