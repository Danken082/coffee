<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <br>

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
                    <?php foreach($orderview as $orP): ?>
                        <tr>

                        <td class="text-center">
                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['FirstName'];?> <?= $orP['LastName'];?></p>
                                </td>
                                <td class="text-center">
                                <p class="text-xs text-primary mb-0 font-weight-bold"><?= $orP['barcode']?></p>
                                </td>
                                
                                <td class="align-middle text-center">
                          
                                <a href="<?= base_url('viewOrders/' . $orP['orderID'])?>" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">View Order</a>

                                    <a href="" class="text-danger font-weight-bold text-xs"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Decline</a>
                                </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylist">Create New</a>

        </div>
      </div>
    </div>
  </div>
