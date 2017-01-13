<!DOCTYPE html>

<?php
include '../../function/config.php';

class Collection {
        public $items = array();
        public function addItem($obj, $key = null) {
            if ($key == null) { $this->items[] = $obj; } else {
                if (isset($this->items[$key])) { //throw new KeyHasUseException("Key $key already in use.");
                } else { $this->items[$key] = $obj; }
            }
        }
        public function deleteItem($key) {
            if (isset($this->items[$key])) { unset($this->items[$key]); } else { throw new KeyInvalidException("Invalid key $key."); }
        }
        public function getItem($key) {
            if (isset($this->items[$key])) { return $this->items[$key]; } else { throw new KeyInvalidException("Invalid key $key."); }
        }
        public function keys() { return array_keys($this->items); }
    }

$data_warehouse = new Collection();
$selectFields = "ACCESS_LASTNAME as 'Last Name', ACCESS_FIRSTNAME as 'First Name', ACCESS_USERNAME as 'Username', ACCESS_EMAIL as Email, ACCESS_CONTACT as Contact, ACCESS_ADDRESS as Address";
$sql = "SELECT ".$selectFields." FROM admin_access";

$result = mysqli_query($dbcon,$sql) or die("Error: ".mysqli_error($dbcon));
$headers = mysqli_fetch_fields($result);

while($row = mysqli_fetch_assoc($result)){
        $data_warehouse->addItem($row);
    }

?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Management</title>

    <base href="../../../assets/">
   
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
    <style>
    fieldset{
        overflow: auto;
    }
    body{
        background: none;
        padding: 20px;
        max-height: 300px;
        max-width: 1200px;
    }

    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
    </style>
</head>
<body>

<div id="wrapper">
        <?php 
             
        ?>
        <br/>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_addUser">Add Admin</button>
       <br><br><br>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                        <tr>
                            <?php
                                foreach ($headers as $key => $value) {
                                    echo '<th>'.$value->name.'</th>';
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>                    
                        <?php
                            foreach ($data_warehouse->items as $key => $value) {
                                echo '<tr>';
                                    foreach ($value as $susi => $laman) {
                                        echo '<td>'.$laman.'</td>';
                                    }
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal Add User -->
    <div class="modal inmodal fade" id="modal_addUser" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add User</h4>
                    <small class="font-bold">Please follow the steps to add a user</small>
                </div>
                <div class="modal-body">

                 <form id="form" action="../admin/function/addadmin.php" method="POST" enctype="multipart/form-data"  class="wizard-big">
                    <h1>Account</h1>
                    <fieldset>
                        <h2>Account Information</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input id="email" name="email" type="text" class="form-control required email">
                                </div>
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input id="userName" name="userName" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input id="password" name="password" type="text" class="form-control required" value="apitong" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <div style="margin-top: 20px">
                                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <h1>Profile</h1>
                    <fieldset>
                        <h2>Profile Information</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input id="name" name="name" type="text" class="form-control required" tabindex = "1">
                                </div>
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input id="surname" name="surname" type="text" class="form-control required" tabindex = "2">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Contact Number *</label>
                                    <input id="contact" name="contact" type="text" class="form-control required" tabindex = "4">
                                </div>
                                <div class="form-group">
                                    <label>Address *</label>
                                    <input id="address" name="address" type="text" class="form-control required" tabindex = "5">
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <h1>Photo</h1>
                    <fieldset>
                                    <!-- <div class="text-center" style="margin-top: 120px">
                                        <h2>You did it Man :-)</h2>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-6"></div>

                                        <div id="image-preview">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input type="file" name="image" id="image-upload" />
                                      </div>
                                  </div><!-- row -->
                              </fieldset>

                              <h1>Finish</h1>
                              <fieldset>
                                <h2> Please check if all fields are correct.</h2>
                                <div class="hr-line-dashed"></div>
                               
                            </div>
                            <div class="hr-line-dashed"></div>
                        </fieldset>
                    </form>

                </div>
                <!-- </form> -->
            </div>
        </div>
    </div><!-- modaladduser -->
    <!--  MODAL USER  -->
    <div class="modal inmodal fade" id="modal_userProfile" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Admin Profile</h4>
                    <small class="font-bold">Here you can find the details of a admin</small>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form id="modifyForm" action = "../function/checkModify.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label">First Name:</label>
                                    <input type="text" class="form-control" id="profileName" name="firstname" readonly>

                                    <label class="control-label">Last Name:</label>
                                    <input type="text" class="form-control" id="profileName2" name="lastname" readonly>

                                    <label class="control-label">Email:</label>
                                    <input type="text" class="form-control" id="profileEmail" name="email"readonly>

                                    <label class="control-label">Contact:</label>
                                    <input type="text" class="form-control" id="profileContact" name="contact"readonly>

                                    <label class="control-label">Address:</label>
                                    <input type="text" class="form-control" id="profileAddress" name="address"readonly>
                                    
                                    
                                </div>
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-w-m btn-success" id="btnModify">Modify</button>
                                    <button type="button" class="btn btn-w-m btn-danger" id="btnDeactivate">Deactivate</button>
                                    <button form = "modifyForm" type="submit" class="btn btn-w-m btn-warning" id="btnSave" style="display: none">Save</button>
                                </div>
                            </form>    
                        </div>
                    </div>
                    <div class="col-lg-4" class="btn-group btn-group-sm"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>                            
</div>

</div>


<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Steps -->
<script src="js/plugins/staps/jquery.steps.min.js"></script>
<!-- Jquery Validate -->
<script src="js/plugins/validate/jquery.validate.min.js"></script>


<!-- Image cropper -->
<script src="js/plugins/uploadPreview/uploadPreview.min.js"></script>

<!-- Data Tables -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<script>
$(document).ready(function(){

    $("#btnModify").on('click', function(){
        $('#profileName').prop('readonly', false);
        $('#profileName2').prop('readonly', false);
        $('#profileEmail').prop('readonly', false);
        $('#profileContact').prop('readonly', false);
        $('#profileAddress').prop('readonly', false);
        $('#btnSave').prop('style', "display: normal");
    });


    $('.dataTables-example').dataTable({
                responsive: false,
                "scrollX":true,
                "paging":true,
                "searching":true,
                "retrieve":true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

    /* Table Click */
    $('table').on('click', 'tbody tr', function() { 
        var details = new Array();
        var i = 0; 

        $(this).find('td').each (function() {
                //alert($(this).text());
                details[i] = $(this).text();
                i++;
            });

        $("#modal_userProfile").modal();
                //alert(details[3]);
                $("#profileName").val(details[1]);
                $("#profileName2").val(details[0]);
                $("#profileEmail").val(details[3]);
                $("#profileContact").val(details[4]);
                $("#profileAddress").val(details[5]);
                $("#profileAccess").val(details[4]);
        
            });



    $("#wizard").steps();
    $("#form").steps({
        enableCancelButton: true,
        bodyTag: "fieldset",
        onStepChanging: function (event, currentIndex, newIndex)
        {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    //if (currentIndex === 2 && priorIndex === 3)
                    //{
                    //    $(this).steps("previous");
                    //}
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";
                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                },
                onCanceled: function (event, currentIndex)
                {
                    $('#modal_addUser').modal('hide')
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });

           
    
            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                    files = this.files,
                    file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            }); 

            

           
            $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
});

       });//document ready


</script>


</body>

</html>