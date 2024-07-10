<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Crossroad Admin</title>
    <link rel="stylesheet" href="/assets/admin/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/admin/vendor.bundle.base.css">
    <link rel="stylesheet" href="/assets/admin/jquery-jvectormap.css">
    <link rel="stylesheet" href="/assets/admin/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/admin/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/admin/style.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">
    <link rel="shortcut icon" href="/assets/images/tea.png" />
    <link href="https://fontawesome.com/"/>
  </head>
  
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="navbar-brand"><small>Crossroads Coffee and Deli</small></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img src="<?= base_url()?>assets/user/images/<?=session()->get('profile_img')?>" alt="pfp" class="rounded-circle img" width="40">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?= session()->get('FirstName')?> <?= session()->get('LastName')?></h5>
                  <span><?= session()->get('UserRole')?></span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("adminhome"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-house-user"></i>
              </span>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("admindash"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-chart-line"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("Searchreport"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-folder"></i>
              </span>
              <span class="menu-title">Report</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("#"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-address-book"></i>
              </span>
              <span class="menu-title">Event Reservation</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("admininventory"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-warehouse"></i>
              </span>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item menu-items">
              <a class="nav-link" href="<?= site_url("adminhistory"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-list"></i>
              </span>
              <span class="menu-title">Order History</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("adminpayment") ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-credit-card"></i>
              </span>
              <span class="menu-title">Order Payment</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("adminpos"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-cash-register"></i>
              </span>
              <span class="menu-title">POS</span>
            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Account Page</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("adminmanage_user"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-user"></i>
              </span>
              <span class="menu-title">Admin Manage User</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?= site_url("admincustomer_user"); ?>">
              <span class="menu-icon">
                <i class="fa fa-solid fa-user"></i>
              </span>
              <span class="menu-title">Manage User</span>
            </a>
          </li>

        <div class="container-fluid page-body-wrapper">
          <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <ul class="navbar-nav w-100">
                            <li class="nav-item w-100"></li>
                          </ul>
                          <ul class="navbar-nav navbar-nav-right">
                     <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="fa fa-solid fa-bell"></i>
                        <span class="bg-danger">
                            <i class="bi bi-bell"></i>
                            <?php if($count['notif'] > 0): ?>
                                <?= $count['notif'] ?>
                            <?php endif; ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <?php if($count['notif'] == 0): ?>
                            <a class="dropdown-item preview-item">
                                <div class="preview-item-content">
                                    <p class="text-muted ellipsis mb-0">No Notification to show</p>
                                </div>
                            </a>
                        <?php else: ?>
                            <?php foreach($notif as $notification): ?>
                                <a class="dropdown-item preview-item" href="<?= base_url('rawNotif/' . $notification['rawID'] )?>">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="fa fa-solid fa-exclamation"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1"><?= $notification['name'] ?></p>
                                        <p class="text-muted ellipsis mb-0">Your stocks are low: <?= $notification['stocks'] ?></p>
                                    </div>
                                </a>
                                <a href="<?= base_url('admin/markNotificationRead/' . $notification['rawID'] ) ?>" class="mark-read-btn">Mark as read</a>
                                <div class="dropdown-divider"></div>
                            <?php endforeach; ?>
                            <p>---End Of notification---</p>
                        <?php endif; ?>
                    </div>
                </div>

                <li class="nav-item dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                      <img src="<?= base_url()?>assets/user/images/<?=session()->get('profile_img')?>" alt="pfp" class="rounded-circle img" width="40">
                      <p class="mb-0 d-none d-sm-block navbar-profile-name"><?= session()->get('FirstName')?> <?= session()->get('LastName')?></p>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="<?= site_url("/adminprofile"); ?>">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fa fa-solid fa-user"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">See Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item" href="<?= site_url("logout"); ?>">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                              <i class="fa fa-power-off me-sm-1"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Logout</p>
                        </div>
                    </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <i class="fa fa-regular fa-bars"></i>
              </button>
            </div>
        </div>
      </div>

    <script src="/assets/admin/vendor.bundle.base.js"></script>
    <script src="/assets/admin/Chart.min.js"></script>
    <script src="/assets/admin/progressbar.min.js"></script>
    <script src="/assets/admin/jquery-jvectormap.min.js"></script>
    <script src="/assets/admin/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/admin/owl.carousel.min.js"></script>
    <script src="/assets/admin/off-canvas.js"></script>
    <script src="/assets/admin/hoverable-collapse.js"></script>
    <script src="/assets/admin/misc.js"></script>
    <script src="/assets/admin/settings.js"></script>
    <script src="/assets/admin/todolist.js"></script>
    <script src="/assets/admin/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const markReadBtns = document.querySelectorAll('.mark-read-btn');
    
    markReadBtns.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const url = this.href;
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>' // Adjust according to your CSRF token handling
                }
            })
            .then(response => {
                if (response.ok) {
                    this.closest('.dropdown-item').remove();
                    // Update notification count if needed
                } else {
                    console.error('Failed to mark notification as read');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

  </body>
</html>