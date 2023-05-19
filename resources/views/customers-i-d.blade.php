<div class="container">
    <h1>Customer Details</h1>
    <p>ID: {{ $customer->id }}</p>
    <p>Name: {{ $customer->name }}</p>
    <p>Surname: {{ $customer->surname }}</p>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>
    <p>Blocked: {{ $customer->blocked ? 'Yes' : 'No' }}</p>
    <p>Registration Date: {{ $customer->registration_date }}</p>
    <h2>Customer Addresses</h2>
    $customer->addresses(->orderBy('created_at', 'desc')->get() as $address)
    <div class="address">
        <p>Street: {{ $address->street }}</p>
        <p>City: {{ $address->city }}</p>
        <p>Country: {{ $address->country }}</p>
        <p>Zip Code: {{ $address->zip_code }}</p>
        <p>Created At: {{ $address->created_at }}</p>
    </div>
    @endforeach
</div>
