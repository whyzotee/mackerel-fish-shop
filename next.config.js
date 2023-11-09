/** @type {import('next').NextConfig} */
const isProd = process.env.NODE_ENV !== 'development'

const nextConfig = {
    output: 'export',
    images: {
        unoptimized: true
    },
    basePath: isProd ? '/student/student65/u65301280005/mackerel-fish-shop-new' : undefined,
}

module.exports = nextConfig
