        <div class="list_content">
            <form action="users" method="GET" class="search-form">
                <div>
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div>
                    <select name="admin">
                        <option value="">Account type</option>
                        <option value="true">Admin</option>
                        <option value="false">Regular</option>
                    </select>
                    <select name="role">
                        <option value="">Role</option>
                        <option value="manager">Manager</option>
                        <option value="cashier">Cashier</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btnSubmit"><i class="fas fa-search"></i> Search</button>
                </div>
            </form>
        </div>
@if(count($users) > 0)
        <p>Number of users: {{ $users->total() }}</p>
        <div class="list_content">
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>No</span>
                </div>
                <div class="list_content_row_col">
                    <span>ID</span>
                </div>
                <div class="list_content_row_col text-align-left">
                    <span>Name</span>
                </div>
                <div class="list_content_row_col">
                    <span>Email</span>
                </div>
                <div class="list_content_row_col">
                    <span>Edit</span>
                </div>
            </div>
            @php 
                $i = 1;
                
            @endphp
            @foreach($users as $user)
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>{{ ($users->currentpage()-1) * $users->perpage() + $i++}}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $user->id }}</span>
                </div>
                <div class="list_content_row_col text-align-left">
                    @if($user->photo != "")
                        <img src="{{ asset('storage/'.$user->photo) }}" class="photo-thumb-sm">
                    @else
                        <img src="{{ asset('storage/images/icon.png') }}" class="photo-thumb-sm">
                    @endif
                    <span>{{ $user->name }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $user->email }}</span>
                </div>
                <div class="list_content_row_col">
                    <a href="/users/{{ $user->id }}" class="btn btnUpdate" title="Update Profile"><i class="far fa-edit"></i></a>
                    <a href="/users/{{ $user->id }}/change" class="btn btnChange" title="Change Password"><i class="fas fa-key"></i></a>
                    <a href="/users/{{ $user->id }}" class="btn btnReset" title="Reset Account"><i class="fas fa-sync-alt"></i></a>
                    <form action="/users/{{ $user->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btnDelete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{ $users->appends($_GET)->links() }}
@else
    <p>The list of users is empty!</p>
@endif