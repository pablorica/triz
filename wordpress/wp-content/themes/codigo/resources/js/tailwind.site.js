import plugin from 'tailwindcss/plugin'

export default {
  theme: {
    colors: {}, // Important: allow Sage to use CSS variable colors instead
  },
  plugins: [
    plugin(function({ addBase, theme }) {
      addBase({
        ':root': {
          // Fluid typography from 1 rem to 1.2 rem with fallback to 26px.
          fontSize: '24px',
          letterSpacing: '0',
          lineHeight: '1', // calc(1.5 / 1),
          fontWeight: '300',

          // Safari resize fix.
          minHeight: '0vw',
        },
        // Default color transition on links unless user prefers reduced motion.
        '@media (prefers-reduced-motion: no-preference)': {
          'a': {
            transition: 'color .3s ease-in-out',
          },
        },
        'html': {
          color: theme('colors.darkplum'),
          //--------------------------------------------------------------------------
          // Set sans, serif or mono stack with optional custom font as default.
          //--------------------------------------------------------------------------
          // fontFamily: theme('fontFamily.mono'),
          fontFamily: theme('fontFamily.sans'),
          // fontFamily: theme('fontFamily.serif'),
        },
        'mark': {
          backgroundColor: theme('colors.darkplum'),
          color: theme('colors.white')
        },
      })
    }),

    // Custom components for this particular site.
    plugin(function({ addComponents, theme }) {
      const components = {
        '.container': {
          marginLeft: 'auto',
          marginRight: 'auto',
          paddingLeft: '20px',
          paddingRight: '20px',
          maxWidth: '100%',
          '@media (min-width: 782px)': {
            paddingLeft: theme('spacing.5'),
            paddingRight: theme('spacing.5'),
            //maxWidth: '1144px',
            //maxWidth: '60vw',
          },
          '@media (min-width: 960px)': {
            maxWidth: '60vw',
          },
        },
        '.container-fluid': {
          width: '100%',
          maxWidth: '100%',
          marginLeft: 'auto',
          marginRight: 'auto',
          paddingLeft: '20px',
          paddingRight: '20px',
          '@media (min-width: 782px)': {
            paddingLeft: theme('spacing.5'),
            paddingRight: theme('spacing.5'),
          },
        },
        '.outer-grid': {
          paddingTop: 0,
          paddingBottom: 0,
          rowGap: 0,
          position: 'relative',
          zIndex: 1,
        },
      }
      addComponents(components)
    }),

    // Custom utilities for this particular site.
    plugin(function({ addUtilities, theme, variants }) {
      const newUtilities = {
      }
      addUtilities(newUtilities)
    }),
    // Custom variants for this particular site.
    plugin(function ({ addVariant }) {
      addVariant('mobile-only', "@media screen and (max-width: calc(theme('screens.sm') - 1px))");
      // instead of hard-coded 640px use sm breakpoint value from config. Or anything
      addVariant('tablet-only', "@media screen and (min-width: theme('screens.sm')) and (max-width: calc(theme('screens.xl') - 1px))");
      addVariant('mbtb-only', "@media screen and (max-width: calc(theme('screens.xl') - 1px))");
    }),
  ],
}
