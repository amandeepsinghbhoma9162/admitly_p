<div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Applicatiions requirement <small><span id="isNotDocUpload"></span></small></h5>
            <button type="button" id="paymentpopClose" class=" close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height: 350px;
    overflow-y: scroll;">
            
            @if($studentCourseApplyFors->count() > 0)
            <?php
            $hasCollegeId = [];
            $hasCardCollegeId = [];
            $totalAppFee = 0;
            ?>
            @foreach($studentCourseApplyFors as $key=> $studentCourseApplyFor)
            @if($studentCourseApplyFor->college['isCardRequired'] == 'yes')
                @if(!in_array($studentCourseApplyFor->college['id'],$hasCardCollegeId))
                    <?php
                    $hasCardCollegeId[] = $studentCourseApplyFor->college['id'];
                      (int)$totalAppFee += (int)$studentCourseApplyFor->college['application_fee'];
                    ?>
                @endif
            @endif
            @if($studentCourseApplyFor->college['isDocumentRequired'] == 'yes')
            @if(!in_array($studentCourseApplyFor->college['id'],$hasCollegeId))
            <?php
            $hasCollegeId[] = $studentCourseApplyFor->college['id'];
            
            ?>
            <form method="post" class="uploadSignedDoc">
            @csrf
            <input type="hidden" name="sign_student_id" value="{{$student['id']}}">
            <input type="hidden" name="applicationId" value="{{$studentCourseApplyFor['id']}}">
            <input type="hidden" name="college_id" value="{{$studentCourseApplyFor['college_id']}}">
              <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label  class="col-form-label">Download signed document:</label>
                    <small>{{$studentCourseApplyFor->college['name']}}</small>
                    <a href="{{asset($studentCourseApplyFor->college->collegeSignedDocuments['path'].'/'.$studentCourseApplyFor->college->collegeSignedDocuments['name'])}}" target="_blank" download>
                        <div class="downloadHover"><i class="fa fa-download download" style="float: left;" aria-hidden="true"></i></div>
                    </a>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Upload signed document:</label>
                    <small>{{$studentCourseApplyFor->college['name']}}</small><br>
                    <label class="btn btn-info ">
                        <i class="fa fa-upload" ></i>
                        <input type="file" name="clgSignedDoc" class="mb-2 hide form-control " accept="application/pdf" >
                    </label>
                    
                    @if(in_array($studentCourseApplyFor['college_id'],$applicationclgSignedDocDocuments))
                    <span class="text-success">Uploaded</span>
                    @endif
                    <div class="error"></div>
                  </div>
                  </div>
              </div>
            </form>
              @endif
              @endif
              @endforeach
              @endif
            <hr>
            <div class="text-center">
                <label>Total Applications Fee</label>
                <h2><small></small> </h2>
            
            </div>
          </div>
          <div class="modal-footer">
            
                <span><b>Total Applications Fee : <small></small> </b></span>
            <a href="javascript:;" id="paymentcompleteApplication" class="btn btn-warning" style="background: linear-gradient(rgb(231, 120, 23), rgb(216, 13, 5)); color: white;">Proceed to pay</a>
          </div>
        </div>