<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo base_url();?>DataTables-1.10.21/css/dataTables.bootstrap4.css"
    rel="stylesheet">
	<link href="<?php echo base_url();?>perfect-scrollbar/css/perfect-scrollbar" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css " rel="stylesheet">
<style>

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

#materialproducts {
  overflow: auto;
  width: 800px;
        margin: 0 auto;
}

 th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    
</style>


<main id="tg-main" class="tg-main tg-haslayout">
	<section class="">
        <div class="container">
		    <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns tg-main-section tg-haslayout">
                    
                        <div class="col-md-9 col-sm-8 col-xs-12 pull-right">
                            <ul class="nav nav-tabs">
                                <li class="<?php echo $tab ==1 ? "active" : "" ?>"><a data-toggle="tab" href="#home">Products</a></li>
                                <li class="<?php echo $tab ==2 ? "active" : "" ?>"><a data-toggle="tab" href="#menu1">Services</a></li>
                            </ul>
 <ul class="breadcrumb-title" style="margin-left:85%;">
                
                 <!--<h5><a href="<?php echo base_url("supplier/dashboard/portfoliocompany") ?>">VIEW MATERIALS</a></h5>-->
              
            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade  <?php echo $tab ==1 ? "in active" : "" ?>">
                                    <div class="row">
                                    
                                                <div class="card card-small ">
                                                    <div class="card-header border-bottom" style="margin-top:10px;">
                                                        <!-- <h6 class="m-0">Add Products</h6> -->
                                                        <!-- <hr /> -->
                                                    </div>
                                                    <div class="row p-0 px-3 pt-3">
														<div class="form-group col-md-12">
                                                        <label for="">Material Category</label>
                                                            <select  class="form-control materialdata" id="productcategory" placeholder="Company name">
                                                                <option value="">Select Material Category</option>
                                                               <option value="1" data-name="Generation">Generation</option>
															   <option value="2" data-name="Transmission">Transmission</option>
															   <option value="3" data-name="Distribution">Distribution</option>
															   <option value="4" data-name="Corporate">Corporate</option>
															   <option value="5" data-name="Civil">Civil</option>
                                                                
                                                                </select>
                                                        </div>
														<div class="form-group col-md-12">
                                                        <label for="">Material Group Data</label>
                                                            <select  class="form-control materialdata"  id="materialinput" placeholder="Company name">
                                                                 <option value="">Select Material Group Data
                                                               <?php foreach($materialdata as $materialdatas) { ?>
                                                <option value="<?php echo $materialdatas->material_group_code;?>">
                                                    <?php echo $materialdatas->material_group_name;?></option>
                                                <?php } ?>
                                                                </option>
                                                                </select>
                                                        </div>
														
                                                        <div class="form-group col-md-12">
                                                        <label for="">Select Material </label> 
                                                            <select class="form-control material" id="material" placeholder="Year of  registration">
                                                               <option value="">Select Material
                                                                </option>
                                                                </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="mb-2 btn btn-primary mr-2" id="save_products" onclick="save_products();">Add To My Products</button>
                                                        <hr />
                                                           <h6>Added Products</h6>
                                                        </div>
                                                        <div class="col-md-12"> 
														 <div class="table-responsive">
                                                            <table id="materialproducts" class="table table-striped table-bordered table-hover" class="display" style="width: 100%">
                                                                <thead>
                                                                <tr style="background-color:#26265f ;color:#FFF ">
                                                                    <th>Sl No	</th>
                                                                    <th>category	</th>
                                                                    <th>Product Name</th>
																	<th>Orders</th>
																	<th>Overdue</th>
																	<th>Receipts</th>
																	<th>Defects</th>
																	<th>VMI</th>
																	<th>On-Time Performance</th>
																	<th>Consigned Inventory</th>
                                                                    <th>Capacity Info</th>
																	 <th>Remove</th>
																	
                                                                </tr>
                                                                </thead>
                                                               <!-- <tbody>
                                                                <tr>
																<?php foreach($getcategroy as $category){?>
                                                                    <td>1</td>
                                                                    <td>Street Light</td>
                                                                    <td>Led </td>
																	<td data-toggle="modal" data-target="#orders" id="edit-user" style="color:#eebd01">2 </td>
																	<td data-toggle="modal" data-target="#overdue" id="edit-user"style="color:#eebd01">2 </td>
																	<td data-toggle="modal" data-target="#pay" id="edit-user"style="color:#eebd01">1 </td>
																	<td data-toggle="modal" data-target="#defects" id="edit-user" style="color:#eebd01"> 2</td>
																	<td data-toggle="modal" data-target="#myModal_vmi1" id="edit-user"style="color:#eebd01">2 </td>
																	<td><span class="score">
    <div class="score-wrap">
        <!--<span class="stars-active" style="width:88%">-->
           <!-- <i class="fa fa-star checked" aria-hidden="true"></i>
            <i class="fa fa-star checked" aria-hidden="true"></i>
            <i class="fa fa-star checked" aria-hidden="true"></i>
            <i class="fa fa-star checked" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
			 
        <!--</span>--><!--</td>
																	<td></td>
                                                                    <td><span style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                                                                    <td>
                                                                    <div class="dropdown">
                                                                        <button class="btn btn-primary dropdown-toggle"  data-toggle="modal" data-target="#myModal_capacity" type="button" id="capacityinfo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Capacity Info
                                                                        </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

	<a href="javascript:void(0);" class="dropdown-item btn-outline-primary  mt-1" data-toggle="modal" data-target="#orders" id="edit-user"><i class="zmdi zmdi-edit zmdi-hc-lg"></i> Orders</a>
	<div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn-outline-danger  mt-1" data-toggle="modal" data-target="#overdue" id="delete-user" ><i class="zmdi zmdi-delete zmdi-hc-lg"></i> Overdue </a>

	<div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn-outline-info  mt-1 activate" data-toggle="modal" data-target="#pay" role="button" id="activate-floor">Receipt History</a>

	<div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn btn-outline-danger mt-1 activate" data-toggle="modal" data-target="#defects" role="button" id="activate-user">Defects</a>

<!--	<div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn btn-outline-danger mt-1 activate" role="button" id="activate-user">On-Time Performance</a>-->

   <!-- <div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn btn-outline-danger mt-1 activate" role="button" id="activate-user" data-toggle="modal" data-target="#myModal_vmi1">Vendor Managed Inventory</a>

   <!-- <div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn btn-outline-danger mt-1 activate" role="button" id="activate-user" data-toggle="modal" data-target="#myModal_ci">Consigned Inventory</a>-->


   <!-- <div class="dropdown-divider"></div>
	<a href="javascript:void(0);" class="dropdown-item btn btn-outline-danger mt-1 activate" role="button" id="activate-user" data-toggle="modal" data-target="#myModal_capacity">Capacity Info</a>

   
  </div>
</div></td>
																<?php }?>
                                                                </tr>
                                                                </tbody>-->
                                                            </table>
</div>
                                                        </div>


                                                    </div>
                                                </div>

                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade <?php echo $tab ==2 ? "in active" : "" ?>">
                                    <div class="row">
                                    
                                                <div class="card card-small ">
                                                    <div class="card-header border-bottom" style="margin-top:10px;">
                                                    <!-- <h6 class="m-0">Add Services</h6>
                                                    <hr /> -->
                                                    </div>
                                                    <div class="row p-0 px-3 pt-3">

                                                        <div class="form-group col-md-12">
                                                        <label for="">Services category</label>
                                                            <select class="form-control" id="inputCity" placeholder="Company name">
                                                                <option value="0">
                                                                Select category
                                                                </option>
                                                                </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                        <label for="">Select Services</label>
                                                            <select class="form-control" id="inputCity" placeholder="Year of  registration">
                                                                <option value="0">
                                                                Services
                                                                </option>
                                                                </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <button class="mb-2 btn btn-primary mr-2">Add To My Services</button>
                                                            <hr />
                                                            <h6>Added Services</h6>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <table class="table  table-responsive" style="width: 100%">
                                                                <thead>
                                                                <tr style="background-color:#26265f ;color:#FFF ">
                                                                    <th>Sl No	</th>
                                                                    <th>Services	</th>
                                                                    <th>Services Name</th>
                                                                    <th>Remove</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Man Power</td>
                                                                    <td>Labour </td>
                                                                    <td><span style="color:red"><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>


                                                    </div>
                                                </div>

                                        
                                    </div>
                                
                                </div>
                                
                            </div>
                    

                        
                        </div>
                    

                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <?php $this->view('profile_sidebar',$page); ?>

                    </div>
                </div>
            </div>
        </div>
	</section>
</main>
<style>


</style>

<!-- myModal_capacity -->


<!--  -->


<div id="myModal_capacity" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Capacity Info</h4>
      </div>
      <div class="modal-body">
	   <div class="modal-body mx-3">
       <div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tr>
									<td style="text-align:right">Processing Lead Time	</td>
									<td><input type="text"  class="form-control"  value="20"/>	</td>
								</tr>
								<tr>
									<td style="text-align:right">Order Modifiers	</td>
									<td><input type="text" class="form-control"  value="20"/>	</td>
								</tr>
								<tr>
									<td style="text-align:right">Capacity/Day</td>
									<td><input type="text"  class="form-control"  value="100 units /100 days"/>	</td>
								</tr>
								<tr>
									<td style="text-align:right">Tolerance	</td>
									<td><input type="text"  class="form-control"  value="20%"/>	</td>
								</tr>
								
								
							</table>
						</div>

       
      </div>
      <div class="modal-footer">
	   <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>

<!-- myModal_capacity -->

<div id="myModal_vmi1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Vendor managed Inventory</h4>
      </div>
      <div class="modal-body">
        <table class="table">
			<thead>
				<tr>
					<th>Order No</th>
					<th>Max Capacity</th>
                    <th>Min Capacity</th>
                    <th>On Hand</th>
				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>PCO88944556</td>
					<td>3000</td>
                    <td>200</td>
                    <td>400</td>
				
				</tr>
				<tr>
					<td>PCO8895544</td>
					<td>100</td>
                    <td>200</td>
                    <td>400</td>
				
				</tr>
				
			
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="orders" class="modal fade" role="dialog">
  <div class="modal-dialog widthAdjust">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Purchase order details</h4>
      </div>
      <div class="modal-body" style="height: 300px;">
	  <div class="tg-tickets">
								<div class="tg-ticket">
									<time class="tg-matchdate" datetime="2016-05-03">27<span>Dec</span></time>
									<div class="tg-matchdetail">
										<span class="tg-theme-tag">Order No : PCO88944556</span>
										<h4>Tender Name 1</h4></h4>
										<ul class="tg-matchmetadata">
											<li><address>Tender Short DIscription</address></li>
										</ul>
									</div>
									<div>
		<a href="<?php echo site_url('supplier/purchase_order');?>" >More Details</a>
			
	  	</div>
</div>
								</div>
								
								  <div class="tg-tickets">
								<div class="tg-ticket">
									<time class="tg-matchdate" datetime="2016-05-03">20<span>JAN</span></time>
									<div class="tg-matchdetail">
										<span class="tg-theme-tag">Order No : PCO8895544</span>
										<h4>Tender Name 2</h4></h4>
										<ul class="tg-matchmetadata">
											<li><address>Tender Short DIscription</address></li>
										</ul>
									</div>
									<div>
			<a href="<?php echo site_url('supplier/purchase_order');?>" >More Details</a>
			
	  	</div>
</div>
								</div>
		
      </div>
     
    </div>

  </div>
</div>
<style>
.score {
  display: block;
  font-size: 16px;
  position: relative;
  overflow: hidden;
}
.score-wrap {
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 19px;
}

.score .stars-active {
  color: #EEBD01;
  position: relative;
  z-index: 10;
  display: inline-block;
}

.score .stars-inactive {
  color: grey;
  position: absolute;
  top: 0;
  left: 0;
  -webkit-text-stroke: initial;
  overflow: hidden;
}
.checked {
  color: orange;
}
</style>


<!------------------------overdue------------------------------------------------------->

<div class="modal fade" id="overdue" style="padding-left: 0px !important;">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">OverDue</h4>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h4 class="modal-title"><span id="inspect"></span></h4>
				 SL No: 1 <br>
               Order No: #24324 <br>
			   Description:Estimated delivery on 2020-11-09
			   <br><br>
			SL No: 2 <br>
               Order No: #123567FE654 <br>
			   Description:Estimated delivery on 2020-11-13
			   <br>


                 </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-primary" onclick="location.href = '<?php echo site_url('supplier/delivery');?>';"data-dismiss="modal">More Details</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>				
       
    </div>
</div>

</div>
<!-------------------------overdue End---------------------------------------------------->


<!------------------------defects------------------------------------------------------->

<div class="modal fade" id="defects" style="padding-left: 0px !important;">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Defects</h4>
                
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h4 class="modal-title"><span id="inspect"></span></h4>
				 SL No: 1 <br>
               Order No: #24324 <br>
			   Product:LED<br>
			   Description:Small Size Quantity Defects
			   <br><br>
			SL No: 2 <br>
               Order No: #123567FE654 <br>
			  Product:Bulb<br>
			   Description: Broken Defects
			   <br>

                 </div>
  <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>				
       
    </div>
</div>

</div>
<!-------------------------defects End---------------------------------------------------->




<!------------------------payment------------------------------------------------------->

<div class="modal fade" id="pay" style="padding-left: 0px !important;">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Payment Receipt</h4>
               
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h4 class="modal-title"><span id="questions"></span></h4>
                <div class="table-responsive">

                    <table id="questions" class="table table-striped table-bordered table-hover"
                        class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">sl no</th>
                                <th scope="col">Pay Amount</th>
								 <th scope="col">Order No</th>
                                <th scope="col">Quantity</th>
								<th scope="col">Date of Transactions</th>
								 <th scope="col">Gst</th>
                                <th scope="col">Total Amount</th>
								
                            </tr>
                        </thead>
									<tr>
                                    <td>1</td>
                                    <td>10000</td>
                                    <td>PCO889444556</td>
                                    <td>500</td>
									 <td>05-11-2020</td>
                                    <td>50.00</td>
                                    <td>550.00</td>

                                </tr>
                                </tbody>
                        <tbody>
                            <tr class="gradeX">
                                <!--<td colspan="6" class="dataTables_empty">No data found</td>-->
                            </tr>
                        </tbody>
                        <tfoot>

                        </tfoot>

                    </table>

                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
			 <button type="button" class="btn btn-primary" data-dismiss="modal">Print</button>
			 <button type="button" class="btn btn-warning" data-dismiss="modal">Download</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
               

<!-------------------------payment End---------------------------------------------------->

<script src="<?php echo base_url();?>DataTables-1.10.21/js/jquery.dataTables.js">
<script src="<?php echo base_url();?>DataTables-1.10.21/js/dataTables.bootstrap4.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
<script src="<?php echo base_url();?>perfect-scrollbar/dist/perfect-scrollbar.min.js">
</script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>


<script>

   $(".materialdata").change(function () {   
            var materialgroup = $('#materialinput').val();
			var productcategory = $('#productcategory').val();
			console.log(materialgroup);console.log(productcategory);
			if(materialgroup!="" && productcategory!=""){
			$.post("<?php echo site_url('supplier/dashboard/getMaterialProductsDetails');?>",
				{
				 materialgroup: materialgroup,
				 productcategory: productcategory 
				},
				 function(data){
				  var res = JSON.parse(data);
				  console.log(res);
				 var html= '<option value="">Select Material</option>';
				 
	            res.forEach(function(item,index){
					html+= '<option value="'+item.id+'" data-name="'+item.material_name+'">'+item.material_name+'</option>';
				});
				console.log(html);
				$('#material').html(html);
	  	         $('#savemicro').removeAttr("disabled");
                 $(".ajaxLoader").css("display", "none");
				});
				}
      
   });
   
   
   function save_products() {

    var productcategory = $("#productcategory").val();
	var categoryname = $('#productcategory option[value="'+productcategory+'"').attr('data-name');
	var materialinput = $("#materialinput").val();
	var material = $("#material").val();
	var product = $('#material option[value="'+material+'"').attr('data-name');
    
    $(".error_msg").remove();
    var flag = 0;


    if (productcategory == '') {
        flag = 1;
        $("#productcategory").append("<span class='error_msg'>Product Required</span>");
    }
	
	if (materialinput == '') {
        flag = 1;
        $("#materialinput").append("<span class='error_msg'>Materialdata Required</span>");
    }

    if (material == "") {
        flag = 1;
        $("#material").append("<span class='error_msg'>Material Required</span>");
    }

   


    // alert(jpnid +","+ year +","+ month +","+income +","+ expense +","+turnover_status +","+ turnoverId);



    if (flag == 0) {

        $("#savemicro").prop("disabled", true);
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
            csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $(".ajaxLoader").css("display", "block");
        $.post("<?php echo site_url('supplier/dashboard/insert_materials')?>", {

            productcategory: productcategory,
			categoryname:categoryname,
            materialinput: materialinput,
			material: material,
			product:product,
            supplierid: 1,
           
            <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash()?>"
        }, function(data) {
			 alert(data);
             $('#savemicro').removeAttr("disabled");
			window.location.reload();

        });

    }


}

$(document).ready(function() {

    material_table = $('#materialproducts').DataTable({
		//console.log('kkkkk');

        'ajax': {
            url: '<?php echo site_url("supplier/dashboard/getMaterialListData");?>',
			 "scrollX": true,
            type: 'POST',
            "data": function(d) {
                d.<?=$this->security->get_csrf_token_name();?> =
                    "<?=$this->security->get_csrf_hash()?>";
               // d.districtid = distval;
                //d.blockid = block;
               // d.cdsid = cds;
                //d.adsid = ads;
               // d.typeid = typeid;
            }
        },


        "buttons": [],
        "columns": [{
                "data": "no"
            },
			
            {
                "data": "category"
            },
			 {
                "data": "materialname"
            },
			 
			 {
                "data": "orders"
            },
			 {
                "data": "overdue"
            },
			 {
                "data": "receipts"
            },
			 {
                "data": "defects"
            },
			 {
                "data": "vmi"
            },
			 {
                "data": "On-Time Performance"
            },
			{
                "data": "Consigned Inventory"
            },
			
			{
                "data": "capacityinfo"
            },
			{
                "data": "delete"
            },
          	
			{
                "data": "id",
				"visible":false
            },
          	
			
        ],
 

        "drawCallback": function(settings) {
            $(".ajaxLoader").css("display", "none");
        },

    });

});

$(document).on('click', '#delete-supplier', function() {
        var cnf = confirm("Are you sure to delete?");
        if (cnf) {
            var data = material_table.row($(this).parents('tr')).data();
            var supplierid = data['id'];
            $.post("<?php echo site_url('supplier/dashboard/deleteSupplierMaterials')?>", {
                supplierid: supplierid,
                <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash()?>"
            }, function(data) {
                alert(data);
               window.location.reload();

            });
        }
    });


</script>

