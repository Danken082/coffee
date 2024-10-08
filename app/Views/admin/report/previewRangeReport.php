<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Report Preview</title>
    <!-- Include Bootstrap CSS for modal functionality -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .pdf-viewer {
            width: 100%;
            height: 800px;
            border: none;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a, .buttons button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
            display: inline-block;
        }
        .buttons a:hover, .buttons button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Sales Report</h2>
    <div class="buttons">
        <!-- 'Download PDF' button triggers the modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdfModal">
            Download PDF 
        </button>
        <a href="<?= base_url('reports') ?>" class="btn btn-secondary">Back to Reports</a>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document"> <!-- modal-xl for larger size -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sales Report Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Embed the PDF using iframe -->
                    <iframe src="<?= $pdfUrl ?>" class="pdf-viewer"></iframe>
                </div>
                <div class="modal-footer">
                    <!-- Download button -->
                    <a href="<?= $pdfUrl ?>" download class="btn btn-success">Download PDF</a>
                    <!-- Close button -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS for modal functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js for Bootstrap tooltips and popovers -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
