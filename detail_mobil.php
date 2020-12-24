<?php include('./inc/customer/header.php');?>

<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2> , </h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>$ </p>Per Day
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
            <li> 
              <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5></h5>
              <p>Reg.Year</p>
            </li>
            <li> 
              <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5></h5>
              <p>Fuel Type</p>
            </li>
            <li> 
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5></h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" style='margin-left:0px;' class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
              <li role="presentation" style='margin-left:-420px;'><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p></p>
              </div>
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>AntiLock Braking System</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Power Steering</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Power Windows</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>   
                    <tr>
                      <td>CD Player</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Leather Seats</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Central Locking</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Power Door Locks</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Brake Assist</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Driver Airbag</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Passenger Airbag</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                    <tr>
                      <td>Crash Sensor</td>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn"  name="submit" value="Book Now">
            </div>   
            <a href="" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3>Similar Cars</h3>
      <div class="row">
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid="><img src="admin/img/vehicleimages/" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="vehical-details.php?vhid=">, </a></h5>
              <p class="list-price">$</p>
              <ul class="features_list">
                <li><i class="fa fa-user" aria-hidden="true"></i> seats</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i> model</li>
                <li><i class="fa fa-car" aria-hidden="true"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/Similar-Cars--> 
  </div>
</section>
<!--/Listing-detail--> 

<?php include('./inc/customer/footer.php');?>