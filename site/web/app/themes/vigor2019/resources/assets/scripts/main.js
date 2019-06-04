// import external dependencies
import 'jquery';
import 'lightbox2/dist/js/lightbox.js';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// import Font Awesome functionality
import { library, dom } from '@fortawesome/fontawesome-svg-core';
// import the check icon
import { faCheck, faBars} from '@fortawesome/free-solid-svg-icons';

// add the imported icons to the library
library.add(faCheck, faBars);

// tell FontAwesome to watch the DOM and add the SVGs when it detects icon markup
dom.watch();
