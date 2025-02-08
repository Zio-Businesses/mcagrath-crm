<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseAdditionalFee;
use App\Helper\Reply;

class ExpenseAdditionalFeeTypeController extends AccountBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Expense Additional Fee Method';
        $this->middleware(function ($request, $next) {
            abort_403(!in_array('expenses', $this->user->modules));
            return $next($request);
        });
    }

    // ✅ Fetch List of Additional Fee Methods
    public function getList()
    {
        $feeMethods = ExpenseAdditionalFee::all();
        return Reply::dataOnly(['feeMethods' => $feeMethods]);
    }

    // ✅ Show Create Form
    public function create()
    {
        $feeMethods = ExpenseAdditionalFee::all();
        return view('expenses.additionalfee_type.create', compact('feeMethods'));
    }

    // ✅ Store New Fee Method
    public function store(Request $request)
    {
        $request->validate([
            'fee_method' => 'required|string|max:255|unique:expenses_additional_fee,fee_method',
        ]);

        $feeMethod = new ExpenseAdditionalFee();
        $feeMethod->fee_method = strip_tags($request->fee_method);
        $feeMethod->company_id = company()->id;
        $feeMethod->added_by = user()->id;
        $feeMethod->last_updated_by = user()->id;
        $feeMethod->save();

        // Fetch updated list
        $feeMethods = ExpenseAdditionalFee::all();

        return Reply::successWithData(__('messages.recordSaved'), [
            'newMethod' => $feeMethod,
            'feeMethods' => $feeMethods
        ]);
    }

    // ✅ Update Fee Method
    public function update(Request $request, $id)
    {
        $feeMethod = ExpenseAdditionalFee::findOrFail($id);

        $request->validate([
            'fee_method' => 'required|string|max:255|unique:expenses_additional_fee,fee_method,' . $id,
        ]);

        $feeMethod->fee_method = strip_tags($request->fee_method);
        $feeMethod->last_updated_by = user()->id;
        $feeMethod->save();

        return Reply::success(__('messages.updateSuccess'));
    }

    // ✅ Delete Fee Method
    public function destroy($id)
    {
        $feeMethod = ExpenseAdditionalFee::findOrFail($id);
        $feeMethod->delete();

        return Reply::success(__('messages.deleteSuccess'));
    }
}
