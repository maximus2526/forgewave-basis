const { execSync } = require( 'child_process' );
console.log( 'Встановлення залежностей Gulp...' );
execSync( 'npm install gulp gulp-sass gulp-rename --save-dev', { stdio: 'inherit' } );
console.log( 'Встановлення залежностей Sass...' );
execSync( 'npm install sass --save-dev', { stdio: 'inherit' } );
console.log( 'Всі залежності успішно встановлені!' )