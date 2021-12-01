<div>
    @include('livewire.users.create')
    @include('livewire.users.update')
    <div class="col-md-5 mt-2 mb-2 offset-md-7">
        <input class="form-control" type="text" wire:model.lazy="search" placeholder="search">
    </div>
    <div class="col-md-12 mt-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#updateModal"
                                wire:click="edit({{ $value->id }})" class="btn btn-primary btn-sm">Edit</button>
                            <button wire:click="delete({{ $value->id }})"
                                class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="row justify-content-center">
        {!! $users->links() !!}
    </div>
</div>
