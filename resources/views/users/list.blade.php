@if(count($users) > 0)
        <div class="list_content">
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>No</span>
                </div>
                <div class="list_content_row_col">
                    <span>ID</span>
                </div>
                <div class="list_content_row_col">
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
                    <span>{{ $i++ }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $user->id }}</span>
                </div>
                <div class="list_content_row_col text-align-left">
                    <img src="{{ asset('storage/'.$user->photo) }}" class="photo-thumb-sm">
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
@else
    <p>The list of users is empty!</p>
@endif