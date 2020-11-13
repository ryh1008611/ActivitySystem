import request from '@/utils/request'

export function getRoutes() {
  return request({
    url: '/routes',
    method: 'get'
  })
}

export function getRoles(query) {
  return request({
    url: '/v1/roles',
    method: 'get',
    params: query
  })
}

export function addRole(data) {
  return request({
     url: '/v1/roles',
    method: 'post',
    data
  })
}

export function updateRole(id, data) {
  return request({
    url: `/v1/roles/${id}`,
    method: 'put',
    data
  })
}

export function showRole(id) {
  return request({
    url: `/v1/roles/${id}`,
    method: 'get',
  })
}

export function deleteRole(id) {
  return request({
    url: `/v1/roles/${id}`,
    method: 'delete'
  })
}
