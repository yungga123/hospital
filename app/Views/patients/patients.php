<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Patients</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Add Patients</b>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <?= form_open("PatientsController/addPatient", ["id" => "form-addpatient" ]) ?>
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="small_firstname" placeholder="">
                                        <small id="small_firstname" class="form-text text-muted"></small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname" aria-describedby="small_lastname" placeholder="">
                                        <small id="small_lastname" class="form-text text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="middlename">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" id="middlename" aria-describedby="small_middlename" placeholder="">
                                        <small id="small_middlename" class="form-text text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_no">Contact Number</label>
                                        <input type="text" class="form-control" name="contact_no" id="contact_no" aria-describedby="small_contact_no" placeholder="">
                                        <small id="small_contact_no" class="form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea rows="3" class="form-control" name="address" id="address" aria-describedby="small_address" placeholder=""></textarea>
                                        <small id="small_address" class="form-text text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_of_admission">Date of Admission</label>
                                        <input type="date" class="form-control" name="date_of_admission" id="date_of_admission" aria-describedby="small_date_of_admission" placeholder="">
                                        <small id="small_date_of_admission" class="form-text text-muted"></small>
                                    </div>

                                    <div class="form-group">
                                        <label for="sickness">Sickness</label>
                                        <textarea rows="3" class="form-control" name="sickness" id="sickness" aria-describedby="small_sickness" placeholder=""></textarea>
                                        <small id="small_sickness" class="form-text text-muted"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success text-bold float-right"><i class="fas fa-check"></i> SUBMIT</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-header -->

