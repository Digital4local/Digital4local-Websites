/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        bg: {
          primary: '#0A0A0F',
          secondary: '#12121A',
          tertiary: '#1A1A24',
          card: '#14141F',
          elevated: '#1C1C2A'
        },
        accent: {
          primary: '#00F0FF',
          neon: '#00F59B',
          glow: 'rgba(0, 240, 255, 0.25)',
          purple: '#8B5CF6'
        },
        text: {
          primary: '#F5F5F7',
          muted: '#9A9AA5',
          dark: '#626270'
        },
        border: {
          subtle: '#23232E',
          bright: '#343446',
          glow: 'rgba(0, 240, 255, 0.4)'
        },
        status: {
          success: '#22C55E',
          warning: '#F59E0B',
          error: '#EF4444'
        }
      },
      fontFamily: {
        sans: ['Inter', 'Satoshi', 'system-ui', 'sans-serif'],
        mono: ['"JetBrains Mono"', 'monospace'],
      },
      boxShadow: {
        'glow-accent': '0 0 25px -5px rgba(0, 240, 255, 0.3)',
        'glow-neon': '0 0 25px -5px rgba(0, 245, 155, 0.3)',
        'glow-card': '0 8px 32px 0 rgba(0, 0, 0, 0.37)',
        'bento': '0 10px 30px -10px rgba(0,0,0,0.5), inset 0 1px 0 0 rgba(255,255,255,0.05)'
      },
      animation: {
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'glow-shift': 'glowShift 8s ease infinite',
        'marquee': 'marquee 25s linear infinite',
        'scanline': 'scanline 8s linear infinite',
      },
      keyframes: {
        glowShift: {
          '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
          '50%': { transform: 'translate(5%, 10%) scale(1.1)' }
        },
        marquee: {
          '0%': { transform: 'translateX(0%)' },
          '100%': { transform: 'translateX(-50%)' }
        },
        scanline: {
          '0%': { transform: 'translateY(-100%)' },
          '100%': { transform: 'translateY(1000%)' }
        }
      }
    },
  },
  plugins: [],
}
