<?php
/* Template Name: My Account */
get_header();

// Redirect to login if not logged in
if (!is_user_logged_in()) {
  wp_redirect(wp_login_url(get_permalink()));
  exit;
}

$current_user = wp_get_current_user();
$customer = new WC_Customer(get_current_user_id());

// Get current endpoint
$current_endpoint = WC()->query->get_current_endpoint();
if (empty($current_endpoint)) {
  $current_endpoint = 'dashboard';
}
?>

<style>
  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    border: none !important;
  }

  .btn:before {
    background-color: transparent !important;
  }
</style>

<section class="gap">
  <div class="container">
    <div class="row">
      <!-- Sidebar Navigation -->
      <div class="col-lg-3 col-md-4">
        <div class="account-sidebar">
          <div class="user-info mb-4">
            <h4>Welcome, <?php echo esc_html($current_user->display_name); ?></h4>
            <p class="text-muted"><?php echo esc_html($current_user->user_email); ?></p>
          </div>

          <nav class="account-nav">
            <ul class="nav nav-pills flex-column">
              <?php foreach (wc_get_account_menu_items() as $endpoint => $label): ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($current_endpoint === $endpoint) ? 'active' : ''; ?>"
                    href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                    <?php echo esc_html($label); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-lg-9 col-md-8">
        <div class="account-content">
          <?php
          // Display account content based on endpoint
          switch ($current_endpoint) {
            case 'dashboard':
              ?>
              <div class="dashboard-content">
                <h3 class="pb-3">Dashboard</h3>
                <div class="row">
                  <div class="col-lg-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Recent Orders</h5>
                        <?php
                        $recent_orders = wc_get_orders(array(
                          'customer' => get_current_user_id(),
                          'limit' => 3,
                          'status' => array('wc-processing', 'wc-completed', 'wc-pending')
                        ));

                        if ($recent_orders):
                          ?>
                          <div class="recent-orders">
                            <?php foreach ($recent_orders as $order): ?>
                              <div class="order-item mb-2">
                                <strong>Order #<?php echo $order->get_order_number(); ?></strong>
                                <span
                                  class="badge badge-<?php echo $order->get_status() === 'completed' ? 'success' : 'warning'; ?>">
                                  <?php echo ucfirst($order->get_status()); ?>
                                </span>
                                <div class="text-muted small">
                                  <?php echo $order->get_date_created()->format('M j, Y'); ?>
                                </div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        <?php else: ?>
                          <p>No recent orders found.</p>
                        <?php endif; ?>
                        <a href="<?php echo wc_get_account_endpoint_url('orders'); ?>" class="btn btn-sm">View All
                          Orders</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <h5 class="card-title">Account Details</h5>
                        <p><strong>Name:</strong> <?php echo esc_html($current_user->display_name); ?></p>
                        <p><strong>Email:</strong> <?php echo esc_html($current_user->user_email); ?></p>
                        <p><strong>Member Since:</strong>
                          <?php echo date('M j, Y', strtotime($current_user->user_registered)); ?></p>
                        <a href="<?php echo wc_get_account_endpoint_url('edit-account'); ?>" class="btn btn-sm">Edit
                          Account</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              break;

            case 'orders':
              ?>
              <div class="orders-content">
                <h3 class="pb-3">Orders</h3>
                <?php
                $customer_orders = wc_get_orders(array(
                  'customer' => get_current_user_id(),
                  'limit' => -1
                ));

                if ($customer_orders):
                  ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Order</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Total</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($customer_orders as $order): ?>
                          <tr>
                            <td><strong>#<?php echo $order->get_order_number(); ?></strong></td>
                            <td><?php echo $order->get_date_created()->format('M j, Y'); ?></td>
                            <td>
                              <span
                                class="badge badge-<?php echo $order->get_status() === 'completed' ? 'success' : ($order->get_status() === 'processing' ? 'warning' : 'secondary'); ?>">
                                <?php echo ucfirst($order->get_status()); ?>
                              </span>
                            </td>
                            <td><?php echo $order->get_formatted_order_total(); ?></td>
                            <td>
                              <a href="<?php echo $order->get_view_order_url(); ?>" class="btn btn-sm">View</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                <?php else: ?>
                  <div class="alert alert-info">
                    <p>No orders found. <a href="<?php echo wc_get_page_permalink('shop'); ?>">Start shopping</a></p>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <?php
            break;

            case 'view-order':
              ?>
            <div class="view-order-content">
              <?php
              $order_id = get_query_var('view-order');
              $order = wc_get_order($order_id);

              // Validate order exists and belongs to current user
              if (!$order || $order->get_customer_id() !== get_current_user_id()) {
                ?>
                <div class="alert alert-danger">
                  <h4>Invalid Order</h4>
                  <p>Sorry, this order is invalid or you don't have permission to view it.</p>
                  <a href="<?php echo wc_get_account_endpoint_url('orders'); ?>" class="btn btn-primary">Back to Orders</a>
                </div>
                <?php
              } else {
                // Display order details
                ?>
                <h3 class="pb-3">Order #<?php echo $order->get_order_number(); ?></h3>

                <div class="order-info mb-4">
                  <div class="row">
                    <div class="col-md-6">
                      <p><strong>Order Date:</strong> <?php echo $order->get_date_created()->format('F j, Y'); ?></p>
                      <p><strong>Status:</strong>
                        <span
                          class="badge badge-<?php echo $order->get_status() === 'completed' ? 'success' : ($order->get_status() === 'processing' ? 'warning' : 'secondary'); ?>">
                          <?php echo ucfirst($order->get_status()); ?>
                        </span>
                      </p>
                      <p><strong>Total:</strong> <?php echo $order->get_formatted_order_total(); ?></p>
                    </div>
                    <div class="col-md-6">
                      <p><strong>Payment Method:</strong> <?php echo $order->get_payment_method_title(); ?></p>
                      <?php if ($order->get_billing_email()): ?>
                        <p><strong>Email:</strong> <?php echo $order->get_billing_email(); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="order-items">
                  <h4>Order Items</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($order->get_items() as $item_id => $item): ?>
                          <tr>
                            <td>
                              <strong><?php echo $item->get_name(); ?></strong>
                              <?php if ($item->get_variation_id()): ?>
                                <br><small class="text-muted"><?php echo wc_get_formatted_variation($item, true); ?></small>
                              <?php endif; ?>
                            </td>
                            <td><?php echo $item->get_quantity(); ?></td>
                            <td><?php echo $order->get_formatted_line_subtotal($item); ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <?php if ($order->get_customer_note()): ?>
                  <div class="order-notes mt-4">
                    <h4>Order Notes</h4>
                    <p><?php echo esc_html($order->get_customer_note()); ?></p>
                  </div>
                <?php endif; ?>

                <div class="mt-4">
                  <a href="<?php echo wc_get_account_endpoint_url('orders'); ?>" class="btn btn-secondary">Back to Orders</a>
                </div>
                <?php
              }
              ?>
            </div>
            <?php
            break;
            case 'edit-address':
              ?>
            <div class="addresses-content">
              <h3 class="pb-3">Addresses</h3>
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Billing Address</h5>
                      <a href="<?php echo wc_get_endpoint_url('edit-address', 'billing'); ?>" class="btn btn-sm">Edit</a>
                    </div>
                    <div class="card-body">
                      <?php
                      $billing_address = WC()->countries->get_formatted_address(array(
                        'first_name' => $customer->get_billing_first_name(),
                        'last_name' => $customer->get_billing_last_name(),
                        'company' => $customer->get_billing_company(),
                        'address_1' => $customer->get_billing_address_1(),
                        'address_2' => $customer->get_billing_address_2(),
                        'city' => $customer->get_billing_city(),
                        'state' => $customer->get_billing_state(),
                        'postcode' => $customer->get_billing_postcode(),
                        'country' => $customer->get_billing_country()
                      ));

                      echo $billing_address ? $billing_address : 'You have not set up this type of address yet.';
                      ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 mb-4">
                  <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Shipping Address</h5>
                      <a href="<?php echo wc_get_endpoint_url('edit-address', 'shipping'); ?>" class="btn btn-sm">Edit</a>
                    </div>
                    <div class="card-body">
                      <?php
                      $shipping_address = WC()->countries->get_formatted_address(array(
                        'first_name' => $customer->get_shipping_first_name(),
                        'last_name' => $customer->get_shipping_last_name(),
                        'company' => $customer->get_shipping_company(),
                        'address_1' => $customer->get_shipping_address_1(),
                        'address_2' => $customer->get_shipping_address_2(),
                        'city' => $customer->get_shipping_city(),
                        'state' => $customer->get_shipping_state(),
                        'postcode' => $customer->get_shipping_postcode(),
                        'country' => $customer->get_shipping_country()
                      ));

                      echo $shipping_address ? $shipping_address : 'You have not set up this type of address yet.';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
            break;

            case 'edit-account':
              ?>
            <div class="edit-account-content">
              <h3 class="pb-3">Account Details</h3>
              <form class="edit-account" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="account_first_name">First Name *</label>
                      <input type="text" class="form-control" name="account_first_name" id="account_first_name"
                        value="<?php echo esc_attr($current_user->first_name); ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="account_last_name">Last Name *</label>
                      <input type="text" class="form-control" name="account_last_name" id="account_last_name"
                        value="<?php echo esc_attr($current_user->last_name); ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="account_display_name">Display Name *</label>
                  <input type="text" class="form-control" name="account_display_name" id="account_display_name"
                    value="<?php echo esc_attr($current_user->display_name); ?>" required>
                </div>

                <div class="form-group">
                  <label for="account_email">Email Address *</label>
                  <input type="email" class="form-control" name="account_email" id="account_email"
                    value="<?php echo esc_attr($current_user->user_email); ?>" required>
                </div>

                <fieldset class="mt-4">
                  <legend>Password Change</legend>
                  <div class="form-group">
                    <label for="password_current">Current Password (leave blank to leave unchanged)</label>
                    <input type="password" class="form-control" name="password_current" id="password_current">
                  </div>
                  <div class="form-group">
                    <label for="password_1">New Password (leave blank to leave unchanged)</label>
                    <input type="password" class="form-control" name="password_1" id="password_1">
                  </div>
                  <div class="form-group">
                    <label for="password_2">Confirm New Password</label>
                    <input type="password" class="form-control" name="password_2" id="password_2">
                  </div>
                </fieldset>

                <?php wp_nonce_field('save_account_details', 'save-account-details-nonce'); ?>
                <button type="submit" class="btn btn-primary" name="save_account_details" value="Save changes">
                  Save Changes
                </button>
              </form>
            </div>
            <?php
            break;

            default:
              // For other endpoints like order view, downloads, etc.
              do_action('woocommerce_account_' . $current_endpoint . '_endpoint', isset($_GET['order-view']) ? $_GET['order-view'] : '');
              break;
          }
          ?>
      </div>
    </div>
  </div>
  </div>
</section>

<style>
  .account-sidebar {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
  }

  .account-nav .nav-link {
    color: #333;
    padding: 12px 15px;
    margin-bottom: 5px;
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  .account-nav .nav-link:hover,
  .account-nav .nav-link.active {
    background-color: #007cba;
    color: white;
  }

  .card {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    padding: 15px 20px;
  }

  .card-body {
    padding: 20px;
  }

  .badge {
    padding: 5px 10px;
    border-radius: 15px;
  }

  .badge-success {
    background-color: #28a745;
    color: white;
  }

  .badge-warning {
    background-color: #ffc107;
    color: #212529;
  }

  .badge-secondary {
    background-color: #6c757d;
    color: white;
  }

  .table th {
    border-top: none;
    font-weight: 600;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-control {
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .btn {
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-primary {
    background-color: #007cba;
    border-color: #007cba;
  }

  .btn-outline-primary {
    color: #007cba;
    border-color: #007cba;
  }

  @media (max-width: 768px) {
    .account-sidebar {
      margin-bottom: 30px;
    }

    .account-nav .nav-pills {
      flex-direction: row;
      flex-wrap: wrap;
    }

    .account-nav .nav-item {
      flex: 1;
      min-width: 150px;
    }

    .table-responsive {
      font-size: 14px;
    }
  }
</style>

<?php
// Process form submissions
if (isset($_POST['save_account_details'])) {
  wc_save_account_details();
}

get_footer();
?>