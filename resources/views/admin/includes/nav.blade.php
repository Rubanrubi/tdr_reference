<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
        <div class="brand-sidebar">
            <h1 class="logo-wrapper">
                <a class="brand-logo darken-1" href="#"><!-- <img class="hide-on-med-and-down" src="" alt="TDR" /> --><img class="show-on-medium-and-down hide-on-med-and-up" src="assets/images/logo/materialize-logo.png" alt="materialize logo"
                    /><span class="logo-text hide-on-med-and-down">TDR Admin</span></a>
                <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
            </h1>
        </div>
        @php
            if (Auth::guard('subadmin')->check())
            {
                $user = Auth::guard('subadmin')->user();
                $dashboard = explode(",",$user->dashboard);
                $document_master = explode(",",$user->document_master);
                $causeof_death = explode(",",$user->causeof_death);
                $user_type = explode(",",$user->user_type);
                $notifier_management = explode(",",$user->notifier_management);
                $creditor_management = explode(",",$user->creditor_management);
                $email_templates = explode(",",$user->email_templates);
                $role = 2;
            }else
            {
                $role = 1;
                $dashboard = $document_master = $causeof_death = $notifier_management = $creditor_management = $email_templates = array();
            }
        @endphp
        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
            <li class="bold" @if($role==2 && !in_array(1,$dashboard)) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class="bold" @if($role==2 && !in_array(1,$document_master)) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/document*')) ? 'active' : '' }}" href="{{ route('admin.document.list') }}"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Settings">Document Master</span></a></li>
            <li class="bold" @if($role==2 && !in_array(1,$causeof_death)) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/cod*')) ? 'active' : '' }}" href="{{ route('admin.cod.list') }}"><i class="material-icons">assignment</i><span class="menu-title" data-i18n="Settings">Cause of Death Master</span></a></li>
            <li class="bold" @if($role==2 && !in_array(1,$notifier_management)) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/notifier*')) ? 'active' : '' }}" href="{{ route('admin.notifier.list') }}"><i class="material-icons">face</i><span class="menu-title" data-i18n="Settings">Notifier Management</span></a></li>
            <li class="bold {{ (request()->is('admin/creditor*')) ? 'active open' : '' }} {{ (request()->is('admin/user-type*')) ? 'active open' : '' }}" @if($role==2 && !in_array(1,$creditor_management)) style="display: none" @endif><a class="collapsible-header waves-effect waves-cyan {{ (request()->is('admin/creditor/view-creditor*')) ? 'active' : '' }}" href="JavaScript:void(0)" tabindex="0"><i class="material-icons">face</i><span class="menu-title" data-i18n="Creditor Management">Creditor Management</span></a>
                <div class="collapsible-body">
                    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                        <li @if($role==2 && !in_array(1,$user_type)) style="display: none" @endif><a href="{{url('/')}}/admin/user-type/list" class="{{ (request()->is('admin/user-type*')) ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="User Type Master">User Type Master</span></a>
                        </li>
                        <li><a href="{{url('/')}}/admin/creditor/list/registered" class="{{ (request()->is('admin/creditor/list/registered*')) ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Products Page">Registered Creditors</span></a>
                        </li>
                        <li><a href="{{url('/')}}/admin/creditor/list/approved" class="{{ (request()->is('admin/creditor/list/approved*')) ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Pricing">Approved Creditors</span></a>
                        </li>
                        <li><a href="{{url('/')}}/admin/creditor/list/rejected" class="{{ (request()->is('admin/creditor/list/rejected*')) ? 'active' : '' }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Pricing">Rejected Creditors</span></a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="bold" @if($role==2) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/subadmin*')) ? 'active' : '' }}" href="{{ route('admin.subadmin.list') }}"><i class="material-icons">person_outline</i><span class="menu-title" data-i18n="Settings">Subadmin Management</span></a></li>
            <li class="bold" @if($role==2 && !in_array(1,$email_templates)) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/email-template*')) ? 'active' : '' }}" href="{{ route('admin.email-template.list') }}"><i class="material-icons">email</i><span class="menu-title" data-i18n="Settings">Email Templates</span></a></li>
            <li class="bold" @if($role==2) style="display: none" @endif><a class="waves-effect waves-cyan {{ (request()->is('admin/settings*')) ? 'active' : '' }}" href="{{ route('admin.settings') }}"><i class="material-icons">settings_applications</i><span class="menu-title" data-i18n="Settings">Settings</span></a></li>
        </ul>

        <!-- <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a> -->
    </aside>
    <!-- END: SideNav-->
