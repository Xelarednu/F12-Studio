import './bootstrap';
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

const lightbox = new PhotoSwipeLightbox({
  gallery: '#gallery',
  children: 'a',
  wheelToZoom: true,
  loop: true,
  pswpModule: () => import('photoswipe')
});
lightbox.init();