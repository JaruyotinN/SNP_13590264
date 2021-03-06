function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  // { path: '/', name: 'welcome', component: page('welcome.vue') },
  { path: '/students', name: 'student', component: page('student/index.vue') },
  { path: '/dairy', name: 'dairy', component: page('student/dairy.vue') },
  { path: '/postdairy', name: 'postdairy', component: page('student/postdairy.vue') },
  { path: '/status', name: 'status', component: page('student/status.vue') },
  { path: '/comevents/:id', name: 'detail', component: page('student/detail.vue') },
  { path: '/edit/:id', name: 'edit', component: page('student/edit.vue') },

  { path: '/review/:id', name: 'review', component: page('company/review.vue') },
  { path: '/review2/:id', name: 'review2', component: page('company/review2.vue') },
  { path: '/detailreview/:id', name: 'detailreview', component: page('company/detailreview.vue') },
  { path: '/getstudent/:id', name: 'getstudent', component: page('company/requestdetail.vue') },
  { path: '/company', name: 'company', component: page('company/index.vue') },
  { path: '/internrequest', name: 'internrequest', component: page('company/internrequest.vue') },
  { path: '/list', name: 'list', component: page('company/list.vue') },
  { path: '/postevent', name: 'postevent', component: page('company/postevent.vue') },
  { path: '/staffs', name: 'staffs', component: page('company/staffs.vue') },
  { path: '/editstaff/:id', name: 'editstaff', component: page('company/editstaffs.vue') },
  { path: '/createstaff', name: 'createstaff', component: page('company/createstaff.vue') },
  { path: '/posttests', name: 'posttests', component: page('company/posttests.vue') },
  { path: '/editcompany/:id', name: 'editcompany', component: page('company/editcompany.vue') },
  
  { path: '/teacher', name: 'teacher', component: page('teacher/index.vue') },
  { path: '/studairy', name: 'studairy', component: page('teacher/dairy.vue') },
  { path: '/calendar', name: 'calendar', component: page('teacher/calendar.vue') },
  { path: '/createcourse', name: 'createcourse', component: page('teacher/createcourse.vue') },
  { path: '/createcalendar', name: 'createcalendar', component: page('teacher/createcalendar.vue') },
  { path: '/editcalendar/:id', name: 'editcalendar', component: page('teacher/editcalendar.vue') },
  { path: '/detaildairy/:id', name: 'detaildairy', component: page('teacher/detaildairy.vue') },
  { path: '/editteacher/:id', name: 'editteacher', component: page('teacher/editteacher.vue') },
 

  { path: '/adduser', name: 'adduser', component: page('admin/adduser.vue') },
  { path: '/admin', name: 'admin', component: page('admin/index.vue') },
  

  { path: '/', name: 'login', component: page('auth/login.vue') },
  { path: '/register', name: 'register', component: page('auth/register.vue') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
  { path: '/email/verify/:id', name: 'verification.verify', component: page('auth/verification/verify.vue') },
  { path: '/email/resend', name: 'verification.resend', component: page('auth/verification/resend.vue') },

  { path: '/home', name: 'home', component: page('home.vue') },
  { path: '/settings',
    component: page('settings/index.vue'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
    ] },

  { path: '*', component: page('errors/404.vue') }
]
