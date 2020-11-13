<template>
  <div class="app-container" v-if="isLoading">
  <el-form :model="role" label-width="80px" label-position="left">
    <el-form-item label="角色">
      <el-input v-model="role.role_name" placeholder="Role Name" />
    </el-form-item>
    <el-form-item label="描述">
      <el-input
        v-model="role.description"
        :autosize="{ minRows: 2, maxRows: 4}"
        type="textarea"
        placeholder="Role Description"
      />
    </el-form-item>
   <el-form-item label="权限组">
      <el-drag-select v-model="role.permissions_group" style="width:500px;" multiple placeholder="请选择">
        <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value" />
      </el-drag-select>
     <div style="margin-top:30px;">
        <el-tag v-for="item of role.permissions_group" :key="item" style="margin-right:15px;">
          {{ groups[item] }}
        </el-tag>
      </div>
    </el-form-item>
    <el-form-item label="权限">
          <el-transfer
              filterable
              :titles="['左', '右']"
              filter-placeholder="请输入"
              v-model="role.permissions"
              :data="transferdata">
            </el-transfer>
    </el-form-item>
    <el-form-item label="导航栏">
      <el-tree
        ref="tree"
        :check-strictly="checkStrictly"
        :data="routesData"
        :props="defaultProps"
        show-checkbox
        node-key="path"
        class="permission-tree"
      />
    </el-form-item>
  </el-form>
  <div style="text-align:right;">
   <!-- <el-button type="danger">Cancel</el-button> -->
    <el-button type="primary" @click="confirmRole">确认</el-button>
  </div>
  </div>
</template>

<script>
  import path from 'path'
  import { deepClone } from '@/utils'
   import { getRoles, updateRole,showRole } from '@/api/roles'
  import ElDragSelect from '@/components/DragSelect' // base on element-ui
  import asyncroutes from './data/asyncroutes'
  import { getOptions } from '@/api/base.js'
  import getPageTitle from '@/utils/get-page-title'

  const defaultRole = {
    key: '',
    role_name: '',
    description: '',
    menus: [],
    permissions:[]
  }

  export default{
     components: { ElDragSelect },
    data(){
          return {
            isLoading:false,
            role: Object.assign({}, defaultRole),
            routes: [],
            rolesList: [],
            dialogVisible: false,
            dialogType: 'new',
            checkStrictly: false,
            defaultProps: {
              children: 'children',
              label: 'title'
            },
            options_key: {
              key: 'permissions'
            },
            groups_key: {
              key: 'group_name'
            },
            value: [],
            options: [],
            transferdata:[],
            groups:[]
          }
      },
      computed: {
        routesData() {
          return this.routes
        },
      },
      created() {
         //const id = this.$route.params && this.$route.params.id
        // Mock: get all routes and roles list from server
        this.getRoutes()
        this.getPermissions()
        this.getGroups()
        this.showRoles()
      },
      methods:{
        getRoutes() {
          this.serviceRoutes = asyncroutes
          this.routes = this.generateRoutes(asyncroutes)
        },
      async  showRoles() {
         const id = this.$route.params && this.$route.params.id
         showRole(id).then(response => {
          const {data} = response
          this.role = data
         //修改tagsview
          this.changeView()
         //显示数据
          this.isLoading = true
          this.$nextTick(() => {
            const menus = this.generateRoutes(this.role.menus)
            this.$refs.tree.setCheckedNodes(this.generateArr(menus))
            // set checked state of a node not affects its father and child nodes
            this.checkStrictly = false
          })
        })
        },
        changeView(){
           this.$store.dispatch('tagsView/changeView', {fullPath: this.$route.fullPath,newtitle:this.role.role_name})
        },
        //关闭当前页面
        closeSelectedTag() {
          this.$store.dispatch('tagsView/delView', this.$route)
       },
     async  getPermissions() {
          getOptions(this.options_key).then(response => {
            let transferdata = [];
            const {data} = response
            Object.keys(data).forEach((key) => {
                transferdata.push({
                  label: data[key],
                  key: key,
                });
              });
            this.transferdata = transferdata
          })
        },
     async  getGroups() {
          getOptions(this.groups_key).then(response => {
            let options = [];
            const {data} = response
            Object.keys(data).forEach((key) => {
                options.push({
                  label: data[key],
                  value: key,
                });
              });
            this.options = options
            this.groups = data
          })
        },
        // Reshape the routes structure so that it looks the same as the sidebar
        generateRoutes(routes, basePath = '/') {
          const res = []
          for (let route of routes) {
            // skip some route
            if (route.hidden) { continue }

            const onlyOneShowingChild = this.onlyOneShowingChild(route.children, route)

            if (route.children && onlyOneShowingChild && !route.alwaysShow) {
              route = onlyOneShowingChild
            }
            const data = {
              path: path.resolve(basePath, route.path),
              title: route.meta && route.meta.title
            }
            // recursive child routes
            if (route.children) {
              data.children = this.generateRoutes(route.children, data.path)
            }
            res.push(data)
          }
          return res
        },
        generateArr(routes) {
          let data = []
          routes.forEach(route => {
            data.push(route)
            if (route.children) {
              const temp = this.generateArr(route.children)
              if (temp.length > 0) {
                data = [...data, ...temp]
              }
            }
          })
          return data
        },
        generateTree(routes, basePath = '/', checkedKeys) {
          const res = []
          for (const route of routes) {
            const routePath = path.resolve(basePath, route.path)
            // recursive child routes
            if (route.children) {
              route.children = this.generateTree(route.children, routePath, checkedKeys)
            }
            if (checkedKeys.includes(routePath) || (route.children && route.children.length >= 1)) {
              res.push(route)
            }
          }
          return res
        },
        async confirmRole() {
          const checkedKeys = this.$refs.tree.getCheckedKeys()
          const id = this.$route.params && this.$route.params.id
          this.role.menus = this.generateTree(deepClone(this.serviceRoutes), '/', checkedKeys)
         updateRole(id,this.role).then(() => {
          this.$notify({
           title: 'Success',
          // message: 'success',
           type: 'success',
           duration: 2000
          })
         })
         // this.$router.push({name: 'RolePermissionlist'});
         this.closeSelectedTag()
         this.$router.back()
        },
        // reference: src/view/layout/components/Sidebar/SidebarItem.vue
        onlyOneShowingChild(children = [], parent) {
          let onlyOneChild = null
          const showingChildren = children.filter(item => !item.hidden)

          // When there is only one child route, the child route is displayed by default
          if (showingChildren.length === 1) {
            onlyOneChild = showingChildren[0]
            onlyOneChild.path = path.resolve(parent.path, onlyOneChild.path)
            return onlyOneChild
          }

          // Show parent if there are no child route to display
          if (showingChildren.length === 0) {
            onlyOneChild = { ... parent, path: '', noShowingChildren: true }
            return onlyOneChild
          }
          return false
        }
      },
      // beforeRouteLeave(to,from,next){
      //   to.meta.keepAlive = true
      //   next()
      // }
  }
</script>
<style lang="scss" scoped>
.app-container {
  padding-top: 30px;
  width: 70%;
  margin: 0 auto;
  .roles-table {
    margin-top: 30px;
  }
  .permission-tree {
    margin-bottom: 30px;
  }
}
</style>
