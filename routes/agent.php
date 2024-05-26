<?php

Route::get('agent/admin/chat/edit/{id}/{agent_id}','ChatController@edit')->name('chat.edit');
Route::post('agent/admin/chat/store','ChatController@store')->name('chat.store');
// student chat 
// Route::get('/admin/student/chat/edit/{id}/{student}','ChatController@Studentedit')->name('student.chat.edit');
Route::group(['prefix' => '/'], function() {
    // Chat
    Route::get('admin/chat/{id}', 'ChatController@show')->name('chat.show');
    Route::get('admin/chats/create', 'ChatController@createAgent')->name('chat.create.agent');

    Route::get('students/chat/{id}', 'ChatController@AgentStudentChat')->name('agent.student.chat.show')->middleware('agent.auth:agent');

    Route::resource('Soppendency', 'SoppendencyController');
});
Route::group(['namespace' => 'Agent'], function() {
    // Register
    Route::get('/registers', 'Auth\RegisterController@showRegistrationForms')->name('agent.registers');
    Route::post('/registers', 'Auth\RegisterController@register');
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('agent.login');
    Route::get('/thankYou/{id}', 'Auth\LoginController@thankYou')->name('agent.thankyou');
    Route::get('/create/contract/{id}/Admitoffer', 'Auth\LoginController@createPdf')->name('agent.createPdf');
    Route::get('/home/create/contract/{id}/Admitoffer', 'HomeController@createPdf')->name('agent.home.createPdf');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('agent.logout');

    // Update Skype Id
    Route::post('skypeID', 'StudentController@updateSkypeID')->name('update.skypeID');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('agent.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('agent.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('agent.password.reset');
    // change Passwords
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('agent.password.email');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/change/password', 'Auth\ChangePasswordController@index')->name('agent.change.password');
    Route::post('/change/password', 'Auth\ChangePasswordController@store')->name('agent.password.store');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('agent.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('agent.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('agent.verification.verify');
    Route::get('/', 'HomeController@index')->name('agent.dashboard');
    Route::get('/home/{id?}', 'HomeController@index')->name('agent.dashboard')->middleware('agent.auth:agent');
    // student quick shortlisting

    Route::get('/quick/shortlisting','QuickShortlistingController@create')->name('quick.shortlisting.create')->middleware('agent.auth:agent');
    Route::get('add/new/new/quick/student/shortlistings','QuickShortlistingController@addNewQuickShort')->name('add.new.quick.short')->middleware('agent.auth:agent');
    Route::POST('/quick/shortlisting/document','QuickShortlistingController@Documents')->name('quick.shortlisting.document')->middleware('agent.auth:agent');
    
    // students
    Route::resource('/student','StudentController')->except(['student.index'])->middleware('agent.auth:agent');
    Route::get('/student/addmoress/{id}','StudentController@addMoreProgram')->name('student.program.addMore')->middleware('agent.auth:agent');
    Route::get('/student/testtotalScore/{id}/{country}','StudentController@testtotalScore')->name('student.testtotalScore')->middleware('agent.auth:agent');
    Route::get('add/new/session/student','StudentController@addNewStudentSession')->name('add.new.student.session')->middleware('agent.auth:agent');
    Route::get('/student/application/{id}','StudentController@applicationView')->name('student.application.View')->middleware('agent.auth:agent');

    Route::get('/student/All-Docs/{id}','StudentController@allDocs')->name('student.alldocs.View')->middleware('agent.auth:agent');

    Route::get('/student/track/{id}','StudentController@trackView')->name('student.track.View');

    // Route::get('/student/{id}/edit','StudentController@create')->name('student.edit');
    Route::get('/student/{id?}','StudentController@index')->middleware('agent.auth:agent');
    Route::get('/students/{switchCountryId?}','StudentController@index')->name('agent.student.countryindex')->middleware('agent.auth:agent');
    Route::post('/student/studentdocuments','StudentController@studentDocuments')->name('upload.student.document');
    Route::post('/student/applicationSignedDocument','StudentController@applicationSignedDocument')->name('upload.student.applicationSignedDocument');
    Route::post('/finance/document','StudentController@UploadFinancedocument')->name('upload.student.finance.document')->middleware('agent.auth:agent');
    Route::get('/student/getQualificationGrades/{id}','StudentController@getQualificationGrades')->name('getQualificationGrades');
    // Student English Test 
    Route::get('/student/getEnglishTest/{id}', 'StudentController@getEnglishTest');
    Route::get('/student/getQuestions/{id}', 'StudentController@getQuestions');
    Route::POST('/student/studentSave', 'StudentController@saveStudent');
    Route::POST('/student/studentQualification', 'StudentController@saveStudentQualification');
    Route::POST('/student/studentQualificationGap', 'StudentController@saveStudentQualificationGap');
    Route::POST('/student/studentQualificationTests', 'StudentController@saveStudentQualificationTests');
    Route::POST('/student/studentWorkExperiance', 'StudentController@saveStudentWorkExperiance');
    Route::POST('/student/studentQuestionsSave', 'StudentController@saveStudentQuestions');
    Route::POST('/student/studentCheck', 'StudentController@studentCheck');
    Route::get('/student/deleteQualification/{id}', 'StudentController@deleteQualification');
    Route::get('/student/deleteQualificationGap/{id}', 'StudentController@deleteQualificationGap');
    Route::get('/student/deleteQualificationTest/{id}', 'StudentController@deleteQualificationTest');
    Route::get('/student/deleteQualificationWork/{id}', 'StudentController@deleteQualificationWork');
    Route::POST('student/applyFor', 'StudentController@ApplyFor')->name('verify.applyFor');
    Route::get('student/cahnge/course/{student_id}/{course_id}', 'StudentController@changeCourse')->name('change.course');
    Route::get('/student/ping/{id}','HomeController@ping')->name('student.ping')->middleware('agent.auth:agent');
    Route::get('/profile', 'HomeController@profile')->name('user.profile');
    Route::get('media/gallery/{id}', 'HomeController@mediaGallery')->name('media.gallery');
    //completeApplication
    Route::get('/student/completeApplication/{id}', 'StudentController@completeApplication')->name('completeApplication.student');
    Route::get('/studentsPendencies', 'StudentController@pendency')->name('student.studentsPendencies')->middleware('agent.auth:agent');
    Route::get('/studentsApplPendencies', 'StudentController@Applicationpendency')->name('student.studentsApplPendencies');
    Route::get('/studentsApplicationPendencies/{id}', 'StudentController@ViewApplicationpendency')->name('student.viewApplicationPendencies');
    // appliedStudentFiles Offers
    Route::get('/ApplicationOffers', 'StudentController@ApplicationOffers')->name('student.ApplicationOffers')->middleware('agent.auth:agent');
    // appliedStudentFiles Offers
    Route::get('/AllApplication/{switchCountryId?}', 'StudentController@AllApplications')->name('all.Applications')->middleware('agent.auth:agent');
    Route::get('/AllApplications/status/{id}/{switchCountryId?}', 'StudentController@AllApplicationsStatus')->name('all.Applications.status')->middleware('agent.auth:agent');
    Route::get('Applications/PendingTTCopy', 'StudentController@PendingTTCopy')->name('all.PendingTTCopy')->middleware('agent.auth:agent');
    // appliedStudentFiles Offers
    Route::get('/AllVisaReceived', 'StudentController@AllVisaReceived')->name('student.visaReceived')->middleware('agent.auth:agent');
    // appliedStudentFiles
    Route::resource('/files','AppliedStudentFileController');
    Route::get('/isChecked/{id}','AppliedStudentFileController@isChecked');
    Route::get('/getpopup/isChecked/{id}','StudentController@DocumentPopUpview');
    
    // ajax for notification
    
    Route::get('/student/read/notify/{id}','NotificationController@update')->name('student.notify.updates');
    
    
});
Route::get('/read/notify/{id}','NotificationController@update')->name('student.notify.update');
Route::get('/notify/list','NotificationController@index')->name('notification.list');
Route::get('/messages/list','NotificationController@messages')->name('notification.messages.list');
// Total Conversions Report
Route::get('totalConversions', 'ReportsController@totalConversions')->name('totalConversions.report')->middleware('agent.auth:agent');
// commission Report
Route::get('commission', 'ReportsController@commission')->name('commission.report')->middleware('agent.auth:agent');
    // University Report
    Route::get('universityReport', 'ReportsController@universityReport')->name('university.report')->middleware('agent.auth:agent');
    Route::post('universityReport', 'ReportsController@universityReport')->name('get.university.report')->middleware('agent.auth:agent');
    // location Report
    Route::get('locationReport', 'ReportsController@locationReport')->name('location.report')->middleware('agent.auth:agent');
    Route::post('locationReport', 'ReportsController@locationReport')->name('get.location.report')->middleware('agent.auth:agent');
    // total Report
    Route::get('totalReport', 'ReportsController@TotalReport')->name('total.report')->middleware('agent.auth:agent');
    
    Route::post('totalReport', 'ReportsController@TotalReport')->name('get.total.report')->middleware('agent.auth:agent');
    Route::get('commissionStructure/{id}', 'ReportsController@comissionStructure')->name('comission.structure')->middleware('agent.auth:agent')->middleware('pagelock');

Route::post('admin/tutionFeeAttachments/{id}','admin\PendancyAttachmentController@tutionFeeReceipt')->name('tutionFee.upload');
Route::post('admin/pendancyAttachments/{id}','admin\PendancyAttachmentController@update')->name('pendancyAttachments.update');
//CAS Docs Upload
Route::post('admin/casDoc/{id}','admin\PendancyAttachmentController@casDocUpload')->name('casDoc.upload');
//VISA Docs Upload
Route::post('admin/visa/{id}','admin\PendancyAttachmentController@visaUpload')->name('visa.upload');
//interview save
Route::post('interview/save','admin\PendancyAttachmentController@interviewSave')->name('interview.save');

Route::get('admin/pendancyAttachments/accepted/{id}','admin\PendancyAttachmentController@accepted')->name('pendancyAttachments.accepted');
Route::post('admin/pendancyAttachments/rejected/{id}','admin\PendancyAttachmentController@rejected')->name('pendancyAttachments.rejected');

// Tution Fee
Route::get('admin/applicationFee/accepted/{id}','admin\PendancyAttachmentController@TutionAtachAccepted')->name('applicationFee.accepted');
Route::post('admin/applicationFee/rejected/{id}','admin\PendancyAttachmentController@TutionAtachRejected')->name('applicationFee.rejected');
// CAS DOc ACCEPT/REJECT
Route::get('admin/casDoc/accepted/{id}','admin\PendancyAttachmentController@casDocAccepted')->name('casDoc.accepted');
Route::post('admin/casDoc/rejected/{id}','admin\PendancyAttachmentController@casDocRejected')->name('casDoc.rejected');
// VISA DOc ACCEPT/REJECT
Route::get('admin/visa/accepted/{id}','admin\PendancyAttachmentController@visaDocAccepted')->name('visa.accepted');
Route::post('admin/visa/rejected/{id}','admin\PendancyAttachmentController@visaDocRejected')->name('visa.rejected');
// Admin Agets
Route::post('agents','admin\AgentController@store')->name('agents.store');
Route::get('getAgentGraph','agent\HomeController@getAgentGraph')->name('getAgentGraph');

// uk universities structure
Route::get('/page/lock/changepassword', 'AdmitOfferController@changePassword')->name('pagelock.changepassword');
Route::get('/page/lock/changepassword', 'AdmitOfferController@changePasswordUpdate')->name('pagelock.changePasswordUpdate');

Route::get('universities/requirements','ReportsController@allUkUniversities')->name('allUk.universities.structure')->middleware('agent.auth:agent');