/* Javascript */

/* Visibility toggler */
const toggleVisibility = (trigger, content) => {
    const triggerElement = document.querySelector(trigger);
    const contentVisibility = document.querySelector(content);
    triggerElement.addEventListener('click', () => {
       if(contentVisibility.style.display === 'block'){
           contentVisibility.style.display = 'none';
       } else {
           contentVisibility.style.display = 'block';
       }
    });
}
/* Visibility toggler end */

/* Search form */

toggleVisibility('#techer-search-icon', '#techer-search');
toggleVisibility('#close-search', '#techer-search');


/* Search form End */

/*Big site nav */

toggleVisibility('.techer-menu-toggle', '#techer-big-menu');
toggleVisibility('#close-big-menu', '#techer-big-menu');

/* Big Site Nav End */
