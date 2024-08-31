
<div class="select" id="select">
    <h3>Your Selected Items</h3>

    <ul class="list-unstyled">
        @foreach((array)$selections as $s)
            <li class="selected-link">
                {{ $s->typeName }} <br>
                <span>{{ $s->type }}-{{ $s->typeId }}-{{ $s->subType }}</span>
            </li>
        @endforeach
    </ul>

    <a href="/order/new" class="btn btn-block">Place Order Now</a>
    
</div>