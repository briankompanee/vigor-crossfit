import $ from 'jquery';

wp.customize('blogname', (value) => {
  value.bind(to => $('.brand').text(to));
});

// assets/scripts/customizer.js
