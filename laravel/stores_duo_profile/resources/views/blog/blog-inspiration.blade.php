@extends('layouts.blog')

@section('title')
Login Page
@endsection

@section('description')
Website description
@endsection

@section('keywords')
website keywords
@endsection

@section('page-image')
{{ asset('public/images/logo.jpg') }}
@endsection


@section('html-content')
@include('blog.header-home')
<div class="container">

    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 blog-main">
        <h2 class="">My Inspiration</h2>

        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis nisl vel quam elementum molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut turpis eu arcu egestas tincidunt. Morbi in dui risus. Mauris vestibulum justo elit, ut vulputate nisi varius nec. Ut tincidunt vitae arcu ut interdum. Etiam odio enim, tempor quis cursus ac, ultrices sed tortor. Vivamus venenatis scelerisque turpis a dictum. Integer vel consectetur urna. Fusce lectus lorem, congue in posuere vitae, tempus vitae ipsum. Maecenas maximus congue diam, vitae consectetur tellus ornare id. Cras nec lacus sed tortor accumsan tempor ut quis erat.</p>

        <p class="">Mauris pellentesque quis sem interdum maximus. Etiam in accumsan ligula. Nullam mollis laoreet vulputate. Vivamus posuere ullamcorper purus, et efficitur turpis aliquam vitae. Nulla ac congue justo. Quisque posuere nibh felis. Nulla laoreet condimentum eros eget cursus. Vestibulum interdum mattis lobortis. Donec quam nibh, convallis ornare justo sed, molestie pretium est.</p>

        <p class="">Donec leo lectus, dignissim congue imperdiet quis, rhoncus eget sem. Ut volutpat luctus leo id accumsan. Suspendisse egestas porta massa, ut pellentesque nisi interdum id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est lorem, mattis vitae nulla vestibulum, dictum commodo erat. Nunc lacinia ex felis, eget faucibus ipsum dapibus vehicula. Donec sed consequat velit.</p>

        <p class="">Sed vehicula dui quis pulvinar tincidunt. Curabitur rutrum augue enim, ut volutpat neque hendrerit venenatis. Sed ut pharetra nulla. Mauris vitae purus non lorem tristique aliquam. Nulla tincidunt lacus nulla, id aliquet justo rhoncus non. Maecenas facilisis, nulla sed scelerisque egestas, elit nulla congue quam, porta malesuada velit lorem ac elit. Sed sagittis erat lorem, ac venenatis tellus tempor eu. Aenean pharetra euismod magna non elementum. Sed varius risus in tincidunt fringilla. Duis pulvinar lacus augue. Mauris pretium tellus vitae nibh eleifend efficitur.</p>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 blog-side">
        @include('blog.blog-sidebar-post')
    </div>

</div>
@endsection