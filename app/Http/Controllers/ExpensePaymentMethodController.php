<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpensesPaymentMethod;
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
        $paymentMethods = ExpensesPaymentMethod::all(); // ✅ Fetch payment methods

        return view('expenses.payment_method.create', compact('paymentMethods')); // ✅ Pass data to view
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
    
        $paymentMethods = ExpensesPaymentMethod::all(); // ✅ Fetch latest data
    
        return Reply::successWithData(__('messages.recordSaved'), [
            'paymentMethods' => $paymentMethods // ✅ Send updated data
        ]);
    }
    

    public function getList()
    {
        $paymentMethods = ExpensesPaymentMethod::all();
        return Reply::dataOnly(['paymentMethods' => $paymentMethods]); // ✅ Return updated list
    }

    public function update(Request $request, $id)
    {
        $paymentMethod = ExpensesPaymentMethod::findOrFail($id);

        $request->validate([
            'payment_method' => 'required|string|max:255|unique:expenses_payment_methods,payment_method,' . $id,
        ]);

        $paymentMethod->payment_method = strip_tags($request->payment_method);
        $paymentMethod->save();

        return Reply::success(__('messages.updateSuccess'));
    }

    public function destroy($id)
    {
        $paymentMethod = ExpensesPaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return Reply::success(__('messages.deleteSuccess'));
    }
}
