<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return Collection
     */
    public function CustomersFilter(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $filters = $request->only('blocked', 'email', 'phone_number', 'name');

        $query = Customers::query();

        foreach ($filters as $field => $value) {
            if ($value !== null) {
                if ($field == 'name') {
                    $query->where(function ($subquery) use ($value) {
                        $subquery->where('name', 'like', "%$value%")
                            ->orWhere('surname', 'like', "%$value%");
                    });
                } else if ($field == 'blocked') {
                    $query->where($field, $value);
                } else {
                    $query->where($field, 'like', "%$value%");
                }
            }
        }

        $customers = $query->paginate(10);

        return view('customers', compact('customers'));
    }

    public function CustomerID($id):View
    {
        $customer = Customers::findOrFail($id);
        $addresses = $customer->addresses;
        $addresses = $addresses->sortByDesc('created_at');
        return view('single_customer', [
            'customer' => $customer,
            'addresses' => $addresses
        ]);
    }
}
