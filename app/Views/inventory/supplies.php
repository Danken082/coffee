<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Items</title>
        <link rel="icon" type="image/png" href=/images/coffeelogo2.png>
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
        <link rel="stylesheet" type="text/css"href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
        <link href="/assets/css/table.css" rel="stylesheet" />
    </head>
    <body>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/adminitems')?>" style="background-color: transparent; color:white; font-size: 1.5em;">Back to Items</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="background-color: transparent; color:white; font-size: 1.5em;">Supply List</li>
    </ol><br><br>
        <div class="card-body">
            <div class="table-responsive">
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <table>
                    <thead>
                        <tr>
                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Name</th>

                            <th class="text-white text-uppercase text-secondary text-sm font-weight-bold text-center">Stocks</th>

                            <th class="text-white text-center text-uppercase text-secondary text-sm font-weight-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i): ?>
                            <tr>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold"><?=$i['name'] ?></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-xs font-weight-bold"><?=$i['stocks'] ?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="<?= base_url('/editsupply/' .$i['rawID']) ?>" id='id'
                                        class="text-info font-weight-bold text-xs me-2"
                                        data-toggle="tooltip" data-original-title="Edit Coffee">
                                        Edit
                                    </a>||
                                    <a href="<?= base_url('/deletesupply/' .$i['rawID']) ?>" class="text-danger font-weight-bold text-xs delete-link"
                                        id='id' data-toggle="tooltip" data-original-title="Delete Coffee">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table><br>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var deleteLinks = document.querySelectorAll('.delete-link');
                
                deleteLinks.forEach(function (link) {
                    link.addEventListener('click', function (event) {
                        event.preventDefault();
                        var confirmDelete = confirm('Are you sure you want to delete this supply?');
                        if (confirmDelete) {
                            window.location.href = this.getAttribute('href');
                        } else {
                            return false;
                        }
                    });
                });
            });
        </script>
    </body>
</html>