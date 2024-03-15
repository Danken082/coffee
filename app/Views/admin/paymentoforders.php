<?php include('include/header.php')?>
<div class="modal fade" id="vieworderdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <br>

        <div class="view_order_data">

                       
        </div>
    
          <br>
              
        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>

        </div>
      </div>
    </div>
  </div>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order Payment</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Order Payment</h6>
                </nav>
            </div>
        </nav><br>


        <div class="container">
            <div class="col-12">
                <div class="card my-4">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h4 class="text-white text-capitalize ps-3">Order Payment List</h4>
                    </div>
                </div><br>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                        <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Customer</th>
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Order Code</th>
                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($order as $orP): ?>
                        <tr>
                        <!-- <input type="text" class="order_id" value=""> -->
                        <td class="orderID" hidden><?= $orP['orderID']?></td>
                        <td class="text-center">
                       
                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['FirstName'];?> <?= $orP['LastName'];?></p>
                                </td>
                                <td class="text-center">
                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['barcode']?></p>
                                </td>
                                
                                <td class="align-middle text-center">
                          
                                <a href="#" class="btn btn-info btn-sm view_data">View Order</a>

                                    <a href="" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Decline</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    <?php include('include/footer.php')?> 
    <script>
             $(document).ready(function (){
                $('.view_data').click(function (e){
                    e.preventDefault();
                   

                   var orderID = $(this).closest('tr').find('.orderID').text();
                        
                   $.ajax({
                    method: "POST",
                    url:"/viewOrders",
                    data:{
                        'click_view_btn': true,
                        'orderID': orderID,
                    },
                    success: function(response)
                    {
                        console.log(response);
                        $('.view_order_data').html(response);
                        $('#vieworderdata').modal('show');
                    }
                   });
                });
            });

            </script>