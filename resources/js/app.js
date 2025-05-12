import '../css/app.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import AOS from 'aos';
import 'aos/dist/aos.css';

document.addEventListener('DOMContentLoaded', () => {
  AOS.init({ duration:600, once:true });
  const btn = document.getElementById('scrollTop');
  window.addEventListener('scroll', () => {
    btn.style.display = window.scrollY > 300 ? 'flex' : 'none';
  });
  btn.addEventListener('click', () => window.scrollTo({top:0,behavior:'smooth'}));
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      const collapse = document.querySelector('.navbar-collapse');
      new bootstrap.Collapse(collapse).hide();
    });
  });
});
