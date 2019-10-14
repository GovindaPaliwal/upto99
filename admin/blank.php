<?php include_once('include/header.php');?> 
<?php include_once('include/sidebar.php');?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Vertical Form</h3>

          <!--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>-->
        </div>

        <div class="box-body">

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

         <!-- textarea -->
         <div class="form-group">
            <label>Textarea</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>

        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Email">
        </div>
        <br>

        <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>

        <div class="form-group">
                <label>Multiple</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                  <option>Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>

        

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
         <input type="submit" name="btn" class="btn btn-primary" style="float:right" />
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->



    <!--- Horizontal  Form Start -->


     <!-- Default box -->
     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Horizontal Form</h3>

          <!--<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>-->
        </div>

        <div class="box-body">


        <div class="col-md-6">
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
        </div>


        <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input type="date" class="form-control" >
            </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputPassword1">Number</label>
            <input type="number" class="form-control" placeholder="123456789">
        </div>
        </div>


        

         <!-- textarea -->
         <div class="col-md-12">
         <div class="form-group">
            <label>Textarea</label>
            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
        </div>
        </div>

        

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
         <input type="submit" name="btn" class="btn btn-primary" style="float:right" />
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


    <!--- Horizontal Form End --->


    <!--- Table Start Here --->

    
    <div class="box">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Win 95+</td>
                  <td>5</td>
                  <td>C</td>
                </tr>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    <!--- Table End Here ---->


    <!--- Detail Display Start --->

          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">

            <h3 style="font-size:15px; font-weight:bold">Detail Title</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->

              <table class="table table-striped text-center" style="text-align:center">
                  <thead class="thead-inverse">
                      <tr>
                          <td colspan="2"><center><img src="dist/img/logo.png" /></center></td>
                      </tr>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Arif</td>
                              <td>arif@mail.com</td>
                          </tr>
                          <tr>
                              <td>Ali</td>
                              <td>ali@mail.com</td>
                          </tr>
                      </tbody>
              </table>
             
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <div class="box-footer">

                <a href="javascript:void(0)" class="btn btn-primary" style="float:right" >Back To Home</a>

            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

    <!--- Detail Display End --->




    </section>
    <!-- /.content -->
</div>
      <!-- /.row -->
      <!-- Main row -->
 
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <?php include_once('include/footer.php');?>