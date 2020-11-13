import request from '@/utils/request'

export function getOptions(query) {
  return request({
    url: '/v1/options',
    method: 'get',
    params: query
  })
}
