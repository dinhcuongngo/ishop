@if(count($shops) > 0)
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
                    <span>Edit</span>
                </div>
            </div>
            @php 
                $i = 1;
            @endphp
            @foreach($shops as $shop)
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>{{ $i++ }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $shop->id }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $shop->name }}</span>
                </div>
                <div class="list_content_row_col">
                    <a href="/shops/{{ $shop->id }}" class="btn btnUpdate" title="Update Profile"><i class="far fa-edit"></i></a>
                    <form action="/shops/{{ $shop->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btnDelete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
@else
    <p>The list of shops is empty!</p>
@endif