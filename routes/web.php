<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    //     return view('admintoffer.index');
    // });

Route::domain('event.admitoffer.com')->group(function (){
   Route::get('/', 'AdmitOfferController@event');
    Route::POST('/eventPOST', 'AdmitOfferController@eventPost')->name('event.post');});

    Route::patch('changepassword/{admin}', 'AdmitOfferController@passwordupdate')->name('admin.password.password');

Route::resource('/orders', 'PaymentController');
Route::get('agent/eagle/signup', 'admin\AgentController@eaglecreate')->name('agent.eagle.signup');
    Route::post('agent/eagle/signup', 'admin\AgentController@eaglestore')->name('agent.eagle.signup.store');

    Route::get('agent/payment/{student_id}/{amount}', 'PaymentController@index')->name('payment')->middleware('agent.auth:agent');
    Route::get('agent/paymentonline/{student_id}/{amount}', 'PaymentController@indexOnline')->name('payment.online')->middleware('agent.auth:agent');
    Route::get('invoice/{student_id}/{amount}', 'PaymentController@invoice')->name('payment.invoice')->middleware('agent.auth:agent');
    Route::POST('agent/mypayment/store', 'PaymentController@store')->name('mypayment.store')->middleware('agent.auth:agent');
    Route::POST('agent/mypayment/copy/upload', 'PaymentController@screentShotUpload')->name('mypayment.screenshot.upload')->middleware('agent.auth:agent');
Route::POST('agent/payment/details', 'PaymentController@paytmCallback')->name('mypayment.callback')->middleware('agent.auth:agent');
Route::get('agent/student/payment/check/{id}', 'PaymentController@apcheck')->name('payment.approve')->middleware('agent.auth:agent');
Route::get('agent/student/payment/checked/{id}', 'PaymentController@apchecked')->name('payment.decline')->middleware('agent.auth:agent');
    // Route::POST('agent/payment/success', 'PaymentController@store')->name('payment.store')->middleware('agent.auth:agent');
Route::post('agent/paysuccess', 'PaymentController@razorPaySuccess')->middleware('agent.auth:agent');
Route::get('agent/razor-thank-you/{id}', 'PaymentController@RazorThankYou')->middleware('agent.auth:agent');
Route::get('/local/search/', 'Search\SearchController@indexLocal')->name('local.search.index');
    Route::get('/', 'AdmitOfferController@index')->name('home');
    Route::get('/event', 'AdmitOfferController@eventhome')->name('event');
    Route::get('/recognition', 'AdmitOfferController@recognition')->name('recognition');
    Route::get('/press-releases', 'AdmitOfferController@pressreleases')->name('press-releases');
    Route::get('/for-recruiters', 'AdmitOfferController@forrecruiters')->name('for-recruiters');
    Route::get('/for-instituties', 'AdmitOfferController@forinstituties')->name('for-instituties');
    Route::get('/for-students', 'AdmitOfferController@forstudents')->name('for-students');
    Route::get('/pricing', 'AdmitOfferController@pricing')->name('pricing');
    Route::get('/blog', 'AdmitOfferController@blog')->name('blog');
    Route::get('/careers', 'AdmitOfferController@careers')->name('careers');
    Route::get('/disclaimer', 'AdmitOfferController@disclaimer')->name('disclaimer');
    Route::get('/myteam', 'AdmitOfferController@myteam')->name('myteam');
    Route::get('/pressreleases', 'AdmitOfferController@pressreleases')->name('pressreleases');
    Route::get('/empowering-student-futures', 'AdmitOfferController@empoweringstudentfutures')->name('empoweringstudentfutures');
    Route::get('/shaping-the-future-of-global-education', 'AdmitOfferController@shapingthefutureofglobaleducation')->name('shapingthefutureofglobaleducation');
    Route::get('/revolutionizing-international-student-recruitment', 'AdmitOfferController@revolutionizinginternationalstudentrecruitment')->name('revolutionizinginternationalstudentrecruitment');



    Route::get('/theme/index', 'AdmitOfferController@themeindex' )->name('theme.index');
    Route::get('/theme/contact', 'AdmitOfferController@themecontact' )->name('theme.contact');
    Route::get('/theme/gallery', 'AdmitOfferController@themegallery' )->name('theme.gallery');
    Route::get('/theme/about-us', 'AdmitOfferController@themeaboutus' )->name('theme.aboutus');
    Route::get('/aboutus', 'AdmitOfferController@aboutus')->name('aboutus');
    Route::get('/admission-overseas/student-inquiry', 'AdmitOfferController@student')->name('student');
    Route::POST('/Studentinquiry/Post', 'AdmitOfferController@studentpost')->name('student.post');
    Route::get('/privacy_policy', 'AdmitOfferController@privacyPolicy')->name('privacy_policy');
    Route::get('/refund_policy', 'AdmitOfferController@refundPolicy')->name('refund_policy');
    Route::get('/termsandconditions', 'AdmitOfferController@termsandconditions')->name('termsandconditions');
    Route::get('/solution', 'AdmitOfferController@solution')->name('solution');
    Route::get('/gallery', 'AdmitOfferController@gallery')->name('gallery');
    Route::POST('/fileUpload', 'AdmitOfferController@fileUpload')->name('fileUpload');
    Route::get('/contactus', 'AdmitOfferController@contactus')->name('contactus');
    Route::get('/webinars', 'AdmitOfferController@webinars')->name('webinars');
    Route::get('/investors', 'AdmitOfferController@Investors')->name('investors');
    Route::get('/holibash', 'AdmitOfferController@canadalaunch')->name('canadalaunch');
    Route::get('/checkUID/{id}', 'AdmitOfferController@checkUid')->name('checkUid');
    //notification
    Route::get('admin/notification','NotificationController@getNotifications')->name('get.notifications');
    Route::get('admin/chat/edit/{id}/{agent_id}','ChatController@edit')->name('chat.edit');
    Route::post('admin/chat/store','ChatController@store')->name('chat.store');
    Route::post('admin/student/chat/store','ChatController@StudentChatstore')->name('student.chat.store');
    Route::get('admin/chatpdf/open/{id}','ChatController@ChatimgOpen')->name('student.chat.ChatimgOpen');
    Route::get('/design', function () {
        return view('design');
    });
    // student chat
    Route::get('admin/student/chat/edit/{id}/{student}','ChatController@Studentedit')->name('student.chat.edit');
    
    
Auth::routes();
    
Route::get('/page/lock', 'AdmitOfferController@lock')->name('pagelock.create');
Route::post('/page/lock', 'AdmitOfferController@unlock')->name('pagelock.store');
Route::get('/page/lock/changepassword', 'AdmitOfferController@changePassword')->name('pagelocker.changepassword');
Route::POST('/page/lock/changepassword', 'AdmitOfferController@changePasswordUpdate')->name('pagelocker.changePasswordUpdate');
    Route::get('admin/payments/list', 'PaymentController@adminPaymentsList')->name('admin.Payments.List');

Route::get('/home/{id}', 'HomeController@index');
Route::get('/pdf/view', 'AdmitOfferController@getpdfView')->name('pdf.views');
Route::post('/pdf/view', 'AdmitOfferController@pdfView')->name('pdf.view');
Route::get('institute/{id}', 'CollegeController@instituteDeactivate')->name('institute.Deactivate');
Route::get('admin/getState/{id}', 'LocationController@getState')->name('admin.getState');
Route::get('admin/getCity/{id}', 'LocationController@getCity')->name('admin.getCity');
Route::group(['prefix'=>'admin','middleware'=> 'auth:admin'],function(){


    Route::get('/shortlisting/quick/quick','admin\QuickShortlistingController@create')->name('admin.quick.shortlisting.create');
    Route::POST('/shortlisting/quick/store','admin\QuickShortlistingController@store')->name('admin.quick.shortlisting.store');
    Route::get('/admin-team/list','admin\TeamReportController@adminlist')->name('admin.adminteam.list');
    Route::get('/admin-team/view/{id}', 'admin\TeamReportController@adminteamview')->name('admin.adminteam.view');
    // global search

    Route::get('find/student/{search?}', 'admin\AppliedStudentFileController@studentsearch')->name('global.search.student');
    Route::POST('course/intake/change', 'admin\AppliedStudentFileController@changeIntake')->name('student.course.intake.change');
    



    // countries
    Route::get('/country/list', 'LocationController@countryList')->name('admin.country.list');
    Route::get('/addCountry', 'LocationController@addCountry')->name('admin.addCountry');
    Route::POST('/addCountry', 'LocationController@saveCountry')->name('admin.saveCountry');
    Route::delete('/country/delete/{id}', 'LocationController@countryDelete')->name('admin.country.delete');
    Route::get('/country/edit/{id}', 'LocationController@countryEdit')->name('admin.country.edit');
    Route::patch('/country/edit/{id}', 'LocationController@countryUpdate')->name('admin.country.Update');
    
    // states
    Route::get('/states/list', 'LocationController@statesList')->name('admin.state.list');
    Route::get('/addState', 'LocationController@addState')->name('admin.addState');
    Route::POST('/addState', 'LocationController@saveState')->name('admin.saveState');
    Route::delete('/state/delete/{id}', 'LocationController@stateDelete')->name('admin.state.delete');
    Route::get('/state/edit/{id}', 'LocationController@stateEdit')->name('admin.state.edit');
    Route::patch('/state/edit/{id}', 'LocationController@stateUpdate')->name('admin.state.Update');
    // cities
    Route::get('/cities/list', 'LocationController@citiesList')->name('admin.city.list');
    Route::get('/addCity', 'LocationController@addCity')->name('admin.addCity');
    Route::POST('/addCity', 'LocationController@saveCity')->name('admin.saveCity');
    Route::delete('/city/delete/{id}', 'LocationController@cityDelete')->name('admin.city.delete');
    Route::get('/city/edit/{id}', 'LocationController@cityEdit')->name('admin.city.edit');
    Route::patch('/city/edit/{id}', 'LocationController@cityUpdate')->name('admin.city.Update');
    
    Route::get('/qualificationDoc/accepted/{id}', 'admin\AppliedStudentFileController@updateAcceptStatus')->name('qualificationDoc.accepted');
    Route::get('/qualificationDoc/rejected/{id}', 'admin\AppliedStudentFileController@updateRejectStatus')->name('qualificationDoc.rejected');
   
Route::resource('/media', 'admin\MediaController');
Route::resource('/attendance', 'admin\AttendanceController');
    // allow agent country
    Route::resource('/allow/country', 'admin\AllowCountryAgentController');

    Route::get('/sop/accepted/{id}','SoppendencyController@updateAcceptStatus')->name('sop.accepted');
    Route::post('/sop/rejected/{id}','SoppendencyController@updateRejectStatus')->name('sop.rejected');

    // task Manager
    Route::resource('taskmanager', 'admin\TaskManagerController');
    Route::get('alltaskmanagers', 'admin\TaskManagerController@adminindex')->name('taskmanager.mainList');
    Route::POST('/saveComment', 'admin\AppliedStudentFileController@updateStudentComment')->name('student.comment');
    // team report
    Route::resource('teamreport', 'admin\TeamReportController');

    // total Report
    Route::get('totalReport', 'ReportsController@adminTotalReport')->name('admin.total.report')->middleware('auth:admin');
    
    Route::post('totalReport', 'ReportsController@adminTotalReport')->name('admin.get.total.report')->middleware('auth:admin');
    
    // commission
    Route::resource('commission', 'admin\CommissionController')->except('commission.create');
    Route::get('commission/create/{id}', 'admin\CommissionController@create')->name('commission.create');
    Route::get('entry/requirements', 'admin\CommissionController@createentryrequirement')->name('entry.requirements.get');
    Route::post('entry/requirements/store', 'admin\CommissionController@requirementsStore')->name('requirements.store');
    
    // colleges
    Route::resource('colleges', 'CollegeController');
    Route::get('/colleges/getAllUniversity/{id}','CollegeController@getAllUniversities');
    // courses
    Route::resource('university', 'admin\UniversityController');
    // courses
    Route::get('/courses/{id}', 'CoursesController@index')->name('courses.index');
    Route::get('/courses/create/{id}', 'CoursesController@create')->name('courses.create');
    Route::POST('/courses/store/', 'CoursesController@store')->name('courses.store');
    Route::delete('/courses/destroy/{id}', 'CoursesController@destroy')->name('courses.destroy');
    Route::get('/courses/edit/{id}', 'CoursesController@edit')->name('courses.edit');
    Route::get('/courses/show/{id}', 'CoursesController@show')->name('courses.show');
    Route::post('/courses/update/{id}', 'CoursesController@update')->name('courses.update');
    Route::post('/courses/excl/import', 'CoursesController@importCourse')->name('courses.importCourse');
    Route::post('/courses/verify', 'CoursesController@CourseVerify')->name('courses.verify');
    
    // qualification
    Route::resource('qualification', 'QualificationController');
    
    // instituteTypes
    Route::resource('instituteTypes', 'InstituteTypeController');
    // announcement
    Route::resource('announcement', 'AnnouncementController');
    Route::get('header/announcement', 'AnnouncementController@headerAnounce')->name('header.anounce');
    Route::put('header/announcement/update', 'AnnouncementController@headerAnounceUpdate')->name('header.announcement.update');

    // programLength
    Route::resource('programLength', 'ProgramLengthController');

    // SchoolType
    Route::resource('schoolType', 'SchoolTypeController');
    // Course level
    Route::resource('courseLevel', 'CourseLevelController');
    // Subjects
    Route::resource('subjects', 'SubjectController');
    // Ilets Score
    Route::resource('iletsScore', 'IletsScoreController');
    // English Score
    Route::resource('englishScore', 'EnglishScoreController');
    // Admin Agets
    Route::resource('agents', 'admin\AgentController');

    
    Route::get('agents/eagle/signup/list', 'admin\AgentController@EagleAgentsList')->name('EagleAgentsList.list');
    Route::POST('agents', 'admin\AgentController@index')->name('location.agents.list');
    
    Route::get('eventAgents/{id}', 'admin\AgentController@eventAgentDestroy')->name('event.agent.delete');
    Route::get('agents/event/list/{id?}', 'admin\AgentController@AdmitoffereventList')->name('AdmitoffereventList.list');
    Route::get('student/inquiry/list', 'admin\AppliedStudentFileController@studentinquirylist')->name('studentinqiryList.list');
    Route::get('myagent/delete/{id}', 'admin\AgentController@deleteAgent');
    Route::get('aprve/{id}', 'admin\AgentController@ApproveAgent')->name('agent.approve');
    Route::get('disaprve/{id}', 'admin\AgentController@DisapproveAgent')->name('agent.disapprove');
    // Intake Agets
    Route::resource('intakes', 'IntakeController');
    // Intake Agets
    Route::resource('englishTest', 'EnglishTestController');
    // Student Qualification Grade
    Route::resource('studentQualificationGrades', 'QualificationGradeController');
    // Student qualificationBoard
    Route::resource('qualificationBoard', 'QualificationBoardController');
    // Student Qualification Level Grade
    Route::resource('studentQualificationLevelGrades', 'QualificationLevelGradeController');
    // Student Questions 
    Route::resource('studentQuestions', 'StudentQuestionController');
    // Questions
    Route::resource('Questions', 'QuestionController');
    // Student Questions Grade
    Route::resource('qualificationTotals', 'StudentQualificationTotalController');
    // Program Title
    Route::resource('programTitle', 'admin\ProgramTitleController');
    // Math Score
    Route::resource('mathScore', 'admin\MathScoreController');
    // TeamPreProcess Score
    Route::resource('teamPreProcess', 'admin\TeamPreProcessController');
    // previousQualification 
    Route::resource('previousQualification', 'PreviousQualificationController');
    // Chat
    Route::get('chat/{id}', 'ChatController@show')->name('chat.show');
    Route::get('chat/student/{id}', 'ChatController@studentChat')->name('chat.student.show');
    Route::get('chats/create/{id}', 'ChatController@create')->name('chat.create');
    
    Route::get('student/chat/{id}', 'ChatController@AdminStudentChat')->name('admin.student.chat');

    Route::get('course/activate/{id}', 'CoursesController@activate')->name('course.activate');
    Route::get('course/deactivate/{id}', 'CoursesController@deactivate')->name('course.deactivate');
    
    Route::post('/application/rejection', 'admin\ApplicationDocumentController@ApplicationRejection')->name('application.rejection');
    Route::get('/unlock/student_id/{id}', 'admin\AppliedStudentFileController@unlockStudent')->name('unlock.student');
   
    // Files Agets 
    Route::get('application/getChangeCourses/{intake_id}/{institute_id}', 'admin\ApplicationController@getCourses')->name('application.getCourses');
    Route::post('getChangeCourses', 'admin\ApplicationController@UpdateChangeCourses')->name('application.UpdateCourses');
    Route::resource('/studentfiles','admin\AppliedStudentFileController')->except(['studentfiles.index']);


    Route::get('/studentfiles/All-Docs/{id?}','admin\AppliedStudentFileController@allDocsshow')->name('studentfiles.allDocs');
    


    Route::get('/studentfileslist/{id?}','admin\AppliedStudentFileController@index')->name('studentfiles.index');
    Route::get('/application/shortlists','admin\AppliedStudentFileController@Shortlist')->name('application.Shortlist');
    Route::get('today/student/shortlists','admin\AppliedStudentFileController@TodayShortlist')->name('today.application.Shortlist');
    Route::get('today/student/shortlisted','admin\AppliedStudentFileController@TodayShortlisted')->name('today.Shortlisted');
    Route::get('total/student/shortlists','admin\AppliedStudentFileController@TotalShortlist')->name('total.application.Shortlist');
    Route::get('shortlisted/student/notconverted','admin\AppliedStudentFileController@ShortlistedNotconverted')->name('ShortlistedNotconverted.Shortlisted');
    Route::get('today/application','admin\AppliedStudentFileController@todayApplication')->name('today.application');
    Route::get('/pendingFinalSubmit/{id?}','admin\AppliedStudentFileController@pendingFinalSubmit')->name('pending.final.submit');
    Route::resource('/application','admin\ApplicationController')->except(['application.index']);
    Route::get('/applicationlist/{id?}','admin\ApplicationController@index')->name('application.index');
    Route::get('/application/status/{id}/{country?}','admin\ApplicationController@statusApplications')->name('status.applicatons.list');
    Route::get('/pending/application','admin\ApplicationController@pendingApplications')->name('admin.pending.applications');
    Route::get('/pendencies/application','admin\AppliedStudentFileController@pendenciesApplications')->name('admin.pendencies.applications');
    Route::get('/clear/pendency/{id}','admin\AppliedStudentFileController@clearPendenciesApplications')->name('admin.clear.pendencies.applications');
    Route::get('/applications/applyToUni/today','admin\ApplicationController@todayAppltToUni')->name('application.today.applyToUni');
    Route::resource('/applicationStatus','admin\ApplicationStatusController');
    Route::post('/applications','admin\ApplicationController@updateApplicationStatus')->name('applications.Status');
    Route::resource('/pendancyAttachment','admin\PendancyAttachmentController');
    Route::get('/pendancyAttachments/{id}','admin\PendancyAttachmentController@destroy')->name('pendancyAttachments.delete');
    Route::get('/getSubject/{id}','CoursesController@getSubjects');
    
    Route::get('/getAllApplications', 'admin\AppliedStudentFileController@getApplications')->name('getapplication.index');
    Route::get('pending/getAllApplications', 'admin\AppliedStudentFileController@getpendingApplications')->name('getapplication.index');
    Route::post('/application/offerlatter', 'admin\ApplicationDocumentController@store')->name('applications.offerlatter');
    Route::post('/application/loaOfferLetter', 'admin\ApplicationDocumentController@loaOfferLetter')->name('applications.loaOfferLetter');
    
    //CAS Document
    Route::post('/application/clearCasDocument', 'admin\ApplicationDocumentController@clearCasDocument')->name('applications.clearCasDocument');
    
    //processor
    Route::POST('/processor','admin\TeamProcessController@store')->name('processor.store');
    Route::group(['prefix'=>'session/agent'],function(){
        Route::GET('/home/{id}', 'admin\agentsession\AdminController@index')->name('admin.session.agent.home');
    });

});
Route::group(['prefix'=>'search'],function(){
    Route::get('/student/add/{id}','admin\AppliedStudentFileController@addMoreProgram')->name('student.program.add');

    Route::get('/student/view/notif/{id}', 'Search\SearchController@viewStudentNotify')->name('studentview.notify')->middleware('auth:admin');
    Route::get('/courseData', 'Search\SearchController@course_data')->name('search.course.data');
    Route::get('/', 'Search\SearchController@index')->name('search.index');
    Route::post('/', 'Search\SearchController@getCourses')->name('search.course');
    Route::post('/getCourseDetail', 'Search\SearchController@getCourseDetail')->name('search.getCourseDetail');
    Route::get('/s/{country_id}', 'Search\SearchController@getCourses');
    Route::get('/countries', 'Search\SearchController@countries')->name('search.countries');
    Route::get('/applyFor/{student}/{country}/{course}/{text}', 'Agent\AppliedStudentFileController@AppliedFor')->name('apply.for');
});
Route::get('/sessionStatus/{parm}', 'Search\SearchController@SessionStatus')->name('session.status');

   // students
    Route::get('quick/shortlisting/alldocument/{id}', 'Agent\QuickShortlistingController@convertPdf')->name('convertPdf.alldocuments');
    Route::resource('applicant/EditStudent','Agent\StudentController')->except(['applicant.index'])->middleware('auth:student');
    Route::POST('new/student/rejected','Agent\StudentController@StudentRejectionStatus')->name('new.student.rejection');
    Route::get('new/student/shortlisting/{id}','Agent\StudentController@StudentShortlisting')->name('new.student.shortlisting');
    // quick shortlist
    Route::get('new/quick/student/shortlistings/{id}','Agent\QuickShortlistingController@StudentShortlisting')->name('new.quick.student.shortlistings');
    Route::get('applicant/AllApplication', 'Agent\StudentController@AllApplications')->name('applicant.all.Applications')->middleware('auth:student');
    Route::get('applicant/student/application/{id}','Agent\StudentController@applicationView')->name('applicant.student.application.View')->middleware('auth:student');

    //Admin
    Route::get('/quick/shortlistings','Agent\QuickShortlistingController@create')->name('quick.shortlisting.creates')->middleware('auth:admin');
    Route::get('add/new/new/quick/students/shortlistings','Agent\QuickShortlistingController@addNewQuickShort')->name('add.new.quick.shorts')->middleware('auth:admin');
    Route::POST('/quick/shortlistings/document','Agent\QuickShortlistingController@Documents')->name('quick.shortlisting.documents')->middleware('auth:admin');

    Route::get('admin/send/whats-app/message','admin\AgentController@sendmessage')->name('admin.whatsappmessage.add')->middleware('auth:admin');
    Route::get('admin/store/whats-app/message/{msg}/{id}','admin\AgentController@storemessage')->name('admin.whatsappmessage.store')->middleware('auth:admin');


    Route::get('admin/user-activity', 'ActivityController@getIndex');
    Route::post(config('user-activity.route_path'), 'ActivityController@handlePostRequest');
