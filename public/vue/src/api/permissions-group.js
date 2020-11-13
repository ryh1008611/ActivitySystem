import request from '@/utils/request'

export function getGroups(query) {
  return request({
    url: '/v1/permissions-groups',
    params: query
  })
}

export function addGroups(data) {
  return request({
    url: '/v1/permissions-groups',
    method: 'post',
    data
  })
}

export function updateGroups(id, data) {
  return request({
    url: `/v1/permissions-groups/${id}`,
    method: 'put',
    data
  })
}
