import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
  root: path.resolve(__dirname, "assets/src/"),
  build: {
    outDir: "../dist",
    sourcemap: true,
    emptyOutDir: true,
    minify: true,
    manifest: true,
    rollupOptions: {
      input: {
        front: path.resolve(__dirname, "assets/src/main.js"),
      },
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
      watch: {
        include: [path.resolve(__dirname, "assets/src/**")],
      },
    },
  },
});
