<template>
  <div class="app-container">
    <div class="filter-container">
      <el-input v-model="listQuery.name" placeholder="权限" style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" />
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
      <el-table-column align="center" label="权限" >
        <template slot-scope="scope">
          {{ scope.row.name }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="标识" >
        <template slot-scope="scope">
          {{ scope.row.slug }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="请求地址" >
        <template slot-scope="scope">
          {{ scope.row.http_path }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="请求方式"  >
        <template slot-scope="scope">
          {{ scope.row.http_method }}
        </template>
      </el-table-column>

      <el-table-column align="center" label="操作">
        <template slot-scope="scope">
          <el-button type="primary" size="small" @click="handleEdit(scope)" icon="el-icon-edit">编辑</el-button>
        </template>
      </el-table-column>
    </el-table>

      <pagination v-show="total>0" :total="total" :page.sync="listQuery.page" :limit.sync="listQuery.limit" @pagination="getPermissions" />

    <el-dialog :visible.sync="dialogVisible" :title="dialogType==='edit'?'修改':'新增'">
      <el-form :model="url" label-width="80px" label-position="left">
        <el-form-item label="权限">
          <el-input v-model="url.name"/>
        </el-form-item>
        <el-form-item label="标记">
          <el-input v-model="url.slug" />
        </el-form-item>
        <el-form-item label="请求地址">
          <el-input v-model="url.http_path" />
        </el-form-item>
        <el-form-item label="请求方式" >
          <el-select v-model="url.http_method" class="filter-item" placeholder="Please select">
            <el-option v-for="(value,key,index) in metheds" :key="key" :label="value" :value="value" />
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
  import { getPermissions,addPermissions,updatePermissions} from '@/api/permissions'
  import Pagination from '@/components/Pagination' // Secondary package based on el-pagination

  const defaultPermissions = {
    slug:'',
    name:'',
    http_method:'',
    http_path:''
  }

  export default {
          name: 'urllist',
          components: { Pagination },
          data(){
             return{
                metheds: {GET:"GET",POST:'POST',PUT:'PUT',DELETE:'DELETE'},
                lists:[],
                total:0,
                dialogVisible: false,
                dialogType: 'new',
                checkStrictly: false,
                listLoading: true,
                listQuery: {
                  page: 1,
                  limit: 10,
                  name: undefined,
                },
                url:Object.assign({}, defaultPermissions)
             }
          },
          // created() {
          //   this.getPermissions()
          // },
		  activated() {//keep-alive存在时候，activated才存在，用户返回当前页面刷数据
		   //console.log(2222)
		    this.getPermissions()
		   },
          methods: {
              getPermissions() {
                this.listLoading = true
                getPermissions(this.listQuery).then(response => {
                  this.lists = response.data.list
                  this.total = response.data.total
                  this.listLoading =  false
                })
              },
              handleFilter() {
                this.listQuery.page = 1
                this.getPermissions()
              },
              handleAddRole() {
                this.dialogType = 'new'
                this.dialogVisible = true
                this.url = Object.assign({}, defaultPermissions)
              },
              handleEdit(scope) {
                this.dialogType = 'edit'
                this.dialogVisible = true
                this.checkStrictly = true
                this.url = scope.row
              },
              async confirmRole() {
                const isEdit = this.dialogType === 'edit'
                if (isEdit) {
                  await updatePermissions(this.url.id,this.url)
                } else {
                   await addPermissions( this.url)
                   this.listQuery.page = 1
                }
                this.getPermissions()
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
