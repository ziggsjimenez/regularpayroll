<li class="nav-item">
    <a class="nav-link" href="{{ route('deductionitems.index') }}">{{ __('Deduction Items') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('chargeabilities.index') }}">{{ __('Chargeability') }}</a>
</li>


<li class="nav-item">
    <a class="nav-link" href="{{ route('employees.index') }}">{{ __('Employees') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('appointments.index') }}">{{ __('Appointments') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('payrolls.index') }}">{{ __('Payrolls') }}</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('refundtypes.index') }}">{{ __('Refund Types') }}</a>
</li>


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        REPORTS <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="nav-item dropdown-item" href="{{route('reports.employeededuction')}}"> Employee Deduction </a>
    </div>
</li>