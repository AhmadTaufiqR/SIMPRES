<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;

class AdminTable extends Component
{
    public $search = '';
    public $adminID;
    public $name;
    public $email;
    public $phone;
    public $username;
    public $password;

    public function editAdmin($adminId)
    {
        $admin = Admin::find($adminId);
        $this->adminID = $admin->id;
        $this->name = $admin->name;

        $emailParts = explode('@', $admin->email);
        $this->email = $emailParts[0];

        $this->username = $admin->username;
        $this->phone = $admin->phone;
    }

    public function updateAdmin()
    {
        $email = $this->email . '@sepatumas.sch.id';
        
        $admin = Admin::find($this->adminID);
        $admin->name = $this->name;
        $admin->email = $email;
        $admin->username = $this->username;
        $admin->phone = $this->phone;
        $admin->password = bcrypt($this->password);
        $admin->save();

        session()->flash('Success', 'Data admin berhasil diubah');

        $this->redirect('/admin');
    }

    public function deleteAdmin($adminId)
    {
        Admin::find($adminId)->delete();

        session()->flash('Success', 'Data admin berhasil dihapus');
        $this->redirect('/admin');
    }

    public function render()
    {
        $admins = Admin::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin-table', [
            'admin' => $admins,
        ]);
    }
}
