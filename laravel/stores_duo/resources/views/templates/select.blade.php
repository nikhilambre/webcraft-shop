
<div class="select" id="select">
    <h3>Your Selected Items</h3>

    <ul class="list-unstyled">
        @foreach($selections as $s)
            <li class="selected-link">
                <a href="{{ url('/template/desktop/'.$s->type.'/'.$s->typeId.'/'.$s->subType) }}" target="_blank">{{ $s->typeName }}</a>
                <span class="remove-element" id="remove-element-{{ $s->id }}" data-selectId="{{ $s->id }}"><i aria-hidden="true">&times;</i></span>
            </li>
        @endforeach
    </ul>

    <a href="{{ url('/order/create') }}" class="btn btn-primary btn-block">Place Order Now</a>
    <a href="javascript:void(0)" class="visible-xs add-element btn btn-primary btn-block" id="add-element">Add To Favorites</a>
</div>