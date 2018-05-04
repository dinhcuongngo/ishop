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
                $shops = $shops->where('name', 'Stark Inc');
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