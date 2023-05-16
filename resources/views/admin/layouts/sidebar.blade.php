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

      @if (Auth::user()->hasRole(1) || Auth::user()->hasRole(2) )
      <li class="menu-item  {{ request()->segment(1)=='school_managements' ?'active': '' }}">
        <a href="{{route('school_managements.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-store-alt'></i>
          <div data-i18n="Analytics">School Management</div>
        </a>
      </li>
      @endif

      @if (Auth::user()->hasRole(1))

      <li class="menu-item  {{ request()->segment(1)=='class_categories' ?'active': '' }}">
        <a href="{{route('class_categories.index')}}" class="menu-link">
            <i class='menu-icon bx bx-category'></i>
          <div data-i18n="Analytics">Class Categories</div>
        </a>
      </li>

      <li class="menu-item  {{ request()->segment(1)=='plans' ?'active': '' }}">
        <a href="{{route('plans.index')}}" class="menu-link">
            <i class='menu-icon bx bx-paper-plane' ></i>
          <div data-i18n="Analytics">Plans Manager</div>
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
          {{-- <li class="menu-item {{ request()->segment(2)=='permissions' ?'active': '' }}">

            <a  href="{{route('permissions.index')}}" class="menu-link">
                <i class='menu-icon bx bxs-user-badge' ></i>
              <div data-i18n="Container">Permissions</div>
            </a>
          </li> --}}
        </ul>
      </li>
      <li class="menu-item  {{ request()->segment(1)=='notifications' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-notification'></i>
          <div data-i18n="Analytics">Notification Manager</div>
        </a>
      </li>
      @endif

      @if (Auth::user()->hasRole(2))
      <li class="menu-item  {{ request()->segment(1)=='addmissions' ?'active': '' }}">
        <a href="{{route('addmissions.index')}}" class="menu-link">
            <i class='menu-icon bx bxs-traffic'></i>
          <div data-i18n="Analytics">Leads</div>
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

      <li class="menu-item  {{ request()->segment(1)=='teachers' ?'active': '' }}">
        <a href="{{route('teachers.index')}}" class="menu-link">
            <i class='menu-icon bx bxl-microsoft-teams' ></i>
          <div data-i18n="Analytics">Teacher Manager</div>
        </a>
      </li>
      <li class="menu-item {{ request()->segment(1)=='ERP_management' ?'open active': '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class='menu-icon bx bxs-book-content'></i>
          <div data-i18n="Layouts">ERP Managements</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{request()->segment(2)=='student_attendances' ?'active': ''}}">
            <a  href="{{route('student_attendances.index')}}" class="menu-link">
                <i class='menu-icon bx bx-edit'></i>
              <div data-i18n="Without menu">Student Attendances</div>
            </a>
          </li>
        </ul>
      </li>


      {{-- <li class="menu-item  {{ request()->segment(1)=='assign_classes' ?'active': '' }}">
        <a href="#" class="menu-link">
            <i class='menu-icon bx bx-glasses'></i>
          <div data-i18n="Analytics">Assign Class Manager</div>
        </a>
      </li> --}}

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
      @endif
    </ul>
  </aside>
