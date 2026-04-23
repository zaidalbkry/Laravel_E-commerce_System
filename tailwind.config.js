/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                mint: {
                    50: '#f4fbf8',
                    100: '#e8f7ef',
                    200: '#cceedd',
                    300: '#abdcc6',
                    400: '#80c7a5',
                    500: '#59ae85',
                    600: '#3f906b',
                    700: '#327357',
                    800: '#2c5c48',
                    900: '#284c3d',
                },
                peach: '#f7b58d',
                cream: '#fffaf0',
            },
            boxShadow: {
                soft: '0 10px 30px rgba(15, 23, 42, 0.08)',
            },
            fontFamily: {
                sans: ['Plus Jakarta Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
