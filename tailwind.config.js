/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      container: {
        center: true,
        padding: "2rem",
        screens: {
          "2xl": "1400px",
        },
      },
      extend: {
        colors: {
          // Tambahkan warna kustom kamu di sini jika diperlukan
        },
        borderRadius: {
          lg: "var(--radius)",
          md: "calc(var(--radius) - 2px)",
          sm: "calc(var(--radius) - 4px)",
        },
        keyframes: {
          // Keyframes dari konfigurasi pertama
          "accordion-down": {
            from: { height: "0" },
            to: { height: "var(--radix-accordion-content-height)" },
          },
          "accordion-up": {
            from: { height: "var(--radix-accordion-content-height)" },
            to: { height: "0" },
          },
          "fade-in": {
            "0%": { opacity: "0", transform: "translateY(10px)" },
            "100%": { opacity: "1", transform: "translateY(0)" },
          },
          // Keyframes dari konfigurasi kedua
          "text-shimmer": {
            "0%, 100%": {
              "background-size": "200% 200%",
              "background-position": "left center",
            },
            "50%": {
              "background-size": "200% 200%",
              "background-position": "right center",
            },
          },
          "text-fade": {
            "0%, 100%": { opacity: "1" },
            "50%": { opacity: "0.7" },
          },
          fadeIn: {
            "0%": { opacity: "0", transform: "translateY(20px)" },
            "100%": { opacity: "1", transform: "translateY(0)" },
          },
          float: {
            "0%, 100%": { transform: "translateY(0)" },
            "50%": { transform: "translateY(-10px)" },
          },
          slideIn: {
            "0%": { transform: "translateX(-100%)", opacity: "0" },
            "100%": { transform: "translateX(0)", opacity: "1" },
          },
          "rotate-y": {
            "0%": { transform: "rotateY(0deg)" },
            "100%": { transform: "rotateY(360deg)" },
          },
          "ken-burns": {
            "0%": { transform: "scale(1.1)" },
            "100%": { transform: "scale(1.2)" },
          },
          "slide-right": {
            "0%": { backgroundPosition: "0px 0px" },
            "100%": { backgroundPosition: "100px 100px" },
          },
          "slide-up": {
            "0%": { transform: "translateY(100%)", opacity: "0" },
            "100%": { transform: "translateY(0)", opacity: "1" },
          },
          "width-expand": {
            "0%": { transform: "scaleX(0)" },
            "100%": { transform: "scaleX(1)" },
          },
          pulse: {
            "0%, 100%": { opacity: 1 },
            "50%": { opacity: 0.5 },
          },
          typewriter: {
            "0%": { width: "0%" },
            "100%": { width: "100%" },
          },
        },
        animation: {
          // Animasi dari konfigurasi pertama
          "accordion-down": "accordion-down 0.2s ease-out",
          "accordion-up": "accordion-up 0.2s ease-out",
          "fade-in": "fade-in 0.5s ease-out",
          // Animasi dari konfigurasi kedua
          "text-shimmer": "text-shimmer 3s ease-in-out infinite",
          "text-fade": "text-fade 3s ease-in-out infinite",
          fadeIn: "fadeIn 1s ease-out forwards",
          float: "float 3s ease-in-out infinite",
          slideIn: "slideIn 0.5s ease-out forwards",
          "rotate-y": "rotate-y 1s ease-in-out",
          "ken-burns": "ken-burns 20s ease-out infinite alternate",
          "slide-right": "slide-right 20s linear infinite",
          "slide-up": "slide-up 1s ease-out forwards",
          "width-expand": "width-expand 0.5s ease-out forwards",
          pulse: "pulse 2s ease-in-out infinite",
          typewriter: "typewriter 4s steps(40) infinite",
        },
      },
    },
    plugins: [
      require("tailwindcss-animate"),
  
    ],
  };