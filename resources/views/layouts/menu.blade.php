
<li class="{{ Request::is('parkings*') ? 'active' : '' }}">
    <a href="{!! route('parkings.index') !!}"><i class="fa fa-location-arrow text-light-blue"></i><span>Parkings</span></a>
</li>

<li class="{{ Request::is('reservations*') ? 'active' : '' }}">
    <a href="{!! route('reservations.index') !!}"><i class="fa fa-list text-light-blue"></i><span>Reservations</span></a>
</li>

<li class="{{ Request::is('vehicules*') ? 'active' : '' }}">
    <a href="{!! route('vehicules.index') !!}"><i class="fa fa-car text-light-blue"></i><span>Vehicules</span></a>
</li>

<li class="{{ Request::is('stages*') ? 'active' : '' }}">
    <a href="{!! route('stages.index') !!}"><i class="fa fa-contao text-light-blue"></i><span>Stages</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user text-light-blue"></i><span>Users</span></a>
</li>
