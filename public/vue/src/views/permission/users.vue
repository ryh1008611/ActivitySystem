<template>
  <div class="app-container">
    <div class="filter-container">
      <el-input v-model="listQuery.username" placeholder="帐号" style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" />
      <el-button  class="filter-item" type="primary" icon="el-icon-search" @click="handleFilter">
        查询
      </el-button>
       <el-button type="primary"   class="filter-item" @click="handleAddRole" icon="el-icon-plus">新增 </el-button>
    </div>
    <el-table
      :data="lists"
      style="width: 100%;margin-top:30px;"
      v-loading="listLoading"
      border
      fit
      highlight-current-row
      >
      <el-table-column align="center" label="序号" >
        <template slot-scope="scope">
          {{ scope.$index+1}}
        </template>
      </el-table-column>
      <el-table-column align="center" label="帐号" >
        <template slot-scope="scope">
          {{ scope.row.username }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="角色" >
        <template slot-scope="scope">
          {{scope.row.role && scope.row.role.role_name}}
        </template>
      </el-table-column>

      <el-table-column align="center" label="状态" >
        <template slot-scope="scope">
           <el-tag
                    :type="scope.row.status === 0 ? 'danger' : 'success'"
                    disable-transitions> {{statusArr[scope.row.status]}}
           </el-tag>
        </template>
      </el-table-column>
      <el-table-column align="center" label="操作">
        <template slot-scope="scope">
          <el-button type="primary" size="small" @click="handleEdit(scope)" icon="el-icon-edit">编辑</el-button>
        </template>
      </el-table-column>
    </el-table>

      <pagination v-show="total>0" :total="total" :page.sync="listQuery.page" :limit.sync="listQuery.limit" @pagination="getUsers" />

    <el-dialog :visible.sync="dialogVisible" :title="dialogType==='edit'?'修改':'新增'">
      <el-form :model="user" label-width="80px" label-position="left">
        <el-form-item label="帐号">
          <el-input v-model="user.username"/>
        </el-form-item>
        <el-form-item label="密码">
          <el-input v-model="user.password" show-password/>
        </el-form-item>
        <el-form-item label="角色">
         <el-select v-model="user.role_id" class="filter-item" placeholder="Please select">
           <el-option v-for="(value,key,index) in roles" :key="key*1" :label="value" :value="key*1" />
         </el-select>
        </el-form-item>
        <el-form-item label="状态" >
          <el-select v-model="user.status" class="filter-item" placeholder="Please select">
            <el-option v-for="(item,key) in statusArr" :key="key" :label="item" :value="key" />
          </el-select>
        </el-form-item>
      </el-form>
      <div style="text-align:right;">
        <el-button type="danger" @click="dialogVisible=false">取消</el-button>
        <el-button type="primary" @click="confirmRole">确认</el-button>
      </div>
    </el-dialog>

  </div>
</template>


<script>
  import { getUsers,addUser,updateUser} from '@/api/user.js'
  import { getOptions } from '@/api/base.js'
  import Pagination from '@/components/Pagination' // Secondary package based on el-pagination

  const defaultUser = {
    username:'',
    password:'',
    status:'',
    role_id:''
  }

  export default {
          name: 'userslist',
          components: { Pagination },
          data(){
             return{
                lists:[],
                total:0,
                dialogVisible: false,
                dialogType: 'new',
                checkStrictly: false,
                listLoading: true,
                listQuery: {
                  page: 1,
                  limit: 10,
                  username: undefined,
                },
                user:Object.assign({}, defaultUser),
                statusArr:['停用','启用'],
                options_key: {
                  key: 'roles'
                },
                roles:[]
             }
          },
          // created() {
          //   this.getUsers()
          //   this.getRoles()
          // },
          activated() {//keep-alive存在时候，activated才存在，用户返回当前页面刷数据
           //console.log(2222)
            this.getUsers()
            this.getRoles()
           },
          methods: {
              getUsers() {
                this.listLoading = true
                getUsers(this.listQuery).then(response => {
                  this.lists = response.data.list
                  this.total = response.data.total
                  this.listLoading =  false
                })
              },
              getRoles(){
                getOptions(this.options_key).then(response =>{
                    const {data} = response
                     this.roles = data
                })
              },
              handleFilter() {
                this.listQuery.page = 1
                this.getUsers()()
              },
              handleAddRole() {
                this.dialogType = 'new'
                this.dialogVisible = true
                this.user = Object.assign({}, defaultUser)
              },
              handleEdit(scope) {
                this.dialogType = 'edit'
                this.dialogVisible = true
                this.checkStrictly = true
                this.user = scope.row
              },
              async confirmRole() {
                const isEdit = this.dialogType === 'edit'
                if (isEdit) {
                  await updateUser(this.user.id,this.user)
                } else {
                   await addUser(this.user)
                   this.listQuery.page = 1
                }
                this.getUsers()
                this.dialogVisible = false
                this.$notify({
                 title: 'Success',
                // message: 'success',
                 type: 'success',
                 duration: 2000
                })

              },
          }
  }
</script>

<style>
</style>
