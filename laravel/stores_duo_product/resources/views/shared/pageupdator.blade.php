@if(Auth::guard('pageupdator')->check())

    <!-- Sections for Page Updator Part -->
    <nav class="navbar navbar-default navbar-fixed-bottom navbar-pg">
        <div class="container">
            <div class="navbar-left">
                <h3 class="text-center">Page Editor Enabled</h3>
            </div>       

            <div class="navbar-right">
                <a href="{{ route('pageupdator.logout') }}" class="btn btn-warning"
                    onclick="event.preventDefault();
                                document.getElementById('pg-logout-form').submit();">
                    Logout of Page Editor
                </a>

                <form id="pg-logout-form" action="{{ route('pageupdator.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div> 
        </div>
    </nav><!-- Page Editor Section Footer -->

    <!-- Image upload modal -->
    <div class="updator-modal modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content row">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Update Image</h4>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active row" id="image">
                            <div class="col-md-10 col-md-offset-1">
                                <form class="" action="{{ url('sectionimage') }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="sectionImage" class="hidden-xs col-md-3">Upload Image: </label>
                                        <div class="col-xs-12 col-md-9">
                                            <input type="file" class="form-control" name="sectionImage" id="sectionImage" accept="image/*">
                                        </div>
                                        <p class="pull-right">Image Size Must be less than 600KB</p>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="col-xs-12 col-md-9">
                                            <input type="hidden" class="form-control" name="pageName" id="pageName" value="{{ $pageName }}">
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <div class="col-xs-12 col-md-9">
                                            <input type="hidden" class="form-control" name="sectionId" id="sectionId">
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="#list" class="btn btn-default pull-right" aria-controls="list" role="tab" data-toggle="tab">Show All Images</a>
                                    <input type="submit" name="submit" class="btn btn-default pull-right" id="order-active" value="Upload Image">
                                </form>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade p40 row" id="list">
                            <div class="row">
                                <a href="#image" class="btn btn-default pull-right" aria-controls="image" role="tab" data-toggle="tab">Back to Image Upload</a>
                            </div><hr>
                            <div class="row">
                                @foreach($sectionImages as $img)
                                <div class="col-md-4">
                                    <div class="img-box">
                                        <img class="img-thumbnail" src="public/storage/page/{{ $img->sectionContent}}" alt="page images">
                                    </div>
                                    <div class="img-select">
                                        <p class="pull-left">On Page: {{ $img->pageName}}</p>
                                        <a href="javascript:void(0)" data-imgselect="{{ $img->sectionId}}" data-imgcontent="{{ $img->sectionContent}}" class="btn-imgselect btn btn-default pull-right">Select</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Related Scripts -->
    <script type="text/javascript">
        $(document).ready(function(){

            $('body').css("padding-bottom", "60px");

            // $('*').filter(function(){
            //     var position = $(this).css('position');
            //     return position === 'absolute';
            // }).css({position: 'static'});

            //  Once you done adding content to database enable following for testing purpose but waste
            // $("[data-section]").each(function(index) {
            //     var code = $(this).attr('data-section');
            //     $(this).text("!! $sc['"+code+"'] !!");
            // });

            // $("[data-imgsection]").each(function(index) {
            //     var code = $(this).attr('data-imgsection');
            //     $(this).attr('src', " url('public/storage/page/').'/'.$sc['"code"'] ");
            // });
            //  Ends Here

            $("[data-section]").each(function(index) {
                $(this).attr('contenteditable', 'true');
                var sectionCode = $(this).attr('data-section');

                //$(this).addClass('ds-edit article')
                //$(this).append("<span class='art-btn btn btn-default' id='"+ sectionCode +"' title='Update This Section'><i class='fa fa-chevron-circle-right art-icon'></i> Save Update</span>");

                $(this).wrap("<div class='ds-edit article'></div>");
                $(this).after("<span class='art-btn btn btn-default' id='"+ sectionCode +"' title='Update This Section'><i class='fa fa-chevron-circle-right art-icon'></i> Save Update</span>");
            });

            $("[data-imgsection]").each(function(index) {
                $(this).attr('contenteditable', 'true');
                var sectionCode = $(this).attr('data-imgsection');

                $(this).wrap("<div class='ds-edit article'></div>");
                $(this).after("<span class='art-img-btn btn btn-default' id='"+ sectionCode +"' title='Update This Image'><i class='fa fa-chevron-circle-right art-icon'></i> Save Update</span>");
            });

            //<span class='art-btn btn btn-default' id='1000' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span>
            //$(".ds-edit").addClass("article");

            $(".art-btn").click(function(){
                var token = $('meta[name="csrf-token"]').attr('content');
                var section_id = $(this).attr("id");
                var content = $("*[data-section='"+ section_id +"']").html();
                var dbContent = $.trim(content);
                var pageName = "{{ $pageName }}";

                if (confirm("Sure you want to Edit this Content? \n")) {
                    $.ajax({
                        type : "POST",
                        url : "{{ url('/ajax/updatesection') }}",
                        dataType: 'json',
                        data : { "_token" : token, "sectionId" : section_id, "sectionContent" : dbContent, "pageName" : pageName },
                        success : function() {
                            $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                            $('#notify').text('Page Content Updated successfully.');
                            setTimeout(function(){
                                $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                            }, 6000);
                        }
                    });
                }
                return false;
            });

            $(document).on("click", ".art-img-btn", function (){
                var imgId = $(this).attr('id');
                $('#imageModal').modal('toggle');
                $(".modal-body #sectionId").val(imgId);
                $(".modal-body .btn-imgselect").attr('data-sectionval', imgId)
            });

            $(".btn-imgselect").click(function (){
                var token = $('meta[name="csrf-token"]').attr('content');
                var section_id = $(this).attr("data-sectionval");
                var content = $(this).attr("data-imgcontent");
                var pageName = "{{ $pageName }}";

                $.ajax({
                    type : "POST",
                    url : "{{ url('/ajax/updateimage') }}",
                    dataType: 'json',
                    data : { "_token" : token, "sectionId" : section_id, "sectionContent" : content, "pageName" : pageName },
                    success : function() {
                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                        $('#notify').text('Page Content Updated successfully.');
                        $('#imageModal').modal('toggle');
                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        }, 6000);
                    }
                });
            });
        });
    </script>
@endif