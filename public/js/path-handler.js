const pathName = window.location.pathname;
const blank = document.getElementById('link-blank');
const dashboard = document.getElementById('link-dashboard');
const table = document.getElementById('link-table');

if (pathName.includes('/about')) {
  blank?.classList.add('active-nav-link');
  dashboard?.classList.remove('active-nav-link');
  table?.classList.remove('active-nav-link');
} else if (pathName.includes('/table')) {
  blank?.classList.remove('active-nav-link');
  dashboard?.classList.remove('active-nav-link');
  table?.classList.add('active-nav-link');
} else {
  blank?.classList.remove('active-nav-link');
  dashboard?.classList.add('active-nav-link');
  table?.classList.remove('active-nav-link');
}