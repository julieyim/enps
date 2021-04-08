// Step 1: select the element the user will click on to make this menu show/hide. In this case it's the toggle-icon and since we are grabbing it by it's classname we need to include the period 
const clickButton = document.querySelector('.toggle-icon');


// Step 2: add a click event to that icon
clickButton.addEventListener('click', () => {
    // when that icon is clicked we are going to grab the nav element (or whatever is showing/hiding) and add or remove that special class we created in the CSS
    // do stuff here
    document.querySelector('.top-nav').classList.toggle('show-nav');
});

window.addEventListener('resize', function(event){
    // reset the nav when screen size changes
    document.querySelector('top-nav').classList.remove('show-nav');
});