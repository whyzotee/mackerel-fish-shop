const isProd = process.env.NODE_ENV !== "development";

export const basePath = isProd
  ? "/student/student65/u65301280005/mackerel-fish-shop-new"
  : "";
