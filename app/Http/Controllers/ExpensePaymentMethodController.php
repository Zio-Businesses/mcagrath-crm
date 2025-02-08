<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpensesPaymentMethod;
use App\Models\BaseModel;
use App\Helper\Reply;

class ExpensePaymentMethodController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Expense Payment Method';
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('expenses', $this->user->modules));

            return $next($request);
        });
    }

    public function create()
    {
        $this->payment_method = ExpensesPaymentMethod::all(); // ✅ Fetch all payment methods\
      

        return view('expenses.payment_method.create', ['payment_method' => $this->payment_method]);
    }
    
 
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string|max:255|unique:expenses_payment_methods,payment_method',
        ]);
    
        $exp = new ExpensesPaymentMethod();
        $exp->payment_method = strip_tags($request->payment_method);
        $exp->company_id = company()->id;
        $exp->added_by = user()->id;
        $exp->save();
    
        $paymentMethods = ExpensesPaymentMethod::all();
        $options = BaseModel::options($paymentMethods, null, 'payment_method');
    
        return Reply::successWithData(__('messages.recordSaved'), ['data' => $options]);
    }
    public function update(Request $request, $id)
    {
        $paymentMethod = ExpensesPaymentMethod::findOrFail($id);
    
        // Validate request
        $request->validate([
            'payment_method' => 'required|string|max:255|unique:expenses_payment_methods,payment_method,' . $id,
        ]);
    
        // Ensure the payment method is updated
        $paymentMethod->payment_method = strip_tags($request->payment_method);
        $paymentMethod->last_updated_by = user()->id; // Track last updated user
        $paymentMethod->save();
    
        $paymentMethods = ExpensesPaymentMethod::all();
        $options = BaseModel::options($paymentMethods, null, 'payment_method');
    
        return Reply::successWithData(__('messages.updateSuccess'), ['data' => $options]);
    }
    

public function destroy($id)
{
    $paymentMethod = ExpensesPaymentMethod::find($id);

    if (!$paymentMethod) {
        return Reply::error(__('messages.recordNotFound'));
    }

    $paymentMethod->delete(); // Delete the record

    $paymentMethods = ExpensesPaymentMethod::all();
    $options = BaseModel::options($paymentMethods, null, 'payment_method');

    return Reply::successWithData(__('messages.deleteSuccess'), ['data' => $options]);
}

}
