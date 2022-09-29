<?php

namespace Modules\Setting\Http\Livewire\Banks;

use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\CurrencyType;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class BanksAccountsEdit extends Component
{
    public $account;

    public $banks = [];
    public $currency_types = [];
    public $bank_id;
    public $coin_id;
    public $description;
    public $number;

    public function mount($account_id)
    {
        $this->account = BankAccount::find($account_id);
        $this->banks = Bank::all();
        $this->currency_types = CurrencyType::all();
        $this->bank_id = $this->account->bank_id;
        $this->description = $this->account->description;
        $this->number = $this->account->number;
        $this->coin_id = $this->account->currency_type_id;
    }

    public function render()
    {
        return view('setting::livewire.banks.banks-accounts-edit');
    }

    public function update()
    {
        $this->validate([
            'bank_id' => 'required',
            'coin_id' => 'required',
            'description' => 'required|string|max:255',
            'number' => 'required|string|max:255'
        ]);


        $this->account->update([
            'bank_id' => $this->bank_id,
            'description' => $this->description,
            'number' => $this->number,
            'currency_type_id' => $this->coin_id
        ]);


        $this->dispatchBrowserEvent('set-bank-account-update', ['msg' => Lang::get('setting::labels.msg_success')]);
    }
}
