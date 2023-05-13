<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="justify-content: space-between;padding:50px;">
        <img src="{{url('images/logo.jpeg')}}" class="w-50 " style="border-radius: 50% ;box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.19);" alt="">

        <button class="btn btn-danger btn-sm" onclick="document.getElementById('logout-form').submit();"><i class='bx bx-log-out'></i></button>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="menu-inner-shadow " style="margin-top: 50px"></div>

    <ul class="menu-inner py-1 mt-2 ">
      <!-- Dashboard -->
      <li class="menu-item  {{ request()->segment(1)=='dashboard' ?'active': '' }}">
        <a href="{{url("dashboard")}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='school_managements' ?'active': '' }}">
        <a href="{{route('school_managements.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-store-alt'></i>
          <div data-i18n="Analytics">School Management</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='addmissions' ?'active': '' }}">
        <a href="{{route('addmissions.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-traffic'></i>
          <div data-i18n="Analytics">Leads</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='class_categories' ?'active': '' }}">
        <a href="{{route('class_categories.index')}}" class="menu-link">
            <i class='menu-icon bx bx-category'></i>
          <div data-i18n="Analytics">Class Categories</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='students' ?'active': '' }}">
        <a href="{{route('students.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-graduation'></i>
          <div data-i18n="Analytics">Student Manager</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='student_transfers' ?'active': '' }}">
        <a href="{{route('student_transfers.index')}}" class="menu-link">
        <i class='menu-icon bx bx-transfer'></i>
          <div data-i18n="Analytics">Student Transfer</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='coupons' ?'active': '' }}">
        <a href="{{route('coupons.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-coupon'></i>
          <div data-i18n="Analytics">Coupon Manager</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='faqs' ?'active': '' }}">
        <a href="{{route('faqs.index')}}" class="menu-link">
            <i class='menu-icon bx bx-highlight'></i>
          <div data-i18n="Analytics">Faqs</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='static_pages' ?'active': '' }}">
        <a href="{{route('static_pages.index')}}" class="menu-link">
            <i class=' menu-icon bx bx-book-content'></i>
          <div data-i18n="Analytics">Static Pages</div>
        </a>
      </li>

      <li class="menu-item  {{ request()->segment(1)=='email_templates' ?'active': '' }}">
        <a href="{{route('email_templates.index')}}" class="menu-link">
            <i class='menu-icon bx bx-envelope'></i>
          <div data-i18n="Analytics">Email Templates</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='teachers' ?'active': '' }}">
        <a href="{{route('teachers.index')}}" class="menu-link">
            <i class='menu-icon bx bxl-microsoft-teams' ></i>
          <div data-i18n="Analytics">Teacher Manager</div>
        </a>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='plans' ?'active': '' }}">
        <a href="{{route('plans.index')}}" class="menu-link">
            <i class='menu-icon bx bx-paper-plane' ></i>
          <div data-i18n="Analytics">Plans Manager</div>
        </a>
      </li>
      <li class="menu-item {{ request()->segment(1)=='user_managements' ?'open active': '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon bx bxs-user-detail'></i>
          <div data-i18n="Layouts">User Management</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item {{request()->segment(2)=='users' ?'active': ''}}">
            <a  href="{{route('users.index')}}" class="menu-link">
                <i class='menu-icon bx bxs-group' ></i>
              <div data-i18n="Without menu">All Users</div>
            </a>
          </li>
          <li class="menu-item {{ request()->segment(2)=='roles' ?'active': '' }}">
            <a  href="{{route('roles.index')}}" class="menu-link">
                <i class='menu-icon bx bx-id-card' ></i>
              <div data-i18n="Without navbar">Roles</div>
            </a>
          </li>
          <li class="menu-item {{ request()->segment(2)=='permissions' ?'active': '' }}">

            <a  href="{{route('permissions.index')}}" class="menu-link">
                <i class='menu-icon bx bxs-user-badge' ></i>
              <div data-i18n="Container">Permissions</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='assign_classes' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-glasses'></i>
          <div data-i18n="Analytics">Assign Class Manager</div>
        </a>
      </li>

      <li class="menu-item  {{ request()->segment(1)=='exams' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-test-tube'></i>
          <div data-i18n="Analytics">Exam Manager</div>
        </a>
      </li>

      <li class="menu-item  {{ request()->segment(1)=='results' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-book-reader' ></i>
          <div data-i18n="Analytics">Result Manager</div>
        </a>
      </li>

      <li class="menu-item  {{ request()->segment(1)=='notifications' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-notification'></i>
          <div data-i18n="Analytics">Notification Manager</div>
        </a>
      </li>

      <!-- Layouts -->


      {{-- <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="pages-account-settings-account.html" class="menu-link">
              <div data-i18n="Account">Account</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-notifications.html" class="menu-link">
              <div data-i18n="Notifications">Notifications</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-account-settings-connections.html" class="menu-link">
              <div data-i18n="Connections">Connections</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
          <div data-i18n="Authentications">Authentications</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="auth-login-basic.html" class="menu-link" target="_blank">
              <div data-i18n="Basic">Login</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="auth-register-basic.html" class="menu-link" target="_blank">
              <div data-i18n="Basic">Register</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
              <div data-i18n="Basic">Forgot Password</div>
            </a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-cube-alt"></i>
          <div data-i18n="Misc">Misc</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="pages-misc-error.html" class="menu-link">
              <div data-i18n="Error">Error</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="pages-misc-under-maintenance.html" class="menu-link">
              <div data-i18n="Under Maintenance">Under Maintenance</div>
            </a>
          </li>
        </ul>
      </li> --}}
      <!-- Components -->
      {{-- <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
      <!-- Cards -->
      <li class="menu-item">
        <a href="cards-basic.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Cards</div>
        </a>
      </li>
      <!-- User interface -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-box"></i>
          <div data-i18n="User interface">User interface</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="ui-accordion.html" class="menu-link">
              <div data-i18n="Accordion">Accordion</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-alerts.html" class="menu-link">
              <div data-i18n="Alerts">Alerts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-badges.html" class="menu-link">
              <div data-i18n="Badges">Badges</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-buttons.html" class="menu-link">
              <div data-i18n="Buttons">Buttons</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-carousel.html" class="menu-link">
              <div data-i18n="Carousel">Carousel</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-collapse.html" class="menu-link">
              <div data-i18n="Collapse">Collapse</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-dropdowns.html" class="menu-link">
              <div data-i18n="Dropdowns">Dropdowns</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-footer.html" class="menu-link">
              <div data-i18n="Footer">Footer</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-list-groups.html" class="menu-link">
              <div data-i18n="List Groups">List groups</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-modals.html" class="menu-link">
              <div data-i18n="Modals">Modals</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-navbar.html" class="menu-link">
              <div data-i18n="Navbar">Navbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-offcanvas.html" class="menu-link">
              <div data-i18n="Offcanvas">Offcanvas</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-pagination-breadcrumbs.html" class="menu-link">
              <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-progress.html" class="menu-link">
              <div data-i18n="Progress">Progress</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-spinners.html" class="menu-link">
              <div data-i18n="Spinners">Spinners</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-tabs-pills.html" class="menu-link">
              <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-toasts.html" class="menu-link">
              <div data-i18n="Toasts">Toasts</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-tooltips-popovers.html" class="menu-link">
              <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="ui-typography.html" class="menu-link">
              <div data-i18n="Typography">Typography</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Extended components -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-copy"></i>
          <div data-i18n="Extended UI">Extended UI</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
              <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="extended-ui-text-divider.html" class="menu-link">
              <div data-i18n="Text Divider">Text Divider</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-item">
        <a href="icons-boxicons.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-crown"></i>
          <div data-i18n="Boxicons">Boxicons</div>
        </a>
      </li>

      <!-- Forms & Tables -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
      <!-- Forms -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Elements">Form Elements</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="forms-basic-inputs.html" class="menu-link">
              <div data-i18n="Basic Inputs">Basic Inputs</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="forms-input-groups.html" class="menu-link">
              <div data-i18n="Input groups">Input groups</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Layouts">Form Layouts</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="form-layouts-vertical.html" class="menu-link">
              <div data-i18n="Vertical Form">Vertical Form</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-layouts-horizontal.html" class="menu-link">
              <div data-i18n="Horizontal Form">Horizontal Form</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Tables -->
      <li class="menu-item">
        <a href="tables-basic.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">Tables</div>
        </a>
      </li> --}}
      <!-- Misc -->
    </ul>
  </aside>
