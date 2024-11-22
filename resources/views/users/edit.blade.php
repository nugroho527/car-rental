<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Users</h6>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model="name" id="name" value="{{ @old('name') }}">
                        @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" wire:model="email" id="email" value="{{ @old('email') }}">
                        @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" wire:model="password" id="password" value="{{ @old('password') }}">
                        @error('password')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" class="form-select" wire:model="role">
                            <option value="">--- Pilih ---</option>
                            <option value="admin">Admin</option>
                            <option value="pemilik">Pemilik</option>
                        </select>
                        @error('role')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" wire:click="update" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>