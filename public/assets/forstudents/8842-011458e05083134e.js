(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[8842],{3782:function(a,b,c){"use strict";c.d(b,{Q:function(){return i}});var d=c(85893),e=c(25274),f=c(62408),g=c(70583),h=c.n(g),i={AVAILABLE:"AVAILABLE",SOLD_OUT:"SOLD OUT",FAST_FILLING:"FAST FILLING",SLOT_FILLED:"SLOT FILLED"},j=function(a){var b,c,g,i=a.slot,j=a.handleSlotSelected,k=a.selectedSlot,l=a.isMobileSized,m=a.key,n=a.showCountriesText,o=!(0,f.nK)(k)&&k.batchId==(null==i?void 0:i.batchId),p=i||{},q=p.label,r=p.status,s=p.isStarted;return l?(0,d.jsxs)("div",{onClick:function(){return j(i)},className:"w-[47%] text-center cursor-pointer  rounded-lg shadow-6 relative border flex items-center justify-center h-41 mb-4 ".concat(o?"bg-violet-400 border-2 border-primary":"bg-white border-lightgray-1650"),children:[s&&(0,d.jsx)("img",{src:"/assets/images/spot-counselling/live-now.svg",alt:"live now",className:"".concat(h().liveNowIcon1)}),(0,d.jsx)("div",{className:"font-bold text-base text-gray-1750",children:q})]}):(0,d.jsxs)("div",{onClick:function(){return j(i)},className:"text-center cursor-pointer shadow-6 relative ".concat(h().calendarDateBox," ").concat(o?"bg-violet-400 border-2 border-primary":"bg-white"),children:[s&&(0,d.jsx)("img",{src:"/assets/images/spot-counselling/live-now.svg",alt:"live now",className:"".concat(h().liveNowIcon)}),(0,d.jsx)("div",{className:"font-bold text-xl pt-4 text-gray-1750",children:q}),(void 0===n||n)&&(0,d.jsx)("div",{className:"flex flex-wrap justify-center py-0 px-1",children:(null==i?void 0:null===(b=i.country)|| void 0===b?void 0:b.length)?i.country.length<3?null==i?void 0:null===(c=i.country)|| void 0===c?void 0:c.map(function(a,b){return(0,d.jsx)("div",{className:"".concat(o?"bg-white":"bg-gray-1720"," text-xxs flex items-center justify-center p-1 rounded-full py-1 px-2 mb-2 mr-2"),children:(0,d.jsx)("p",{children:a})},b)}):(0,d.jsx)("div",{className:"text-xxs flex items-center justify-center ".concat(o?"bg-white":"bg-gray-1720"," rounded-full py-1 px-2 mb-2"),children:"All Countries"}):(null==i?void 0:null===(g=i.country)|| void 0===g?void 0:g.length)==0?(0,d.jsx)("div",{className:"text-xxs flex items-center justify-center ".concat(o?"bg-white":"bg-gray-1720"," rounded-full py-1 px-2 mb-2"),children:"All Countries"}):null}),(0,d.jsx)("div",{className:"w-full rounded-br-[14px] rounded-bl-[14px] absolute bottom-0 left-0 bg-yellow-100 justify-center mt-1 text-xs ".concat((0,e.cw)(i.status)),children:(0,d.jsxs)("span",{className:" capitalize",children:[" ",null==r?void 0:r.toLowerCase()]})})]},"later"+m)};b.Z=j},25274:function(a,b,c){"use strict";c.d(b,{"$4":function(){return y},B3:function(){return A},N4:function(){return G},cw:function(){return E},kj:function(){return B},nZ:function(){return z},u:function(){return F},uY:function(){return D},ul:function(){return C}});var d,e,f,g,h=c(47568),i=c(26042),j=c(69396),k=c(34051),l=c.n(k),m=c(69117),n=c(22767),o=c(78779),p=c(13539),q=c(30381),r=c.n(q),s=c(12615),t=c(83697),u=c(42477),v=c(86147),w=c(3782),x=function(a,b,c,d,e){var f=new Date(new Date(a).setHours(b,c));if(d&&e){var g=new Date(new Date(a).setHours(14,0)),h=new Date(new Date(a).setHours(16,59));return f>=g&&f<=h}if(d){var i=new Date(new Date(a).setHours(17,0));return f>=i}var j=new Date(new Date(a).setHours(13,59,59));return f<j},y=(d=(0,h.Z)(l().mark(function a(b,d,e,f,g){var h,i,j,k,m,n,o,p,q,r,s,v,w,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,$,_,aa,ab,ac,ad;return l().wrap(function(a){for(;;)switch(a.prev=a.next){case 0:return console.log(b),ac={slotInfo:{"D0 Slots":null!==(J=null===(h=b[0])|| void 0===h?void 0:null===(i=h.slots)|| void 0===i?void 0:i.length)&& void 0!==J?J:0,"D1 Slots":null!==(K=null===(j=b[1])|| void 0===j?void 0:null===(k=j.slots)|| void 0===k?void 0:k.length)&& void 0!==K?K:0,"D2 Slots":null!==(L=null===(m=b[2])|| void 0===m?void 0:null===(n=m.slots)|| void 0===n?void 0:n.length)&& void 0!==L?L:0,D0_C1:null!==(N=null===(o=b[0])|| void 0===o?void 0:null===(p=o.slots)|| void 0===p?void 0:p.filter(function(a){return x(null!==(M=null==a?void 0:a.date)&& void 0!==M?M:"",a.starHour,a.startMinute,0,13.59)}).length)&& void 0!==N?N:0,D0_C2:null!==(P=null===(q=b[0])|| void 0===q?void 0:null===(r=q.slots)|| void 0===r?void 0:r.filter(function(a){return x(null!==(O=null==a?void 0:a.date)&& void 0!==O?O:"",a.starHour,a.startMinute,14,17)}).length)&& void 0!==P?P:0,D0_C3:null!==(R=null===(s=b[0])|| void 0===s?void 0:null===(v=s.slots)|| void 0===v?void 0:v.filter(function(a){return x(null!==(Q=null==a?void 0:a.date)&& void 0!==Q?Q:"",a.starHour,a.startMinute,17,0)}).length)&& void 0!==R?R:0,D1_C1:null!==(T=null===(w=b[1])|| void 0===w?void 0:null===(y=w.slots)|| void 0===y?void 0:y.filter(function(a){return x(null!==(S=null==a?void 0:a.date)&& void 0!==S?S:"",a.starHour,a.startMinute,0,14)}).length)&& void 0!==T?T:0,D1_C2:null!==(V=null===(z=b[1])|| void 0===z?void 0:null===(A=z.slots)|| void 0===A?void 0:A.filter(function(a){return x(null!==(U=null==a?void 0:a.date)&& void 0!==U?U:"",a.starHour,a.startMinute,14,17)}).length)&& void 0!==V?V:0,D1_C3:null!==(X=null===(B=b[1])|| void 0===B?void 0:null===(C=B.slots)|| void 0===C?void 0:C.filter(function(a){return x(null!==(W=null==a?void 0:a.date)&& void 0!==W?W:"",a.starHour,a.startMinute,17,0)}).length)&& void 0!==X?X:0,D2_C1:null!==(Z=null===(D=b[2])|| void 0===D?void 0:null===(E=D.slots)|| void 0===E?void 0:E.filter(function(a){return x(null!==(Y=null==a?void 0:a.date)&& void 0!==Y?Y:"",a.starHour,a.startMinute,0,14)}).length)&& void 0!==Z?Z:0,D2_C2:null!==(_=null===(F=b[2])|| void 0===F?void 0:null===(G=F.slots)|| void 0===G?void 0:G.filter(function(a){return x(null!==($=null==a?void 0:a.date)&& void 0!==$?$:"",a.starHour,a.startMinute,14,17)}).length)&& void 0!==_?_:0,D2_C3:null!==(ab=null===(H=b[2])|| void 0===H?void 0:null===(I=H.slots)|| void 0===I?void 0:I.filter(function(a){return x(null!==(aa=null==a?void 0:a.date)&& void 0!==aa?aa:"",a.starHour,a.startMinute,17,0)}).length)&& void 0!==ab?ab:0}},a.next=6,Promise.resolve().then(c.bind(c,83697));case 6:ad=a.sent.trackPage,b&&b[0]&&b[0].date?d&&"I2C_form"!==e?ad(g?"ToFu Spot Counselling Calendar - Live View v2":u.pageName.Calendar_Booking_Page_Join_Live_View_V2,ac):"Ielts Demo Form"===e?(0,t.trackPageV2)(u.ieltsPageName.IELTS_ELITE_DEMO_BOOKING_PAGE,{referrer:"Elite Demo LP"}):ad(g?"ToFu Spot Counselling Calendar v2":"Calendar_Booking_Page_EXP_1",ac):f(!0);case 8:case"end":return a.stop()}},a)})),function(a,b,c,e,f){return d.apply(this,arguments)}),z=(e=(0,h.Z)(l().mark(function a(b,c,d){var e,f,g,h;return l().wrap(function(a){for(;;)switch(a.prev=a.next){case 0:e=(0,m.e0)(),g=!!(f=(null==d?void 0:d.query).showSuccessModal),b?e?(0,n.yU)(null==c?void 0:c.batchId):window.open("/spot-counselling/join-redirect?batch_id=".concat(null==c?void 0:c.batchId,"&type=1"),"_self"):e?d.push("/webview/counselling-tab"):g?window.open(s.CZ.SC_PROFILE,"_blank"):(null==d?void 0:null===(h=d.query)|| void 0===h?void 0:h.redirectTo)==="profile"?d.push(s.CZ.COUNSELLING_OVERVIEW):d.push(s.CZ.SC_PROFILE);case 4:case"end":return a.stop()}},a)})),function(a,b,c){return e.apply(this,arguments)}),A=function(a,b,c){var d=a.find(function(a){return a.date===b}),e=null==d?void 0:d.slots.map(function(a){var b=a.seatsBooked,c=a.numberOfSeats,d=b/c*100,e=Number(d.toFixed(2))>70&&a.numberOfSeats-a.seatsBooked>0,f="";return a.numberOfSeats-a.seatsBooked<=0&&(f="SLOT FILLED"),f=e?"FAST FILLING":"AVAILABLE",{label:r()("".concat(a.starHour,":").concat(a.startMinute),"hh:mm").format("LT"),endTime:r()("".concat(a.endHour,":").concat(a.endMinute),"hh:mm").format("LT"),batchId:a.batchId,status:f,book_date:new Date(new Date(a.date).setHours(a.starHour,a.startMinute)),country:(null==a?void 0:a.country)||[],isStarted:null==a?void 0:a.isStarted}});c((null==e?void 0:e.filter(function(a){return null!==a&&"SLOT FILLED"!=a.status}))||[])},B=function(a,b,c,d,e){b(!1),c(a),null==d||d.forEach(function(b){b.slots.forEach(function(b){b.batchId===a.batchId&&(f=b)})}),f&&(null==f?void 0:f.isStarted)&&b(!0);var f,g=a.value,h=a.batchId,i=a.label,j=a.book_date,k={eventCategory:"Spot_Counselling",eventDate:r()(j).format("DD-MM-YYYY")||"NA",eventTime:"laterDay"===e?i:r()("".concat(null==a?void 0:a.starHour,":").concat(null==a?void 0:a.startMinute),"hh:mm").format("LT")||"NA",batchId:h||"NA"};(0,p.sendCustomGaEvent)("Counselling Slot Selected",{event_category:"Spot_Counselling",event_id:h||"NA",event_date:r()(j).format("DD-MM-YYYY")||"NA",event_time:"laterDay"===e?i:r()("".concat(null==a?void 0:a.starHour,":").concat(null==a?void 0:a.startMinute),"hh:mm").format("LT")||"NA",scheduled_date:r()(j).format("DD-MM-YYYY")||"NA"}),(0,t.trackEvent)("Slot Selected",k),(0,p.logEvent)("Spot Counselling","Select Spot-C time","Time slot - ".concat(g))},C=(f=(0,h.Z)(l().mark(function a(b,c,d,e,f,g,h,k){var m,q,r,s,w,x,y,z,A,B;return l().wrap(function(a){for(;;)switch(a.prev=a.next){case 0:return a.next=3,(0,o.is)();case 3:if(q=a.sent,s={utm_campaign:null==(r=(0,v.M)(null))?void 0:r.utmCampaign,utm_source:null==r?void 0:r.utmSource,utm_term:null==r?void 0:r.utmTerm,utm_medium:null==r?void 0:r.utmMedium,gclid:null==r?void 0:r.gclid,adName:null==r?void 0:r.adName,form_id:null==c?void 0:c.formId,campaign_type:null==r?void 0:r.campaignType,ad_id:null==r?void 0:r.adId,referer:null==r?void 0:r.referer},(0,p.logEvent)("Spot Counselling","Confirm Slot","Confirmed Spot-C slot"),w={batchId:null==b?void 0:b.batchId,utmData:s},x={eventCategory:"Spot_Counselling",batchId:(null==b?void 0:b.batchId)||"",eventDate:e&&new Date(e),eventTime:(null==b?void 0:b.label)||"NA",utmCampaign:(null==r?void 0:r.utmCampaign)||"NA",utmSource:(null==r?void 0:r.utmSource)||"NA",utmTerm:(null==r?void 0:r.utmTerm)||"NA",utmMedium:(null==r?void 0:r.utmMedium)||"NA",adId:(null==r?void 0:r.adId)||"NA",campaignType:(null==r?void 0:r.campaignType)||"NA",gclid:(null==r?void 0:r.gclid)||"NA",adName:(null==r?void 0:r.adName)||"NA",form_id:(null==s?void 0:s.form_id)||"NA",timeStampOfSlot:(null==b?void 0:b.book_date)?G(new Date(null==b?void 0:b.book_date)):G(new Date(new Date(null==b?void 0:b.date).setHours(null==b?void 0:b.starHour,null==b?void 0:b.startMinute)))||"NA"},(0,p.sendCustomGaEvent)("Counselling Booked",{eventCategory:"Spot_Counselling",slot_type:'""',event_id:(null==b?void 0:b.batchId)||"",event_date:e&&new Date(e),event_time:(null==b?void 0:b.label)||"NA",lead_source:"Other"},{lead_stage:k}),y=null==q?void 0:null===(m=q.data)|| void 0===m?void 0:m.data,z={phone:null==y?void 0:y.phone,email:null==y?void 0:y.email,name:null==y?void 0:y.name,preferredCountry:null==y?void 0:y.preferredCountry,preferredProgram:null==y?void 0:y.preferredProgram,grades:null==y?void 0:y.grades,passportStatus:null==y?void 0:y.passportStatus,formId:s.form_id||(null==y?void 0:y.formId)||"NA"},(0,t.trackClick)(u.pageName.Calendar_Booking_Page,{widgetName:"",widgetFormat:"",contentName:"".concat(f?"Join":"Confirm Slot"),contentFormat:"Button"}),(0,t.trackEvent)("Event Booked",x),(0,t.trackEvent)("Event Booked ".concat(null==y?void 0:y.preferredCountry),x),F(y)&&(0,t.trackEvent)("Webinar Booked IS Flow",(0,i.Z)({},x,z)),!c.reschedule){a.next=23;break}return a.next=19,(0,n.DS)((0,j.Z)((0,i.Z)({},w),{meetingId:null==c?void 0:c.meetingId}));case 19:(null==(A=a.sent)?void 0:A.success)?g(!0):h(null==A?void 0:A.message),a.next=27;break;case 23:return a.next=25,(0,n.FE)(w);case 25:(null==(B=a.sent)?void 0:B.success)?g(!0):h(null==B?void 0:B.message);case 27:case"end":return a.stop()}},a)})),function(a,b,c,d,e,g,h,i){return f.apply(this,arguments)}),D=(g=(0,h.Z)(l().mark(function a(b,c,d,e,f,g){var h,k,m,q,s,w,x,y,z,A;return l().wrap(function(a){for(;;)switch(a.prev=a.next){case 0:return a.next=3,(0,o.is)();case 3:if(k=a.sent,q={utm_campaign:null==(m=(0,v.M)(null))?void 0:m.utmCampaign,utm_source:null==m?void 0:m.utmSource,utm_term:null==m?void 0:m.utmTerm,gclid:null==m?void 0:m.gclid,adName:null==m?void 0:m.adName,utm_medium:null==m?void 0:m.utmMedium,form_id:null==c?void 0:c.formId,campaign_type:null==m?void 0:m.campaignType,ad_id:null==m?void 0:m.adId,referer:null==m?void 0:m.referer},(0,p.logEvent)("Button","Click","Join Live"),(0,t.trackClick)(u.pageName.Calendar_Booking_Page_Join_Live_View,{widgetName:"",widgetFormat:"",contentName:"Join",contentFormat:"Button"}),(0,p.logEvent)("Spot Counselling","Confirm Slot","Confirmed Spot-C slot"),s={batchId:null==b?void 0:b.batchId,utmData:q},w={eventCategory:"Spot_Counselling",batchId:(null==b?void 0:b.batchId)||"",eventDate:b.date&&new Date(b.date),eventTime:b.date&&r()("".concat(b.starHour,":").concat(b.startMinute),"hh:mm").format("LT"),utmCampaign:(null==m?void 0:m.utmCampaign)||"NA",utmSource:(null==m?void 0:m.utmSource)||"NA",utmTerm:(null==m?void 0:m.utmTerm)||"NA",gclid:(null==m?void 0:m.gclid)||"NA",adName:(null==m?void 0:m.adName)||"NA",timeStampOfSlot:G(new Date(new Date(null==b?void 0:b.date).setHours(null==b?void 0:b.starHour,null==b?void 0:b.startMinute)))||"NA"},(0,p.sendCustomGaEvent)("Counselling Booked",{eventCategory:"Spot_Counselling",slot_type:'""',event_id:b.batchId||"",event_date:b.date&&new Date(b.date),event_time:b.date&&r()("".concat(b.starHour,":").concat(b.startMinute),"hh:mm").format("LT"),lead_source:"Other"},{lead_stage:g}),x=null==k?void 0:null===(h=k.data)|| void 0===h?void 0:h.data,y={phone:null==x?void 0:x.phone,email:null==x?void 0:x.email,name:null==x?void 0:x.name,preferredCountry:null==x?void 0:x.preferredCountry,preferredProgram:null==x?void 0:x.preferredProgram,grades:null==x?void 0:x.grades,passportStatus:null==x?void 0:x.passportStatus,formId:q.form_id||(null==x?void 0:x.formId)||"NA"},(0,t.trackEvent)("Event Booked",w),(0,t.trackEvent)("Event Booked ".concat(x.preferredCountry),w),F(x)&&(0,t.trackEvent)("Webinar Booked IS Flow",(0,i.Z)({},w,y)),!c.reschedule){a.next=24;break}return a.next=20,(0,n.DS)((0,j.Z)((0,i.Z)({},s),{meetingId:null==c?void 0:c.meetingId}));case 20:(null==(z=a.sent)?void 0:z.success)?e(!0):f(null==z?void 0:z.message),a.next=28;break;case 24:return a.next=26,(0,n.FE)(s);case 26:(null==(A=a.sent)?void 0:A.success)?e(!0):f(null==A?void 0:A.message);case 28:d(!0);case 29:case"end":return a.stop()}},a)})),function(a,b,c,d,e,f){return g.apply(this,arguments)}),E=function(a){switch(a){case w.Q.AVAILABLE:return"text-green-1510 bg-green-1500";case w.Q.FAST_FILLING:return"text-yellow-500 bg-yellow-820";case w.Q.SOLD_OUT:case w.Q.SLOT_FILLED:default:return"text-lightgray-400 cursor-not-allowed"}},F=function(a){var b=a.preferredCountry,c=a.preferredProgram,d=a.grades,e=a.gradeMetric;return!(["Canada","USA"].includes(b)&&["MASTERS","MBA"].includes(c)&&("CGPA"===e&&d>7.5||"PERCENTAGE"===e&&d>75))},G=function(a){try{return null==a?void 0:a.toISOString()}catch(b){return console.error(b||"range error"),"NA"}}},70583:function(a){a.exports={mainContainer:"SpotCounsellingCalendar_mainContainer__VZylB",mainContainer1:"SpotCounsellingCalendar_mainContainer1__r8gG8",mainContainerWrapper:"SpotCounsellingCalendar_mainContainerWrapper__E9_XQ",outerMainContainer:"SpotCounsellingCalendar_outerMainContainer__Agezi",slider:"SpotCounsellingCalendar_slider___CpNK",calenderCardWrapper:"SpotCounsellingCalendar_calenderCardWrapper__3Rrdo",meetCouncellercalenderCardWrapper:"SpotCounsellingCalendar_meetCouncellercalenderCardWrapper__xMzCa",brettLeeConfettiImage:"SpotCounsellingCalendar_brettLeeConfettiImage__tsSZV",calendarDateBox:"SpotCounsellingCalendar_calendarDateBox__lOBOF",meetCounsellerCalendarDateBox:"SpotCounsellingCalendar_meetCounsellerCalendarDateBox__QQRHT",voMeet:"SpotCounsellingCalendar_voMeet__BBG4A",liveNowIcon:"SpotCounsellingCalendar_liveNowIcon__WTPJJ",liveNowIcon1:"SpotCounsellingCalendar_liveNowIcon1__oL4BP",liveNowIconExp:"SpotCounsellingCalendar_liveNowIconExp___xQaU",calendarBoxContainerOuter1:"SpotCounsellingCalendar_calendarBoxContainerOuter1__J__Ww",calendarBoxContainerOuter1EXp:"SpotCounsellingCalendar_calendarBoxContainerOuter1EXp__DLv3u",meetcalendarBoxContainerOuter1:"SpotCounsellingCalendar_meetcalendarBoxContainerOuter1___HkL_",calendarBoxContainerOuter2:"SpotCounsellingCalendar_calendarBoxContainerOuter2__TyJ2s",calendarBoxContainerExp:"SpotCounsellingCalendar_calendarBoxContainerExp__iKO19",calendarBoxContainerExp1:"SpotCounsellingCalendar_calendarBoxContainerExp1__ahFG7",style2:"SpotCounsellingCalendar_style2__fb7T0",calendarBoxContainer:"SpotCounsellingCalendar_calendarBoxContainer__tGfgt",meetCounsellerCalendarBoxContainer:"SpotCounsellingCalendar_meetCounsellerCalendarBoxContainer__vQ3J6",bottomCtaContainer:"SpotCounsellingCalendar_bottomCtaContainer__xavZL",paragraph:"SpotCounsellingCalendar_paragraph__aBG74",meetCouncellerPara:"SpotCounsellingCalendar_meetCouncellerPara__xUh5o",meter:"SpotCounsellingCalendar_meter__P1899",progress:"SpotCounsellingCalendar_progress__p9JXQ",progressBar:"SpotCounsellingCalendar_progressBar__Z0zJL",subText:"SpotCounsellingCalendar_subText__0fZ4d",load:"SpotCounsellingCalendar_load___jOMw",stickyEndMobileContainer:"SpotCounsellingCalendar_stickyEndMobileContainer__u_bpm",lsWrapper:"SpotCounsellingCalendar_lsWrapper__S8OEk",animatedStars:"SpotCounsellingCalendar_animatedStars__isymV",congratsDesk:"SpotCounsellingCalendar_congratsDesk__dvm_y",congrats:"SpotCounsellingCalendar_congrats__x6cRl",unlock:"SpotCounsellingCalendar_unlock__5i8kY",appScreen:"SpotCounsellingCalendar_appScreen__6Xkup",benifits:"SpotCounsellingCalendar_benifits__7YESt",claim1:"SpotCounsellingCalendar_claim1__8mh0H",claim:"SpotCounsellingCalendar_claim__vylMx",card:"SpotCounsellingCalendar_card__pto9k",cardDesk:"SpotCounsellingCalendar_cardDesk__2l0eC",arrow:"SpotCounsellingCalendar_arrow__07Yfj",border:"SpotCounsellingCalendar_border__91WFj",accesModal:"SpotCounsellingCalendar_accesModal__Vhtpi",box:"SpotCounsellingCalendar_box__m2zdg",partner:"SpotCounsellingCalendar_partner__nWAq_",post:"SpotCounsellingCalendar_post__V4zaN",post1:"SpotCounsellingCalendar_post1__O3sae",slots:"SpotCounsellingCalendar_slots__ev_d8"}}}])
//# sourceMappingURL=8842-011458e05083134e.js.map