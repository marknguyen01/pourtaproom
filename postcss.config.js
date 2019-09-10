module.exports = {
    plugins: [
        require('postcss-import'),
        require('postcss-simple-vars'),
        require('postcss-color-function'),
        require('tailwindcss')('./tailwind.config.js'),
        require('postcss-nested'),
        require('autoprefixer'),
        require('cssnano'),
    ]
};
