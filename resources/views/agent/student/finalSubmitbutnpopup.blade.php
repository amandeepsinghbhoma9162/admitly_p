@if($student['lock_status'] == 0)
 @if($studentCourseApplyFors->count()>0)
 <button type="button" class="btn btn-primary finalPopbtns hide" data-toggle="modal" data-target="#finalexampleModal" data-whatever="@mdo">Open modal for @mdo</button>
    

    <div class="modal fade" id="finalexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="top:50px;">
        <div class="modal-content">
          <div class="modal-header" style="background: white;border-bottom: none;">
            <!-- <h5 class="modal-title" id="exampleModalLabel">Final submit or Shortlisting </h5> -->
            <button type="button" class=" close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
       
        
         @if($studentCourseApplyFors->count()>0)
                <input type="hidden" id='completeApplicationId' value="{{$student['id']}}">
                <a href="javascript:;" id="completeApplicationPOP" class="btn btn-success btn-shadow  subRequests " style="background:linear-gradient(#e77817, #D80D05);margin:20px;">Click Here to FINAL SUBMIT - @if($studentCourseApplyFors->count()>1)
                    {{$IsCheckedStudentCourseApplyFors->count()}} Applications
                @endif
                @if($studentCourseApplyFors->count()>0 && $studentCourseApplyFors->count()<2)
                    {{$IsCheckedStudentCourseApplyFors->count()}} Application
                @endif
                </a>
          @endif      
          @if(!$student['shortlisting'])
          @if($studentQualifications->count() >= 2)
          @if($studentQualifications->count() == sizeof($qlfyDocumentCheck))
                <h5 class="text-center">OR</h5>
            <a href="{{route('new.student.shortlisting',$student['id'])}}" class="btn btn-success btn-shadow " style="background:linear-gradient(#e77817, #D80D05);margin:20px;padding:20px;">Click Here to Submit application for shortlisting
                </a>
          @endif
          @endif
          @endif
            
              
            
          </div>
        
        </div>
      </div>
    </div>
    @endif
    @endif