// postcss.config.js
module.exports = {
    plugins: [
        require('tailwindcss'),
        require('autoprefixer'),
        require('postcss-prefix-selector')({
            prefix: '.ux-table',
            exclude: [/^html$/, /^body$/],
        }),
    ],
};
