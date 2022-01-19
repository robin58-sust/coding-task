 <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if($this->uri->segment(1)=="category"){echo "active";}?>">
                        <a href="<?php echo base_url();?>category" style="border: 1px solid;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Categories </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="product"){echo "active";}?>">
                        <a href="<?php echo base_url();?>product" style="border: 1px solid;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Products </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="customer"){echo "active";}?>">
                        <a href="<?php echo base_url();?>customer" style="border: 1px solid;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Customer </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="notification"){echo "active";}?>">
                        <a href="<?php echo base_url();?>notification" style="border: 1px solid;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Notification </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=="offer"){echo "active";}?>">
                        <a href="<?php echo base_url();?>offer" style="border: 1px solid;"><i class="fa fa-list-alt" aria-hidden="true"></i>  Offer </a>
                    </li>
                     <!--li class="">
                        <a href=""><i class="fa fa-list" aria-hidden="true"></i>  Customers </a>
                    </li-->
                    <li class="<?php if($this->uri->segment(1)=="order"){echo "active";}?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Orders <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse <?php if($this->uri->segment(1)=="order"){echo "in";}?>">
                            <li ><a style="<?php if($this->uri->segment(2)==""){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?><?php if($this->session->userdata('sidebar') =='new'){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?>"href="<?php echo base_url();?>order">New</a></li>
							
                            <li><a style="<?php if($this->uri->segment(2)=="shipping"){echo "background-color: #337AB7;color:#fff;border: 1px solid";}?><?php if($this->session->userdata('sidebar') =='shipping'){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?>" href="<?php echo base_url();?>order/shipping">In Shipping </a></li>
							
							
                            <li><a style="<?php if($this->uri->segment(2)=="partially"){echo "background-color: #337AB7;color:#fff;border: 1px solid";}?><?php if($this->session->userdata('sidebar') =='partially'){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?>" href="<?php echo base_url();?>order/partially">Partially Delivered</a></li>
							
							
                            <li><a style="<?php if($this->uri->segment(2)=="delivered"){echo "background-color: #337AB7;color:#fff;border: 1px solid";}?><?php if($this->session->userdata('sidebar') =='delivered'){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?>" href="<?php echo base_url();?>order/delivered">Delivered</a></li>
							
							
                            <li><a style="<?php if($this->uri->segment(2)=="canceled"){echo "background-color: #337AB7;color:#fff;border: 1px solid";}?><?php if($this->session->userdata('sidebar') =='canceled'){ echo "background-color: #337AB7; color:#fff;border: 1px solid;";}?>" href="<?php echo base_url();?>order/canceled">Canceled </a></li>
							
							
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>