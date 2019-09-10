module.exports = {
    important: true,
    theme: {
        fontFamily: {
            serif: ['Lora', 'serif'],
            sans: ['Poppins', 'sans-serif'],
        },
        textColor: {
            'white': '#FFF',
            'red': '#B10000',
            'accent': '#484E51',
        },
        backgroundColor: {
            'red': '#B10000',
            'white': '#FFF',
        },
        borderColor: {
            'red': '#B10000',
            'white': '#FFF',
        },
        extend: {
            screens: {
                'md': [
                    {'min': '667px', 'max': '812px'},
                    {'min': '868px'}
                ],
                '2xl': '1920px',
            }
        }
    },
    variants: {
      opacity: ['responsive', 'hover']
    }
  }
