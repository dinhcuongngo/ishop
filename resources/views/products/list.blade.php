@if(count($products) > 0)
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
            @foreach($products as $product)
            <div class="list_content_row">
                <div class="list_content_row_col">
                    <span>{{ $i++ }}</span>
                </div>
                <div class="list_content_row_col">
                    <span>{{ $product->id }}</span>
                </div>
                <div class="list_content_row_col">
                    @if($product->status == 'available')
                        <i class="fas fa-lightbulb light-on"></i>
                    @else
                        <i class="fas fa-lightbulb"></i>
                    @endif
                </div>
                <div class="list_content_row_col text-align-left">
                    <img src="{{ asset('storage/'.$product->photo) }}" class="photo-thumb-sm">
                    <span>{{ $product->name }}</span>
                </div>
                <div class="list_content_row_col">
                    <a href="/products/{{ $product->id }}" class="btn btnUpdate" title="Update Profile"><i class="far fa-edit"></i></a>
                    @if($product->status == 'available')
                        <a href="/product/{{ $product->id }}/status/unavailable" class="btn btnChange" title="Set Unavailable"><i class="fas fa-link"></i></a>
                    @else
                        <a href="/product/{{ $product->id }}/status/available" class="btn btnReset" title="Set Available"><i class="fas fa-unlink"></i></i></a>
                    @endif
                    <form action="/products/{{ $product->id }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btnDelete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
@else
    <p>The list of products is empty!</p>
@endif