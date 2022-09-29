<?php

namespace Modules\Setting\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class RolesForm extends Component
{
    public $roles = [];
    public $name;

    public function render()
    {
        $this->roles = Role::all();
        return view('setting::livewire.roles.roles-form');
    }

    public function addRole()
    {
        $this->validate([
            'name' => 'required|unique:roles,name'
        ]);

        $role = Role::create(['name' => $this->name, 'guard_name' => 'sanctum']);



        $this->name = null;

        $this->dispatchBrowserEvent('set-role-save-add', ['msg' => Lang::get('setting::labels.msg_success')]);
    }

    public function removeRole($id)
    {
        try {
            $role = Role::find($id);


            $role->delete();
            $res = 'success';
        } catch (\Illuminate\Database\QueryException $e) {
            $res = 'error';
        }

        $this->dispatchBrowserEvent('set-role-delete', ['res' => $res]);
    }
}
