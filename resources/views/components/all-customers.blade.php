<!DOCTYPE html>
<html lang="ru">
<head>
    <h1>Все покупатели</h1>
</head>
<body>
<h2>Фильтры</h2>
@include('templates.filter')
<div>
    @foreach($customers as $c)
        <p>
            {{$c->customer_id}}
            {{$c->created_at}}
            {{$c->name}}
            {{$c->blocked ? 'blocked' : 'free'}}
            {{$c->second_name}}
            {{$c->phone}}
            {{$c->email}}
        </p>
        <br>
    @endforeach
</div>
{{ $customers->appends(request()->input())->links() }}
</body>
</html>
