import request from '@/utils/request'

export function getPermissions(query) {
  return request({
    url: '/v1/permissions',
    method: 'get',
    params: query
  })
}

export function addPermissions(data) {
  return request({
    url: '/v1/permissions',
    method: 'post',
    data
  })
}

export function updatePermissions(id, data) {
  return request({
    url: `/v1/permissions/${id}`,
    method: 'put',
    data
  })
}
