        <div class="list_content">
            <form action="shops" method="GET" class="search-form">
                <div>
                    <input type="text" name="name" placeholder="Name">
                </div>
                <div>
                    <select name="status">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btnSubmit"><i class="fas fa-search"></i> Search</button>
                </div>
            </form>
        </div>
@if(count($shops) > 0)
        <p>Number of shops: {{ count($shops) }}</p>
        <div class="list_content">
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>No</span>
                </div>
                <div class="list_content_row_col">
                    <span>ID</span>
                </div>
                <div class="list_content_row_col">
                    <span></span>
                </div>
                <div class="list_content_row_col text-align-left">
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
                    @if( $shop->status == 'inactive')
                        <i class="fas fa-lock"></i>
                    @else
                        <i class="fas fa-lock-open light-on"></i>
                    @endif
                </div>
                <div class="list_content_row_col text-align-left">
                    <img src="{{ asset('storage/'.$shop->logo) }}" class="photo-thumb-sm">
                    <span>{{ $shop->name }}</span>
                </div>
                <div class="list_content_row_col">
                    <a href="/shops/{{ $shop->id }}" class="btn btnUpdate" title="Update Profile"><i class="far fa-edit"></i></a>
                    @if( $shop->status == 'inactive')
                        <a href="/shops/{{ $shop->id }}/status/active" class="btn btnReset" title="Active"><i class="fas fa-lock-open"></i></a>
                    @else
                        <a href="/shops/{{ $shop->id }}/status/inactive" class="btn btnDelete" title="Inactive"><i class="fas fa-lock"></i></a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
@else
    <p>The list of shops is empty!</p>
@endif