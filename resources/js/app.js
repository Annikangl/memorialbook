import 'bootstrap'
import 'slideout'


// const slideout = new Slideout({
//     'panel': document.getElementById('app'),
//     'menu': document.getElementById('menu'),
//     'side': 'right',
//     'padding': 500,
//     'tolerance': 70,
//     'easing': 'cubic-bezier(.32,2,.55,.27)'
//
// });
//
// document.querySelector('.toggle-button').addEventListener('click', function() {
//     slideout.toggle();
// });
//
// slideout
//     .on('beforeopen', function() {
//         this.panel.setAttribute('data-slideout-shown', true)
//     })
//     .on('open', function() {
//         this.panel.addEventListener('click', close);
//     })
//     .on('beforeclose', function() {
//         this.panel.setAttribute('data-slideout-shown', false)
//         this.panel.removeEventListener('click', close);
//     });
