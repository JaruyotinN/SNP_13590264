function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  // { path: '/', name: 'welcome', component: page('welcome.vue') },
  { path: '/students', name: 'student', component: page('student/index.vue') },
  { path: '/dairy', name: 'dairy', component: page('student/dairy.vue') },
  { path: '/postdairy', name: 'postdairy', component: page('student/postdairy.vue') },
  { path: '/status', name: 'status', component: page('student/status.vue') },
  { path: '/showreqs/:id', name: 'stureq', component: page('company/requestdetail.vue') },
  { path: '/comevents/:id', name: 'detail', component: page('student/detail.vue') },
  { path: '/edit', name: 'edit', component: page('student/edit.vue') },

  { path: '/company', name: 'company', component: page('company/index.vue') },
  { path: '/internrequest', name: 'internrequest', component: page('company/internrequest.vue') },
  { path: '/list', name: 'list', component: page('company/list.vue') },
  { path: '/postevent', name: 'postevent', component: page('company/postevent.vue') },
  { path: '/posttests', name: 'posttests', component: page('company/posttests.vue') },
  
  

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
