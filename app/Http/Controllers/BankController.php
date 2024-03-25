<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Currency;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $currencyTable;
    protected $bankTable;
    public function __construct()
    {
        $this->currencyTable = (new Currency())->getTable();
        $this->bankTable = (new BankAccount())->getTable();
    }
    public function index()
    {
        $bankTbl = $this->bankTable;
        $curTbl = $this->currencyTable;

        $data['accounts'] = BankAccount::join('currencies', 'currencies.id', '=', $bankTbl.'.currency_id')
            ->select($bankTbl.'.*', $curTbl.'.name', $curTbl.'.currency', $curTbl.'.exchange')->get();
        $data['currencies'] = Currency::all();
        $data['page_title'] = 'Bank Accounts';
        return view('pages.bank_accounts', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'currency_id' => 'required'
        ]);

        $currency = Currency::whereCurrency($request->currency_id)->firstOrFail();

        $bank = new BankAccount();
        $bank->bank = $request->bank;
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->currency_id = $currency->id;
        $bank->swift_code = $request->swift_code;
        $bank->save();

        return back()->with('message', 'Bank account added');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'currency_id' => 'required'
        ]);

        $bank = BankAccount::findOrFail($id);
        $bank->account_name = $request->account_name;
        $bank->bank = $request->bank;
        $bank->account_number = $request->account_number;
        $bank->currency_id = $request->currency_id;
        $bank->swift_code = $request->swift_code;
        $bank->save();

        return back()->with('message', 'Bank account updated');
    }

    public function delete($id)
    {
        BankAccount::findOrFail($id)->delete();
        return back()->with('message', 'Bank account deleted');
    }
}
