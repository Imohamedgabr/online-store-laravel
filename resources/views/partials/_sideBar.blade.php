
            <div class="col-md-2">
                <p class="lead">Online Store</p>
                <div class="list-group">

                    <a href="{{ route('product.index') }}" class="list-group-item 
                    @if(is_null($category_id)) active @else '' @endif
                    ">All Products </a>

                    @foreach($categories as $category)
                    <a href="{{ route('product.index',['category_id'=>$category->id]) }} " class="list-group-item
                    @if($category_id == $category->id) active @else '' @endif
                    ">{{$category->name}}</a>
                    @endforeach


                    {{-- serch form --}}
                    <form action="" class="search" role="search">
                        <div class="input-group">
                            <input type="text" name="term" id="term" class="form-control" placeholder="Search ...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
