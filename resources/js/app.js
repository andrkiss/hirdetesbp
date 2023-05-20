import './bootstrap';

//Font Awesome
import '../../node_modules/@fortawesome/fontawesome-free/css/all.css';

//Lightbox 2
import '../../node_modules/lightbox2/dist/css/lightbox.css';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
