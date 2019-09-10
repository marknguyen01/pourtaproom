module.exports = {
    important: true,
    theme: {
        container: {
            center: true,
        },
        fontFamily: {
            serif: ['Lora', 'serif'],
            sans: ['Poppins', 'sans-serif'],
        },
        textColor: {
            'white': '#FFF',
            'red': '#B10000',
            'primary-color': '#404044',
            'accent-color': '#484E51',
            'black':'#2C2C2C',
        },
        backgroundColor: {
            'red': '#B10000',
            'white': '#FFF',
            'accent': '#F9F9F9',
            'primary': '#5C5C5D',
            'transparent': 'transparent',
            'black':'#2C2C2C',
        },
        borderColor: {
            'red': '#B10000',
            'white': '#FFF',
            'accent': '#484E51',
            'black':'#2C2C2C',
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
