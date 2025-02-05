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
        $this->payment_method = ExpensesPaymentMethod::all();
        return view('expenses.payment_method.create', $this->data);
    }

    public function store(Request $request)
    {
        $exp = new ExpensesPaymentMethod();
        $exp->payment_method = strip_tags($request->payment_method);
        $exp->company_id = company()->id;
        $exp->added_by = user()->id;
        $exp->save();

        $expm = ExpensesPaymentMethod::all();
        $options = BaseModel::options($expm, null, 'payment_method');

        return Reply::successWithData(__('messages.recordSaved'), ['data' => $options]);
    }

}
