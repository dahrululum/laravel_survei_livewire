<div>
    {{-- Do your work, then step back. --}}
     <div class="card">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <form wire:submit="login">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input wire:model="email" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                     
                    @error('email')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input wire:model="password" type="password" name="password" class="form-control" id="password">
                    @error('password')
                        <small class="d-block mt-1 text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
     </div>
</div>
