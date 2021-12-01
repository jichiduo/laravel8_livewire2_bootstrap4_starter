<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Controller extends Component
{
    public $name, $email, $user_id, $password, $password_confirmation;
    public $search = "";

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        if ($this->search == "") {
            $users = User::paginate(10);
        } else {
            $users = DB::table('users')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->paginate(10);
        }
        //$this->users = User::all();

        return view('livewire.users.index', ['users' => $users]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function store()
    {

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:1',
            'password_confirmation' => 'required|same:password',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        $this->resetInputFields();

        //close the modal after store
        $this->dispatchBrowserEvent('modal-close');
        $this->dispatchBrowserEvent('toastr', ['message' => 'User successfully created.']);
    }

    public function edit($id)
    {
        // $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function cancel()
    {
        // $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            // $this->updateMode = false;
            $this->resetInputFields();
            $this->dispatchBrowserEvent('toastr', ['message' => 'User successfully updated.']);
        }
    }

    public function delete($id)
    {
        if ($id) {
            User::where('id', $id)->delete();
            $this->dispatchBrowserEvent('toastr', ['message' => 'User Successfully deleted.']);
        }
    }
}
