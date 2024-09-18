<template>
    <div class="container search" >
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <select class="mb-2 form-control bgColorGray"  disabled v-if="SessionStatus"  v-on:change="onCountryChange()" v-model="country_id"  name="country_id" id="country_id" >
                            <option value=''> Select country</option>
                                <option v-for="country in countries" v-bind:value="country.id" >{{country.name}}</option>
                        </select>
                        <select class="mb-2 form-control bgColorGray" v-if="!SessionStatus"  v-on:change="onCountryChange()" v-model="country_id"  name="country_id" id="country_id" >
                            <option value=''> Select country</option>
                                <option v-for="country in countries" v-bind:value="country.id" >{{country.name}}</option>
                        </select>
                    </div>


                    <div class="col-md-4" v-if="country_id != 38">
                        <select class="mb-2 form-control bgColorGray" disabled v-if="SessionStatus"  name="qualifications_id" v-on:change="onCountryChange()" v-model="qualifications_id"  >
                            <option value=''> You want to study</option>
                            <option v-bind:value='qualification.id' v-for="qualification in qualifications">{{qualification.name}}</option>
                        </select>
                        <select class="mb-2 form-control bgColorGray" v-if="!SessionStatus"  name="qualifications_id" v-on:change="onCountryChange()" v-model="qualifications_id"  >
                            <option value=''> Select Qualification</option>
                            <option v-bind:value='qualification.id' v-for="qualification in qualifications" v-if="country_id == qualification.country">{{qualification.name}}</option>
                        </select>
                    </div>

                     <div class="col-md-4" v-if="country_id == 38">
                        
                        <select class="mb-2 form-control bgColorGray"  name="courseLevel_id" v-model="courseLevel_id"  >
                            <option value=''> Select Course level</option>
                            <option v-bind:value='courseLevel.id' v-for="courseLevel in this.courseLevels" >{{courseLevel.name}}</option>
                        </select>
                    </div>   


                    <div class="col-md-4">
                       
                        <select class="mb-2 form-control bgColorGray" name="subjects_id" v-model="subjects_id" >
                            <option value=''> Select Category</option>
                            <option v-bind:value='subject.id' v-for="subject in this.subjects"> {{subject.name}}</option>
                        </select>
                    </div>   
                </div> 
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="isItetsClass">
                            <div class="row">
                                <div class="col-md-9">
                                    <label v-if="country_id == 230">
                                        Are you looking for IELTS / PTE waiver ?
                                    </label>
                                    <label v-else>
                                        IELTS Score ?
                                    </label>
                                </div>
                                <div class="col-md-3" v-if="country_id == 230">
                                    <input type="radio" name="isIlets" id="ielts"  v-on:click="onIsNoIletsClick()" value="yes"  class="mb-2 bgColorGray onIsNoIletsClick" v-model="ieltsWaiver_id"  > <span   v-on:click="onIsNoIletsClick()">Yes  &nbsp;</span>
                                    <input type="radio" name="isIlets" id="ielts"   v-on:click="onIsIletsClick()"  class="mb-2 bgColorGray isIletsCheck" value="no" v-model="ieltsNotWaiver_id"> <span>No &nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <div id="isIletsShow"  :class="country_id == 38?'':'displayNone'" v-if="!SessionStatus">
                            <div class="form-group row">    
                                <div class="col-sm-12">
                                    <select class="mb-2 form-control bgColorGray" name="iletsScore_id"   v-model="iletsScore_id" >
                                        <option value=''> Select IELTS/PTE Score</option>
                                        <option :value="iletsScore.id" v-for="iletsScore in iletsScores">{{iletsScore.name}}</option>
                                    </select>
                                    <div id="isEScoreHide" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="isIletsShow"  :style="testCount > 0 ? 'display:block!important' : 'display:none '">
                            <div class="form-group row">    
                                <div class="col-sm-12">
                                    <select class="mb-2 form-control bgColorGray" name="iletsScore_id"   v-model="iletsScore_id" >
                                        <option value=''> Select IELTS/PTE Score</option>
                                        <option :value="iletsScore.id" v-for="iletsScore in iletsScores">{{iletsScore.name}}</option>
                                        
                                    </select>
                                    <div id="isEScoreHide" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="onIsNoIletsShow" class="displayNone" v-if="!SessionStatus">
                            <div class="form-group row">  
                                <div class="col-sm-12">
                                    <select class="mb-2 form-control bgColorGray" name="englishScore"  v-model="englishScore_id" >
                                        <option value=''> Select English 12th Score</option>
                                        <option :value="englishScore.id" v-for="englishScore in englishScores">{{englishScore.score}}</option>
                                        
                                    </select>
                                    <div id="isEScoreHide" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="onIsNoIletsShow" v-if="SessionStatus" :style="testCount == 0 ? 'display:block!important' : 'display:none '">
                            <div class="form-group row">    
                                <div class="col-sm-12">
                                    <select class="mb-2 form-control bgColorGray" name="englishScore"  v-model="englishScore_id" >
                                        <option value=''> Select English 12th Score</option>
                                        <option :value="englishScore.id" v-for="englishScore in englishScores">{{englishScore.score}}</option>
                                    </select>
                                    <div id="isEScoreHide" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="col-md-4" >
                        <div class="isItetsClass">
                            <label>
                                <input type="checkbox" name="isMath" id="isMathCheck" v-on:click="onIsMathClick()"  class="mb-2 "  > <span> Have you studied Maths in Senior Secondary (12th) ?</span>
                            </label>
                        </div>
                        <div id="isMathShow" class="displayNone">
                            <div class="form-group row">    
                                <div class="col-sm-12">
                                     <select class="mb-2 form-control bgColorGray"  name="mathScore_id" v-model="mathScore_id" >
                                        <option value=''> Select Maths Score</option>
                                        <option :value="mathScore.id" v-for="mathScore in mathScores">{{mathScore.name}}</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4" >
                        <select class="mb-2 form-control bgColorGray"  name="intake" v-model="intake_id" >
                                        <option value=''> Select Intake</option>
                            <option v-for="intake in intakes" :id="'intake'+intake.id"  :value="intake.id" >{{intake.name}}</option>
                       
                        </select>
                        
                    </div>   
                      
                </div> 
                <br> 
                <div class="row">
                        <div class="col-md-12">
                            <div class="app-header__content" >
                                    <div class="app-header-left">
                                        <div class="search-wrapper active" style=" width:100%!important;">
                                            <div class="input-holder "  style=" width:100%!important;">
                                                <input type="text" class="search-input" name="search" v-model="search" placeholder="Type to search">
                                                <button type="button" class="search-icon"><span></span></button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>   
                    </div> <br>
                    <p class="text-center" style="color: #da251d;"><b>You can select maximum 5 programs to apply </b></p>
                    <div class="row" >

                        <div class="col-md-4 mb-3" v-for="(aplcrs,index) in appliedCourseDetailedArray">
                            <div>
                                <div class="app-header__content">
                                    <div class="app-header-left card text-center">
                                        <div class="search-wrapper active" style="width: 100% !important; padding:10px;">
                                            <strong v-if="aplcrs.course"> {{aplcrs.course.name}} </strong><br>
                                             <small v-if="aplcrs.course" >Institute : {{aplcrs.course.college_name}}</small>
                                           <button  class="badge badge-danger mr-2 btnCancel " v-if="student.lock_status != '1'" style="cursor:pointer" :id="'applyFor'+aplcrs"  v-on:click="applyForCancel(aplcrs.course_id)"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="coursesLength > '0'">
                        <div class="col-sm-12"  v-if="!SessionStatus">
                                <div class="clearBtnDiv float-left" v-on:click="clearFilter()">
                                    Clear Filter 
                                </div>
                               
                                <div v-if="studentName != ''" class="float-right aplyForC">
                                    &nbsp;<button class="btn btn-success">Apply For {{appliedCourse.length}} Course </button> 
                                </div>
                        </div>
                             <div class="col-sm-12 col-lg-3">
                                <div class="app-sidebar sidebar-shadow positionUnset">
                                        <div class="app-header__logo">
                                            <div class="logo-src"></div>
                                            <div class="header__pane ml-auto">
                                                <div>
                                                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                                        <span class="hamburger-box">
                                                            <span class="hamburger-inner"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="app-header__mobile-menu">
                                            <div>
                                                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                                    <span class="hamburger-box">
                                                        <span class="hamburger-inner"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="app-header__menu">
                                            <span>
                                                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                                    <span class="btn-icon-wrapper">
                                                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                                                    </span>
                                                </button>
                                            </span>
                                        </div>    
                                        <div class="scrollbar-sidebar">
                                            <div class="app-sidebar__inner">
                                                <ul class="vertical-nav-menu">
                                                    <li class="app-sidebar__heading">Institutes</li>
                                                    <li class="sidebar__headingChild">
                                                        <a href="javascript:;" class="toogleMain">
                                                            <i class="metismenu-icon pe-7s-home"></i>
                                                            Institutes
                                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left toogleMain"></i>
                                                        </a>
                                                        <ul class="displayNone"> 
                                                            <li v-for="(college,index) in colleges">
                                                                <a href="javascript:;" class="capitalize">
                                                                    <i class="metismenu-icon">
                                                                    </i>
                                                                    <input type="checkbox" :id="'collegeID'+college.id" name="colleges_id" v-on:click="onColleges_id(index,college.id)" >
                                                                    <label :for="'collegeID'+college.id">{{college.name}}</label>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                     <li class="app-sidebar__heading">Locations</li>
                                                    <li class="sidebar__headingChild">
                                                        <a href="javascript:;" class="toogleMain">
                                                            <i class="metismenu-icon pe-7s-map-marker"></i>
                                                            Location
                                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left toogleMain"></i>
                                                        </a>
                                                        <ul class="displayNone"> 
                                                            
                                                            <li v-for="(state,index) in states">
                                                                <a href="javascript:;" class="capitalize">
                                                                    <i class="metismenu-icon">
                                                                    </i>
                                                                    <input type="checkbox" :id="'statesId'+state.id" name="states_id" v-on:click="onStates_id(index,state.id)" >
                                                                    <label :for="'statesId'+state.id">{{state.name}}</label>
                                                                </a>
                                                            </li>
                                                           
                                                        </ul>
                                                    </li>
                                                    <li class="app-sidebar__heading">Filter by:</li>
                                                      
                                                      
                                                    <li class="sidebar__headingChild">
                                                        <a href="javascript:;" class="toogleMain">
                                                            <i class="metismenu-icon pe-7s-graph3"></i>
                                                            Program Length
                                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left toogleMain"></i>
                                                        </a>
                                                        <ul class="displayNone"> 
                                                            <li v-for="(programLength,index) in programLengths">
                                                                <a href="javascript:;">
                                                                    <i class="metismenu-icon">
                                                                    </i>
                                                                    <input name="programLength" type="checkbox" :id="'programLength'+programLength.id" v-on:click="onProgramLength_id(index,programLength.id)" >
                                                                    <label :for="'programLength'+programLength.id">{{programLength.name}}</label>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                
                                                   <!--  <li class="sidebar__headingChild">
                                                        <a href="javascript:;" class="toogleMain">
                                                            <i class="metismenu-icon pe-7s-date"></i>
                                                            Intake / Start Date
                                                            <i class="metismenu-state-icon pe-7s-angle-down caret-left toogleMain"></i>
                                                        </a>
                                                        <ul class="displayNone">
                                                            <li v-for="intake in intakes">
                                                                <a href="javascript:;">
                                                                    <i class="metismenu-icon">
                                                                    </i>
                                                                    <input name="intake" type="radio" :id="'intake'+intake.id" :value="intake.id" v-model="intake_id"> 
                                                                    <label :for="'intake'+intake.id">{{intake.name}}</label>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li> -->
                                                </ul>
                                            </div>
                                            <div class="margin-top-40">&nbsp;</div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="col-sm-12 col-lg-9">
                                    <div class="card-hover-shadow-2x mb-3 card totalCourseDivMain">
                                            <div class="totalCourseDiv float-right">
                                                    {{filterCourse.length}} of {{courses.length}}
                                                </div>
                                        <div class="scroll-area-lg " style="height: auto !important;max-height: 1400px !important;">
                                            <perfect-scrollbar class="ps-show-limits">
                                                <div style="position: static;" class="">
                                                    <div class="ps-content">
                                                        <ul class="todo-list-wrapper list-group list-group-flush" id="exampleAccordion">
                                                            <div v-for="course in paginedCandidates" class="searchListBody" :key="course.id">
                                                                <li class="list-group-item searchLi" :id="'print'+course.id">
                                                                    <div class="todo-indicator bg-success"></div>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading"><h5 class="mainBgColor"><strong >{{course.name}}</strong> <small> <a :href="course.program_weblink" target="_blank"> <i class="fa fa-link"></i></a></small><span class="float-right "><i class="fa fa-print" v-on:click="printDiv('print'+course.id)"></i></span></h5>
                                                                                    <div class="capitalize filterCourseSetting">{{course.college_name}}</div>
                                                                                </div>
                                                                                <div class="row searchLiRow">
                                                                                    
                                                                                    <div class=" col-md-4 capitalize " v-if="course.course_levels"><strong>Program Level:</strong> {{course.course_levels.name}}<span class="float-right">|</span></div>
                                                                                    <div class=" col-md-4 capitalize " > <strong>Duration:</strong>
                                                                                        <span v-if="course.durationText">{{course.durationText}} </span>
                                                                                        <span v-if="!course.durationText">TC</span>
                                                                                        <span class="float-right">|</span></div>
                                                                                    <!-- <div class=" col-md-3 capitalize "><strong>Fees:</strong>  {{course.tution_fee}}<span class="float-right">|</span></div> -->
                                                                                    <div class=" col-md-4 capitalize "><strong>Intake:</strong>
                                                                                    
                                                                                        <span >{{course.intakes.name}} </span>
                                                                                        
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-content-right">
                                                                                <span>{{course.countrys.currency_icon_name}} &nbsp;<b>{{course.application_fee}}</b>&nbsp; </span>
                                                                                <button  class="badge badge-success applyStatus mr-2 " style="cursor:pointer" :id="'applyFor'+course.id" v-if="studentName != '' && appliedCourse.includes(String(course.id)) == false && appliedCourse.length <= 4 && isUpdate == 'no'" v-on:click="applyFor(course.id)">Apply</button>
                                                                                <button  class="badge badge-danger mr-2 btnCancel" style="cursor:pointer" :id="'applyFor'+course.id" v-if="studentName !='' && appliedCourse.includes(String(course.id)) == true && student.lock_status != '1'"    v-on:click="applyFor(course.id)">cancel</button> 
                                                                                 <button  class="badge badge-success applyStatus mr-2 " style="cursor:pointer" :id="'applyFor'+course.id" v-if="studentName != '' && appliedCourse.includes(String(course.id)) != true && appliedCourse.length <= 5 && student.lock_status == '1' && isUpdate != 'no'" v-on:click="applyFor(course.id)">Update</button>

                                                                            </div>
                                                                            <div class="widget-content-right">
                                                                                <button type="button" class="border-0 btn-transition btn btn-outline-success m-0 p-0 btn btn-link collapsed" aria-expanded="false" aria-controls="exampleAccordion" data-toggle="collapse" :href="'#collapseExample'+course.id" v-on:click="getCourseDetail(course.id)" >
                                                                                    <fa name="check" data-toggle="tooltip" title="View Details" _nghost-c2=""><i _ngcontent-c2="" aria-hidden="true" class="fa fa-arrow-down "></i></fa>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                              <li class="list-group-item" style="padding:0 20px 0px 20px;">
                                                                        <div class="todo-indicator bg-success"></div>
                                                                        <div data-parent="#exampleAccordion" :id="'collapseExample'+course.id" class="collapse">
                                                                          <table>
                                                                                    <div class="row filterBorderBottamDetail ">
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12   padding-10px"><h5><strong>Program Details </strong><span class="badge badge-warning"> {{course.course_unique_id}}</span></h5></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row ">
                                                                                                <div class="col-md-12 borderDottedGray padding-10px" style="text-align: -webkit-center;"  v-if="course.college_name"> <div class="image-100-preview" v-if="course.college_name">
                                                                                                    <!-- <img  v-bind:src="'/' + course.college.attachment.path+'/'+course.college.attachment.name" class="img-radius" /> -->
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail " v-if="course.college_name">
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong style="color:#575e64;">Institute Name</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course.college_name"><small> {{course.college_name}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row ">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Program Category</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><small> {{subjects_name}} </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" v-if="course.qualification">
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Qualification</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="qualificationName"><small> {{qualificationName}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                         <div class="col-md-6 ">
                                                                                            <div class="row " >
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Intake</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><small>{{intakesName}} </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail"  v-if="course.college_name">
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Institute Status</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course.college_name"><small> {{school_typeName}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " v-if="course.college_name">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Internship</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course"><small> {{course.internship}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail"  >
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Duration</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course.durationText"><small> {{course.durationText}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " >
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Application Fee</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="currencyName" ><small>{{currencyName}} <span v-if="course.application_fee" >{{course.application_fee}}</span> <span v-else >0</span></small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail"  >
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>IELTS Score</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="ilets_scoresName"><small> {{ilets_scoresName}} </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " v-if="course.application_fee">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Intake</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course.isIlets" ><small>{{course.isIlets}}</small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" v-if="course.isIlets == 'yes'">
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>English Score Required In HSC(12th)</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="getenglish_scoreName" >{{getenglish_scoreName}}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " v-if="course.application_fee">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Tution Fee (Estimated)</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="course.tution_fee" ><small> 
                                                                                                    <span v-if="course.tution_fee == 0">TBC</span>
                                                                                                    <span v-if="course.tution_fee != 0">{{currencyName}} {{course.tution_fee}}</span>
                                                                                                    </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" >
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Math Score</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="getmath_scoreName" ><small>{{getmath_scoreName}} </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " v-if="course.application_fee">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Scholarship</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><small v-if="course.scholarship" ><a :href="course.scholarship">{{course.scholarship}}</a></small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" >
                                                                                         <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Additional Requirement / Information</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><p>{{course.note}} </p></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row ">
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Academic Requirement</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><p>{{course.academicRequirement}} </p></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" >
                                                                                        <div class="col-md-6 courseDetail">
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Work Experience</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><p>{{course.workexp}} </p></div>
                                                                                            </div>
                                                                                        </div>
                                                                                       
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row ">
                                                                                                <div class="col-md-6 borderDottedGray  padding-10px"><strong>Location</strong></div>
                                                                                                <div class="col-md-6 padding-10px" v-if="cityName" ><p>{{cityName}} </p></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row filterBorderBottamDetail" >
                                                                                        <div class="col-md-6 ">
                                                                                            <div class="row " >
                                                                                                <div class="col-md-6 borderDottedGray padding-10px"><strong>Program Title</strong></div>
                                                                                                <div class="col-md-6 padding-10px" ><small>{{course.programTitle_name}}  </small></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                            </table> 
                                                                        </div>
                                                                </li>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 296px;"></div>
                                                    </div>
                                                </div>
                                            </perfect-scrollbar>
                                        </div>
                                    </div>
                                    <div class="paginate">
                                        
                                    <button v-for="n in numPages"  @click="setPage(n)" >{{ n }}</button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row text-center" v-if="coursesLength == '0'">
                                <div class="col-md-12">
                                    <p class="text-danger">No Program Found</p>
                                </div>
                            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data(){
            return {
                 page: 0,
                itemsPerPage: 70,
                abc:'',
                coursesDetailhtml:'',
                courses:{},
                coursesLength:'',
                country_id:'',
                countries:{},
                states:{},
                colleges:{},
                colleges_id:[{}],  
                collegesCheck:true,  
                qualifications:'',
                qualifications_id:'',
                programLengths:{},
                programLength_id:'',
                programCheck:true,
                subjects:{},
                subjects_id:'',
                courseLevels:{},
                courseLevel_id:'',
                iletsScores:{},
                iletsScore_id:'',
                ilets_score_check:true,
                testCount:'',
                englishScores:{},
                englishScore_id:'',
                search:"",
                mathScores:{},
                mathScore_id:'',
                mathScore_check:true,
                collegeArray:[],
                onProgramLengthArray:[],
                onCourseLevelArray:[],
                courseCheck:true, 
                onStatesArray:[],
                stateCheck:true,
                scholarship_id:'',
                scholarshipCheck:true,
                intakes:'',
                ieltsWaiver:'',
                ieltsWaiver_id:'',
                ieltsNotWaiver_id:'',
                ieltsWaiverCheck:true,
                intake_id:'',
                intakeCheck:true,
                TheSubjectCheck:true,
                TheCourse_level:true,
                applicationFee_id:'',
                applicationFeeCheck:true,
                tuitionFee_id:'',
                tution_fee_check:true,
                englishscorecheck:true,
                SessionStatus:false,
                studentId:false,
                studentName:'',
                isUpdate:'no',
                student:'',
                istestCheck:'no',
                ismathCheck:'no',
                courseRemove:'',
                universities:'',
                appliedCourse:[],
                appliedCourseDetailedArray:{},

                // DetailS VALUES
                subjects_name:'',
                qualificationName:'',
                course_levelsName:'',
                currencyName:'',
                ilets_scoresName:'',
                school_typeName:'',
                getenglish_scoreName:'',
                getmath_scoreName:'',
                cityName:'',
                intakesName:'',
            }
        },
        created(){
             
            this.getSession();
            this.countrylist();
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods:{
               setPage(page) {
                  this.page = page-1;
                  this.paginedCandidates = this.paginate()
                },
                paginate() {
                  return this.filterCourse.slice(this.page*this.itemsPerPage, this.itemsPerPage * this.page + this.itemsPerPage)        
                },

            clearFilter(){
                this.mathScore_id ='';
                this.englishScore_id ='';
                this.iletsScore_id ='';
                this.search ='';
                
                this.programLength_id ='';
                
                this.colleges_id ='';
               
                this.schoolType_id ='';
                this.scholarship_id ='';
                this.intake_id ='';
                this.applicationFee_id ='';
                this.tuitionFee_id ='';
                
                this.ieltsWaiver ='';
                this.ieltsWaiver_id ='';
                this.ieltsNotWaiver_id ='';
                this.collegeArray = [];
                this.onProgramLengthArray = [];
                this.onCourseLevelArray = [];
                this.onStatesArray = [];

                var x = document.getElementById("isIletsShow");
                if(this.country_id == 230){
                x.style.display = "none";

                }else{
                x.style.display = "block";


                }
               
                var y = document.getElementById("onIsNoIletsShow");
                y.style.display = "none";
                
                var checkboxescolleges_id =  document.getElementsByName("colleges_id");
                for(var i=0, n=checkboxescolleges_id.length;i<n;i++) {
                checkboxescolleges_id[i].checked = false;
                }
                var checkboxesprogramLength =  document.getElementsByName("programLength");
                for(var i=0, n=checkboxesprogramLength.length;i<n;i++) {
                checkboxesprogramLength[i].checked = false;
                }
                var checkboxescourseLevel =  document.getElementsByName("courseLevel");
                for(var i=0, n=checkboxescourseLevel.length;i<n;i++) {
                checkboxescourseLevel[i].checked = false;
                }
                var checkboxesstates_id =  document.getElementsByName("states_id");
                for(var i=0, n=checkboxesstates_id.length;i<n;i++) {
                checkboxesstates_id[i].checked = false;
                }
            },
            countrylist(){
                    axios.get('/search/countries').then( (response)=>{
                    this.countries = response.data.countries;
                    this.qualifications = response.data.qualification;
                    this.subjects = response.data.subjects;
                });
            },
            onColleges_id(index,collegeId){
                let isExistValue = this.collegeArray.includes(String(collegeId));
                if(isExistValue === true){

                    let ind = this.collegeArray.indexOf(String(collegeId));
                    this.collegeArray.splice(ind,1);
                }else{
                    this.collegeArray.push(String(collegeId));
                    
                }
            },
            onProgramLength_id(index,onProgramLengthId){
                let onProgramLengthIds = String(onProgramLengthId);
               
                let isExistValue = this.onProgramLengthArray.includes(onProgramLengthIds);
                if(isExistValue === true){

                    let ind = this.onProgramLengthArray.indexOf(onProgramLengthIds);
                    this.onProgramLengthArray.splice(ind,1);
                }else{
                    this.onProgramLengthArray.push(onProgramLengthIds)
                }
            },
            onCourseLevel_id(index,onCourseLevelId){
                console.log(index,onCourseLevelId);
                let onCourseLevelIds = String(onCourseLevelId);
                let isExistValue = this.onCourseLevelArray.includes(onCourseLevelIds);
                if(isExistValue === true){

                    let ind = this.onCourseLevelArray.indexOf(onCourseLevelIds);
                    this.onCourseLevelArray.splice(ind,1);
                }else{
                    this.onCourseLevelArray.push(onCourseLevelIds)
                   
                }
            },
            onStates_id(index,onStatesId){
                let onStatesIds = String(onStatesId);
              
                let isExistValue = this.onStatesArray.includes(onStatesIds);
                if(isExistValue === true){

                    let ind = this.onStatesArray.indexOf(onStatesIds);
                    this.onStatesArray.splice(ind,1);
                }else{
                    this.onStatesArray.push(onStatesIds)
                }
            },
            onIsIletsClick(){
                this.iletsScore_id ='';
                this.ieltsWaiver ='';
                this.englishScore_id ='';
            },
            onIsNoIletsClick(){
                this.englishScore_id ='';
                this.ieltsWaiver ='yes';
                this.iletsScore_id ='';
            },
            onIsMathClick(){
                this.mathScore_id ='';
            },
            printDiv(id) { 
                var divContents = document.getElementById(id).innerHTML; 
                var a = window.open('', '', 'height=800, width=800'); 
                a.document.write('<html>'); 
                a.document.write('<body > <h1>Prograam Detail <br>'); 
                a.document.write(divContents); 
                a.document.write('</body></html>'); 
                a.document.close(); 
                a.print(); 
            }, 
            onClickPrint(){
              
                document.getElementById('print').print();
                
            },
            applyForCancel(courseId){
                this.courseRemove = 'cancel'; 
                this.applyFor(courseId);
            },

            applyFor(courseId){
                        if(this.courseRemove){
                            var text = this.courseRemove;
                        }else{

                        var text = document.getElementById('applyFor'+courseId).textContent;
                         }
                         if(text == 'cancel'){
                             let ScourseId = String(courseId);
                             let inds = this.appliedCourse.indexOf(ScourseId);
                            this.appliedCourse.splice(inds,1);
                            
                            console.log(this.appliedCourse);
                            
                            
                         }
                        var body = $("body");
                        document.body.classList.add("loading");
                    axios.get('search/applyFor/'+this.studentId+'/'+this.country_id+'/'+courseId+'/'+text).then(response => {
                        let applycode = response.data.code;
                            let selectedCorseID = String(courseId);
                                document.body.classList.remove("loading");
                            if(applycode == true){
                            console.log(this.appliedCourse);
                                this.appliedCourse.push(selectedCorseID);
                                this.appliedCourseDetailedArray = response.data.appliedCoureseArray;
                                console.log('this.appliedCoursehello');
                                console.log(this.appliedCourse);
                            console.log(this.appliedCourseDetailedArray);
                                document.getElementById('applyFor'+courseId).innerHTML ='cancel';
                                document.getElementById('applyFor'+courseId).style.background = 'tomato';
                                var element = document.getElementById('applyFor'+courseId);
                                element.classList.remove("applyStatus");
                            }
                            if(applycode == false){
                                document.getElementById('applyFor'+courseId).style.background = 'tomato';
                                document.getElementById('applyFor'+courseId).innerHTML ='cancel';
                                alert('This student is already Applied for this course.');
                            }
                            if(applycode == 'update'){
                                this.appliedCourseDetailedArray = response.data.appliedCoureseArray;
                            }
                            if(applycode == 'delete'){
                                this.appliedCourseDetailedArray = response.data.appliedCoureseArray;
                                document.getElementById('applyFor'+courseId).style.background = '#3ac47d';
                                document.getElementById('applyFor'+courseId).innerHTML ='Apply';
                                var element = document.getElementById('applyFor'+courseId);
                                element.classList.add("applyStatus");
                                 var cells = document.getElementsByClassName('applyStatus');
                                for (var i = 0; i < cells.length; i++) { 
                                    cells[i].disabled = false;
                                }
                            }
                            if(applycode == 'complete'){
                               var cells = document.getElementsByClassName('applyStatus');
                                for (var i = 0; i < cells.length; i++) { 
                                    cells[i].disabled = true;
                                }
                                alert('Student Can Apply For 5 Course Only.');
                            }

                            if(this.appliedCourse.length < 1){
                                document.getElementById('subRequest').style.display='none';
                                document.getElementById('subRequests').style.display='none';
                            }else{

                                document.getElementById('subRequest').style.display='block';
                                document.getElementById('subRequests').style.display='block';
                                if(this.appliedCourse.length == 1){
                                     var pendProg = (5 - this.appliedCourse.length );
                                     if(pendProg == 1){

                                    document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Program Or select '+pendProg+' Program' ;
                                     }else{
                                    document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Program Or select '+pendProg+' Programs' ;

                                     }
                                }else{
                                     var pendProg = (5 - this.appliedCourse.length );
                                      if(pendProg == 1){

                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' programs Or select '+pendProg+' Program';
                                     }else{
                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' programs Or select '+pendProg+' Programs';

                                     }

                                }
                            }
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.updateErrors = error.response.data.errors || {};
                            }
                    });
            },
            getSession(){
                
                    axios.get('sessionStatus/search').then(response => {
                        this.SessionStatus = response.data.code;
                                console.log(response.data);
                            if(this.SessionStatus == true){
                                this.country_id = response.data.countryId;
                                this.studentId = response.data.studentId;
                                this.student = response.data.students;
                                this.studentName = response.data.studentName;
                                this.isUpdate = response.data.isUpdate;
                                
                                if(response.data.countryId != '38'){
                                    this.qualifications_id = parseInt(response.data.FapplingForLevel);
                                }
                                this.courseLevel_id = parseInt(response.data.courseLevel_id);
                                this.appliedCourseDetailedArray = response.data.appliedCoureseArray;
                                this.onCountryChange();
                                    this.appliedCourse = response.data.acourse;
                                    
                                    if(response.data.testCount > 0){
                                        this.onIsIletsClick();
                                        this.istestCheck = 'yes';
                                        this.testCount = response.data.testCount;
                                        this.ieltsNotWaiver_id = 'no';
                                        this.iletsScore_id = response.data.testIelts;
                                    }else{
                                        this.ieltsWaiver_id = 'yes';
                                        this.isNottestCheck = 'yes';
                                        this.englishScore_id =  response.data.students.englishScore;
                                    }
                                    if(response.data){
                                        if(response.data.students){
                                            if(response.data.students.mathScore){
                                                this.onIsMathClick();
                                               
                                                
                                                
                                            }
                                        }
                                    }
                                     if(this.appliedCourse.length == 1){
                                        var pendProg = (5 - this.appliedCourse.length );
                                        if(pendProg == 1){

                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Program Or select '+pendProg+' Program';
                                        }else{

                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Program Or select '+pendProg+' Programs';
                                        }
                                    }else{
                                        var pendProg = (5 - this.appliedCourse.length );
                                         if(pendProg == 1){
                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Programs Or select '+pendProg+' Program' ;

                                         }else{

                                        document.getElementById('subRequests').text='continue with '+this.appliedCourse.length+' Programs Or select '+pendProg+' Programs' ;
                                         }

                                    }
                              
                            }
                        
                    });
                
            },
            clearStudent(){
                
                // document.getElementByName("colleges_id").checked = true;
                    axios.get('sessionStatus/remove').then(response => {
                        this.SessionStatus = response.data.code;
                            if(this.SessionStatus == true){
                                this.country_id = '';
                                this.studentId = '';
                                this.studentName = '';
                            }
                        
                    }).catch(error => {
                        if (error.response.status === 422) {
                        this.updateErrors = error.response.data.errors || {};
                            }
                    });
                
            },
            onCountryChange(){
                    if(this.country_id){
                
               
                    var body = $("body");
                    document.body.classList.add("loading1");
                    
                    this.clearFilter();
                                        
                    axios.post('/search', {'country_id':this.country_id } ).then(response => {
                        
                        document.body.classList.remove("loading1");
                      
                        this.courses = response.data.courses;
                              
                        this.coursesLength = response.data.courses.length;
                        this.colleges = response.data.colleges;
                       
                        this.programLengths = response.data.programLengths;
                       
                        this.courseLevels = response.data.courseLevels;
                        this.iletsScores = response.data.iletsScores;
                        this.mathScores = response.data.mathScores;
                        this.englishScores = response.data.englishScores;
                        this.student = response.data.student;
                        this.intakes = response.data.intakes;
                        this.states = response.data.states;
                        this.universities = response.data.universities;
                        document.body.classList.remove("loading");
                       });
                
                
                }
                    
                
               
            },
             getCourseDetail(course_id){
                   

                    if(course_id){
                    
                    axios.post('/search/getCourseDetail', {'course_id':course_id } ).then(response => {
                        
                        
                        this.subjects_name = response.data.courses.subjects.name;
                        this.qualificationName = response.data.courses.qualifications.name;
                        this.course_levelsName = response.data.courses.course_levels.name;
                        this.currencyName = response.data.courses.college.country.currency_icon_name;
                        this.ilets_scoresName = response.data.courses.ilets_scores.name;
                        if(response.data.courses.getenglish_score){
                        this.getenglish_scoreName = response.data.courses.getenglish_score.score;
                        }
                        if(response.data.courses.getmath_score){
                            this.getmath_scoreName = response.data.courses.getmath_score.name;
                        }
                        this.school_typeName = response.data.courses.college.school_type.name;
                        this.cityName = response.data.courses.states.name;
                        this.intakesName = response.data.courses.intakes.name;
                       
                       });
                
                
                }
                    
                
               
            },
        },
        computed:{
            numPages() {
              return Math.ceil(this.filterCourse.length/this.itemsPerPage);
            },
            filterCourse:function(event){
                
                        console.log('filter oda');
                this.iletsScore_id = String(this.iletsScore_id);
                this.colleges_id = String(this.colleges_id);
                
                this.search = this.search.toLowerCase();
                return this.courses.filter((course)=>{
                    
                        
                    if(this.onCourseLevelArray.length > 0){
                        console.log('filter oda');
                       this.courseCheck = this.onCourseLevelArray.includes(String(course.course_level));
                       if(course.course_level == '3'){
                        console.log('3');
                         this.courseCheck = true;
                       }
                    }else{
                         this.courseCheck = true;
                    }
                    if(this.onProgramLengthArray.length > 0){
                       this.programCheck = this.onProgramLengthArray.includes(course.program_length);
                    }else{
                         this.programCheck = true;
                    }

                    if(this.collegeArray.length > 0){
                    
                       this.collegesCheck = this.collegeArray.includes(String(course.college_id));
                    }else{
                         this.collegesCheck = true;
                    }
                    if(this.onStatesArray.length > 0){
                        console.log(course.state);
                        console.log(this.onStatesArray);
                       this.stateCheck = this.onStatesArray.includes(String(course.state));
                    }else{
                         this.stateCheck = true;
                    }
                   
                      
                    if(this.intake_id ){
                            
                            // if(course.merge_intake_id == this.intake_id){
                            //     this.intakeCheck =true;
                            // }else{
                                
                            //     this.intakeCheck = false;
                            // }

                        if(!course.merge_intake_id && !this.intake_id ){
                            this.intakeCheck =true; //alert('00'+ course.intake);
                        }else if(!course.merge_intake_id && this.intake_id){
                            this.intakeCheck =false;
                        }else{
                            this.intakeCheck = course.merge_intake_id.match(String(this.intake_id));
                        }
                    }
                 

                if(this.mathScore_id == 'null'){
                        this.mathScore_check = course.isMath.match('no');
                    }else{
                        if(!course.mathScore && !this.mathScore_id ){
                            this.mathScore_check = true; //alert('00'+ course.mathScore);
                        }else if(!course.mathScore && this.mathScore_id){
                            this.mathScore_check =false;
                        }else{
                            if(course.mathScore && !this.mathScore_id){
                                this.mathScore_check = true;
                            }else{
                                if(parseInt(course.mathScore) <= parseInt(this.mathScore_id)){
                                    this.mathScore_check = true;
                                }else{
                                this.mathScore_check =false;
                                }

                            }

                        }
                } 
                  
                   
                    if(!course.ilets_score && !this.iletsScore_id ){
                        this.ilets_score_check =true; //alert('00'+ course.ilets_score);
                    }else if(!course.ilets_score && this.iletsScore_id){
                        this.ilets_score_check =false;
                    }else{
                    
                        if(this.iletsScore_id){

                            this.ilets_score_check = Number(course.ilets_score) <= Number(this.iletsScore_id);
                        }
                    }

                    
                    if(!course.english_score && !this.englishScore_id ){
                        this.englishscorecheck = true; //alert('00'+ course.application_fee);
                    }else if(!course.english_score && this.englishScore_id ){
                        this.englishscorecheck =false;
                    }else{
                      
                        if(course.english_score && !this.englishScore_id ){
                            this.englishscorecheck = true;

                        }else{
                            if(this.englishScore_id){
                                this.englishscorecheck  = Number(course.english_score) <= this.englishScore_id;
                            }
                        }

                    }
                    if(!course.isIlets && !this.ieltsWaiver ){
                        this.ieltsWaiverCheck = true; //alert('00'+ course.application_fee);
                    }else if(!course.isIlets && this.ieltsWaiver ){
                        this.ieltsWaiverCheck =false;
                    }else{
                
                        if(this.ieltsWaiver_id){
                            this.ieltsWaiverCheck  = course.isIlets == 'yes';
                        }
                       
                    }
                    
                    
                        if(this.subjects_id){
                            if(String(course.subject) == String(this.subjects_id)){
                              
                                this.TheSubjectCheck = true;
                            }else{
                                this.TheSubjectCheck = false;

                            }
                        }
                        if(this.courseLevel_id){
                        if(this.courseLevel_id == '16'){
                                console.log(this.courseLevel_id);
                                this.TheCourse_level = true;
                        }else{

                            if(String(course.course_level) == String(this.courseLevel_id)){
                              
                                this.TheCourse_level = true;
                            }else{
                                this.TheCourse_level = false;

                            }
                        }
                        }
                    
                    return  course.name.toLowerCase().match(this.search.toLowerCase()) && course.qualification.match(this.qualifications_id) && this.TheSubjectCheck && this.TheCourse_level &&  this.courseCheck && this.ieltsWaiverCheck && this.englishscorecheck && this.ilets_score_check && this.programCheck && this.collegesCheck && this.mathScore_check && this.intakeCheck && this.stateCheck;
                 
                
                });
            },
            paginedCandidates() {
              return this.paginate()
            }
  
            
        }
    }
</script>
