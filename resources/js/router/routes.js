import mainRoutes from "./mainRoutes";
import authRoutes from "./authRoutes";
import notFoundRoutes from "./notFoundRoutes";

export default [
  ...mainRoutes,
  ...authRoutes,
  ...notFoundRoutes
]