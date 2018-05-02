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
                <div class="list_content_row_col">
                    <span>{{ $user->name }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $user->email }}</span>
                </div>
                <div class="list_content_row_col">
                    <a href="/users/{{ $user->id }}" class="btn btnUpdate"><i class="far fa-edit"></i></a>
                    <a href="/users/{{ $user->id }}" class="btn btnDelete"><i class="far fa-trash-alt"></i></a>
                    <a href="/users/{{ $user->id }}" class="btn btnReset"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
            @endforeach
        </div>
@else
    <p>The list of users is empty!</p>
@endif