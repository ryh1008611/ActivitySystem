import request from '@/utils/request'

export function login(data) {
  return request({
    url: '/v1/admin/login',
    method: 'post',
    data
  })
}

export function getInfo(token) {
  return request({
    url: '/v1/admin/info',
    method: 'get',
    params: { token }
  })
}

export function logout() {
  return request({
    url: '/v1/admin/logout',
    method: 'post'
  })
}

export function getUsers(query) {
  return request({
    url: '/v1/admin',
    method: 'get',
    params: query
  })
}

export function addUser(data) {
  return request({
    url: '/v1/admin',
    method: 'post',
    data
  })
}

export function updateUser(id, data) {
  return request({
    url: `/v1/admin/${id}`,
    method: 'put',
    data
  })
}
