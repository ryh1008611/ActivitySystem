<template>
  <div class="app-container">
  <div class="filter-container">
      <el-input v-model="listQuery.role_name" placeholder="角色" style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" />
      <el-button  class="filter-item" type="primary" icon="el-icon-search" @click="handleFilter">
        查询
      </el-button>
     <router-link :to="'/permission/createrole'" v-if="canAddapi" >
          <el-button type="primary"  icon="el-icon-plus" class="filter-item" style="position: absolute;right: 20px;">新增</el-button>
      </router-link>
  </div>
    <el-table
     v-loading="listLoading"
    :data="rolesList"
    style="width: 100%;margin-top:30px;"
    border
    fit
    highlight-current-row
    >
      <el-table-column align="center" label="序号">
        <template slot-scope="scope">
          {{ scope.$index+1}}
        </template>
      </el-table-column>
      <el-table-column align="header-center" label="角色" >
        <template slot-scope="scope">
          {{ scope.row.role_name }}
        </template>
      </el-table-column>
      <el-table-column align="header-center" label="描述">
        <template slot-scope="scope">
          {{ scope.row.description }}
        </template>
      </el-table-column>
      <el-table-column align="header-center" label="权限组">
        <template slot-scope="scope">
          <div>
              <el-tag v-for="item of scope.row.permissions_group" :key="item" style="margin-right:15px;">
                {{ groups[item] }}
              </el-tag>
           </div>
        </template>
      </el-table-column>

      <el-table-column align="center" label="操作">
        <template slot-scope="scope">
          <router-link :to="'/permission/updaterole/'+scope.row.id" v-if="canUpdateapi">
            <el-button type="primary" size="small" icon="el-icon-edit">
              编辑
            </el-button>
          </router-link>
        </template>
      </el-table-column>
    </el-table>
      <pagination v-show="total>0" :total="total" :page.sync="listQuery.page" :limit.sync="listQuery.limit" @pagination="getRoles" />
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import { deepClone } from '@/utils'
import { getOptions } from '@/api/base.js'
import { getRoles, addRole, deleteRole, updateRole } from '@/api/roles'
import Pagination from '@/components/Pagination' // Secondary package based on el-pagination



const defaultRole = {
  key: '',
  role_name: '',
  description: '',
  routes: []
}

export default {
   name:'RolePermissionlist',
   components: { Pagination },
  data() {
    return {
      listLoading: true,
      role: Object.assign({}, defaultRole),
      routes: [],
      rolesList: [],
      total: 0,
      listQuery: {
        page: 1,
        limit: 10,
        role_name:undefined
      },
      groups_key: {
        key: 'group_name'
      },
       groups:[]
    }
  },
  // created() {
  //    //console.log(12)
  //    this.getGroups()
  //    this.getRoles()
  // },
  // mounted(){
  //    //console.log(2)
  //   this.getGroups()
  //   this.getRoles()
  // },
  activated() {//keep-alive存在时候，activated才存在，用户返回当前页面刷数据
   //console.log(2222)
    this.getRoles()
    this.getGroups()
   },
  computed:{
    ...mapGetters([
      'permissions',
      'name'
    ]),
    canAddapi(){
     if(this.name == 'admin'){
       return true
     }
     //判断权限
     return this.permissions.includes('RolePermissioncreate')
    },
    canUpdateapi(){
      if(this.name == 'admin'){
        return true
      }
      //判断权限
     return this.permissions.includes('RolePermissionupdate')
    }
  },
    methods: {
     async  getRoles() {
         this.listLoading = true
         getRoles(this.listQuery).then(response => {
           this.rolesList = response.data.list
           this.total = response.data.total
           this.listLoading =  false
         })
      },
      handleFilter() {
        this.listQuery.page = 1
        this.getRoles()
      },
    async  getGroups() {
        getOptions(this.groups_key).then(response => {
          this.groups = response.data
        })
      },
    }}
</script>
