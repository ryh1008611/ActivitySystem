<template>
  <div class="app-container">
    <div class="filter-container">
      <el-input v-model="listQuery.group_name" placeholder="组名" style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" />
      <el-button  class="filter-item" type="primary" icon="el-icon-search" @click="handleFilter">
        查询
      </el-button>
       <el-button type="primary"   class="filter-item" @click="handleAddGroup" icon="el-icon-plus">新增 </el-button>
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
      <el-table-column align="center" label="组名" >
        <template slot-scope="scope">
          {{ scope.row.group_name }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="创建时间" >
        <template slot-scope="scope">
          {{ scope.row.created_at }}
        </template>
      </el-table-column>
      <el-table-column align="center" label="操作">
        <template slot-scope="scope">
          <el-button type="primary" size="small" @click="handleEdit(scope)" icon="el-icon-edit">编辑</el-button>
        </template>
      </el-table-column>
    </el-table>
    <pagination v-show="total>0" :total="total" :page.sync="listQuery.page" :limit.sync="listQuery.limit" @pagination="getGroups" />
    <el-dialog :visible.sync="dialogVisible" :title="dialogType==='edit'?'修改':'新增'">
      <el-form :model="groups" label-width="80px" label-position="left">
        <el-form-item label="组名">
          <el-input v-model="groups.group_name"/>
        </el-form-item>
      <el-form-item label="权限">
            <el-transfer
                filterable
                :titles="['左', '右']"
                filter-placeholder="请输入"
                v-model="groups.group"
                :data="transferdata">
              </el-transfer>
      </el-form-item>
      </el-form>
      <div style="text-align:right;">
        <el-button type="danger" @click="dialogVisible=false">取消</el-button>
        <el-button type="primary" @click="confirmGroup">确认</el-button>
      </div>
    </el-dialog>
  </div>
</template>


<script>
  import { getOptions } from '@/api/base.js'
  import { getGroups,addGroups,updateGroups} from '@/api/permissions-group.js'
  import Pagination from '@/components/Pagination' // Secondary package based on el-pagination

  const defaultGroups = {
    group_name:'',
    group:[],
  }

  export default {
          name: 'grouplist',
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
                  group_name: undefined,
                },
                groups:Object.assign({}, defaultGroups),
                transferdata:[],
                options_key: {
                  key: 'permissions'
                },
             }
          },
          // created() {
          //    console.log(1111)
          //   this.getGroups(),
          //   this.getPermissions()
          // },
          activated() {//keep-alive存在时候，activated才存在，用户返回当前页面刷数据
           //console.log(2222)
           this.getGroups(),
           this.getPermissions()
           },

          methods: {
              getGroups() {
                this.listLoading = true
                getGroups(this.listQuery).then(response => {
                  this.lists = response.data.list
                  this.total = response.data.total
                  this.listLoading =  false
                })
              },
              handleFilter() {
                this.listQuery.page = 1
                this.getGroups()
              },
              handleAddGroup() {
                this.dialogType = 'new'
                this.dialogVisible = true
                this.url = Object.assign({}, defaultGroups)
              },
              handleEdit(scope) {
                this.dialogType = 'edit'
                this.dialogVisible = true
                this.checkStrictly = true
                this.groups = scope.row
              },
              getPermissions() {
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
              async confirmGroup() {
                const isEdit = this.dialogType === 'edit'
                if (isEdit) {
                  await updateGroups(this.groups.id,this.groups)
                } else {
                   await addGroups( this.groups)
                   this.listQuery.page = 1
                }
                this.getGroups()
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
