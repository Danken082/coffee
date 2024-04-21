<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Product Item</title>

    <br>
    <link rel="icon" type="image/png" href="/images/coffeelogo2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #191c24;
            color: grey;
        }

        .table th, .table td {
            color: white;
        }

        .table th:hover, .table td:hover {
           
        }
        a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}
.back-button {
            display: inline-block;
            padding: 10px 20px;
            color: #007bff; /* Blue color */
            border: 2px solid #b3e0ff; /* Light blue border */
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s, border-color 0.3s;
            margin: 20px;
            
        }

        .back-button:hover {
            color: #0056b3; /* Darker blue color */
            border-color: #80bfff; /* Darker light blue border */
        }

    </style>
</head>
<body>
<a href="/admininventory" onclick="history.back()" class="back-button">Back</a>
<div class="card-body">
    <h4 class="card-title">Product Item</h4>
    <br>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th> Product Name </th>
                    <th> Product Description </th>
                    <th> Category</th>
                    <th> Product Quantity</th>
                    <th> Product Regular Price </th>
                    <th> Product Price </th>
                    <th> Product Code </th>
                    <th> Product Image </th>
                    <th> Action </th>
                    <th> Availability </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>Caramel</div>
                        </div>
                    </td>
                    <td>
                       Delicious
                    </td>
                    <td> Hot Coffee</td>
                    <td> 50 </td>
                    <td> 30</td>
                    <td> 35</td>
                    <td> C1HOT </td>
                    
                    <td> IMAGES</td>
                    <td>
                        <div class="badge badge-outline-success">Edit | Delete</div>
                    </td>
                    <td>
                        <div class="badge badge-outline-success">Approved</div>
                    </td>
                </tr>
               
               
            </tbody>
        </table>
    </div>
</div>

<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>
</html>
