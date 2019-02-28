<? use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default'); ?>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"> Total Projects : 
				  <? $result=$connection->execute("select * from properties")->fetchAll('assoc');
				    $row = count($result);
					echo $row;
				  ?> </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?=SITE_PATH?>admin/properties/index/">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">Total Blogs : 
				  <? $result=$connection->execute("select * from blogs")->fetchAll('assoc');
				    $row = count($result);
					echo $row;
				  ?>
				  
				  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?=SITE_PATH?>admin/blogs/index/">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">Total Testimonial :
				  
				  <? $result=$connection->execute("select * from testimonials")->fetchAll('assoc');
				    $row = count($result);
					echo $row;
				  ?>
				  </div>  
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?=SITE_PATH?>admin/testimonials/index/">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">Total Enquiries : 
				  
				  <? $result=$connection->execute("select * from enqueries")->fetchAll('assoc');
				    $row = count($result);
					echo $row;
				  ?>
				  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?=SITE_PATH?>admin/enqueries/index/">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

        