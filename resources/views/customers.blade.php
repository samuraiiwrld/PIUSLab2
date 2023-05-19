 <div class="container">
        <h1>Customers</h1>
        <form method="GET" action="{{ route('customers.CustomersFilter') }}">
            @foreach (['blocked', 'email', 'phone', 'name'] as $field)
                    <label for="{{ $field }}">{{ ucfirst($field) }}</label>
                    @if ($field == 'blocked')
                        <select name="blocked" id="blocked">
                            <option value="">All</option>
                            @foreach ([1 => 'Yes', 0 => 'No'] as $value => $text)
                                <option value="{{ $value }}" {{ request('blocked') == $value ? 'selected' : '' }}>{{ $text }}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ request($field) }}">
                    @endif
                </div>
            @endforeach
            <button type="submit">Filter</button>
    <table class="table table-striped mt-3">
            <thead>
            <tr>
                @foreach (['ID', 'Name', 'Surname', 'Email', 'Phone', 'Blocked', 'Registration Date'] as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    @foreach (['customer_id', 'name', 'surname', 'email', 'phone_number', 'blocked', 'registration_date'] as $attribute)
                        <td>{{ $attribute == 'blocked' ? ($customer->blocked ? 'Yes' : 'No') : $customer->$attribute }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $customers->withQueryString()->links() }}
    </div>
