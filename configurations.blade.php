<li class="nav-group {{request()->is('app/configurations/*') ? 'show' : ''}}">

    @if(isset($configurations))
    <a class="nav-link nav-group-toggle" style="font-size: 14px;">
    <span class="nav-icon bi bi-wrench mb-2"></span>
    CONFIGURATIONS
    </a>
    @endif
    <ul class="nav-group-items">

        @if(in_array(710,$accessroles))
        <li class="nav-item"><a style="padding-left:4.5rem;" class="nav-link {{request()->is('app/configurations/vendor-customer/*') ? 'active' : ''}}" href="{{ route('vendor-customer-type.index') }}">Vendors / Customers</a></li>
        @endif

        @if(in_array(710, $accessroles))
        <li class="nav-item"><a style="padding-left:4.5rem;" class="nav-link {{ request()->is('app/configurations/new-module/*') ? 'active' : '' }}" href="{{ route('new-module.index') }}">New Module</a></li>
        @endif
      
    </ul>

</li>
