<div class="modal fade bs-example-modal-lg b89-modal" id="enquiry-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Sent Enquiry For Product</h3>
            </div>
            <div class="modal-body login-modal row">
                <div class="left col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <div class="modal-product-name" id="modal-product-name"></div>
                    <div class="modal-product-img" id="modal-product-img"></div>
                </div>

                <div class="right col-md-6 col-sm-6 col-xs-12 col-lg-6">
                    <h3 class="lead-text hidden">Enquiry Form</h3>
                    <form class="form-horizontal" role="form" id="contact-form" method="POST" action="{{ route('post.enquiry') }}">  
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <label for="enquiryName">Name</label>
                                <input id="enquiryName" type="text" class="form-control" name="enquiryName" placeholder="Your Name" required autofocus>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <label for="enquiryEmail">Email Id <span>(Optional)</span></label>
                                <input id="enquiryEmail" type="email" class="form-control" name="enquiryEmail" placeholder="Your Email Id">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <label for="enquiryContact">Contact Number</label>
                                <input id="enquiryContact" type="text" class="form-control" name="enquiryContact" placeholder="Your Contact No">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <label for="enquiryText">Enquiry Message</label>
                                <textarea id="enquiryText" type="textarea" rows="3" class="form-control" name="enquiryText" placeholder="Your Message"></textarea>
                            </div>
                        </div>

                        @captcha('en')
                        <input id="enquiryProductId" type="hidden" class="hidden" name="enquiryProductId" placeholder="enquiryProductId">

                        <div class="row form-group">
                            <div class="input-col col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                <button type="submit" class="btn btn-lg pull-right">Send Enquiry</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){

        $('body').on('click', '.btn-enquiry', function(e) {
            e.preventDefault();
            var token = $('meta[name="csrf-token"]').attr('content');
            var productId = $(this).attr('data-product');
            var pageurl = '<?php echo url('/'); ?>';

            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/getenquiry') }}",
                dataType: 'json',
                data : { "_token" : token, 'id' : productId },
                success : function(d) {
                    $("#modal-product-name").empty();
                    $("#modal-product-img").empty();

                    var product = d.productData;
                    var img = d.productImage;
                    
                    $.each(product, function (i2, v2) {
                        var p = '<h4 class="lead-text">'+v2.productName+'</h4>';
                        $("#modal-product-name").append(p);
                        $("#enquiryProductId").val(v2.id);

                        $.each(img[v2.id], function (i3, v3) {
                            var i = '<img src="'+pageurl+'/public/storage/product/'+v3.imageName+'" class="img-thumbnail" title="Product Image">';
                            $("#modal-product-img").append(i);
                        });

                    });
                }
            });
        });

    });
</script>