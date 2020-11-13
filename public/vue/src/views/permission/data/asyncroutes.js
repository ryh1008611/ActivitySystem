const asyncroutes = [
 {
   path: '/permission',
   name: 'Permission',
   meta: {
     title: '权限模块',
   },
   children: [
     {
       hidden: true,
       path: 'createrole',
       name: 'RolePermissioncreate',
       meta: {
         title: '新建角色',
       }
     },
     {
       hidden: true,
       path: 'updaterole/:id(\\d+)',
       name: 'RolePermissionupdate',
       meta: {
         title: '更新角色',
       }
     },
     {
       path: 'userlist',
       name: 'userslist',
       meta: {
         title: '用户列表',
       }
     },
     {
       path: 'rolelist',
       name: 'RolePermissionlist',
       meta: {
         title: '角色列表',
       }
     },
     {
       path: 'grouplist',
       name: 'grouplist',
       meta: {
         title: '权限组',
       }
     },
     {
       path: 'urllist',
       name: 'urllist',
       meta: {
         title: '权限列表',
       }
     },
   ]
 },
]
export default asyncroutes
