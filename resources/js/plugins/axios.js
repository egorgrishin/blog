const axiosInstance = require('axios')
const axiosRetry = require('axios-retry')

const axios = axiosInstance.create()
const retryDelay = () => 1000 * Math.random()

axiosRetry(axios, {
  retries: 2,
  retryDelay,
  retryCondition: axiosRetry.isRetryableError,
});

export default axios